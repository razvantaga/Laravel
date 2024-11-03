@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Order details</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Order List </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Phone</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Message</th>
                            <th class="wd-15p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->phone }}</td>
                                <td> {{ $row->email }}</td>
                                <td> {{ $row->message }}</td>
                                <td> <a href="" class="btn btn-sm btn-info">View</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection