@extends('Admin.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>View Event</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Event Details</h4>
                                                                <a href="{{ route('eventes.index') }}" class="btn btn-primary">Back</a>

                            </div>
                            <div class="card-body">
                                <div class="form-group col-md-8">
                                    <label for="EventTypeId">Event Type ID</label>
                                    <h3 class="form-control">
                                        {{ $event->EventTypeId }}
                                    </h3>
                                </div>



                                <div class="form-group col-md-8">
                                    <label for="name">Name</label>
                                    <h3 class="form-control">
                                        {{ $event->name }}
                                    </h3>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="title">Title</label>
                                    <h3 class="form-control">
                                        {{ $event->title }}
                                    </h3>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="clientRequest">Client Request</label>

                                    <h3 class="form-control">
                                        {{ $event->clientRequest }}
                                    </h3>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="aboutProject">About Project</label>
                                    <h3 class="form-control">
                                        {{ $event->aboutProject }}
                                    </h3>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="idea">Idea</label>
                                    <h3 class="form-control">
                                        {{ $event->idea }}
                                    </h3>

                                </div>

                                <div class="form-group col-md-8">
                                    <label for="beginning">Beginning Date</label>
                                    <h3 class="form-control">
                                        {{ $event->beginning }}
                                    </h3>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="ending">Ending Date</label>
                                    <h3 class="form-control">
                                        {{ $event->ending }}
                                    </h3>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="clientName">Client Name</label>
                                    <h3 class="form-control">
                                        {{ $event->clientName }}
                                    </h3>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="contractValue">Contract Value</label>
                                    <h3 class="form-control">
                                        {{ $event->contractValue }}
                                    </h3>
                                </div>

                                <div class="row">
                                    <div class="col-xl-3">
                                        <div class="mb-3 ml-1">
                                            <img id="showImage1" width="230px" height="200PX" src="{{ asset($event->image1) }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="mb-3 ml-1">
                                            <img id="showImage1"width="230px" height="200PX"" src="{{ asset($event->image2) }}">
                                        </div>
                                    </div>

                                    <div class="col-xl-3">
                                        <div class="mb-3 ml-1">
                                            <img id="showImage1" width="230px" height="200PX" src="{{ asset($event->image3) }}">
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
