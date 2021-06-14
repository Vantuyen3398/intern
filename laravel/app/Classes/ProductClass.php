<?php

namespace App\Classes;
use App\Models\Products;
use Illuminate\Http\Request;

/**
 * 
 */
class ProductClass
{
	public function handleUploadedImage($image)
	{
		if (!is_null($image)) {
            $destination_Path = public_path('backend/image/product');
            $file_name = time().'_'.$image->getClientOriginalName(); 
            $image->move($destination_Path, $file_name);
            return $file_name;
		} else {
			$file_name = 'noname.jpg';
			return $file_name;
		}
	}

	public function uploadedImage($image,$id)
	{
		if (!is_null($image)) {
			$data = Products::find($id);
			if ($data->image == 'noname.jpg') {
				$destination_Path = public_path('backend/image/product');
            	$file_name = time().'_'.$image->getClientOriginalName(); 
            	$image->move($destination_Path, $file_name);
            	return $file_name;
			} else {
		        unlink("backend/image/product/".$data->image);
		        $destination_Path = public_path('backend/image/product');
		        $file_name = time().'_'.$image->getClientOriginalName();
		        $image->move($destination_Path, $file_name);
		        return $file_name;
			}
		}
	}
}
