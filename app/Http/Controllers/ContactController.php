<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;

use App\Models\Service;
use illuminate\Support\Carbon;  
use Illuminate\Support\Facades\DB;
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
        $contacts =DB::table('contacts')->first();
        $services = Service::all();
        return view('pages.contact',compact('contacts','services'));
    }

    public function ContactForm(Request $request){
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('contact')->with('success','Message Sent Successfully');
    }

    public function AdminMessage(){
        // get data from contact form
        $messages = ContactForm::all();

        return view ('admin.contact.message', compact('messages'));
    }
}
