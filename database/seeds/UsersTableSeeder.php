<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'msheikh@harvard.edu',
            'name' => 'msheikh',
            'password' => Hash::make('password')
        ]);

        $user = User::firstOrCreate([
            'email' => 'hshaikh@harvard.edu',
            'name' => 'hshaikh',
            'password' => Hash::make('password')
        ]);
    }
}
