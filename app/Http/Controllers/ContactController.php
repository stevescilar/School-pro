<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use illuminate\Support\Carbon;  
class ContactController extends Controller
{
   public function AdminContact(){

    $contacts = Contact::all();
    return view('admin.contact.index', compact('contacts'));
   }

   public function AddContact(){
    return view ('admin.contact.create');
    
   }

   public function StoreContact(Request $request){
    Contact::insert([
        'address' => $request->address,
        'email' => $request->email,
        'phone' => $request->phone,
        'created_at' => Carbon::now()
    ]);
    return Redirect()->route('admin.contact')->with('success','New Contact Added Successfully');
   }

   public function Edit($id){
    $contacts = Contact::find($id);
    return view('admin.contact.edit',compact('contacts'));
   }

   public function Update(Request  $request, $id){
    $update = Contact::find($id)->update([
        'address' => $request->address,
        'email' => $request->email,
        'phone' => $request->phone,
        'created_at' => Carbon::now()

    ]);
    return Redirect()->route('admin.contact')->with('success','contact Updated Successfully');
    }

    public function Delete($id){
        Contact::find($id)->delete();
        return Redirect()->back()->with('success','Contact Deleted Successfully');


    }
    public function ContactMe(){

        return view('pages.contact');
    }
}
