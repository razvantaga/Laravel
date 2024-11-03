@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Product section</span>
        </nav>

        <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Product details page</h6>

                <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"> Product name : <span class="tx-danger"></span></label>
                            <strong> {{ $product->product_name }} </strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"> Product code: <span class="tx-danger"></span></label>
                            <strong> {{ $product->product_code }} </strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"> Quantity: <span class="tx-danger"></span></label>
                            <strong> {{ $product->product_quantity }} </strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"> Category: <span class="tx-danger"></span></label>
                            <strong> {{ $product->category_name }} </strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"> Subcategory: <span class="tx-danger"></span></label>
                            <strong> {{ $product->subcategory_name }} </strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"> Brand: <span class="tx-danger"></span></label>
                            <strong> {{ $product->brand_name }} </strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"> Product size: <span class="tx-danger"></span></label>
                            <strong> {{ $product->product_size }} </strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"> Product color: <span class="tx-danger"></span></label>
                            <strong> {{ $product->product_color }} </strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"> Selling price: <span class="tx-danger"></span></label>
                            <strong> {{ $product->selling_price }} </strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label"> Product details: <span class="tx-danger"></span></label> <br>
                            <strong> {!! $product->product_details !!} </strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label"> Video link: <span class="tx-danger"></span></label> <br>
                            <strong> {{ $product->video_link }} </strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"> Image one (Main Thumbel) : <span class="tx-danger"></span></label> <br>
                            <label class="custom-file">
                            <img src="{{ URL::to($product->image_one) }}" style="height:80px; width:80px;" alt="">
                            </label>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"> Image two : <span class="tx-danger"></span></label> <br>
                            <label class="custom-file">
                            <img src="{{ URL::to($product->image_two) }}" style="height:80px; width:80px;" alt="">
                            </label>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label"> Image three : <span class="tx-danger"></span></label> <br>
                            <label class="custom-file">
                            <img src="{{ URL::to($product->image_three) }}" style="height:80px; width:80px;" alt="">
                            </label>
                        </div>
                    </div><!-- col-4 -->

                </div><!-- row -->

                <hr>
                <br>

                <div class="row">
                    <div class="col-lg-4">
                        <span>Main slider</span>
                        @if($product->main_slider == 1)
                            <span class="badge badge-success"> Active </span>
                        @else
                            <span class="badge badge-danger"> Inactive </span>
                        @endif
                    </div>

                    <div class="col-lg-4">
                        <span>Hot deal</span>
                        @if($product->hot_deal == 1)
                            <span class="badge badge-success"> Active </span>
                        @else
                            <span class="badge badge-danger"> Inactive </span>
                        @endif
                    </div>

                    <div class="col-lg-4">
                        <span>Best rated</span>
                        @if($product->best_rated == 1)
                            <span class="badge badge-success"> Active </span>
                        @else
                            <span class="badge badge-danger"> Inactive </span>
                        @endif
                    </div>

                    <div class="col-lg-4">
                        <span>Mid slier</span>
                        @if($product->mid_slider == 1)
                            <span class="badge badge-success"> Active </span>
                        @else
                            <span class="badge badge-danger"> Inactive </span>
                        @endif
                    </div>

                    <div class="col-lg-4">
                        <span>Hot new</span>
                        @if($product->hot_new == 1)
                            <span class="badge badge-success"> Active </span>
                        @else
                            <span class="badge badge-danger"> Inactive </span>
                        @endif
                    </div>
                </div> 
                <br>

                </div>

            </div>
        </div>
    </div><!-- sl-mainpanel -->

@endsection
