<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\Setting::create([
        	'option_name' => 'site_name',
        	'option_value' => 'Laravel\'s Blog'
        ]);
		App\Setting::create([
        	'option_name' => 'site_address',
        	'option_value' => 'Some Address'
        ]);
		App\Setting::create([
        	'option_name' => 'site_phone',
        	'option_value' => '+8801670058131'
        ]);
		App\Setting::create([
        	'option_name' => 'site_email',
        	'option_value' => 'mostak.shahid@gmail.com'
        ]);
    }
}
