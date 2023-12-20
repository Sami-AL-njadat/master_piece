@extends('Admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>View Product</h1>
                <div class="section-header-breadcrumb">
                    <!-- Add your breadcrumbs here if needed -->

                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Product Details</h4>
                                <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
                                <a href="{{ route('download', ['type' => 'pdf']) }}" class="btn btn-primary">Download as
                                    PDF</a>

                            </div>
                            <div class="card-body">
                                <div class="form-group col-md-8">
                                    <label for="name">Product Name</label>
                                    {{-- <h3 type="text" class="form-control" readonly> --}}
                                    <h3 class="form-control">{{ $product->productName }} </h3>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="Sdescription">Short Description</label>
                                    <strong style="height: fit-content" class="form-control">{{ $product->Sdescription }}</strong>
                                </div>

                                <div  class="form-group col-md-8">
                                    <label for="Ldescription">Long Description</label>

                                    <b  class="form-control" style="height: fit-content">{{ $product->Ldescription }}</b>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="price">Price</label>
                                    <h3 class="form-control"> {{ $product->price }}</h3>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="stockqty">Stock Quantity</label>
                                    <h3 class="form-control">{{ $product->stockqty }}</h3>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="status">Status</label>
                                    <h3 class="form-control">{{ $product->status }}</h3>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="categoryId">Category ID & Name</label>

                                    <h3 class="form-control">
                                        # {{ $product->category->id }} /{{ $product->category->categoryName }}
                                    </h3>
                                </div>

                                <div class="row">
                                    <div class="col-xl-3">
                                        <div class="mb-3 ml-1">
                                            <img id="showImage1" width="220px" height="200PX"
                                                src="{{ asset($product->image1) }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="mb-3 ml-1">
                                            <img id="showImage1" width="230px" height="200PX"
                                                src="{{ asset($product->image2) }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="mb-3 ml-1">
                                            <img id="showImage1" width="230px" height="200PX"
                                                src="{{ asset($product->image3) }}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
