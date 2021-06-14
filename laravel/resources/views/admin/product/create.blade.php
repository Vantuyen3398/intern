@extends('admin.admin_layout')
@section('admin_content')
    <div  class="form">
        <h2>Add Product</h2>
        @if (session('message'))
            <span class="alert">
                <p>{{session('message')}}</p>
            </span>
        @endif
        <form id="contactform" action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data"> 
            @csrf
            <p class="contact"><label for="name">Product Name</label></p> 
            <input id="proddct_name" name="product_name" placeholder="First and last name"  tabindex="1" type="text"><br> 
            @if ($errors->has('product_name'))
                <span class="has-error">
                    <p>{{$errors->first('product_name')}}</p>
                </span>
            @endif

            <p class="contact"><label for="cat_name">Category Name</label></p>
            <select name="cat_id" class="form-control select-style" style="width: 400px">
                @foreach($cats as $cat)
                    <option value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>
                @endforeach
            </select>

            <p class="contact"><label for="price">Price</label></p> 
            <input id="price" name="price" placeholder="price"  tabindex="2" type="text"><br>
            @if ($errors->has('price'))
                <span class="has-error">
                    <p>{{$errors->first('price')}}</p>
                </span>
            @endif

            <p class="contact"><label for="img">Image</label></p>
            <input type="file" id="image" name="image" ><br>
            @if ($errors->has('image'))
                <span class="has-error">
                    <p>{{$errors->first('image')}}</p>
                </span>
                <br>
                <br>
            @endif

            <input class="buttom" name="submit" id="submit" tabindex="5" value="Add Product" type="submit">      
        </form> 
    </div>
@endsection