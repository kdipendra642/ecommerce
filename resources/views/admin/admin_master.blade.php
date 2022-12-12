<!DOCTYPE html>
<html lang="en">

<head>
    <!-- new template -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="Ecom Dashboard, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Ecom CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    <!--dynamic table-->
    <link href="{{ asset('assets/advanced-datatable/media/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/advanced-datatable/media/css/demo_table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/data-tables/DT_bootstrap.css')}}" />

    <!--right slidebar-->
    <link href="{{ asset('backend/css/slidebars.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{ asset('backend/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/style-responsive.css')}}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />


</head>

<body>


    <section id="container">
        <!-- Header -->
        @include('admin.body.header')

        <!-- Left side column. contains the logo and sidebar -->
        <!-- sidebar-->
        @include('admin.body.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <section id="main-content">

            <!-- contents are in index.blade.php -->
            @yield('admin')
        </section>
        <!-- /.content-wrapper -->
        <!-- footer -->
        @include('admin.body.footer')

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->

    </section>

    <!-- ./wrapper -->

    <!-- new template from here -->
    <script src="{{ asset('backend/js/jquery.js')}}"></script>
    <script src="{{ asset('backend/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <script src="{{ asset('backend/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ asset('backend/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script class="include" type="text/javascript" src="{{ asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>


    <script type="text/javascript" src="{{ asset('assets/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
    <!-- datatable -->
    <script type="text/javascript" language="javascript" src="{{ asset('assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/data-tables/DT_bootstrap.js')}}"></script>

    <script src="{{ asset('backend/js/respond.min.js')}}"></script>

    <!--right slidebar-->
    <script src="{{ asset('backend/js/slidebars.min.js')}}"></script>
    <!-- dattable -->
    <script src="{{ asset('backend/js/dynamic_table_init.js')}}"></script>

    <!--common script for all pages-->
    <script src="{{ asset('backend/js/common-scripts.js')}}"></script>


    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })
        })
    </script>
    <!-- end new template -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>


</body>

</html>