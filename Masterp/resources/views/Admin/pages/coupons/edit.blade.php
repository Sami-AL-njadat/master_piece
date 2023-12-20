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
                    <div class="breadcrumb-item">coupons</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create coupons</h4>
                            </div>
                            <div class="card-body p-0">
                                <form action="{{ route('coupons.update',$coupons->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="number">discount</label>
                                                    <input type="text" name="discount" class="form-control"
                                                          value=" {{ $coupons->discount }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="name">Coupon-Name</label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        placeholder="{{ $coupons->couponName }}"  value="{{ $coupons->couponName }}">
                                                </div>



                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label for="beginning">Beginning</label>
                                                        <input type="datetime-local" name="beginning" class="form-control"value="{{ $coupons->beginning }}"
                                                               id="inputAddress"  placeholder="{{ $coupons->beginning }}" >
                                                    </div>
                                                </div>

                                                    
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label for="ending">Ending</label>
                                                        <input type="datetime-local" name="ending" class="form-control"
                                                            id="inputAddress"   value="{{ $coupons->ending }}" placeholder="{{ $coupons->ending }}">
                                                    </div>
                                                </div>
 

                                            </div>









                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>

                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
