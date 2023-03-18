<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{ config('app.name') }}</title>
    <link rel="apple-touch-icon" href="{{ asset('/') }}images/logo/logo_prov.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}images/logo/logo_prov.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/css/components.css">
    <!-- END: Theme CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/css/core/colors/palette-gradient.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Page CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('/') }}private/css/plugins/forms/switch.css"> -->


    <!-- DATE -->
    <style>
        #loading-spinner {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }

        .loading-text {
            font-weight: bold;
        }
    </style>
    <div id="loading-spinner" class="d-none">
        <div class="d-flex align-items-center">
            <div class="spinner-border text-primary mr-2" role="status"></div>

            <span class="loading-text">Loading......</span>
        </div>
    </div>

</head>

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns fixed-navbar content-left-sidebar email-application" data-open="click" data-menu="vertical-menu" data-col="2-columns content-left-sidebar">

    <!-- BEGIN: Header-->
    @include('private/layout/header')
    <!-- END: Header-->


    <!-- BEGIN: Side Menu-->
    @include('private/layout/sidebar')
    <!-- END: Side Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            @yield('isi')
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('private/layout/footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/') }}private/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/') }}private/js/core/app-menu.js"></script>
    <script src="{{ asset('/') }}private/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- <script src="{{ asset('/') }}private/js/scripts/forms/custom-file-input.js"></script> -->
    <!-- END: Page JS-->
    <!-- <script src="{{ asset('/') }}private/vendors/js/forms/quill/quill.js"></script>
    <script src="{{ asset('/') }}private/js/scripts/pages/app-email.js"></script> -->
    <!-- datatables -->
    <script src="{{ asset('/') }}private/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="{{ asset('/') }}private/js/scripts/tables/datatables/datatable-basic.js"></script>

    <script src="{{ asset('/') }}private/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="{{ asset('/') }}private/js/myscript.js"></script>

    <!-- <script src="{{ asset('/') }}js/scripts/modal/components-modal.js"></script> -->

    <!-- <script src="{{ asset('/') }}private/vendors/js/forms/toggle/bootstrap-checkbox.min.js"></script> -->
    <!-- <script src="{{ asset('/') }}private/js/scripts/forms/switch.js"></script> -->
    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->


</body>
<!-- END: Body-->

</html>