<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Adminox - Responsive Web App Kit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{URL('resources/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL('resources/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL('resources/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL('resources/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

        <script src="{{URL('resources/assets/js/modernizr.min.js')}}"></script>
    </head>


    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="index.html" class="text-success">
                                                <span><img src="assets/images/logo_dark.png" alt="" height="30"></span>
                                            </a>
                                        </h2>
                                        <h5 class="text-uppercase font-bold m-b-5 m-t-50">Sign In</h5>
                                        <p class="m-b-0">Login to your Admin account</p>
                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                            {{ csrf_field() }}
                            
                                            <div class="form-group m-b-20 row{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <div class="col-12">
                                                    <label for="emailaddress">Email address</label>
                                                    <input class="form-control" type="email" id="emailaddress" name="email" value="{{ old('email') }}" placeholder="john@deo.com">
                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <div class="col-12">
                                                    {{-- <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your password?</small></a> --}}
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" required name="password" id="password" placeholder="Enter your password">
                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">

                                                    <div class="checkbox checkbox-success">
                                                        <input id="remember" type="checkbox" checked="" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label for="remember">
                                                            Remember me
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                                </div>
                                            </div>

                                        </form>

                                        <div class="row m-t-50">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                                            </div>
                                            <div class="col-sm-12 text-center">
                                                @if (Route::has('password.request'))
                                                <a class="text-dark m-l-5" href="{{ route('password.request') }}">
                                                    <b>Forgot your password?</b>
                                                </a>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{URL('resources/assets/js/jquery.min.js')}}"></script>
        <script src="{{URL('resources/assets/js/tether.min.js')}}"></script><!-- Tether for Bootstrap -->
        <script src="{{URL('resources/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{URL('resources/assets/js/metisMenu.min.js')}}"></script>
        <script src="{{URL('resources/assets/js/waves.js')}}"></script>
        <script src="{{URL('resources/assets/js/jquery.slimscroll.js')}}"></script>

        <!-- App js -->
        <script src="{{URL('resources/assets/js/jquery.core.js')}}"></script>
        <script src="{{URL('resources/assets/js/jquery.app.js')}}"></script>

    </body>
</html>