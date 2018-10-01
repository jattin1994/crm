<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Login</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('theme/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Style Core CSS -->
    <link href="{{URL::asset('theme/assets/css/style.css')}}" rel="stylesheet">
    <!-- Animate Core CSS -->
    <link href="{{URL::asset('theme/assets/css/animate.css')}}" rel="stylesheet">
    <!-- Hover Core CSS -->
    <link href="{{URL::asset('theme/assets/css/hover.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{URL::asset('theme/assets/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
<style>
.error
{
    color:red!important;
    margin-top: 10px;
}
.help-block
{
    color:red!important;
    margin-top: 40px;
}



</style>
</head>
<body class="login-form-outer cyan">
    <!-- Login section start here-->
    <div class="login-form-wrap static-copyright">


    @yield('content')
    </div>
    <!-- Login section end here-->
    <script src="{{URL::asset('theme/assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{URL::asset('theme/assets/js/bootstrap.js')}}"></script>
    <script src="{{URL::asset('theme/assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('theme/assets/js/additional-methods.min.js')}}" type="text/javascript"></script>
        <script>
        $(document).ready(function() {
            $(".anim-label input").keyup(function() {
                var $this = $(this);
                if ($this.val().length >= 1) {
                    $this.parent().addClass("active");
                } else {
                    $this.parent().removeClass("active");
                }
            });
        });
    </script>
    @yield('js')
</body>
</html>
