<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\rfid;
use App\Department;
use App\Log;
use DB;
class RfidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function scanned(Request $request){
        $rfid = $request->input('RFID');
        $scanned_dept_id = $request->input('dept');
        $rfid_fk = rfid::select('id','department_id')->where('RFID',$rfid)->get();
        if(count($rfid_fk)>0){
            foreach ($rfid_fk as $rfid2) {
                if($rfid2->department_id==$scanned_dept_id){
                    $time_limit = Log::select('check_in')->where('rfid_id',$rfid2->id)->latest()->take(1)->get();
                    if(Carbon::parse($time_limit[0]->check_in)->diffInMinutes(Carbon::now()->format('Y-m-d H:i:s'))>1){
                        

                        //if scanned diff is 1 minute then perform checkout


                        //dd($time_limit[0]->check_in);
                        //dd(Carbon::parse($time_limit[0]->check_in)->diffInMinutes(Carbon::now()->format('Y-m-d H:i:s')));
                        //perform checkout operation
                        $log = Log::where('rfid_id',$rfid2->id)->latest()->take(1)->update(['check_out' => Carbon::now()->format('Y-m-d H:i:s') ]);
                        $r = rfid::where('id',$rfid2->id)->first()->update(['department_id' => 1]);
                        return "performed check-out";
                    }
                    return "check-out not performed due to time limit re-scan after 1 minute to check-out";
                }
                else{
                    //perform checkin operation
                    $time_limit = Log::select('check_out')->where('rfid_id',$rfid2->id)->latest()->take(1)->get();
                    if(Carbon::parse($time_limit[0]->check_out)->diffInMinutes(Carbon::now()->format('Y-m-d H:i:s'))>1){
                        $log = new Log;
                        $log->rfid_id = $rfid2->id;
                        $log->check_in = Carbon::now()->format('Y-m-d H:i:s');
                        $log->department_id = $scanned_dept_id;
                        $log->save();
                        $r = rfid::select('*')->where('id',$rfid2->id)->first();
                        $r->department_id = $scanned_dept_id;
                        $r->save();
                        return "performed check-in";
                    }
                    else{
                        return "check-in not performed due to time limit re-scan after 1 minute to check-in";
                    }
                }
            }
        }

    }
}
