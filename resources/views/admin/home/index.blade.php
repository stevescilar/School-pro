@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
            <div class="col-md-12 bg-light text-right">
                <a href=""><button type="button" class="btn btn-warning">About Us</button></a>
            </div> <br/> <br/> <br/>
                <div class="col-md-12">
                    <div class="card">
                    <!-- hci-->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                        <div class="card-header">
                            About us
                        </div> 
                 
            <table class="table">
            <thead>
                <tr>
                <th scope="col"  width="5%">SL No</th>
                <th scope="col"  width="15%"> About Title</th>
                <th scope="col"  width="25%">Brief Description</th>
                <th scope="col"  width="15%">Long Description</th>
                <th scope="col"  width="15%">Action</th>

                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($homeabout as $about)
                <tr>

                <th scope="row">{{ $i++ }}</th>
                
                <td>{{ $about->title}}</td>
                <td>{{ $about->short_des}}</td>
                <td>{{ $about->long_des}}</td>
                
                <td>
                    <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{  url('about/delete/'.$about->id )}}" onclick="return confirm('Do you really want to delete this brand?')" class="btn btn-danger">Delete</a>

                </td>

                </tr>
                @endforeach
            </tbody>
            
        </table>

        
    </div>
</div>



            </div>
        </div>




    </div>

@endsection