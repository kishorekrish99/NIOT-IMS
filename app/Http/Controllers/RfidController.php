<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\rfid;
use App\Department;
use App\Log;
use App\CurrentStatus;
use App\Events\RFIDScanned;
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
        $scan_diff = 2;    //in seconds
        $rfid = $request->input('RFID');
        $scanned_dept_id = $request->input('dept');
        $rfid_fk = rfid::select('id','department_id')->where('RFID',$rfid)->get();
        if(count($rfid_fk)>0){
            foreach ($rfid_fk as $rfid2) {
                $count = Log::select('check_in')->where('rfid_id',$rfid2->id)->where('check_out',null)->latest()->take(1)->get();
                if(count($count)>0){
                    $time_limit = Log::select('check_in')->where('rfid_id',$rfid2->id)->where('check_out',null)->latest()->take(1)->get();
                    if(count($time_limit)>0){
                        if(Carbon::parse($time_limit[0]->check_in)->diffInSeconds(Carbon::now()->format('Y-m-d H:i:s'))>$scan_diff){
                            //perform checkout operation
                            //dd(Carbon::now()->format('g:i A'));
                            $time = Carbon::now()->format('Y-m-d H:i:s');
                            $log = Log::where('rfid_id',$rfid2->id)->latest()->take(1)->update(['check_out' => $time ]);
                            
                            //dd($time->format('g:i A'));
                            //dd(Carbon::parse($time)->isoFormat('MMM Do YYYY h:mm:ss a'));
                            $log = Log::where('rfid_id',$rfid2->id)->select('*')->latest()->take(1)->get();
                            event(new RFIDScanned($rfid,$scanned_dept_id,'check_out',Carbon::parse($time)->isoFormat('MMM Do YYYY h:mm:ss a')));
                            return "performed check-out";
                        }
                        else 
                            return "check-out not performed due to time limit re-scan after 1 minute to check-out";                   
                }
                else{
                    //perform checkin operation
                    $time_limit = Log::select('check_out')->where('rfid_id',$rfid2->id)->latest()->take(1)->get();
                    if(count($time_limit)==1 && Carbon::parse($time_limit[0]->check_out)->diffInSeconds(Carbon::now()->format('Y-m-d H:i:s'))>$scan_diff){
                        $log = new Log;
                        $log->rfid_id = $rfid2->id;
                        $time = Carbon::now()->format('Y-m-d H:i:s');
                        $log->check_in = $time;
                        $log->department_id = $scanned_dept_id;
                        $log->save();
                        $current_status = CurrentStatus::updateorCreate(['rfid_id' => $log->rfid_id],['log_id' => $log->id]);
                        $departmet_name = Department::select('name')->where('id',$scanned_dept_id)->get();
                        event(new RFIDScanned($rfid,$departmet_name[0]->name,'check_in',Carbon::parse($time)->isoFormat('MMM Do YYYY h:mm:ss a')));
                        return "performed check-in";
                    }
                    else{
                        return "check-in not performed due to time limit re-scan after ".$scan_diff." seconds to check-in";
                    }
                }
            }
            else{
                $log = new Log;
                $log->rfid_id = $rfid_fk[0]->id;
                $time = Carbon::now()->format('Y-m-d H:i:s');
                $log->check_in = $time;
                $log->department_id = $scanned_dept_id;
                $log->save();
                $current_status = CurrentStatus::updateorCreate(['rfid_id' => $log->rfid_id],['log_id' => $log->id]);
                $departmet_name = Department::select('name')->where('id',$scanned_dept_id)->get();
                event(new RFIDScanned($rfid,$departmet_name[0]->name,'check_in',Carbon::parse($time)->isoFormat('MMM Do YYYY h:mm:ss a')));
                return "performed check-in";
            }
            }
        }
        else if(count($rfid_fk)){
            $log = new Log;
            $log->rfid_id = $rfid_fk[0]->id;
            $time = Carbon::now()->format('Y-m-d H:i:s');
            $log->check_in = $time;
            $log->department_id = $scanned_dept_id;
            $log->save();
            $current_status = CurrentStatus::updateorCreate(['rfid_id' => $log->rfid_id],['log_id' => $log->id]);
            $departmet_name = Department::select('name')->where('id',$scanned_dept_id)->get();
            event(new RFIDScanned($rfid,$departmet_name[0]->name,'check_in',Carbon::parse($time)->isoFormat('MMM Do YYYY h:mm:ss a')));
            return "performed check-in";
                    
        }
    }
}
