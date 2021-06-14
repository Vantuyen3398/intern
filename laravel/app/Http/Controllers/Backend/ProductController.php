<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBlogPost;
use App\Classes\ProductClass;

use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $cats = DB::table('categories')->orderby('cat_id','desc')->get();
        return view('admin.product.create')->with('cats', $cats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request) {
            $validator = Validator::make($request->all(),[
                'product_name'=>'required|max:255',
                'price'=>'required|max:255',
                'image'=>'required|image|mimes:jpg,jpeg,png,gif|mimetypes:image/jpg,image/jpeg,image/png,image/gif|max:10000',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                 ->withErrors($validator)
                                 ->withInput();
            }
            //upLoad Files
            $pdClass = new ProductClass();
            $file_name = $pdClass->handleUploadedImage($request->file('image'));

            //save database
            $pd = new Products();
            $cats = DB::table('categories')->orderby('cat_id','desc')->get();
            return view('admin.product.create', ['getAddProduct' => $pd->getNewProduct($request,$file_name)])->with('cats', $cats);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = DB::table('products')->join('categories','categories.cat_id','=','products.cat_id')->orderby('products.product_id','desc')->paginate(3);
        return view('admin.product.list')->with('products',$products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $cats = DB::table('categories')->orderby('cat_id','asc')->get();
        $pd = Products::find($product_id);
        return view('admin.product.edit')->with('pd',$pd)->with('cats',$cats);
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
        if ($request) {
            $validator = Validator::make($request->all(),[
                'product_name'=>'required|max:255',
                'price'=>'required|max:255',
                'image'=>'image|mimes:jpg,jpeg,png,gif|mimetypes:image/jpg,image/jpeg,image/png,image/gif|max:10000',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                 ->withErrors($validator)
                                 ->withInput();
            }
            //upLoad Files
            $pdClass = new ProductClass();
            $file_name = $pdClass->UploadedImage($request->file('image'), $request->id);
            //update database
            $pd = new Products();
            return redirect()->route('admin.product.show', ['getUpload' => $pd->getUpdateProduct($request,$file_name)])->with('message', 'Update Product SuccessFully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $data = Products::find($product_id);
        if ($data->image == 'noname.jpg') {
            $data->delete();
        } else {
            unlink("backend/image/product/".$data->image);
            $data->delete();
        }
        return redirect()->route('admin.product.show');
    }
}
