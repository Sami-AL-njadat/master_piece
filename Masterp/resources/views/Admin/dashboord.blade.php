@extends('Admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">

                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>user</h4>
                            </div>
                            <div class="card-body">
                                {{ $usersCount }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">

                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-info"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>category</h4>
                            </div>
                            <div class="card-body">
                                {{ $categoriesCount }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">

                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Admin</h4>
                            </div>
                            <div class="card-body">
                                {{ $adminsCount }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">

                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Order</h4>
                            </div>
                            <div class="card-body">
                                {{ $ordersCount }}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">

                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-dollar-sign"></i>

                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>income</h4>
                            </div>
                            <div class="card-body">
                                $ {{ $incomeCount }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">

                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Products</h4>
                            </div>
                            <div class="card-body">
                                {{ $productsCount }}
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
