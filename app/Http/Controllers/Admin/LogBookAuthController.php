<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserPermissions;
use App\Models\logbook\logbookHeader;
use App\Models\logbook\logbookDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogBookAuthController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLogBook() {
        $today = date('Y-m-d');
        $data = logbookHeader::select('*')
                ->with('logbookDetails')
                ->get();
//        $userData = User::select('*')
//                ->with('user_permissions')
//                ->get();
//                , 'user_data' => $userData
       // print_r($userData);exit;
        return view('admin/logbook/logbook', ['data' => $data, 'today' => $today]);
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
