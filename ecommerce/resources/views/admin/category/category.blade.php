@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Category Table</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">CATEGORY LIST
                <a href="" class="btn btn-sm btn-warning" style="float:right;" data-toggle="modal" data-target="#modaldemo3">Add new category</a>
            </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Category name</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $key=>$row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->category_name }}</td>
                                <td>
                                    <a href="{{ URL::to('edit/category/' . $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ URL::to('delete/category/' . $row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form method="post" action="{{ route('store.category') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category" name="category_name">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection