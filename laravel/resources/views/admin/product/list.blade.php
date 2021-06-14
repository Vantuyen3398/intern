@extends('admin.admin_layout')
@section('admin_content')
	<center>
		@if (session('message'))
            <span class="alert">
                <p>{{session('message')}}</p>
            </span>
        @endif
        <table class="table table-striped" style = "width: 1250px">
		  	<thead>
		    <tr>
		      	<th scope="col" style="text-align: center">#</th>
		      	<th scope="col" style="text-align: center; width: 400px">Product Name</th>
		      	<th scope="col" style="text-align: center">Category </th>
		      	<th scope="col" style="text-align: center">Price </th>
		      	<th scope="col" style="text-align: center">Image </th>
		      	<th scope="col" style="text-align: center">Action</th>
		    </tr>
		  	</thead>
		  	<tbody>
		  		@foreach ($products as $k => $pd)
		  			<tr>
		  				<th scope="row" style="line-height: 97px; text-align: center">{{$k + 1}}</th>
		  				<td scope="row" style="line-height: 97px; text-align: center">{{$pd->product_name}}</td>
		  				<td scope="row" style="line-height: 97px; text-align: center">{{$pd->cat_name}}</td>
		  				<td scope="row" style="line-height: 97px; text-align: center">{{$pd->price}}</td>
		  				<td style="line-height: 97px; text-align: center">
						<img src="/backend/image/product/{{$pd->image}}"height="80" width="80">
						</td>
						<td style="line-height: 97px; text-align: center">
							<a href="{{'edit/'.$pd->product_id}}"><button type="button" class="btn btn-primary btn-aside">Edit</button></a>
							<a href="{{'delete/'.$pd->product_id}}" onclick="return confirm('Are you want to delete?')"><button type="button" class="btn btn-danger btn-aside">Delete</button></a>
						</td>
		  			</tr>
		  		@endforeach
		  </tbody>
		</table>
		<div class="pagination-block">
            {{  $products->appends(request()->input())->links('admin.paginationlinks') }}
        </div>
	</center>
@endsection