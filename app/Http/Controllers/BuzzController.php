<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuzzController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        
        return view('auth.login')->with([
            'user' => $user
        ]);
    }

    public function session()
    {
        $user = Auth::user();
        return view('session')->with([
            'user' => $user
        ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
        ]);

        $user = $request->input('user');
        return redirect('/session')->with([
            'user' => $user
        ]);
    }

    public function tweet(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'message' => 'required'
        ]);

        $user = $request->input('user');
        return redirect('/session')->with([
            'user' => $user,
            'message' => $message
        ]);
    }
}
