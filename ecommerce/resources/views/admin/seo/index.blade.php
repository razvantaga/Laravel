@extends('admin.admin_layouts')


@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">SEO setting</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">SEO setting</h6>

            <form action="{{ route('update.seo') }}" method="post" >
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Meta title: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_title" value="{{$seo->meta_title}}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Meta author <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_author" value="{{$seo->meta_author}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Meta tag <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_tag" value="{{$seo->meta_tag}}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label"> Meta description <span class="tx-danger">*</span></label>
                                <textarea class="form-control" type="text" name="meta_description">{{$seo->meta_description}}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label"> Google analytics <span class="tx-danger">*</span></label>
                                <textarea class="form-control" type="text" name="google_analytics">{{$seo->google_analytics}}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label"> Bing analytics <span class="tx-danger">*</span></label>
                                <textarea class="form-control" type="text" name="bing_analytics">{{$seo->bing_analytics}}</textarea>
                                <input type="hidden" name="id" value="{{ $seo->id }}">
                            </div>
                        </div>
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