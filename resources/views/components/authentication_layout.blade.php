<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('assets/images/favicon.png') }}>
    <!-- Custom CSS -->
    <link href={{ asset('dist/css/style.min.css') }} rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

@yield('content')

<script src={{ asset('assets/libs/jquery/dist/jquery.min.js') }}></script>
<!-- Bootstrap tether Core JavaScript -->
<script src={{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}></script>
<!-- ============================================================== -->
<!-- This page plugin js -->

<!-- ============================================================== -->
<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<script>
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function() {

        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });

</script>
@if (Session::has('success'))
<script>
    toastr.success("{!! Session::get('success') !!}")
</script>

@elseif (Session::has('error'))
<script>
    toastr.error("{!! Session::get('error') !!}")
</script>

@elseif (Session::has('warning'))
<script>
    toastr.warning("{!! Session::get('warning') !!}")
</script>

@elseif (Session::has('info'))
<script>
    toastr.info("{!! Session::get('info') !!}")
</script>

@endif



@yield('script')
</body>

</html>
