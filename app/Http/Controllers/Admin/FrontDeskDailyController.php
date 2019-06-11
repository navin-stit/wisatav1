<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\frontdesk\frontdeskHeader;
use DB;

class FrontDeskDailyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewFrontDesk(Request $request) {
        $today = date('Y-m-d');
        $weekDates = array();
        $starttime = '9:00';
        $endtime = '15:00';
        $duration = '60';

        $array_of_time = array();
        $start_time = strtotime($starttime);
        $end_time = strtotime($endtime);
        $add_mins = $duration * 60;

        $frontdeskHeaders = DB::table('front_desk_daily_headers')->select('*')->where('frontdeskdailydate', $today)->get();
        $response = array();
        if (sizeof($frontdeskHeaders) <= 0) {
            $id = $request->user()->id;
            $days = date('l');
            $day_value = date('Y-m-d', strtotime($days . ' this week'));
            DB::insert('insert into front_desk_daily_headers (frontdeskdailydate,frontdeskdailytitle,created_at,updated_at,createdbyid) values(?,?,?,?,?)', [$day_value, $days, date('Y-m-d h:i:s'), date('Y-m-d h:i:s'), $id]);
            $frontdeskHeaders = DB::table('front_desk_daily_headers')->select('*')->where('frontdeskdailydate', $today)->get();
            $response['frontdeskHeaders'] = $frontdeskHeaders;
            $response['dates'] = array();
            while ($start_time <= $end_time) {
                $etime = $start_time + (59 * 60);
                $array_of_time[] = date("H:i", $start_time) . '-' . date("H:i", $etime);
                if (!array_key_exists(date("H:i", $start_time) . '-' . date("H:i", $etime), $response['dates'])) {
                    $response['dates'][date("H:i", $start_time) . '-' . date("H:i", $etime)] = array();
                }
                $start_time += $add_mins;
            }
            $response['dates'] = $array_of_time;
        } else {
            $response['frontdeskHeaders'] = $frontdeskHeaders;
            $response['dates'] = array();
            while ($start_time <= $end_time) {
                $etime = $start_time + (59 * 60);
                $array_of_time[] = date("H:i", $start_time) . '-' . date("H:i", $etime);
                if (!array_key_exists(date("H:i", $start_time) . '-' . date("H:i", $etime), $response['dates'])) {
                    $response['dates'][date("H:i", $start_time) . '-' . date("H:i", $etime)] = array();
                }

                $frontdeskDetails = DB::table('front_desk_daily_details')->select('*')->where(array('startdatetime' => date('Y-m-d ' . date("H:i", $start_time)), 'enddatetime' => date('Y-m-d ' . date("H:i", $etime))))->get();
                if (sizeof($frontdeskDetails) > 0) 
                {
                    $response['dates'][date("H:i", $start_time) . '-' . date("H:i", $etime)] = $frontdeskDetails;
                }
                $start_time += $add_mins;
            }
        }
        //print_r($response);
        return view('admin/frontdeskdaily/frontDeskDailyTask', ['frontdeskHeaders' => $response]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
