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
            $latest = $messages->sortByDesc('created_at')->first();
            $mentions = collect($user->messages);

            $messages_mentions = $messages->concat($mentions)->sortByDesc('created_at');
            
            foreach ($messages_mentions as $message) {
                $message->user = User::where('id', '=', $message->user_id)->first();
            }
        } else {
            $messages_mentions = [];
            $mesages = [];
            $mentions = [];
        }

        return view('session')->with([
            'user' => $user,
            'messages' => $messages_mentions,
            'message_count' => count($messages),
            'mention_count' => count($mentions),
            'latest' => $latest
        ]);
    }

    public function tweet(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|min:1|max:140'
        ]);

        $user = $request->user();
        $mentionStr = $request->input('mentions');

        $mentions = array_map('trim', explode(',', $mentionStr));

        $users = User::whereIn('name', $mentions)->get();

        $message = new Message();
        $message->message = $request->input('message');
        $message->user_id = $user->id;

        $message->save();

        $message->users()->sync($users);

        return redirect('/session')->with([
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = Auth::user();

        $editMessage = Message::with('users')->find($id);

        if (!$editMessage) {
            redirect('/session');
        }

        $editMentionsArr = $editMessage->users()->get()->map(function ($u) {
            return $u->name;
        });

        $editMentions = implode(",", $editMentionsArr->toArray());

        if ($user) {
            $messages = Message::where('user_id', '=', $user->id)->get();
            $mentions = collect($user->messages);

            $messages_mentions = $messages->concat($mentions)->sortByDesc('created_at');
            
            foreach ($messages_mentions as $message) {
                $message->user = User::where('id', '=', $message->user_id)->first();
            }
        } else {
            $messages_mentions = [];
            $mesages = [];
            $mentions = [];
        }

        return view('session')->with([
            'user' => $user,
            'messages' => $messages_mentions,
            'message_count' => count($messages),
            'mention_count' => count($mentions),
            'edit_message' => $editMessage,
            'edit_mentions' => $editMentions
        ]);
    }

    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'message' => 'required|min:1|max:140'
         ]);

        $message = Message::find($id);
        
        $mentionStr = $request->input('mentions');
        $mentions = array_map('trim', explode(',', $mentionStr));
        $users = User::whereIn('name', $mentions)->get();
        $message->users()->sync($users);

        $message->message = $request->input('message');
        $message->save();

        return redirect('/session');
    }

    public function delete($id)
    {
        $message = Message::find($id);

        if (!$message) {
            return redirect('/session');
        }

        $message->users()->detach();

        $message->delete();

        return redirect('/session');
    }
}
