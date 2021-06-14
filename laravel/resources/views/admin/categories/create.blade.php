@extends('admin.admin_layout')
@section('admin_content')
	<div  class="form">
		<h2>Register</h2>
        @if (session('message'))
            <span class="alert">
                <p>{{session('message')}}</p>
            </span>
        @endif
    	<form id="contactform" action="{{route('admin.categories.store')}}" method="post"> 
    		@csrf
    		<p class="contact"><label for="name">Name</label></p> 
    		<input id="name" name="cat_name" placeholder="First and last category name"  tabindex="1" type="text"><br> 
            @if ($errors->has('cat_name'))
                <span class="has-error">
                    <p>{{$errors->first('cat_name')}}</p>
                </span>
            @endif
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Add Categories" type="submit"> 	 
   		</form> 
	</div>
@endsection
