@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">


        <div class="col-md-8">
            <div class="card">
                             <!-- hci-->
                     @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                <div class="card-header">
                    Edit The About Section
                </div>
                <div class="card-body">
                <form action="{{ url('about/update/'.$abouts->id) }}" method="POST" >
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Update Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $abouts->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message  }}</span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Update Short Description</label>
                        <input type="text" name="short_des" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $abouts->short_des }}">
                            @error('short_des')
                                <span class="text-danger">{{ $message  }}</span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Update Long Description</label>
                        <input type="text" name="long_des" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $abouts->long_des }}">
                            @error('long_des')
                                <span class="text-danger">{{ $message  }}</span>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Section</button>
                </form>
                </div>

            </div>
        </div>

            </div>
        </div>
    </div>
@endsection
