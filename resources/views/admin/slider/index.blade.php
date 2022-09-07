@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
            <div class="col-md-12 bg-light text-right">
                <a href="{{ route('add.slider') }}"><button type="button" class="btn btn-warning">Add Slider</button></a>
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
                            Sliders
                        </div> 
                 
            <table class="table">
            <thead>
                <tr>
                <th scope="col"  width="5%">SL No</th>
                <th scope="col"  width="15%">Slider Title</th>
                <th scope="col"  width="25%">Description</th>
                <th scope="col"  width="15%">Slider Image</th>
                <th scope="col"  width="15%">Action</th>

                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($sliders as $slider)
                <tr>

                <th scope="row">{{ $i++ }}</th>
                
                <td>{{ $slider->title}}</td>
                <td>{{ $slider->description}}</td>
                <td><img src="{{ asset($slider->image) }}" style="height:150px; width:200px;"></td>
                <td>
                    <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{  url('slider/delete/'.$slider->id )}}" onclick="return confirm('Do you really want to delete this brand?')" class="btn btn-danger">Delete</a>

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