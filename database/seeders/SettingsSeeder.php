<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['name' => 'Login with facebook','status' => OFF]);
        Setting::create(['name' => 'Login with google','status' => OFF]);
        Setting::create(['name' => 'Verify email address','status' => ON]);
    }
}
