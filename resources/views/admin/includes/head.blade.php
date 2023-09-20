<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    {{-- fontawesome  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom styles for this template-->
    {{-- toastr  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('admin') }}/css/sb-admin-2.min.css" rel="stylesheet">
    {{-- start of summernote  --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
    <style>
        .toast-success{
            background: green;
        }
        .toast-error {
            background: red;
        }
    </style>
    @stack('dashboard_link')

</head>
