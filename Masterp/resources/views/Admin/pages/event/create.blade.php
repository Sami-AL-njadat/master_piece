@extends('Admin.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Event</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Event</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('eventes.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group col-md-8">
                                        <label for="EventTypeId">Event Type ID</label>
                                        <select class="form-control" name="EventTypeId">
                                            <option value=""> Choose a Event Type ID</option>
                                            @foreach ($event as $item)
                                                <option value="{{ $item->id }}"> #{{ $item->id }}
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>










                                    <div class="form-group col-md-8">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter name" required>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Enter title">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="clientRequest">Client Request</label>
                                        <textarea class="form-control" name="clientRequest" id="clientRequest" placeholder="Enter client request"></textarea>
                                    </div>


                                    <div class="form-group col-md-8">
                                        <label for="aboutProject">About Project</label>
                                        <textarea class="form-control" name="aboutProject" id="aboutProject" placeholder="Enter about Project"></textarea>
                                    </div>
                                   

                                    <div class="form-group col-md-8">
                                        <label for="idea">Idea</label>
                                        <textarea class="form-control" name="idea" id="idea" placeholder="Enter idea"></textarea>
                                    </div>



                                    <div class="form-group col-md-8">
                                        <label for="beginning">Beginning Date</label>
                                        <input type="date" name="beginning" class="form-control" id="beginning" required>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="ending">Ending Date</label>
                                        <input type="date" name="ending" class="form-control" id="ending" required>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="clientName">Client Name</label>
                                        <input type="text" name="clientName" class="form-control" id="clientName"
                                            placeholder="Enter client name">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="contractValue">Contract Value</label>
                                        <input type="number" name="contractValue" class="form-control" id="contractValue"
                                            placeholder="Enter contract value">
                                    </div>


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

                                    <!-- The rest of your form fields -->

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
