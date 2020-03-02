<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
          'name' => 'System Admin',
          'email' => 'mostak.shahid@gmail.com',
          'password' => bcrypt('123456789'),
          'admin' => 1
        ]);
        App\Profile::create([
          'user_id' => $user->id,
          'avatar' => 'Avatar Image',
          'about' => 'About him',
          'facebook' => 'facebook.com',
          'youtube' => 'youtube.com',
        ]);

    }
}
