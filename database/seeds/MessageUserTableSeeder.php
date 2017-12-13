<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\User;

class MessageUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            'Testing 123' => ['hshaikh'],
            'How much would a woold chuck chuck if a wood chuck could chuck wood' => ['hshaikh']
        ];

        foreach ($messages as $msg => $mentions) {
            $message = Message::where('message', 'like', $msg)->first();

            foreach ($mentions as $userName) {
                $user = User::where('name', 'like', $userName)->first();

                $message->users()->save($user);
            }
        }
    }
}
