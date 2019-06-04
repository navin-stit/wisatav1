@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Tasks
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link rel="stylesheet" href="{{ asset('css/pages/todolist.css') }}"/>
<meta name="_token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css') }}">
<!-- end of page level css -->
<style>
    .datetimepicker-dropdown-bottom-left:before{
        right:inherit;
    }
    .todolist .row
    {
        display: block;
    }
    .todolist [class*="col-"] {
        float: none;
        display: inline-block;
        vertical-align: top;
    }
    .todolist .col-lg-9,.col-md-9
    {
        width:83%;
    }
</style>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Add Logbook</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Tasks</li>
    </ol>
</section>
<!--section ends-->
<section class="content pl-3 pr-3">
    <div class="row">
        <!-- To do list -->
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
            <div class="card todolist">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title">
                        <i class="livicon" data-name="medal" data-size="18" data-color="white" data-hc="white"
                           data-l="true"></i>
                        To Do List
                    </h4>
                </div>
                <div class="card-body nopadmar">
                    <div class="card-body">
                        <div class="scroller_height">
                            <div class="row list_of_items">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="add_list adds p-0 pb-2 mb-4">
                        <!--basic form starts-->                      
                            <div class="card " id="hidepanel1">                               
                                <div class="card-body">
                                    <form class="form-horizontal" action="{{ route('admin.addLogbokToDb') }}" method="post">
                                        <!-- CSRF Token -->
                                        @csrf                                        
                                        <!-- Name input-->                                                                                     				<div>
                                        <input id="name" name="createdbyid" type="hidden" value="{{ Sentinel::getUser()->id }}"  class="form-control">
                                        <input id="headerId" name="logbookheaderid" type="hidden" value="{{ Request::get('id') }}"  class="form-control"></div>
                                         
                                          <!-- Name input-->
                                        <div class="form-group pl-4">
                                            <div class="row">
                                                <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Notes</label>
                                                <div class="col-md-9 col-lg-9 col-12">
                                                    <input id="name" name="notes" type="text" placeholder="Add Notes" class="form-control"></div>
                                            </div>
                                        </div>                                       
                                        <div class="form-position pl-4 pb-4">
                                            <div class="row">
                                                <div class="col-md-12  col-sm-12 col-12  col-lg-12 ">
                                                    <button type="submit" class="btn btn-responsive btn-primary btn-md" style="letter-spacing:1px">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                     
                        <!--basic form 2 starts-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- content -->
<div class="modal fade" id="editConfirmModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alert</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>You are already editing a row, you must save or cancel that row before edit/delete a new row</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('vendors/moment/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pages/tasklist.js') }}"></script>

<script>
var currentDate = new Date();
$(".datepicker").datetimepicker({
    startDate: currentDate,
    format: "yyyy/mm/dd",
    autoclose: true,
    time: false,
    pickerPosition: "bottom-right",
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
});
</script>
@stop
