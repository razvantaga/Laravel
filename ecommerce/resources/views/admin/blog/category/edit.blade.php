@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Blog Category Update</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Blog Category Update</h6>
            <br>

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
                    <form method="post" action="{{ url('update/blog/category/'.$blogCategory->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category Name English</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $blogCategory->category_name_en }}" name="category_name_en">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category Name Hindi</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $blogCategory->category_name_in }}" name="category_name_in">
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