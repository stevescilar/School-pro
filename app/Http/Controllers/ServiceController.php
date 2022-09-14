<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use illuminate\Support\Carbon;
use Image;

class ServiceController extends Controller
{
    public function HomeService(){
        $services = Service::latest()->paginate(5);
        return view('admin.service.index',compact('services'));
    }


    public function AddService(Request $request){
        $validateData = $request->validate([
            'title' => 'required|unique:services|min:4',
            'description' => 'required|unique:services|min:4',
            'image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'title.required' => 'Please Input Brand Name!', 
            'title.min' => 'Brand Name should be longer Than 4 characters',
        ]); 

        $service_image  = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$service_image->getClientOriginalExtension();
        Image::make($service_image)->resize(250,320)->save('image/service/'.$name_gen);

        $last_img = 'image/service/'.$name_gen;

        Service::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Service Added Successfully');
    }
}
