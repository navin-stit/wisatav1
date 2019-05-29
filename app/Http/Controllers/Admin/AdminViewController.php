<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserPermissions;
use App\Models\Taggable;
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
        return view('admin/adminView/logbook/viewNewLogBook');
    }

    public function addNewLogBook(Request $request) {
        if ($request->isMethod('get')) {
            return view('admin/adminView/logbook/addNewLogBook');
        }
        if($request->isMethod('post')){
            $posts = $request->post();
           print_r('<pre>'.$posts);exit;
//            $data = new logbookDetails();
//            $data->notes = $posts['notes']; 
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
