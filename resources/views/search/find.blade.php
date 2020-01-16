@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css')}}">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>SNO</th>
                <th>RFID</th>
                <th>Department(belongsTo)
                <th>Component Name</th>
                <th>Department(Available in)</th>
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
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
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
        "ajax": "{{url('getDepartmentList')}}",
        "createdRow": function ( row, data, index ) {
            $('td', row).eq(index+1).attr('id', Object.keys(data)[index]);
            $('td', row).eq(index+2).attr('id', Object.keys(data)[index+1]);
            $('td', row).eq(index+3).attr('id', Object.keys(data)[index+2]);
            $('td', row).eq(index+4).attr('id', Object.keys(data)[index+3]);
            $('td', row).eq(index+5).attr('id', Object.keys(data)[index+4]);
        },
        "columns": [
            {
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { data: "RFID",
            "orderable": false,
                        "render": function(data,type,row,meta) { // render event defines the markup of the cell text 
                            var a = '<a href="/getlogs/'+data+'" target="_blank"><i class="fa fa-edit"></i> '+data+'</a>'; // row object contains the row data
                            return a; }
                        },
            { data: "belongsto"},
            { data: "cname" },
            { data: "dname" },
            { data: "check_in" },
            { data: "check_out"},
        ],
        "autoWidth": true,
        rowId: function(data) {
            return data.RFID;
      },
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
//pusher start
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('1d2dd1e49b72be42e451', {
        cluster: 'ap2'
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('RFID-Scanned');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\RFIDScanned', function (data) {
        console.log(data);
        $('#'+data['RFID']+' #'+data['message']+'')[0].innerText=data['time'];
        $('#'+data['RFID']+' #'+data['message']+'').effect("highlight", {color: "#ccffb3"}, 3000);
        if(data['message']=='check_in'){
            $('#'+data['RFID']+' #dname')[0].innerText = data['department'];
            $('#'+data['RFID']+' #check_out'+'')[0].innerText=' ';
            $('#'+data['RFID']+' #check_out').effect("highlight", {color: "#ccffb3"}, 3000);
            $('#'+data['RFID']+' #dname').effect("highlight", {color: "#ccffb3"}, 3000);
        }
        //cell.data( cell.data() + 1 ).draw();

    });
//pusher stop
    </script>
@endsection