<!DOCTYPE html>
<html lang="en">

<head>
    <!-- new template -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{ asset('backend/img/favicon.html')}}">

    <title>Ecom Admin - Log in</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('backend/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- end new template -->

</head>

<body class="login-body">

    <div class="container">
        <form class="form-signin" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}" method="post">
            @csrf

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
            <h2 class="form-signin-heading">sign in</h2>
            <div class="login-wrap">
                <input type="email" name="email" id="email" :value="old('email')" required class="form-control" placeholder="Email ID" autofocus>
                <br>
                <input type="password" class="form-control" name="password" id="password" required autocomplete="current-password" placeholder="Password">
                <label class="checkbox">
                    <input type="checkbox" name="remember" id="remember_me"> Remember me
                    <span class="pull-right">
                        <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                    </span>
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            </div>

            <!-- Modal -->

            <!-- modal -->

        </form>
    </div>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- new template -->


    <!-- end new template -->


    <script src="{{ asset('backend/js/jquery.js')}}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>

</body>

</html>