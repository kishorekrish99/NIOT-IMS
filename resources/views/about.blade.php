@extends('layouts.app')
@section('css')
<style>
    body {
       background-position: center;
     background-repeat: no-repeat;
     background-image: url('');
     background-size: cover;
    }
       </style>
@endsection
@section('content')
<div class="container">
    <div class="headingv"><h1  style="text-align:center;color:black;padding-top: 15px;"><b>ABOUT</b></h1></div>
    <ul class="nav nav-pills"style="padding-top:15px;">
      <li class="active"><a data-toggle="pill" class="btn btn-primary" href="#home">OBJECTIVE</a></li>
      <li><a data-toggle="pill" class="btn btn-primary" href="#menu1">INTRODUCTION</a></li>
      <li><a data-toggle="pill" class="btn btn-primary" href="#menu2">TEAM</a></li>
     
    </ul>
    
    <div class="tab-content" style="padding-top:15px;">
      <div id="home" class="tab-pane fade in active">
        
        <p><b>
          <ul>
            <li><h4><b>The project aims to create a hassle free software interface to manage the inventory using RFID technology.</b></h4></li>
        <li><h4><b>The software records the entry and exit of the inventory along with timestamp and keep track of the department to which that product belongs to.</b></h4></li>
          </ul>
        </b></p>
      </div>
      <div id="menu1" class="tab-pane fade">
       
            <p><h4><b><ul><li>When most people think of inventory management, they think of retail applications. While retail operations
              rely heavily on inventory management, inventory management systems are widely used in a variety of industries, from
              manufacturing to utilities, healthcare, education, government, and more. Inventory management sytems streamline and 
              centralize the process for controlling the flow and maintenance of inventory to ensure that the right amount of inventory
              is available at the right time and of the right qua.
            </b></li></ul></h4></p>
         </div>
      <div id="menu2" class="tab-pane fade">
     
            <p><b>
              <ul>
                <li>Mohammed Omar</li>
                <li>U.Kishore</li>
                <li>G.Jaideep Reddy</li>
                <li>G.jaitej Reddy</li>
                <li>V.Rajamouli</li>
                <li>T.Sai teja</li>
                <li>I.Laksh Kiran</li>
                <li>P.Sri Gayathri</li>
                <li>B.Likhith</li>
                <li>N.Rahul krishna</li>
                <li>V.Vikram kumar</li>
                <li>S.Vijaykumar Reddy</li>
                <li>Rahul Yadav</li>
                <li>P.Sai Rahul</li>
                <li><b>Y.Jaideep</b></li>
              </ul>
            </b></p>
      </div>
     
    </div>
  </div>    
@endsection
