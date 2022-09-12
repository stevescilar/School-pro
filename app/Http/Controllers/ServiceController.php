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
}
