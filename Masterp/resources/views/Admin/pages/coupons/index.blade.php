@extends('Admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Table</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="route{{ "admin.dashboard" }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Table</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>product</h4>
                                <div class="card-header-action">
                                    <a 
                                    href="{{ route('coupons.create') }}"
                                     class="btn btn-primary">+ Create</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                {{ $dataTable->table() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

 @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush  