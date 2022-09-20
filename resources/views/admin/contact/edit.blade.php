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
                    Edit Contacts Section
                </div>
                <div class="card-body">
                <form action="" method="POST" >
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Update Address</label>
                        <textarea type="text" name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">
                            {{ $contacts->address }}
                        </textarea>
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Update Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $contacts->email }}">

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1">Update phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $contacts->phone }}">

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
