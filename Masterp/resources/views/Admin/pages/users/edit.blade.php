@extends('Admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>user</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">users</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create user</h4>
                            </div>
                            <div class="card-body p-0">
                                <form action="{{ route('users.update', $users->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-xl-3">
                                                    <div class="mb-3 ml-3">


                                                        @if ($users->image)
                                                            <img id="showImage" src="{{ asset($users->image) }}"
                                                                alt="Current Image" style="max-width: 100px; ">
                                                        @else
                                                            <img src="{{ url('front_end/no-category-image.jpg') }}">
                                                        @endif
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

                                                <div class="form-group col-md-12">
                                                    <div class="form-group col-md-8">
                                                        <label for="name">Name</label>
                                                        <input value="{{ $users->name }}" type="name" name="name"
                                                            class="form-control" id="inputEmail4" placeholder="Enter name">
                                                    </div>

                                                    <div class="form-group col-md-8">
                                                        <label for="location">email</label>
                                                        <b>YOUR Email Will <span style="color: red">Not Change</span>
                                                        </b>

                                                        <input value="{{ $users->email }}" type="email" name="email"
                                                            class="form-control" id="location" placeholder="Enter email">
                                                    </div>



                                                    <div class="form-group col-md-8">
                                                        <label for="phone">Phone</label>
                                                        <input type="tel" name="phone" class="form-control"
                                                            id="phone" value="{{ $users->phone }}">
                                                    </div>

                                                </div>







                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>

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
