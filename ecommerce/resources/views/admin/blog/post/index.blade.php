@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Blog Post Table</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">BLOG POST LIST
                <a href="{{ route('add.blog.post') }}" class="btn btn-sm btn-warning" style="float:right;" >Add new post</a>
            </h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Post Title</th>
                            <th class="wd-15p">Post Category</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key=>$row)
                            <tr>
                                <td>{{ $row->post_title_en }}</td>
                                <td>{{ $row->category_name_en }}</td>
                                <td> <img src="{{ URL::to($row->post_image) }}" alt="" style="height:80px; width:80px;"> </td>
                                <td>
                                    <a href="{{ URL::to('edit/post/' . $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ URL::to('delete/post/' . $row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection