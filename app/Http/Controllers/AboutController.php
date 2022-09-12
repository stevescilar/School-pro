<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function HomeAbout (){
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index',compact('homeabout'));
    }

    public function AddAbout(){
        return view('admin.home.create');
    }


    public function StoreAbout(Request $request){
        


        HomeAbout::insert([
            'title' => $request->title,
            'short_des' =>$request->short_des,
            'long_des' =>$request->long_des,
            'created_at' => Carbon::now()
        ]);


        return Redirect()->route('home.about')->with('success','About Section  Added Successfully');
     }

    public function Edit($id){
        $abouts = HomeAbout::find($id);
        return view('admin.home.edit',compact('abouts'));
    }

    public function Update(Request  $request, $id){
        $update = HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
            'created_at' => Carbon::now()

        ]);
        return Redirect()->route('home.about')->with('success','About Section Updated Successfully');
    }
}
