@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                    <!-- hci-->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                        <div class="card-header">
                            Services
                        </div> 
                 
            <table class="table">
            <thead>
                <tr>
                <th scope="col" width="5%">SL No</th>
                <th scope="col" width="10%"> Name</th>
                <th scope="col" width="10%">Description</th>
                <th scope="col" width="10%">Service Image</th>
                <th scope="col" width="10%">Created At</th>
                <th scope="col" width="15%">Action</th>

                </tr>
            </thead>
            <tbody>
                <!-- @php($i = 1) -->
               @foreach($services as $service )
                <tr>

                <th scope="row">{{ $services->firstItem()+$loop->index }}</th>
                
                <td>{{ $service->title}}</td>
                <td>{{ $service->description}}</td>

                <td><img src="{{ asset($service->image) }}" style="height:70px; width:70px;"></td>
                
                <td>
                    @if($service->created_at == NULL)
                    <span class="text-danger"> No Data Available </span>
                    @else
                        {{ $service->created_at->diffForHumans()}}
                    @endif
                </td>
                <td>
                    <a href="{{ url('service/edit/'.$service->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{  url('service/delete/'.$service->id )}}" onclick="return confirm('Do you really want to delete this brand?')" class="btn btn-danger">Delete</a>

                </td>

                </tr>
                @endforeach
            </tbody>
            
        </table>

        {{ $services->links() }}
    </div>
</div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Add New Service
                </div>
                <div class="card-body">
                <form action="{{ route('add.service')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Service Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('title')
                                <span class="text-danger">{{ $message  }}</span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Service Description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('description')
                                <span class="text-danger">{{ $message  }}</span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Service Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('image')
                                <span class="text-danger">{{ $message  }}</span>
                            @enderror
                    </div>

                    <button type="submit" class="btn btn-primary"> Add Service </button>
                </form>
                </div>

            </div>
        </div>

            </div>
        </div>




    </div>

@endsection