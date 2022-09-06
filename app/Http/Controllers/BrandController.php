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
}
