<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\frontdesk\frontdeskHeader;
use DB;

class FrontDeskDailyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewFrontDesk(Request $request)
    {    	
    	$today = date('Y-m-d');
        $weekDates = array();
        $weekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']; 
        foreach($weekDays as $days)
		{
		 	$day_value = date('Y-m-d', strtotime($days . ' this week'));
		 	array_push($weekDates,$day_value); 	
		}
        $frontdeskHeaders = DB::table('front_desk_daily_headers')->select('*')->whereIn('frontdeskdailydate',$weekDates)->get(); 
        if(sizeof($frontdeskHeaders)<=0)
        {			 
        	 $not_exits = array();
			 $id = $request->user()->id;
			 foreach($weekDays as $days)
			 {
			 	$day_value = date('Y-m-d', strtotime($days . ' this week'));
			 	DB::insert('insert into front_desk_daily_headers (frontdeskdailydate,frontdeskdailytitle,created_at,updated_at,createdbyid) values(?,?,?,?,?)',[$day_value,$days,time(),time(),$id]); 
			 	array_push($not_exits,array($day_value,$days,time(),time(),$id));
			 }			 
		}
		else
		{
			$not_exits = array();
			foreach($weekDays as $days)
			{				
				$is_day_exists = FALSE;
			 	$day_value = date('Y-m-d', strtotime($days . ' this week'));
			 	foreach($frontdeskHeaders as $headers)
				{
					if($day_value == $headers->frontdeskdailydate)
					{
						$is_day_exists = TRUE;
					}
				}
				if($is_day_exists === FALSE)
				{
					$id = $request->user()->id;
					DB::insert('insert into front_desk_daily_headers (frontdeskdailydate,frontdeskdailytitle,created_at,updated_at,createdbyid) values(?,?,?,?,?)',[$day_value,$days,time(),time(),$id]); 
					array_push($not_exits,array($day_value,$days,time(),time(),$id));
				}
			}
		}
		$frontdeskHeaders = frontdeskHeader::select('*')->whereIn('frontdeskdailydate',$weekDates)->with('frontdeskDetails')->get(); 
		return view('admin/frontdeskdaily/frontDeskDailyTask', ['frontdeskHeaders' => $frontdeskHeaders, 'today' => $today]);        
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
}
