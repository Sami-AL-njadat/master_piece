@extends('Admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Table</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Category</h4>
                            </div>
                            <div class="card-body p-0">
                                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-xl-3">
                                                    <div class="mb-3">
                                                        <img id="showImage" width="100px"
                                                            src="{{ url('image.jpg') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="mb-5">
                                                        <label class="text-dark font-weight-medium"
                                                            for="">Image</label>
                                                        <input type="file" class="form-control" name="image"
                                                            id="image">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="name">Name</label>
                                                    <input type="name" name="name" class="form-control"
                                                        id="inputEmail4" placeholder="Name">
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="description">Description</label>
                                                    <textarea type="text" class="form-control" id="textAreaExample3" name="description" id="description"
                                                        placeholder="Enter a description"></textarea>
                                                </div>
                                                {{-- </div>class="summernote-simple" --}}



                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
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
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
@endsection
