<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\UserPermissions;
use App\Models\logbook\logbookHeader;
use App\Models\logbook\logbookDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use DB;
class LogBookAuthController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLogBook(Request $request) {
        $today = date('Y-m-d');
        $lookbookHeaders = logbookHeader::select('*')->with('logbookDetails')->get(); 
        $weekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];      
        if(sizeof($lookbookHeaders)<=0)
        {			 
        	 $not_exits = array();
			 $id = $request->user()->id;
			 foreach($weekDays as $days)
			 {
			 	$day_value = date('Y-m-d', strtotime($days . ' this week'));
			 	DB::insert('insert into log_book_headers (logbookdate,logbooktitle,created_at,updated_at,createdbyid) values(?,?,?,?,?)',[$day_value,$days,time(),time(),$id]); 
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
			 	foreach($lookbookHeaders as $headers)
				{
					if($day_value == $headers->logbookdate)
					{
						$is_day_exists = TRUE;
					}
				}
				if($is_day_exists === FALSE)
				{
					$id = $request->user()->id;
					DB::insert('insert into log_book_headers (logbookdate,logbooktitle,created_at,updated_at,createdbyid) values(?,?,?,?,?)',[$day_value,$days,time(),time(),$id]); 
					array_push($not_exits,array($day_value,$days,time(),time(),$id));
				}
			}
		}
		$lookbookHeaders = logbookHeader::select('*')->with('logbookDetails')->get(); 
		return view('admin/logbook/logbook', ['lokbookHeaders' => $lookbookHeaders, 'today' => $today]);
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
