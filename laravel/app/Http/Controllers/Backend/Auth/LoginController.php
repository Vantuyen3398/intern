<?php

namespace App\Http\Controllers\Backend\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
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
            $result = DB::table('users')->where('username',$request->username)->first();
            $request->session()->put('name', $result->name);
            $request->session()->put('role', $result->role);
            return redirect()->route('home');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function logout(){
        session()->flush();
        return view('admin.login');
    }
}
