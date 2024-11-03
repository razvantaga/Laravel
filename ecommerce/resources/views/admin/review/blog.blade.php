@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Reviews Products Table</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Reviews Products List</h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">User IMG</th>
                            <th class="wd-15p">User ID</th>
                            <th class="wd-15p">User Name</th>
                            <th class="wd-15p">Post ID</th>
                            <th class="wd-15p">Post title</th>
                            <th class="wd-15p">Review</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $row)
                            <tr>
                                <td> <img src="{{ asset('frontend/images/user.png') }}" height="50px;" width="50px;" alt=""> </td>
                                <td>{{ $row->user_id }}</td>
                                <td>{{ $row->user_name }}</td>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->review }}</td>
                                <td>
                                    <a href="{{ URL::to('delete/review/' . $row->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection