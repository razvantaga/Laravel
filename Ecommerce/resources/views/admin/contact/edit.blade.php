@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('update/contact/' . $contacts->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email" name="email" value="{{ $contacts->email }}">
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Phone" name="phone" value="{{ $contacts->phone }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Adress</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{ $contacts->address }}</textarea>
                </div>
                
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection