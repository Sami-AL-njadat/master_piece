@extends('Admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Event</h1>
                <div class="section-header-breadcrumb">
                    <!-- Add your breadcrumbs here if needed -->
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Event</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('eventes.update', $event->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group col-md-8">
                                        <label for="EventTypeId">Event Type ID</label>
                                        <select class="form-control" name="EventTypeId">
                                            <option value=""> Choose an Event Type ID</option>
                                            @foreach ($eventTypes as $eventType)
                                                <option {{ $eventType->id == $event->EventTypeId ? 'selected' : '' }}
                                                    value="{{ $eventType->id }}"> #{{ $eventType->id }}
                                                    {{ $eventType->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter name" value="{{ $event->name }}" required>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Enter title" value="{{ $event->title }}">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="clientRequest">Client Request</label>
                                        <textarea class="form-control" name="clientRequest" id="clientRequest" placeholder="Enter client request">{{ $event->clientRequest }}</textarea>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="aboutProject">About Project</label>
                                        <textarea class="form-control" name="aboutProject" id="aboutProject" placeholder="Enter about Project">{{ $event->aboutProject }}</textarea>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="idea">Idea</label>
                                        <textarea class="form-control" name="idea" id="idea" placeholder="Enter idea">{{ $event->idea }}</textarea>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="beginning">Beginning Date</label>
                                        <input type="date" name="beginning" class="form-control" id="beginning"
                                            value="{{ $event->beginning }}" required>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="ending">Ending Date</label>
                                        <input type="date" name="ending" class="form-control" id="ending"
                                            value="{{ $event->ending }}" required>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="clientName">Client Name</label>
                                        <input type="text" name="clientName" class="form-control" id="clientName"
                                            placeholder="Enter client name" value="{{ $event->clientName }}">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="contractValue">Contract Value</label>
                                        <input type="number" name="contractValue" class="form-control" id="contractValue"
                                            placeholder="Enter contract value" value="{{ $event->contractValue }}">
                                    </div>

                                    <!-- Image Upload Section - Example for Image 1 (Repeat for Image 2 and Image 3) -->
                                    <div class="row mt-5">
                                        <div class="col-xl-3">
                                            <div class="mb-3 ml-1">
                                                @if ($event->image1)
                                                    <img id="showImage1" src="{{ asset($event->image1) }}"
                                                        alt="Current Image" style="max-width: 100px;">
                                                @else
                                                    <img src="{{ url('front_end/no-category-image.jpg') }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="mb-5">
                                                <label class="text-dark font-weight-medium" for="">Image 1</label>
                                                <input type="file" class="form-control" name="image1" id="image1">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-5">
                                        <div class="col-xl-3">
                                            <div class="mb-3 ml-1">
                                                @if ($event->image2)
                                                    <img id="showImage2" src="{{ asset($event->image2) }}"
                                                        alt="Current Image" style="max-width: 100px;">
                                                @else
                                                    <img src="{{ url('front_end/no-category-image.jpg') }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="mb-5">
                                                <label class="text-dark font-weight-medium" for="">Image 2</label>
                                                <input type="file" class="form-control" name="image2"
                                                    id="image2">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-5">
                                        <div class="col-xl-3">
                                            <div class="mb-3 ml-1">
                                                @if ($event->image3)
                                                    <img id="showImage3" src="{{ asset($event->image3) }}"
                                                        alt="Current Image" style="max-width: 100px;">
                                                @else
                                                    <img src="{{ url('front_end/no-category-image.jpg') }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="mb-5">
                                                <label class="text-dark font-weight-medium" for="">Image 3</label>
                                                <input type="file" class="form-control" name="image3"
                                                    id="image3">
                                            </div>
                                        </div>
                                    </div>


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
