<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'birthday',
        'avatar',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getNewUser($request,$file_name) {
        $user = DB::table('users')->where('email', $request->email)->first();
        if (!$user) {
            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->username = $request->username;
            $newUser->password = $request->password;
            $newUser->birthday = $request->birthday;
            $newUser->avatar = $file_name;
            $newUser->role = $request->role;
            $newUser->save();
            return redirect()->route('admin.user.create')->with('message','Add User SuccessFully!');
        } else {
            return redirect()->route('admin.user.create')->with('message','Your Email existed, User can not be created');
        }
    }

    public function getUpdateUser($request, $file_name) {
        if ($file_name) {
                $data = User::find($request->id);
                $data->name = $request->name;
                $data->email = $request->email;
                $data->username = $request->username;
                $data->avatar = $file_name;
                $data->save();
            } else {
                $data = User::find($request->id);
                $data->name = $request->name;
                $data->email = $request->email;
                $data->username = $request->username;
                $data->save();
        }
    }
}
