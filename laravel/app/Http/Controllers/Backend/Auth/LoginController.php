<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.login');
        }

        $credentials = $request->only(['username', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
