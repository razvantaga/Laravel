@extends('admin.admin_layouts')


@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Web site setting</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Site setting</h6>

            <form action="{{ route('update.site.setting') }}" method="post" >
                @csrf
                <input type="hidden" name="id" value="{{ $setting->id }}">
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Phone one : <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="phone_one" value="{{ $setting->phone_one }}" required>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Phone two: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="phone_tow" value="{{ $setting->phone_tow }}" required>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Email: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="email" name="email" value="{{ $setting->email }}" required>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Company name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="company_name" value="{{ $setting->company_name }}" required>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Company address: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="company_address" value="{{ $setting->company_address }}" required>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Facebook: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="facebook" value="{{ $setting->facebook }}" required>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Youtube: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="youtube" value="{{ $setting->youtube }}" required>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Instagram: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="instagram" value="{{ $setting->instagram }}" required>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Twitter: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="twitter" value="{{ $setting->twitter }}" required>
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->
                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Update</button>
                    </div><!-- form-layout-footer -->
                </div>
            </form>

        </div>
    </div>

</div><!-- sl-mainpanel -->

@endsection