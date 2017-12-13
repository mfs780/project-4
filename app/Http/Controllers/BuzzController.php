<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\User;

class BuzzController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        
        return view('auth.login')->with([
            'user' => $user
        ]);
    }

    public function session(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $messages = Message::where('user_id', '=', $user->id)->get();
            $mentions = collect($user->messages);

            $messages_mentions = $messages->concat($mentions)->sortByDesc('created_at');
            
            foreach ($messages_mentions as $message) {
                $message->user = User::where('id', '=', $message->user_id)->first();
            }
        } else {
            $messages_mentions = [];
        }

        return view('session')->with([
            'user' => $user,
            'messages' => $messages_mentions,
            'message_count' => count($messages),
            'mention_count' => count($mentions),
        ]);
    }

    public function tweet(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|min:1|max:140'
        ]);

        $user = $request->user();

        $message = new Message();
        $message->message = $request->input('message');
        $message->user_id = $user->id;

        $message->save();

        return redirect('/session')->with([
            'user' => $user
        ]);
    }
}
