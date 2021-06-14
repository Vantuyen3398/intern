<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'cat_id';

    protected $fillable = [
        'cat_name',
    ];

    public function getNewCat($request) {
        $cat = DB::table('categories')->where('cat_name', $request->cat_name)->first();
        if (!$cat) {
            $newCat = new Categories();
            $newCat->cat_name = $request->cat_name;
            $newCat->save();
            return redirect()->route('admin.categories.create')->with('message','Add Categories SuccessFully!');
        } else {
            return redirect()->route('admin.categories.create')->with('message','Your Category Name existed, Categories can not be created');
        }
    }
}
