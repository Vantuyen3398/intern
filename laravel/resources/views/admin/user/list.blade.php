@extends('admin.admin_layout')
@section('admin_content')
	<center>
		@if (session('message'))
            <span class="alert">
                <p>{{session('message')}}</p>
            </span>
        @endif
        <table class="table table-striped">
		  	<thead>
		    <tr>
		      	<th scope="col" style="text-align: center; width: 70px">#</th>
		      	<th scope="col" style="text-align: center; width: 170px">Name</th>
		      	<th scope="col" style="text-align: center; width: 380px">Email</th>
		      	<th scope="col" style="text-align: center; width: 180px">UserName</th>
		      	<th scope="col" style="text-align: center">Birthday</th>
		      	<th scope="col" style="text-align: center">Avatar</th>
		      	<th scope="col" style="text-align: center">Action</th>
		    </tr>
		  	</thead>
		  	<tbody>
		  	@foreach ($users as $user)
		    	<tr>
				    <th scope="row" style="line-height: 97px; text-align: center">{{$user['user_id']}}</th>
				    <td style="line-height: 97px; text-align: center">{{$user['name']}}</td>
				    <td style="line-height: 97px; text-align: center">{{$user['email']}}</td>
					<td style="line-height: 97px; text-align: center">{{$user['username']}}</td>
					<td style="line-height: 97px; text-align: center">{{$user['birthday']}}</td>
					<td style="line-height: 97px; text-align: center">
						<img src="/backend/image/avatar/{{$user['avatar']}}"height="80" width="80">
					</td>
					<td style="line-height: 97px; text-align: center">
						<a href="{{'edit/'.$user['user_id']}}"><button type="button" class="btn btn-primary btn-aside">Edit</button></a>
						<a href="{{'delete/'.$user['user_id']}}" onclick="return confirm('Are you want to delete?')"><button type="button" class="btn btn-danger btn-aside">Delete</button></a>
					</td>
		    	</tr>
		    @endforeach
		  </tbody>
		</table>

		<div class="pagination-block">
            {{  $users->appends(request()->input())->links('admin.paginationlinks') }}
        </div>
	</center>
@endsection