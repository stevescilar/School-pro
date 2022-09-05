<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function AllCat (){

        // Fetch data using  eloquent ORM

        //get all data
        // $categories = Category::all(); 

        //fetch data from the latest additions
        $categories = Category::latest()->paginate(5);
        

        // fetch data using Query Builder
        // $categories = DB::table('categories')->latest()->get(); //- remember to use carbon while displaying created_at

        return view('admin.category.index', compact('categories'));
    }


    public function AddCat(Request $request){
        // validate fields entry
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please Input Category Name!',
        ]); 

        // Insert data using Eloquent ORM 
        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now()

        // ]);

            // Query builder

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);


        $category = new Category;
        $category -> category_name = $request->category_name;
        $category -> user_id = Auth::user()->id;
        $category->save();

        return Redirect()->back()->with('success','Category Added Successfully');


    }
}
