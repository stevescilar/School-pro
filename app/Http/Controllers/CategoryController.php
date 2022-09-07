<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }



    public function AllCat (){

        // Fetch data using  eloquent ORM

        //get all data
        // $categories = Category::all(); 

        //fetch data from the latest additions
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        

        // fetch data using Query Builder
        // $categories = DB::table('categories')->latest()->get(); //- remember to use carbon while displaying created_at

        return view('admin.category.index', compact('categories','trashCat'));
    }


    public function AddCat(Request $request){
        // validate fields entry
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please Input Category Name!',
            'category_name.max' => 'Category Less Than 255 x-cters',
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


// edit Category
    public function Edit($id){
        $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }
    // update Category
    public function Update(Request $request , $id){
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id

        ]);
        return Redirect()->route('all.category')->with('success','Category Updated Successfully');
    }


    public function SoftDelete($id){
        
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','Category Deleted Successfully');
    }

    public function Restore($id){
        $delete =  Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restored Successfully');
    }

    public function Pdelete($id){
        $delete =  Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permanently Deleted');

    }
}
