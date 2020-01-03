@extends('layouts.app')
@section('content')
<!--header-->
<div class="heading"><h1  style="text-align:center;color:black;padding-top: 15px;"><b>DISK DRIVES</b></h1></div>
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
                <td>RAM</td>
                <td>Available</td>
                <td>123</td>
                <td>121</td>
                <td>working</td>
                <td><i class="fa fa-step-forward" aria-hidden="true"></i></td>
            </tr>
            <tr>
                <td>SDD</td>
                <td>Available</td>
                <td>456</td>
                <td>161</td>
                <td>working</td>
                <td><i class="fa fa-step-forward" aria-hidden="true"></i></td>
            </tr>
           
            <tr>
                <td>HDD</td>
                <td>Available</td>
                <td>456</td>
                <td>161</td>
                <td>working</td>
                <td><i class="fa fa-step-forward" aria-hidden="true"></i></td>
            </tr> <tr>
             
        </tbody>
    </table>
</div>        
@endsection('content')
@section('js')
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
    </script>
@endsection