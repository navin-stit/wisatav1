<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserPermissions;
use App\Models\Taggable;
use App\Models\logbook\logbookHeader;
use App\Models\logbook\logbookDetails;
use App\Models\manager\managertaskHeader;
use App\Models\manager\managertaskDetails;
use App\Models\frontdesk\frontdeskHeader;
use App\Models\frontdesk\frontdeskDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class AdminViewController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*  Logbook Start  */

    public function viewLogBook() {
        $today = date('Y-m-d');    
        $weekDates = array();
        $weekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']; 
        foreach($weekDays as $days)
		{
		 	$day_value = date('Y-m-d', strtotime($days . ' this week'));
		 	array_push($weekDates,$day_value); 	
		}         
        $lookbookHeaders = logbookHeader::select('*')->whereIn('logbookdate',$weekDates)->with('logbookDetails')->get();         
        return view('admin/adminView/logbook/viewNewLogBook', ['lokbookHeaders' => $lookbookHeaders, 'today' => $today]);
    }
    public function deleteLogBookNotes(Request $request)
    {
		if ($request->isMethod('post')) {          
            $posts = $request->post();
            $id = $request->user()->id;
            $is_deleted = DB::delete("Delete from log_book_details where logbookdetailid = {$posts['item']}");
            if($is_deleted > 0)
				echo json_encode(array('status'=>true,'message'=>'Deleted Successfully!'));	
			else
            	echo json_encode(array('status'=>FALSE,'message'=>'Something Wrong! Try Again Later.'));	
        }
	}
    public function saveLogBook(Request $request)
    {
    	$response = array('status'=>FALSE,'message'=>'','can_delete'=>FALSE,'can_edit'=>FALSE,'id'=>0);
		if ($request->isMethod('post')) {          
            $posts = $request->post();
            $id = $request->user()->id;
            $is_insert = DB::insert('insert into log_book_details (logbookheaderid,notes,created_at,updated_at,createdbyid) values(?,?,?,?,?)',[$posts['item'],$posts['anotherValue'],time(),time(),$id]);
            if($is_insert > 0)
            {
            	$response['status'] = TRUE;
            	$response['id'] = DB::getPdo()->lastInsertId();
				foreach (Session::get('userPermissionDetail') as $userPermissionDetail)
				{
					if($userPermissionDetail->delete === 1)
						$response['can_delete'] = TRUE;
					if($userPermissionDetail->edit === 1)
						$response['can_edit'] = TRUE;
				}
				$response['message'] = 'Saved Successfully';
			}
        }
        echo json_encode($response);
	}
    public function updateLogBook(Request $request)
    {
		if ($request->isMethod('post')) {          
            $posts = $request->post();
            $id = $request->user()->id;
            $is_updated = DB::update('update log_book_details set notes = ? , updated_at = ? where logbookdetailid = ?', [$posts['anotherValue'] , time() ,$posts['item']]);
            if($is_updated >= 0)
				echo json_encode(array('status'=>true,'message'=>'Updated Successfully!'));	
			else
            	echo json_encode(array('status'=>FALSE,'message'=>'Something Wrong! Try Again Later.'));
        }
	}
    public function addLogbokView(Request $request) 
    { 
        return view('admin/adminView/logbook/addNewLogBook');        
    }  
     
   public function addNewLogBook(Request $request) {     
        if ($request->isMethod('post')) {          
            $posts = $request->post();
            $postData = new logbookDetails();
            $postData->createdbyid = $posts['createdbyid'];
            $postData->logbookheaderid = $posts['logbookheaderid'];            
            $postData->notes = $posts['notes'];        
            //print_r('<pre>' .$postData );exit;
            $postData->save();
        }
      return  redirect('admin/view-logbok');
    }
    
     
    public function postHeaderId(Request $request) 
    {
        if($request->isMethod('post'))
        {
            $posts = $request->post();
           // print_r($posts['logbookheaderid']);exit;
        }
    }
    
    /*  Logbook End  */
	/* Manager Start */
    public function addManagerTask() {
    	$today = date('Y-m-d');
        $weekDates = array();
        $weekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']; 
        foreach($weekDays as $days)
		{
		 	$day_value = date('Y-m-d', strtotime($days . ' this week'));
		 	array_push($weekDates,$day_value); 	
		}
        $managerHeaders = managerTaskHeader::select('*')->whereIn('managerweeklydate',$weekDates)->with('managerTaskDetails')->get(); 
		return view('admin/adminView/manager/viewManagerTask', ['managerHeaders' => $managerHeaders, 'today' => $today]);
    }
	public function deleteManagerTask(Request $request)
    {
		if ($request->isMethod('post')) {          
            $posts = $request->post();
            $id = $request->user()->id;
            $is_deleted = DB::delete("Delete from manager_weekly_details where managerweeklydetailid = {$posts['item']}");
            if($is_deleted > 0)
				echo json_encode(array('status'=>true,'message'=>'Deleted Successfully!'));	
			else
            	echo json_encode(array('status'=>FALSE,'message'=>'Something Wrong! Try Again Later.'));	
        }
	}
    public function saveManagerTask(Request $request)
    {
    	$response = array('status'=>FALSE,'message'=>'','can_delete'=>FALSE,'can_edit'=>FALSE,'id'=>0);
		if ($request->isMethod('post')) {          
            $posts = $request->post();
            $id = $request->user()->id;
            $is_insert = DB::insert('insert into manager_weekly_details (managerweeklyheaderid,description,iscompleted,completedon,completedbyid,created_at,updated_at,createdbyid) values(?,?,?,?,?,?,?,?)',[$posts['item'],$posts['anotherValue'],0,'0000-00-00 00:00:00',0,date('Y-m-d h:i:s'),date('Y-m-d h:i:s'),$id]);
            if($is_insert > 0)
            {
            	$response['status'] = TRUE;
            	$response['id'] = DB::getPdo()->lastInsertId();
				foreach (Session::get('userPermissionDetail') as $userPermissionDetail)
				{
					if($userPermissionDetail->delete === 1)
						$response['can_delete'] = TRUE;
					if($userPermissionDetail->edit === 1)
						$response['can_edit'] = TRUE;
				}
				$response['message'] = 'Saved Successfully';
			}
        }
        echo json_encode($response);
	}
    public function updateManagerTask(Request $request)
    {
		if ($request->isMethod('post')) {          
            $posts = $request->post();
            $id = $request->user()->id;
            $is_updated = DB::update('update manager_weekly_details set description = ? , updated_at = ? where managerweeklydetailid = ?', [$posts['anotherValue'] , date('Y-m-d h:i:s') ,$posts['item']]);
            if($is_updated >= 0)
				echo json_encode(array('status'=>true,'message'=>'Updated Successfully!'));	
			else
            	echo json_encode(array('status'=>FALSE,'message'=>'Something Wrong! Try Again Later.'));
        }
	}
	public function updateManagerFutureTask(Request $request)
	{
		if ($request->isMethod('post')) {          
            $posts = $request->post();           
            $id = $request->user()->id;
            $response = array();
            if(sizeof($posts['tasks'])>0)
            {
            	$dates = explode(",",$posts['fDates']);  
            	foreach($dates as $fdate)
				{
					$unixTimestamp = strtotime($fdate);
					$dayOfWeek = date("l", $unixTimestamp);
					$is_insert_id = DB::insert('insert into manager_weekly_headers (managerweeklydate,managerweeklytitle,created_at,updated_at,createdbyid) values(?,?,?,?,?)',[date('Y-m-d',$unixTimestamp),$dayOfWeek,date('Y-m-d h:i:s'),date('Y-m-d h:i:s'),$id]);
					$IDD = DB::getPdo()->lastInsertId();
					foreach($posts['tasks'] as $task)
					{
						$existingTask = DB::select("Select * from manager_weekly_details where managerweeklydetailid=".$task);					
						$is_insert = DB::insert('insert into manager_weekly_details (managerweeklyheaderid,description,iscompleted,completedon,completedbyid,created_at,updated_at,createdbyid) values(?,?,?,?,?,?,?,?)',[$IDD,$existingTask[0]->description,0,'0000-00-00 00:00:00',0,date('Y-m-d h:i:s'),date('Y-m-d h:i:s'),$id]);
						if($is_insert >0)
						{
							$response['status'] = TRUE;
						}
						
					}
				}
			}
			echo json_encode($response);
        }
	}
	public function updateManagerTaskStatus(Request $request)
	{
		if ($request->isMethod('post')) {          
            $posts = $request->post();
            $id = $request->user()->id;
            $is_updated = DB::update('update manager_weekly_details set iscompleted = ? , completedon = ?, completedbyid = ? where managerweeklydetailid = ?', [1,date('Y-m-d h:i:s') ,$id, $posts['item']]);
            if($is_updated >= 0)
				echo json_encode(array('status'=>true,'message'=>'Updated Successfully!'));	
			else
            	echo json_encode(array('status'=>FALSE,'message'=>'Something Wrong! Try Again Later.'));
        }
	}
	/* Front Desk Start */
    public function addFrontDeskDailyTask() {
    	$today = date('Y-m-d');
        $weekDates = array();
        $weekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']; 
        foreach($weekDays as $days)
		{
		 	$day_value = date('Y-m-d', strtotime($days . ' this week'));
		 	array_push($weekDates,$day_value); 	
		}
        $frontTaskHeaders = frontdeskHeader::select('*')->whereIn('frontdeskdailydate',$weekDates)->with('frontdeskDetails')->get(); 
		return view('admin/adminView/front-desk/viewFrontDeskDailyTask', ['frontTaskHeaders' => $frontTaskHeaders, 'today' => $today]);        
    }
	public function deleteFrontTask(Request $request)
    {
		if ($request->isMethod('post')) {          
            $posts = $request->post();
            $id = $request->user()->id;
            $is_deleted = DB::delete("Delete from front_desk_daily_details where frontdeskdailydetailid = {$posts['item']}");
            if($is_deleted > 0)
				echo json_encode(array('status'=>true,'message'=>'Deleted Successfully!'));	
			else
            	echo json_encode(array('status'=>FALSE,'message'=>'Something Wrong! Try Again Later.'));	
        }
	}
    public function saveFronTask(Request $request)
    {
    	$response = array('status'=>FALSE,'message'=>'','can_delete'=>FALSE,'can_edit'=>FALSE,'id'=>0);
		if ($request->isMethod('post')) {          
            $posts = $request->post();
            $id = $request->user()->id;
            $is_insert = DB::insert('insert into front_desk_daily_details (frontdeskdailyheaderid,description,ispriority,iscompleted,completedon,completedbyid,startdatetime,enddatetime,created_at,updated_at,createdbyid) values(?,?,?,?,?,?,?,?,?,?,?)',[$posts['item'],$posts['anotherValue'],0,0,'0000-00-00 00:00:00',0,date('Y-m-d h:i:s'),date('Y-m-d h:i:s'),date('Y-m-d h:i:s'),date('Y-m-d h:i:s'),$id]);
            if($is_insert > 0)
            {
            	$response['status'] = TRUE;
            	$response['id'] = DB::getPdo()->lastInsertId();
				foreach (Session::get('userPermissionDetail') as $userPermissionDetail)
				{
					if($userPermissionDetail->delete === 1)
						$response['can_delete'] = TRUE;
					if($userPermissionDetail->edit === 1)
						$response['can_edit'] = TRUE;
				}
				$response['message'] = 'Saved Successfully';
			}
        }
        echo json_encode($response);
	}
    public function updateFrontTask(Request $request)
    {
		if ($request->isMethod('post')) {          
            $posts = $request->post();
            $id = $request->user()->id;
            $is_updated = DB::update('update front_desk_daily_details set description = ? , updated_at = ? where frontdeskdailydetailid = ?', [$posts['anotherValue'] , date('Y-m-d h:i:s') ,$posts['item']]);
            if($is_updated >= 0)
				echo json_encode(array('status'=>true,'message'=>'Updated Successfully!'));	
			else
            	echo json_encode(array('status'=>FALSE,'message'=>'Something Wrong! Try Again Later.'));
        }
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
