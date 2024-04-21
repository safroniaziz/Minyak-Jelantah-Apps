<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">
{{-- <!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}"> --}}
<!-- Theme style -->

<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<!-- End Datatables -->

<link rel="stylesheet" href="{{ asset('assets/template/css/AdminLTE.min.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('assets/template/css/skins/_all-skins.min.css') }}">

{{-- Toast Notification Asset --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

{{-- Date & Time Picker --}}
<link rel="stylesheet" href="{{ asset('assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/timepicker/bootstrap-timepicker.min.css') }}">

{{-- select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@stack('styles')
</style>
<style>
    .skin-blue .sidebar-menu>li.active>a {
        border-left-color: #ffffff !important;
    }
    .sidebar-menu>li.active>a {
        background: #1e282c !important;
    }
</style>
