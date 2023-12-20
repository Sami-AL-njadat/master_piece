@extends('Admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Product</h1>
                <div class="section-header-breadcrumb">
                    <!-- Add your breadcrumbs here if needed -->
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Product</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group col-md-8">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter product name">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="Sdescription">Short Description</label>
                                        <textarea class="form-control" name="Sdescription" id="Sdescription" placeholder="Enter short description"></textarea>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="Ldescription">Long Description</label>
                                        <textarea class="form-control" name="Ldescription" id="Ldescription" placeholder="Enter long description"></textarea>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" class="form-control" id="price"
                                            placeholder="Enter price">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="stockqty">Stock Quantity</label>
                                        <input type="number" name="stockqty" class="form-control" id="stockqty"
                                            placeholder="Enter stock quantity">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="status">Status</label>
                                  
                                        <input type="text" name="status" class="form-control" id="status"
                                            placeholder="Enter status ">

                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="categoryId">Category ID</label>
                                        <select class="form-control" name="categoryId">
                                            <option value="">Choose a Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"> #{{ $category->id }}
                                                    {{ $category->categoryName }} </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    {{-- <div class="form-group">
                                         
                                        <select class="form-control"   name="categoryId">
                                            <option value="">Choose a Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"> {{ $category->categoryName }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}





                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="mb-3 ml-1">
                                                <img id="showImage1" width="100px"
                                                    src="{{ url('front_end/no-category-image.jpg') }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="mb-5">
                                                <label class="text-dark font-weight-medium" for="">Image 1</label>
                                                <input type="file" required class="form-control" name="image1"
                                                    id="image1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="mb-3 ml-1">
                                                <img id="showImage2" width="100px"
                                                    src="{{ url('front_end/no-category-image.jpg') }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="mb-5">
                                                <label class="text-dark font-weight-medium" for="">Image 2</label>
                                                <input type="file" required class="form-control" name="image2"
                                                    id="image2">
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="mb-3 ml-1">
                                                <img id="showImage3" width="100px"
                                                    src="{{ url('front_end/no-category-image.jpg') }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="mb-5">
                                                <label class="text-dark font-weight-medium" for="">Image 3</label>
                                                <input type="file" required class="form-control" name="image3"
                                                    id="image3">
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Add more form fields as needed for your product -->

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Attach change event to all file inputs
            $('[type="file"]').change(function(e) {
                var reader = new FileReader();
                var imgId = $(this).attr('id').replace('image', 'showImage');

                reader.onload = function(e) {
                    $('#' + imgId).attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
@endsection
