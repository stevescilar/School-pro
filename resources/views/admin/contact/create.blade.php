@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Contact Section</h2>
        </div>
        <div class="card-body">
                <form action="{{ route('store.contact') }}" method="POST">
                    @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Company Address">
                    
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Email</label>
                    <textarea class="form-control" rows="3" name="email" placeholder="Enter company email"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Phone Number</label>
                    <textarea class="form-control" rows="3" name="phone" placeholder="Enter company phone number"></textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>

    

    
</div>


@endsection