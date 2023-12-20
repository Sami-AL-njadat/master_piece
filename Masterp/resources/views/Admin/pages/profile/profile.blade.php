@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <h2>HELLO : {{ $admin->name }} </h2>


                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-25">
                        <div class="card profile-widget">

                         
                            <form method="POST" action="{{ route('admin.profile.update', $admin->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body mt-3">
                                    <div class="d-flex align-items-start align-items-sm-center gap-10">
                                        @if ($admin->image)
                                            <img id="showImages" alt="image" src="{{ asset($admin->image) }}"
                                                class="rounded-circle profile-widget-picture">
                                        @else
                                            <img src="{{ url('front_end/no-category-image.jpg') }}">
                                        @endif

                                        <div class="button-wrapper" style="margin-left: 20px">
                                            <label for="upload" class="btn btn-dark me-2 mb-3" tabindex="0">
                                                <span class="d-none d-sm-block">Upload new photo</span>
                                                <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                                                <input type="file" name="image" id="upload" class="account-file-input"
                                                    hidden accept="image/*">
                                            </label>

                                            <button type="submit" class="btn account-image-reset mb-3">
                                                <i class="mdi mdi-reload d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block"><a
                                                        href="{{ route('admin.profile.reset') }}"
                                                        class="btn btn-outline-danger">Reset Password</a></span>
                                            </button>

                                            <div class="text-muted small">Allowed JPG, GIF, or PNG. Max size of 800K</div>
                                        </div>
              
                                    </div>
                                </div>
                                {{-- </form> --}}



                                <div class="col-12 col-md-12 col-lg-10">
                                    <div class="card">
                                        {{-- <form method="POST" action="{{ route('admin.profile.update', $admin->id) }}">
                                            @csrf --}}
                                        <div class="card-header">
                                            <h4>Edit Profile</h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="form-group col-md-7 col-12">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        value="{{ $admin->name }}" required="">
                                                    <div class="invalid-feedback">
                                                        Please fill in the name
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="form-group col-md-7 col-12">
                                                    <label for="email">Email </label>
                                                    <b>YOUR Email Will <span style="color: red">Not Change</span> </b>

                                                    <input type="email" name="email" id="email" class="form-control"
                                                        value="{{ $admin->email }}" required="">
                                                    <div class="invalid-feedback">
                                                        Please fill in the email
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-7 col-12">
                                                    <label for="phone">Phone</label>
                                                    <input type="tel" name="phone" id="phone" class="form-control"
                                                        value="{{ $admin->phone }}" required="">
                                                    <div class="invalid-feedback">
                                                        Please fill in the phone
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </section>
    </div>
  @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#upload').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImages').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
    @endpush
@endsection
