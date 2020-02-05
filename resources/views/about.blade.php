@extends('layouts.app')
@section('css')

<link href="{{url('assets/css/qwert.css')}}" rel="stylesheet" />
@endsection

@section('content')
<section id="team" >
<div class="container my-3 py-5 text-center">
     <div class="row md-5">
          <div class="col" style="padding-top:0px;">
                       <h1 class="head">ASSOCIATIVE MEMBERS</h1>
                       <p class="mt-3"></p>
          </div>
      </div>
</div>
<!--CARDS -------->
<div>
<div class="">
 
   <div class="card-wrapper">
         <div class="card">
              <img src="{{url('assets\images\bg.jpeg')}}" alt="card background" class="card-img">
              <img src="{{url('assets\inc\images\sripadaram.png')}}" alt="profile image" class="profile-img">
              <h1>Sripadaram M</h1>
              <p class="job-title">Corporate Trainer</p>
              <p class="about">
              Motivationsal speaker with
              over 15 years of corporate
              world experience.
                </p> 
                <a href="#" class="btn">contact</a>
                <ul class="social-media">
                <li><a href="#" class="fab fa-facebook-square"></i></a></li>
                <li><a href="#" class="fab fa-twitter-square"></i></a></li>
                <li><a href="#" class="fab fa-instagram"></i></a></li>
                <li><a href="#" class="fab fa-google-plus-square"></i></a></li>
                </ul>
            </div>
            <div class="card" >
              <img src="{{url('assets\images\bg.jpeg')}}" alt="card background" class="card-img">
              <img src="{{url('assets\images\u4.jpg')}}" alt="profile image" class="profile-img">
              <h1>A Hari Kishore</h1>
              <p class="job-title">Ex.Technology Manager</p>
              <p class="about">
                Wells Fargo
                IT Professional With 20 
                Wears of Industry exposure.
                </p> 
                <a href="#" class="btn">contact</a>
                <ul class="social-media">
                <li><a href="#" class="fab fa-facebook-square"></i></a></li>
                <li><a href="#" class="fab fa-twitter-square"></i></a></li>
                <li><a href="#" class="fab fa-instagram"></i></a></li>
                <li><a href="#" class="fab fa-google-plus-square"></i></a></li>
                </ul>
            </div>
</section>
</div>
  
    
</div>
</div>
</section>
@endsection