<?php
use App\Component;
use App\rfid;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/api/RFIDScanned','RfidController@scanned');


Route::get('/aboutus',function(){
    return view('about');
})->name('aboutus');

Route::get('search',function(){
    return view('search.find');
})->name('search');

Route::get('list','DepartmentController@getDepartmentList');




Route::get('getDepartmentList',function(){
    $data =collect(DB::select("select
  [a].[RFID],
  [d].name as belongsto,
  [components].[name] as [cname],
  [departments].[name] as [dname],
  [statuses].[name] as [status_name],
  format([logs].[check_in],'MMM dd, yyyy, hh:mm:ss tt') as check_in,
  format([logs].[check_out],'MMM dd, yyyy, hh:mm:ss tt') as check_out
from
  [current_status]
  inner join [rfids] as [a] on [a].[id] = [current_status].[rfid_id]
  inner join [logs] on [logs].[id] = [current_status].[log_id]
  inner join [departments] on [logs].[department_id] = [departments].[id]
  inner join [components] on [a].[component_id] = [components].[id]
  inner join [departments] as [d] on [d].[id] = [a].[department_id]
  inner join [statuses] on [current_status].[status_id] = [statuses].[id]"));
    $d["data"] = $data;
    //dd((($d["data"])));
    //dd($d);
    return $d;
});
Route::get('getlogs','LogsController@getLogView')->name('getlogviewbyrfid');
Route::get('getlog','LogsController@getLog')->name('getlogbyrfid');

//custom routes

Route::get('triggerevent/{name}', function ($name) {
    event(new App\Events\RFIDScanned($name));
    return "Event has been sent!";
});


Route::get('/component/{parent_id}/{name}',function($id, $name){
    $main=new Component;
    $main->parent_id = $id;
    $main->name=$name;
    $main->save();
    return $main::all();
});

Route::get('/department/{dept_name}',function($name){
    $dept = new Department;
    $dept->name = $name;
    $dept->save();
    return $dept::all();
});

Route::get('assignrfid/{rfid}/{component_id}',function($r_id, $comp_id){
    $rfid = new rfid;
    $rfid->RFID = $r_id;
    $rfid->component_id = $comp_id;
    $rfid->department_id = 1; //1 -rfid assigning department
    $rfid->save();
    return $rfid::all();
});

Route::get('/getallcomponents',function(){
    $comp=new Component;
    return json_encode($comp::all());
});