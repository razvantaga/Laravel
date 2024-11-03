@extends('admin.admin_layouts')

@section('admin_content')

@php
$category = DB::table('categories')->get();
$subcategory = DB::table('subcategories')->get();
$brand = DB::table('brands')->get();
@endphp

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Product section</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update product</h6>

            <form action="{{ url('update/product/withoutphoto/' . $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label"> Product name : <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name" value="{{$product->product_name}}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label"> Product code: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_code" value="{{$product->product_code}}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label"> Quantity: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_quantity" value="{{$product->product_quantity}}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label"> Discount price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="discount_price" value="{{$product->discount_price}}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label"> Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose country" name="category_id">
                                    <option label="Choose category"></option>
                                    @foreach ($category as $row)
                                    <option value="{{ $row->id }}" <?php if ($row->id == $product->category_id) {
                                                                        echo "selected";
                                                                    } ?>> {{ $row->category_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label"> Subcategory: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="subcategory_id">
                                    @foreach ($subcategory as $row)
                                    <option value="{{ $row->id }}" <?php if ($row->id == $product->subcategory_id) {
                                                                        echo "selected";
                                                                    } ?>> {{ $row->subcategory_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label"> Brand: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                                    <option label="Choose brand"></option>
                                    @foreach ($brand as $br)
                                    <option value="{{ $br->id }}" <?php if ($br->id == $product->brand_id) {
                                                                        echo "selected";
                                                                    } ?>> {{ $br->brand_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Product size: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput" value="{{ $product->product_size }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Product color: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_color" id="color" data-role="tagsinput" value="{{ $product->product_color }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"> Selling price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="selling_price" value="{{ $product->selling_price }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label"> Product details: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" name="product_details" id="summernote"> {{ $product->product_details }} </textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label"> Video link: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="video_link" value="{{ $product->video_link }}">
                            </div>
                        </div><!-- col-4 -->

                    </div><!-- row -->

                    <hr>
                    <br>

                    <div class="row">
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="main_slider" value="1" <?php if ($product->main_slider == 1) {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <span>Main slider</span>
                            </label>
                        </div>

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_deal" value="1" <?php if ($product->hot_deal == 1) {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <span>Hot deal</span>
                            </label>
                        </div>

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="best_rated" value="1" <?php if ($product->best_rated == 1) {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <span>Best rated</span>
                            </label>
                        </div>

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="mid_slider" value="1" <?php if ($product->mid_slider == 1) {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <span>Mid slier</span>
                            </label>
                        </div>

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_new" value="1" <?php if ($product->hot_new == 1) {
                                                                                    echo "checked";
                                                                                } ?>>
                                <span>Hot new</span>
                            </label>
                        </div>

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="trend" value="1" <?php if ($product->trend == 1) {
                                                                                    echo "checked";
                                                                                } ?>>
                                <span>Trend product</span>
                            </label>
                        </div>

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="buyone_getone" value="1" <?php if ($product->buyone_getone == 1) {
                                                                                    echo "checked";
                                                                                } ?>>
                                <span>Buyone Getone</span>
                            </label>
                        </div>
                    </div>
                    <br>

                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Update</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->
                </div>
            </form>

        </div>
    </div>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update images</h6>
            <form action="{{ url('update/product/photo/' . $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <label class="form-control-label"> Image one (Main Thumbel) : <span class="tx-danger">*</span></label> <br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL1(this)" >
                            <span class="custom-file-control"></span>
                            <input type="hidden" name="old_one" value="{{ $product->image_one }}">
                            <img src="#" alt="" id="one">
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-6 col-sm-6">
                        <img src="{{ URL::to($product->image_one ) }}" alt="" style="width:80px; height:80px; ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <label class="form-control-label"> Image two : <span class="tx-danger">*</span></label> <br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this)" >
                            <span class="custom-file-control"></span>
                            <input type="hidden" name="old_two" value="{{ $product->image_two }}">
                            <img src="#" alt="" id="two">
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-6 col-sm-6">
                        <img src="{{ URL::to($product->image_two ) }}" alt="" style="width:80px; height:80px; ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <label class="form-control-label"> Image three : <span class="tx-danger">*</span></label> <br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this)" >
                            <span class="custom-file-control"></span>
                            <input type="hidden" name="old_three" value="{{ $product->image_three }}">
                            <img src="#" alt="" id="three">
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-6 col-sm-6">
                        <img src="{{ URL::to($product->image_three ) }}" alt="" style="width:80px; height:80px; ">
                    </div>
                </div>

                <button type="submit" class="btn btn-sm btn-warning"> Update photo </button>
            </form>
        </div>

    </div>

</div><!-- sl-mainpanel -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {

                $.ajax({
                    url: "{{ url('/get/subcategory/') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {

                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name + '</option>');

                        });
                    },
                });

            } else {
                alert('danger');
            }

        });
    });
</script>

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

<script type="text/javascript">
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#two')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script type="text/javascript">
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#three')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection