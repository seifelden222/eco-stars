<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Point;

class ProgressController extends Controller
{
    /**
     * Get current user's progress summary
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if (! $user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $totalEarned = $user->points()->where('type', 'earn')->sum('points');
        $totalOther = $user->points()->where('type', '<>', 'earn')->sum('points');

        // points spent via child_reward pivot
        $totalSpent = DB::table('child_reward')->where('user_id', $user->id)->sum('points_spent');

        $balance = $totalEarned + $totalOther - $totalSpent;

        $levelData = $this->computeLevel($balance);

        return response()->json(array_merge([
            'points' => (int) $balance,
            'total_earned' => (int) $totalEarned,
            'total_spent' => (int) $totalSpent,
        ], $levelData));
    }

    /**
     * Store game result (points earned) and return updated progress
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if (! $user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $data = $request->validate([
            'points' => 'required|integer|min:0',
            'reason' => 'nullable|string|max:255',
            'type' => 'nullable|string|in:earn,bonus,other',
        ]);

        $point = Point::create([
            'user_id' => $user->id,
            'points' => $data['points'],
            'type' => $data['type'] ?? 'earn',
            'reason' => $data['reason'] ?? 'game',
        ]);

        // If request expects JSON (AJAX/fetch), return JSON summary.
        if ($request->wantsJson() || $request->ajax() || str_contains($request->header('Accept', ''), 'application/json')) {
            return $this->index($request);
        }

        // Otherwise this is a regular web form submit: redirect to achievements page.
        return redirect()->route('achievements');
    }

    // storeWeb removed: unified behavior is handled in store()

    /**
     * Render the achievements page with server-side progress data
     */
    public function showAchievements()
    {
        $user = Auth::user();
        if (! $user) {
            return redirect()->route('login');
        }

        $totalEarned = $user->points()->where('type', 'earn')->sum('points');
        $totalOther = $user->points()->where('type', '<>', 'earn')->sum('points');
        $totalSpent = DB::table('child_reward')->where('user_id', $user->id)->sum('points_spent');
        $balance = $totalEarned + $totalOther - $totalSpent;
        $levelData = $this->computeLevel($balance);

        return view('User.achievements', array_merge([
            'points' => (int) $balance,
            'total_earned' => (int) $totalEarned,
            'total_spent' => (int) $totalSpent,
        ], $levelData));
    }

    /**
     * Compute level and percent toward next level
     */
    protected function computeLevel(int $points): array
    {
        $thresholds = config('progress.thresholds', [0, 100, 300, 600, 1000]);
        $overflowMultiplier = config('progress.overflow_multiplier', 700);

        $level = 1;
        $currentThreshold = 0;
        $nextThreshold = null;

        foreach ($thresholds as $index => $th) {
            if ($points >= $th) {
                $level = $index + 1;
                $currentThreshold = $th;
            } else {
                $nextThreshold = $th;
                break;
            }
        }

        if (is_null($nextThreshold)) {
            // points beyond last threshold
            $lastIndex = count($thresholds);
            $level = $lastIndex + (int) floor(($points - end($thresholds)) / $overflowMultiplier) + 1;
            $currentThreshold = end($thresholds) + ($level - $lastIndex - 1) * $overflowMultiplier;
            $nextThreshold = $currentThreshold + $overflowMultiplier;
        }

        $progressPercent = 100;
        if ($nextThreshold > $currentThreshold) {
            $progressPercent = (int) round((($points - $currentThreshold) / ($nextThreshold - $currentThreshold)) * 100);
            $progressPercent = max(0, min(100, $progressPercent));
        }

        return [
            'level' => (int) $level,
            'level_progress_percent' => $progressPercent,
            'level_current_threshold' => (int) $currentThreshold,
            'level_next_threshold' => (int) $nextThreshold,
            'points_to_next_level' => max(0, $nextThreshold - $points),
        ];
    }
}
