<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\User;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tweets = [
            ['Testing 123', 'msheikh'],
            ['How much would a woold chuck chuck if a wood chuck could chuck wood', 'msheikh'],
            ['This is soooo cool', 'hshaikh']
        ];

        $count = count($tweets);

        foreach ($tweets as $key => $tweet) {

            $user_id = User::where('name', '=', $tweet[1])->pluck('id')->first();
            
            Message::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'message' => $tweet[0],
                'user_id' => $user_id
            ]);
            $count--;
        }
    }
}
