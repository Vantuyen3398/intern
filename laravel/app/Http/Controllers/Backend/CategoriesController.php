<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request -> isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'cat_name'=>'required|min:4|max:255|alpha',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                 ->withErrors($validator)
                                 ->withInput();
            }
            //save database
            $cat = new Categories();
            return view('admin.categories.create', ['getAddCat' => $cat->getNewCat($request)]);
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
        $data = Categories::paginate(3);
        return view('admin.categories.list',['cats'=>$data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cat_id)
    {
        $data = Categories::find($cat_id);
        $data->delete();
        return redirect()->route('admin.categories.show');   
    }
}
