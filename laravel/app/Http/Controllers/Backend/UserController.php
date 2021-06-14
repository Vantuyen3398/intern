<?php

namespace App\Http\Controllers\Backend;

use App\Classes\UserClass;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Support\Facades\DB;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost  $request)
    {
        //upLoad Files
        $userClass = new UserClass();
        $file_name = $userClass->handleUploadedImage($request->file('avatar'));

        //save database
        $user = new User();
        return view('admin.user.create', ['getAddUser' => $user->getNewUser($request,$file_name)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = User::paginate(3);
        return view('admin.user.list',['users'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $data = User::find($user_id);
        return view('admin.user.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request -> isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name'=>'required|min:6|max:255|alpha',
                'email'=>'required|email|max:255',
                'username'=>'required|min:6|max:255|alpha',
                'avatar'=>'image|mimes:jpg,jpeg,png,gif|mimetypes:image/jpg,image/jpeg,image/png,image/gif|max:10000',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                 ->withErrors($validator)
                                 ->withInput();
            }
            
            //unlink and upload image
            $userClass = new UserClass();
            $file_name = $userClass->uploadedImage($request->file('avatar'), $request->id);

            //update database
            $user = new User();
            return redirect()->route('admin.user.show', ['getUploadUser' => $user->getUpdateUser($request,$file_name)])->with('message', 'Update User SuccessFully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $data = User::find($user_id);
        if ($data->avatar == 'noname.jpg') {
            $data->delete();
        } else {
            unlink("backend/image/avatar/".$data->avatar);
            $data->delete();
        }
        return redirect()->route('admin.user.show');   
    }
}
