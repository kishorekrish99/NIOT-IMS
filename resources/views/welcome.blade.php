@extends('layouts.app')
@section('css')
<link href="{{url('assets/css/login-register.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="content">
    <div class="container">

        <div style="padding-left: 20%;padding-right: 20%;padding-top: 15%;">
            <!-- Card -->
            <div class="card card-image" style="background-image: url(qwert.jpg);">
                <!-- Content -->

                <div class="row" style="padding-top:50px;padding-bottom: 50px;">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div style="padding-left: 10%;"> <a class="btn big-login waves-effect waves-light"
                                data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a>
                        </div>
                        <div style="padding-top:20px;padding-left:7%;"><a class="btn big-login waves-effect waves-light"
                                data-toggle="modal" href="javascript:void(0)"
                                onclick="openRegisterModal();">Register</a></div>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade login" id="loginModal" style="display: none;">
        <div class="modal-dialog login animated">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Login with</h4>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="content">
                            <div class="social">
                                <a class="circle github" href="#">
                                    <i class="fa fa-github fa-fw"></i>
                                </a>
                                <a id="google_login" class="circle google" href="#">
                                    <i class="fa fa-google-plus fa-fw"></i>
                                </a>
                                <a id="facebook_login" class="circle facebook" href="#">
                                    <i class="fa fa-facebook fa-fw"></i>
                                </a>
                            </div>
                            <div class="division">
                                <div class="line l"></div>
                                <span>or</span>
                                <div class="line r"></div>
                            </div>
                            <div class="error"></div>
                            <div class="form loginBox">
                                <form method="POST" accept-charset="UTF-8" action="{{ url('login') }}">
                                    @csrf
                                    <input id="email" class="form-control" name="email" type="text" placeholder="Email" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <input id="password" class="form-control" name="password" type="password" placeholder="Password"
                                        name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input class="btn btn-default btn-login" type="submit" value="Login"
                                        >
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="content registerBox" style="display:none;">
                            <div class="form">
                                <form method="" html="{:multipart=>true}" data-remote="true" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                    <input id="password" class="form-control" type="password" placeholder="Password"
                                        name="password">
                                    <input id="password_confirmation" class="form-control" type="password"
                                        placeholder="Repeat Password" name="password_confirmation">
                                    <input class="btn btn-default btn-register" type="button" value="Create account"
                                        name="commit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="forgot login-footer">
                        <span>Looking to
                            <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                    </div>
                    <div class="forgot register-footer" style="display:none">
                        <span>Already have an account?</span>
                        <a href="javascript: showLoginForm();">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{url('assets/js/login-register.js')}}"></script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script type="text/javascript">
    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('ul.dropdown-menu');

    if (notificationsCount <= 0) {
        notificationsWrapper.hide();
    }

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('1d2dd1e49b72be42e451', {
        cluster: 'ap2'
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('RFID-Scanned');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\RFIDScanned', function (data) {
        console.log('asdas')
        var existinghtml = $('.data').html();
        var newNotificationHtml = `<div class="title m-b-md data">
            ` + data.message + `
        </div>`
        $('.data').html(newNotificationHtml + existinghtml);
        notificationsCount += 1;
    });

</script>
@endsection
</body>

</html>
