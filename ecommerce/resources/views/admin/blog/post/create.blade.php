@extends('admin.admin_layouts')


@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Blog post section</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Add new post</h6>

            <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Post title (ENGLISH): <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="post_title_en" placeholder="Enter post title in english">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Post title (HINDI): <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="post_title_in" placeholder="Enter post title in hindi ">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label"> Blog Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose country" name="category_id">
                                    <option label="Choose category"></option>
                                    @foreach ($blogCategory as $row)
                                        <option value="{{ $row->id }}"> {{ $row->category_name_en }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label"> Product details (ENGLISH): <span class="tx-danger">*</span></label>
                                <textarea class="form-control" name="details_en" id="summernote"></textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label"> Product details (HINDI): <span class="tx-danger">*</span></label>
                                <textarea class="form-control" name="details_in" id="summernote1"></textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Post Image : <span class="tx-danger">*</span></label> <br>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL1(this)" required>
                                    <span class="custom-file-control"></span>
                                    <img src="#" alt="" id="one">
                                </label>
                            </div>
                        </div><!-- col-4 -->

                    </div><!-- row -->

                    <br>

                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
                    </div><!-- form-layout-footer -->
                </div>
            </form>

        </div>
    </div>

</div><!-- sl-mainpanel -->


<script type="text/javascript">
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection