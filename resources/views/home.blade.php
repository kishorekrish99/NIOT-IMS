@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{url('/assets/plugins/MDB/css/mdb.min.css')}}">;
    
@endsection
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div style="padding-top: 50px;">
            <!-- Card -->
<div class="card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);">
    <!-- Content -->
    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 btn-group-vertical">
        <a class=" btn btn-blue" style="width: 40%;" href="{{route('search')}}"> SEARCH</a>
        <a class=" btn btn-blue" style="width: 40%;" href="{{route('aboutus')}}"> About</a>
      </div>
    </div>
  </div>
        </div>
    </div>
</div>
@endsection
