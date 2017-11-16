<?php

use Illuminate\Database\Seeder;
use App\BuzzUser;

class BuzzUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['tackyscare'],
            ['ellipticcallisto'],
            ['steameddressage'],
            ['chungvisiting'],
            ['dogheartedmarch'],
            ['ludicrousan'],
            ['nucleussuite']
        ];

        $count = count($users);

        foreach ($users as $key => $user) {
            BuzzUser::insert([
            'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'username' => $user[0]
            ]);
            $count--;
        }
    }
}
