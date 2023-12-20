<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mashtal Dashboard &mdash; SAM</title>

    <link rel="icon" href="{{ asset('front_end/img/core-img/mashtal.jpg') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
     <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    {{-- DataTable --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->


    
</head>
 
<body>
 
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('Admin.layout.navbar')

            @include('Admin.layout.sidebar')

            @yield('content')
            
            
            
            <footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="{{ route('admin.dashboard') }}">Mashtal online</a>
    </div>
    <div class="footer-right">

    </div>
</footer>
</div>
</div>
  {{-- <script src="{{ asset('index.js') }}"></script> --}}

<!-- General JS Scripts -->
<script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
<script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('admin/assets/modules/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('admin/assets/js/page/index.js') }}"></script>
 
<!-- Template JS File -->
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>
{{-- 
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.delete-item', function(event) {
            event.preventDefault()
            let deleteUrl = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: deleteUrl,
                      data: { '_token': $('meta[name="csrf-token"]').attr('content') },
                        success: function(data) {

                            if (data.status == 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    data.message,
                                    'success'
                                )
                                window.location.reload()
                            } else if (data.status == 'error') {
                                Swal.fire(
                                    'Cant Delete!',
                                    data.message,
                                    'error'
                                )
                            }

                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.status);
                            console.log(error);

                        }
                    })
                }
            })
        })
    })
</script> --}}

 
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.delete-item', function(event) {
            event.preventDefault();
            let deleteUrl = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: deleteUrl,
                        data: { '_token': $('meta[name="csrf-token"]').attr('content') },
                        success: function(data) {
                            if (data.status == 'success') {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: data.message,
                                    icon: 'success',
                                    timer: 2000, // 2 seconds
                                    showConfirmButton: false
                                });
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            } else if (data.status == 'error') {
                                Swal.fire({
                                    title: 'Can\'t Delete!',
                                    text: data.message,
                                    icon: 'error',
                                    timer: 2000, // 2 seconds
                                    showConfirmButton: false
                                });
                                setTimeout(function() {
                                    window.location.reload();
                                }, 5000);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.status);
                            console.log(error);
                            Swal.fire({
                                title: 'info!',
                                text: 'Wait For Processing a Request.',
                                icon: 'info',
                                timer: 2000, // 2 seconds
                                showConfirmButton: false
                            });
                            setTimeout(function() {
                                window.location.reload();
                            }, 2500);
                        }
                    });
                }
            });
        });
    });
</script> 
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
 @stack('scripts') 
 

</body>

</html>
