<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'required_points.game4' => '10',
            'required_points.game5' => '10',
            'required_points.game6' => '10',
            // you can add more keys here for lessons/pages
        ];

        if (! Schema::hasTable('settings')) {
            if ($this->command) {
                $this->command->info('Skipping SettingsSeeder: `settings` table does not exist.');
            }
            return;
        }

        foreach ($defaults as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
