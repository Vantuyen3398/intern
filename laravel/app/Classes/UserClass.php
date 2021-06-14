<?php

namespace App\Classes;
use App\Models\User;
use Illuminate\Http\Request;

class  UserClass 
{

	public function handleUploadedImage($avatar)
	{
		if (!is_null($avatar)) {
            $destination_Path = public_path('backend/image/avatar');
            $file_name = time().'_'.$avatar->getClientOriginalName(); 
            $avatar->move($destination_Path, $file_name);
            return $file_name;
		} else {
			$file_name = 'noname.jpg';
			return $file_name;
		}
	}

	public function uploadedImage($avatar,$id)
	{
		if (!is_null($avatar)) {
			$data = User::find($id);
			if ($data->avatar == 'noname.jpg') {
				$destination_Path = public_path('backend/image/avatar');
            	$file_name = time().'_'.$avatar->getClientOriginalName(); 
            	$avatar->move($destination_Path, $file_name);
            	return $file_name;
			} else {
		        unlink("backend/image/avatar/".$data->avatar);
		        $destination_Path = public_path('backend/image/avatar');
		        $file_name = time().'_'.$avatar->getClientOriginalName();
		        $avatar->move($destination_Path, $file_name);
		        return $file_name;
			}
		}
	}
}
