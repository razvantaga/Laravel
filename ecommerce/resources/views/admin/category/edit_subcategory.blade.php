@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Subcategory Update</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Subcategory Update</h6>

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
                    <form method="post" action="{{ url('update/subcategory/'.$subcategory->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Subcategory name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $subcategory->subcategory_name }}" name="subcategory_name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category name</label>
                            <select class="form-control" name="category_id">
                                @foreach($category as $row)
                                    <option value="{{ $row->id }}" <?php if($row->id == $subcategory->category_id) {echo "selected";} ?> >{{ $row->category_name }}</option>
                                @endforeach
                            </select>
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