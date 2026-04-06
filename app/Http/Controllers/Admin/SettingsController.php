<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function edit(): View
    {
        $settings = Setting::query()->pluck('value', 'key');

        return view('admin.systemsettings', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'support_email' => ['required', 'email', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'enable_2fa' => ['nullable', 'boolean'],
            'admin_password' => ['nullable', 'string', 'min:8', 'same:admin_password_confirmation'],
            'admin_password_confirmation' => ['nullable', 'string'],
            'points_lesson' => ['required', 'integer', 'min:0'],
            'points_quiz' => ['required', 'integer', 'min:0'],
            'badge_threshold' => ['required', 'integer', 'min:0'],
            'email_reports' => ['nullable', 'boolean'],
            'new_user_notifications' => ['nullable', 'boolean'],
            'auto_encouragement' => ['nullable', 'boolean'],
            'scheduled_maintenance' => ['nullable', 'boolean'],
        ]);

        $map = [
            'site_name' => $data['site_name'],
            'support_email' => $data['support_email'],
            'description' => $data['description'] ?? '',
            'enable_2fa' => !empty($data['enable_2fa']) ? '1' : '0',
            'points_lesson' => (string) $data['points_lesson'],
            'points_quiz' => (string) $data['points_quiz'],
            'badge_threshold' => (string) $data['badge_threshold'],
            'email_reports' => !empty($data['email_reports']) ? '1' : '0',
            'new_user_notifications' => !empty($data['new_user_notifications']) ? '1' : '0',
            'auto_encouragement' => !empty($data['auto_encouragement']) ? '1' : '0',
            'scheduled_maintenance' => !empty($data['scheduled_maintenance']) ? '1' : '0',
        ];

        foreach ($map as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('status', 'saved');
    }
}
