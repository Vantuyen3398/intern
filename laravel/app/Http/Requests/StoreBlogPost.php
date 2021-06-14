<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:6|max:255|alpha',
            'email'=>'required|email|max:255',
            'username'=>'required|min:6|max:255|alpha',
            'password'=>'required|min:8|max:255',
            'avatar'=>'image|mimes:jpg,jpeg,png,gif|mimetypes:image/jpg,image/jpeg,image/png,image/gif|max:10000',
        ];
    }
}
