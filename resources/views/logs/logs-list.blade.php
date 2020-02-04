@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css')}}">
<div class="master-details">
    <form method="GET" action="{{route('getlogviewbyrfid')}}">
       <div class="row">
            
            <div class="col-sm-3 my-1">
              <label class="sr-only" for="inlineFormInputGroupUsername">RFID</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">RFID</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="RFID" value="{{$rfid}}" name="rfid">
              </div>
            </div>
            
            <div class="col-sm-3 my-1">
              <label class="sr-only" for="inlineFormInputGroupUsername">Component Name</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">icon</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Component name" value="{{$cname}}" disabled="true">
              </div>
            </div>

            <div class="col-sm-3 my-1">
              <label class="sr-only" for="inlineFormInputGroupUsername">Department Name</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Dept.</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="RFID" value="{{$dept}}" disabled="true">
              </div>
            </div>
            <input type="submit" class="btn btn-primary">
        </div>        
    </form>
</div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>SNO</th>
                <th>Department</th>
                <th>Check_in</th>
                <th>Check_out</th>
            </tr>
        </thead>
        <!--<tfoot>
            <tr>
                <th>SNO</th>
                <th>RFID</th>
                <th>Component Name</th>
                <th>Department</th>
                <th>Check_in</th>
                <th>Check_out</th>
            </tr>
        </tfoot>-->
    </table>
@endsection
@section('js')
    <script type="text/javascript" src="{{url('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
    function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
    '</table>';
}
 
$(document).ready(function() {
    var table = $('#example').DataTable( {
        "processing": true,
        stateSave: true,
        "ajax": "{{url('getlog/?rfid='.$rfid)}}",
        "createdRow": function ( row, data, index ) {
            $('td', row).eq(index+1).attr('id', Object.keys(data)[index]);
            $('td', row).eq(index+2).attr('id', Object.keys(data)[index+1]);
            $('td', row).eq(index+3).attr('id', Object.keys(data)[index+2]);
        },
        "columns": [
            {
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { data: "dname"},
            { data: "check_in" },
            { data: "check_out"},
        ],
        "autoWidth": true,        
        "order": [[1, 'asc']]
    } );
    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
     /*$('#example tbody').on( 'click', 'td', function () {
        var table = $('#example').DataTable();
         
         $('#12345ABCD #cname').effect("highlight", {color: "#ccffb3"}, 3000);
        console.log("done");
        
} );*/
    /*// Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );*/
} );
    </script>
@endsection