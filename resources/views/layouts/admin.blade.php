<!DOCTYPE html>

<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin - @yield('title')</title>

        <link rel="shortcut icon" href="{{ URL::asset('puplic_assets/img/logos/favicon.png') }}">

        <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
        <link href="{{ asset('admin/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

        <link href="{{ asset('admin/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

        <link href="{{ asset('admin/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet" />

        <link href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />

        <link href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

        <link href="{{ asset('admin/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />

        <link id="main-css-href" rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
        <link id="main-css-href" rel="stylesheet" href="{{ asset('admin/css/customstyle.css') }}" />

        <link href="{{ asset('admin/images/favicon.png') }}" rel="shortcut icon" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="{{ asset('admin/plugins/nprogress/nprogress.js') }}"></script>
    </head>

    <body class="navbar-fixed sidebar-fixed" id="body">
        <script>
            NProgress.configure({ showSpinner: false });
            NProgress.start();
        </script>


        <div class="wrapper">

            @include('layouts.inc.admin.sidebar')

            <div class="page-wrapper">
                @include('layouts.inc.admin.navbar')

                <div class="content-wrapper">
                    <div class="content">
                        @if (session('status-success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('status-success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                        @endif
                        @if (session('status-failed'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oops!</strong> {{ session('failed-status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @yield('script')
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>
        <script>
            document.querySelectorAll('#editor').forEach((editorElement) => {
                ClassicEditor
                    .create(editorElement)
                    .catch(error => {
                        console.error(error);
                    });
            });
        </script>
        <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script src="{{ asset('admin/plugins/simplebar/simplebar.min.js') }}"></script>
        <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js') }}"></script>

        <script src="{{ asset('admin/plugins/apexcharts/apexcharts.js') }}"></script>

        <script src="{{ asset('admin/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>

        <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
        <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>

        <script src="{{ asset('admin/plugins/toaster/toastr.min.js') }}"></script>

        <script src="{{ asset('admin/js/mono.js') }}"></script>
        <script src="{{ asset('admin/js/chart.js') }}"></script>
        <script src="{{ asset('admin/js/map.js') }}"></script>
        <script src="{{ asset('admin/js/custom.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </body>
</html>
