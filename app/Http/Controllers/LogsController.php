<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\rfid;
use App\Log;
use App\Department;

class LogsController extends Controller
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
    public function getLogView(Request $request){
        $rfid = $request->input('rfid');
        $component = rfid::where('RFID',$rfid)->join('components','components.id','rfids.component_id')->join('departments','rfids.department_id','departments.id')->select('components.name as cname','departments.name as dname')->get();
        $cname = $component[0]->cname;
        $dname = $component[0]->dname;
        return view('logs.logs-list',['rfid' => $rfid,'cname' => $cname,'dept' => $dname]);
    }
    public function getLog(Request $request){
        $rfid = $request->input('rfid');
        //dd($rfid);
        $data =collect(DB::select("select
  [departments].[name] as [dname],
  format([logs].[check_in],'dd/MM/yyyy, hh:mm:ss tt') as check_in,
  format([logs].[check_out],'dd/MM/yyyy, hh:mm:ss tt') as check_out,
  [statuses].[name] as status_name
from
  [logs]
  inner join [departments] on [logs].[department_id] = [departments].[id]
  inner join [rfids] on [logs].[rfid_id] = [rfids].[id]
  join [scanners] on [logs].[scanner_id] = [scanners].[id]
  join [statuses] on [scanners].[status_id] = [statuses].[id]
where
  [rfids].[RFID] ='".$rfid."'
order by
  [logs].[check_in] asc
  "));
    $d["data"] = $data;
    //dd((($d["data"])));
    return $d;
    }
}
