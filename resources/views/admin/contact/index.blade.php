@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
            <div class="col-md-12 bg-light text-right">
                <a href="{{ route('add.contact') }}"><button type="button" class="btn btn-warning">Add Contact </button></a>
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
                            About Contact Data
                        </div> 
                 
            <table class="table">
            <thead>
                <tr>
                <th scope="col"  width="5%">SL No</th>
                <th scope="col"  width="15%">Address</th>
                <th scope="col"  width="25%">Email</th>
                <th scope="col"  width="15%">Phone Number</th>
                <th scope="col"  width="15%">Action</th>

                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($contacts as $con)
                <tr>

                <th scope="row">{{ $i++ }}</th>
                
                <td>{{ $con->address }}</td>
                <td>{{ $con->email }}</td>
                <td>{{ $con->phone}}</td>
                
                <td>
                    <a href="{{ url('contact/edit/'.$con->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{  url('contact/delete/'.$con->id )}}" onclick="return confirm('Do you really want to delete this contact?')" class="btn btn-danger">Delete</a>

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