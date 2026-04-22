<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Setting;

class RequirePoints
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $requiredPoints
     */
    public function handle(Request $request, Closure $next, $param1 = null, $param2 = null)
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        $totalEarned = $user->points()->where('type', 'earn')->sum('points');
        $totalOther = $user->points()->where('type', '<>', 'earn')->sum('points');
        $totalSpent = DB::table('child_reward')->where('user_id', $user->id)->sum('points_spent');

        $balance = $totalEarned + $totalOther - $totalSpent;

        // Resolve required points:
        $requiredPoints = 0;

        // numeric param: direct required points
        if (is_numeric($param1)) {
            $requiredPoints = (int) $param1;
        }

        // course,id => read from courses.required_points
        elseif ($param1 === 'course' && is_numeric($param2)) {
            $course = Course::find((int) $param2);
            if ($course && isset($course->required_points)) {
                $requiredPoints = (int) $course->required_points;
            }
        }

        // otherwise treat param1 as settings key name -> look for key 'required_points.{param1}'
        elseif (! is_null($param1)) {
            $key = 'required_points.' . $param1;
            $value = Setting::where('key', $key)->value('value');
            if (is_numeric($value)) {
                $requiredPoints = (int) $value;
            }
        }

        if ($balance < $requiredPoints) {
            if ($request->expectsJson() || $request->wantsJson()) {
                return response()->json([
                    'error' => 'locked',
                    'required_points' => (int) $requiredPoints,
                    'balance' => (int) $balance,
                ], 403);
            }

            return redirect()->route('home')->with('locked', [
                'required_points' => (int) $requiredPoints,
                'balance' => (int) $balance,
            ]);
        }

        return $next($request);
    }
}
