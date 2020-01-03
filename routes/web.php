<?php
use App\MainComponent;
use App\ChildComponent;
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


Route::get('aboutus',function(){
    return view('about');
})->name('about');

Route::get('search',function(){
    return view('search.find');
})->name('search');








Route::get('triggerevent/{name}', function ($name) {
    event(new App\Events\RFIDScanned($name));
    return "Event has been sent!";
});


Route::get('/main/{name}/',function($name){
    $main=new MainComponent;
    $main->name=$name;
    $main->save();
    return $main::all();
});
Route::get('/sub/{id_fk}/{name}/{parent}',function($fk,$name,$parent){
    $sub=new ChildComponent;
    $sub->main_Component_fk=$fk;
    $sub->name=$name;
    $sub->parent_table=$parent;
    $sub->save();
    return $sub::all();
});

Route::get('/getallsubcomponents',function(){
    $sub=new ChildComponent;
    return json_encode($sub::all());
});

Route::any('/api/RFIDScanned',function(){
    return 'RFID';
});
