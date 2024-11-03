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
      <h6 class="card-body-title">Add new product</h6>

      <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label"> Product name : <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_name" placeholder="Enter product name">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label"> Product code: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_code" placeholder="Enter product code">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label"> Quantity: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_quantity" placeholder="Enter product quantity">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label"> Discount price: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="discount_price" placeholder="Discound price">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label"> Category: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose country" name="category_id">
                  <option label="Choose category"></option>
                  @foreach ($category as $row)
                  <option value="{{ $row->id }}"> {{ $row->category_name }} </option>
                  @endforeach
                </select>
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label"> Subcategory: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose country" name="subcategory_id">

                </select>
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label"> Brand: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                  <option label="Choose brand"></option>
                  @foreach ($brand as $br)
                  <option value="{{ $br->id }}">{{ $br->brand_name }}</option>
                  @endforeach
                </select>
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label"> Product size: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput" placeholder="Enter product size">
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label"> Product color: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_color" id="color" data-role="tagsinput" placeholder="Enter product color">
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label"> Selling price: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="selling_price" placeholder="Enter product selling price">
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label"> Product details: <span class="tx-danger">*</span></label>
                <textarea class="form-control" name="product_details" id="summernote"></textarea>
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label"> Video link: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="video_link" placeholder="Enter product link">
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label"> Image one (Main Thumbel) : <span class="tx-danger">*</span></label> <br>
                <label class="custom-file">
                  <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL1(this)" required>
                  <span class="custom-file-control"></span>
                  <img src="#" alt="" id="one">
                </label>
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label"> Image two : <span class="tx-danger">*</span></label> <br>
                <label class="custom-file">
                  <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this)" required>
                  <span class="custom-file-control"></span>
                  <img src="#" alt="" id="two">
                </label>
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label"> Image three : <span class="tx-danger">*</span></label> <br>
                <label class="custom-file">
                  <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this)" required>
                  <span class="custom-file-control"></span>
                  <img src="#" alt="" id="three">
                </label>
              </div>
            </div><!-- col-4 -->

          </div><!-- row -->

          <hr>
          <br>

          <div class="row">
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="main_slider" value="1">
                <span>Main slider</span>
              </label>
            </div>

            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="hot_deal" value="1">
                <span>Hot deal</span>
              </label>
            </div>

            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="best_rated" value="1">
                <span>Best rated</span>
              </label>
            </div>

            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="mid_slider" value="1">
                <span>Mid slier</span>
              </label>
            </div>

            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="hot_new" value="1">
                <span>Hot new</span>
              </label>
            </div>

            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="trend" value="1">
                <span>Trend product</span>
              </label>
            </div>

            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="buyone_getone" value="1">
                <span>Buyone Getone</span>
              </label>
            </div>
          </div>
          <br>

          <div class="form-layout-footer">
            <button class="btn btn-info mg-r-5">Submit Form</button>
            <button class="btn btn-secondary">Cancel</button>
          </div><!-- form-layout-footer -->
        </div>
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