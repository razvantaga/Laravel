@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Brand Update</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Brand Update</h6>

            <div class="table-wrapper">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ url('update/brand/'.$brand->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Brand name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brand->brand_name }}" name="brand_name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Brand logo</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brand->brand_logo }}" name="brand_logo">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Old brand logo</label>
                            <img src="{{ URL::to($brand->brand_logo) }}" height="70px;" width="80px;" alt="">
                            <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection