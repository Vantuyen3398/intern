<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'cat_id',
        'price',
        'image',
    ];

    public function getNewProduct($request,$file_name) 
    {
        $product = DB::table('products')->where('product_name', $request->product_name)->first();
            if (!$product) {
                $newProduct = new Products();
                $newProduct->product_name = $request->product_name;
                $newProduct->cat_id = $request->cat_id;
                $newProduct->price = $request->price;
                $newProduct->image = $file_name;
                $newProduct->save();
                return redirect()->route('admin.product.create')->with('message','Add Product SuccessFully!');
            } else {
                return redirect()->route('admin.product.create')->with('message','Your Product Name existed, Product can not be created');
            }
    }

    public function getUpdateProduct($request, $file_name)
    {
        if ($file_name) {
                $data = Products::find($request->id);
                $data->product_name = $request->product_name;
                $data->cat_id = $request->cat_id;
                $data->price = $request->price;
                $data->image = $file_name;
                $data->save();
            } else {
                $data = Products::find($request->id);
                $data->product_name = $request->product_name;
                $data->cat_id = $request->cat_id;
                $data->price = $request->price;
                $data->save();
            }
    }
}
