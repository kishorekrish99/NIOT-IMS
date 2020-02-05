@extends('layouts.app')
@section('css')
<link href="{{url('assets/css/login-register.css')}}" rel="stylesheet" />
<script type="text/javascript" src="{{url('assets/js/login-register.js')}}"></script>
<style>
    .mt-5, .my-5 {
        margin-top: -25px !important;
}
</style>
@endsection
@section('content')
<div class="row">
    <div class="col">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:150%;padding-top:2%;">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{url('assets/images/11.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{url('assets/images/cmrec.jpg')}}" alt="Second slide" height="550px">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{url('assets/images/niot.png')}}" alt="Third slide" height="550px">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
    <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" method="POST" accept-charset="UTF-8" action="{{ url('login') }}">
                @csrf
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <label for="inputPassword">Password</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
              <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="modal fade login" id="loginModal" style="display: none;">
        <div class="modal-dialog login animated">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title">Login with</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="content">
                            <div class="social">
                                <a class="circle github" href="#">
                                <i class="fa fa-github" aria-hidden="true"></i>
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


    </div>
</div>
<!---------------Cards---------------------->
<div class="row" style=";padding-top:1%;">
    <div style="padding-left:5%;">
        <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
                <div class="card-header">Inventory Management System</div>
                <div class="card-body">
                    <p class="card-text">Inventory management software is a software system for tracking inventory levels, orders, sales and deliveries.It can also be used in the manufacturing industry to create a work order, bill of materials and other production documents. </p>
                </div>
        </div>
    </div>  
    <div style="padding-left:5%">
        <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
            <div class="card-header">RFID</div>
            <div class="card-body">
                <p class="card-text">Radio-frequency identification (RFID) uses electromagnetic fields to automatically identify and track tags attached to objects. An RFID tag consists of a tiny radio transponder; a radio receiver and transmitter.</p>
            </div>
        </div>
    </div>
    <div style="padding-left:5%;">
        <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
            <div class="card-header">VISION</div>
            <div class="card-body">
            <p>The project aims to create a hassle free software interface to manage the inventory using RFID tech. Software records the position of the inventory along with time and keep track of the dept.&nbsp </p>
            </div>
        </div>
    </div>
    <div class="col" style="padding-left: 5%;">
    <iframe width="350" height="200" src="https://www.youtube.com/embed/WgZe7Q5BDig" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<!-----------footer--------------------------->
<div>
<footer id="sticky-footer" class="py-4 bg-secondary text-white-50" style=" flex-shrink: none;">
    <div class="container text-center">
      <small>Copyright &copy; Inventory management system</small>
    </div>
  </footer>


</div>

@endsection
</body>

</html>