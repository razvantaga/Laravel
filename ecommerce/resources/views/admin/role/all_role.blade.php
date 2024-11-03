@extends('admin.admin_layouts')
@section('admin_content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Admin table</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Admin LIST
                <a href="{{ route('create.admin') }}" class="btn btn-sm btn-warning" style="float:right;" >Add new admin</a>
            </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Phone</th>
                            <th class="wd-20p">Access</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>
                                    @if ($row->category == 1)
                                        <span class="badge btn-info">Category</span>
                                    @else
                                    @endif

                                    @if ($row->coupon == 1)
                                        <span class="badge btn-info">Coupon</span>
                                    @else
                                    @endif

                                    @if ($row->product == 1)
                                        <span class="badge btn-info">Product</span>
                                    @else
                                    @endif

                                    @if ($row->blog == 1)
                                        <span class="badge btn-info">Blog</span>
                                    @else
                                    @endif

                                    @if ($row->order == 1)
                                        <span class="badge btn-info">Order</span>
                                    @else
                                    @endif

                                    @if ($row->other == 1)
                                        <span class="badge btn-info">Other</span>
                                    @else
                                    @endif

                                    @if ($row->report == 1)
                                        <span class="badge btn-info">Report</span>
                                    @else
                                    @endif

                                    @if ($row->role == 1)
                                        <span class="badge btn-info">Role</span>
                                    @else
                                    @endif

                                    @if ($row->return == 1)
                                        <span class="badge btn-info">Return</span>
                                    @else
                                    @endif

                                    @if ($row->contact == 1)
                                        <span class="badge btn-info">Contact</span>
                                    @else
                                    @endif

                                    @if ($row->comment == 1)
                                        <span class="badge btn-info">Comment</span>
                                    @else
                                    @endif

                                    @if ($row->setting == 1)
                                        <span class="badge btn-info">Settings</span>
                                    @else
                                    @endif

                                    @if ($row->stock == 1)
                                        <span class="badge btn-info">Stock</span>
                                    @else
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ URL::to('edit/admin/' . $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ URL::to('delete/admin/' . $row->id) }}" class="btn btn-sm btn-danger" >Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection