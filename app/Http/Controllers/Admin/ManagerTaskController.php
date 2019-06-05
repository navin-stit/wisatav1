<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\manager\managerTaskHeader;
use App\Models\manager\managerTaskDetails;
use App\Models\UserPermissions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ManagerTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function managerWeeklyTask(Request $request)
    {
    	$today = date('Y-m-d');
        $weekDates = array();
        $weekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']; 
        foreach($weekDays as $days)
		{
		 	$day_value = date('Y-m-d', strtotime($days . ' this week'));
		 	array_push($weekDates,$day_value); 	
		}
        $managerHeaders = DB::table('manager_weekly_headers')->select('*')->whereIn('managerweeklydate',$weekDates)->get(); 
        if(sizeof($managerHeaders)<=0)
        {			 
        	 $not_exits = array();
			 $id = $request->user()->id;
			 foreach($weekDays as $days)
			 {
			 	$day_value = date('Y-m-d', strtotime($days . ' this week'));
			 	DB::insert('insert into manager_weekly_headers (managerweeklydate,managerweeklytitle,created_at,updated_at,createdbyid) values(?,?,?,?,?)',[$day_value,$days,date('Y-m-d h:i:s'),date('Y-m-d h:i:s'),$id]); 
			 	array_push($not_exits,array($day_value,$days,date('Y-m-d h:i:s'),date('Y-m-d h:i:s'),$id));
			 }			 
		}
		else
		{
			$not_exits = array();
			foreach($weekDays as $days)
			{				
				$is_day_exists = FALSE;
			 	$day_value = date('Y-m-d', strtotime($days . ' this week'));
			 	foreach($managerHeaders as $headers)
				{
					if($day_value == $headers->managerweeklydate)
					{
						$is_day_exists = TRUE;
					}
				}
				if($is_day_exists === FALSE)
				{
					$id = $request->user()->id;
					DB::insert('insert into manager_weekly_headers (managerweeklydate,managerweeklytitle,created_at,updated_at,createdbyid) values(?,?,?,?,?)',[$day_value,$days,date('Y-m-d h:i:s'),date('Y-m-d h:i:s'),$id]); 
					array_push($not_exits,array($day_value,$days,date('Y-m-d h:i:s'),date('Y-m-d h:i:s'),$id));
				}
			}
		}
		$managerHeaders = managerTaskHeader::select('*')->whereIn('managerweeklydate',$weekDates)->with('managerTaskDetails')->get(); 
		return view('admin/manager/managerWeeklyTask', ['managerHeaders' => $managerHeaders, 'today' => $today]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

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
}
