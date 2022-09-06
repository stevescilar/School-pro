<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
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

        $name_gen = hexdec(uniqid());
     }
}
