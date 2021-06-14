@extends('admin.admin_layout')
@section('admin_content')
    <div  class="form">
        <h2>Update User</h2>
        <form id="contactform" action="{{route('admin.user.update', ['id' => $data['user_id']])}}" method="post" enctype="multipart/form-data"> 
            @csrf
            <p class="contact"><label for="name">Name</label></p> 
            <input id="name" name="name" placeholder="First and last name"  tabindex="1" type="text" value="{{$data['name']}}"><br>
            @if ($errors->has('name'))
                <span class="has-error">
                    <p>{{$errors->first('name')}}</p>
                </span>
            @endif
            <p class="contact"><label for="email">Email</label></p> 
            <input id="email" name="email" placeholder="example@domain.com"  type="email" value="{{$data['email']}}"><br>
            @if ($errors->has('email'))
                <span class="has-error">
                    <p>{{$errors->first('email')}}</p>
                </span>
            @endif 

            <p class="contact"><label for="username">Create a username</label></p> 
            <input id="username" name="username" placeholder="username"  tabindex="2" type="text"  value="{{$data['username']}}"><br>
            @if ($errors->has('username'))
                <span class="has-error">
                    <p>{{$errors->first('username')}}</p>
                </span>
            @endif

            <p class="contact"><label for="img">Avatar</label></p>
            <input type="file" id="avatar" name="avatar" ><br>
            <img style="width: 100px; height: 100px;" src="/backend/image/avatar/{{$data['avatar']}}">
            @if ($errors->has('avatar'))
                <span class="has-error">
                    <p>{{$errors->first('avatar')}}</p>
                </span>
            @endif
            <br><br>
            <center><input class="buttom" name="submit" id="submit" tabindex="5" value="Update" type="submit"></center>
        </form> 
    </div>
@endsection