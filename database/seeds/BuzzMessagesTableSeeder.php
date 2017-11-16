<?php

use Illuminate\Database\Seeder;
use App\BuzzMessage;

class BuzzMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            ['Ever tried. Ever failed. No matter. Try Again. Fail again. Fail better.', 'fail,better', ''],
            ['Hapiness is not something ready made. It comes from your own actions.', 'happy', 'tackyscare'],
            ['A day without sunshine is like, you know, night.', 'happy,sunshine', 'steameddressage,dogheartedmarch'],
            ['Always do whatever\'s next.', 'just do it', 'nucleussuite'],
            ['A creative man is motivated by the desire to achieve, not by the desire to beat others.', 'motivation,awesome', ''],
            ['Start where you are. Use what you have. Do what you can.', 'motivation', ''],
            ['Get your facts first, then you can distort them as you please.', 'fake news,fact check,alternative facts', 'tackyscare,chungvisiting,ludicrousan']
        ];

        $count = count($messages);

        foreach ($messages as $key => $message) {
            BuzzMessage::insert([
            'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'message' => $message[0],
            'tags' => $message[1],
            'mentions' => $message[2]
            ]);
            $count--;
        }
    }
}
