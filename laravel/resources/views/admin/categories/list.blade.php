@extends('admin.admin_layout')
@section('admin_content')
	<center>
		@if (session('message'))
            <span class="alert">
                <p>{{session('message')}}</p>
            </span>
        @endif
        <table class="table table-striped" style="width: 500px">
		  	<thead>
		    <tr>
		      	<th scope="col" style="text-align: center">#</th>
		      	<th scope="col" style="text-align: center">Category Name</th>
		      	<th scope="col" style="text-align: center">Action</th>
		    </tr>
		  	</thead>
		  	<tbody>
		  	@foreach ($cats as $cat)
		    	<tr>
				    <th scope="row" style="line-height: 50px; text-align: center">{{$cat['cat_id']}}</th>
				    <td style="line-height: 50px; text-align: center">{{$cat['cat_name']}}</td>
					<td style="line-height: 50px; text-align: center">
						<a href="{{'delete/'.$cat['cat_id']}}" onclick="return confirm('Are you want to delete?')"><button type="button" class="btn btn-danger btn-aside">Delete</button></a>
					</td>
		    	</tr>
		    @endforeach
		  </tbody>
		</table>

		<div class="pagination-block">
            {{  $cats->appends(request()->input())->links('admin.paginationlinks') }}
        </div>
	</center>
@endsection