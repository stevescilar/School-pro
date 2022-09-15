@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">


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
                    Edit Services
                </div>
                <div class="card-body">
                <form action="{{ url('service/update/'.$services->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $services->image }}">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Update Service Name</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $services->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message  }}</span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Update Service Description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $services->description }}">
                            @error('description')
                                <span class="text-danger">{{ $message  }}</span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Update Service Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $services->image }}">
                            @error('image')
                                <span class="text-danger">{{ $message  }}</span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <img src="{{ asset($services->image) }}" style="width:400px; height:400px;">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Service</button>
                </form>
                </div>

            </div>
        </div>

            </div>
        </div>
    </div>
@endsection
