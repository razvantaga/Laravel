@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card-group">
                            @foreach ($images as $multi)
                                <div class="col-md-4 mt-5">
                                    <div class="card">
                                        <img src="{{ asset($multi->image) }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Multi Image</div>
                            <div class="card-body">
                                <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-2">Multi Image</label>
                                        <input type="file" name="image[]" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">

                                        @error('brand_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-0">Add Image</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection