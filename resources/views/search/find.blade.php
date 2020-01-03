@extends('layouts.app')
@section('content')
<!--header-->
<div class="headingv"><h1  style="text-align:center;color:black;padding-top: 15px;"><b>TOTAL ITEMS</b></h1></div>
<!--fields-->
<div style="padding-top:50px;padding-left:50px;padding-right: 50px  ;">
    <table id="table_id" class="display">
        <thead>
            <tr>
          
                <th>Name</th>
                <th>status</th>
                <th>check_in</th>
                <th>Check_out</th>
                <th>dept</th>
                <th>SubSystem</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>MotherBoard</td>
                <td>Available</td>
                <td>123</td>
                <td>121</td>
                <td>working</td>
                <td><a href="file:///C:/Users/kishore/Desktop/motherboard.html" ><i class="fa fa-step-forward" aria-hidden="true"></i></a></td>
            </tr>
            <tr>
                <td>Power Supply</td>
                <td>Available</td>
                <td>456</td>
                <td>161</td>
                <td>working</td>
                <td><i class="fa fa-step-forward" aria-hidden="true"></i></td>
            </tr>
           
            <tr>
                <td>Bus</td>
                <td>Available</td>
                <td>456</td>
                <td>161</td>
                <td>working</td>
                <td><i class="fa fa-step-forward" aria-hidden="true"></i></td>
            </tr> <tr>
                <td>Outer Cover</td>
                <td>Available</td>
                <td>456</td>
                <td>161</td>
                <td>working</td>
                <td><a href="file:///C:/Users/kishore/Desktop/outercover.html" ><i class="fa fa-step-forward" aria-hidden="true"></i></a></td>
            </tr> 
            <tr>
                <td>Disk Drivers</td>
                <td>Available</td>
                <td>456</td>
                <td>161</td>
                <td>working</td>
                <td><a href="file:///C:/Users/kishore/Desktop/diskdrives.html"><i class="fa fa-step-forward" aria-hidden="true"></i></a></td>
            </tr> 
        </tbody>
    </table>
</div>        

@endsection
@section('js')
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
    </script>
@endsection