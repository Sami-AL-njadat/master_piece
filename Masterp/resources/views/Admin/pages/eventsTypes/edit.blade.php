@extends('Admin.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Events Type</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Events Type</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit</h4> Events Type</h4>
                            </div>
                            <div class="card-body p-0">
                                <form action="{{ route('event.update', $eventsType->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card">
                                        <div class="card-body">
 

                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="name">Name</label>
                                                    <input type="name" name="name"
                                                        value="{{ $eventsType->name }}" class="form-control"
                                                        id="inputEmail4" placeholder="Name">
                                                </div>
                                            </div>



                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" id="textAreaExample3" name="description" id="description"
                                                        placeholder="Enter a description">
 
                                                            {!! htmlspecialchars_decode($eventsType->description) !!}


                                                    </textarea>


                                                </div>
                                            </div>

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
   
@endsection
