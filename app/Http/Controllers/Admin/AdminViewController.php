<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserPermissions;
use App\Models\Taggable;
use App\Models\logbook\logbookHeader;
use App\Models\logbook\logbookDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminViewController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*  Logbook Start  */

    public function viewLogBook() {
        $today = date('Y-m-d');
        $lookbookHeaders = logbookHeader::select('*')
                ->with('logbookDetails')
                ->get();
        return view('admin/adminView/logbook/viewNewLogBook', ['lokbookHeaders' => $lookbookHeaders, 'today' => $today]);
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

    public function addManagerTask() {
        return view('admin/adminView/manager/viewManagerTask');
    }

    public function addFrontDeskDailyTask() {
        return view('admin/adminView/front-desk/viewFrontDeskDailyTask');
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
