<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\MultiPic;
use illuminate\Support\Carbon;
use Image;
use Auth;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function AllBrand (){


        $brands = Brand::latest()->paginate(4);
        return view('admin.brand.index', compact('brands'));
     }


     public function StoreBrand(Request $request){
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name!', 
            'brand_name.min' => 'Brand Name should be longer Than 4 characters',
        ]); 

        $brand_image  = $request->file('brand_image');

        

        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen. '.' .$img_ext;
        // $up_location = 'image/brand/';
        // $last_img = $up_location.$img_name;
        // $brand_image->move($up_location,$img_name);

        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);

        $last_img = 'image/brand/'.$name_gen;


        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);


        return Redirect()->back()->with('success','Brand Inserted Successfully');
     }


    //  edit
    public function Edit($id){
          $brands = Brand::find($id);
          return view('admin.brand.edit', compact('brands'));
    }

    public function Update(Request $request, $id){
        
        $validateData = $request->validate([
            'brand_name' => 'required|min:4',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name!', 
            'brand_name.min' => 'Brand Name should be longer Than 4 characters',
        ]); 
        $old_image = $request->old_image;

        $brand_image  = $request->file('brand_image');

        if($brand_image){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen. '.' .$img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);

            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);


            return Redirect()->route('all.brand')->with('success','Brand Updated Successfully');
        }else{
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('all.brand')->with('success','Brand Updated Successfully');
        }
        
    }
    public function Delete($id){

        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return Redirect()->back()->with('success','Brand Deleted Successfully');
    }

    // Multi-Image 

    public function MultiPic(){
        $images = MultiPic::all();
        return view('admin.multipic.index',compact('images')); 
    }

    public function StoreImage(Request $request){

        $image  = $request->file('image');

        // for each for uploading several images
        foreach($image as $multi_img){

       

        $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
        Image::make($multi_img)->resize(400,400)->save('image/multi/'.$name_gen);

        $last_img = 'image/multi/'.$name_gen;


        MultiPic::insert([
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

    } //end the loop here
        return Redirect()->back()->with('success','Images  Inserted Successfully');

    }

    public function Logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success','Logged Out Successfully');
    }
}
