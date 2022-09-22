@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <!-- <h4>Admin Message</h4> -->
            <div class="col-md-12 bg-light text-right">
                <a href="{{ route('add.message') }}"><button type="button" class="btn btn-warning">Admin Message </button></a>
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
                             Message Data
                        </div> 
                 
            <table class="table">
            <thead>
                <tr>
                <th scope="col"  width="5%">SL No</th>
                <th scope="col"  width="15%">Name</th>
                <th scope="col"  width="25%">Email</th>
                <th scope="col"  width="15%">Subject</th>
                <th scope="col"  width="15%">Message</th>

                <th scope="col"  width="15%">Action</th>

                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($messages as $message)
                <tr>

                <th scope="row">{{ $i++ }}</th>
                
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->subject }}</td>
                <td>{{ $message->message }}</td>

                
                <td>
                    
                    <a href="{{  url('message/delete/'.$message->id )}}" onclick="return confirm('Do you really want to delete this message?')" class="btn btn-danger">Delete</a>

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