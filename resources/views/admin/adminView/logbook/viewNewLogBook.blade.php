@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
Accordion Tabs
@parent
@stop
{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('css/pages/tab.css') }}" />
<style>
    .slimScrollDiv, .tab-content{
        height: auto !important;
    }
    .onHover:hover{
        background-color:#418bca!important;
        color:white!important;
    }
    .onHover{
        font-size:14px;
        letter-spacing: 1px;
        font-family: roboto
    }
    .underlineOnHover{
        text-decoration: underline!important;
    }

    @media (min-width:320px) and (max-width:425px){
        .popover.left{
            width:100px !important;
        }
    }
    .nav-tabs .nav-link:hover {
        text-decoration: none;
        background-color: #eee ;
    }
    .nav-pills .nav-link:hover {
        text-decoration: none;
        background-color: #eee ;
    }
    .btn-light:hover{
        color: #fff;
    }
    .tab_panel .nav-link:active{
        background-color: rgba(255, 255, 255, .23);
    }
</style>
@stop

{{-- Page content --}}
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white" style="font-size:15px;letter-spacing:1px;font-family: roboto">
        <span >
            <i class="livicon" data-name="tasks" data-size="13" data-loop="true" data-c="#fff" data-hc="white"></i>
            Log Book Notes – Add New Log Book 
        </span>      
        <span class="float-right pt-1">
            Log Book Date : {!! date('Y-M-d') !!}
            <i class="fa fa-chevron-up clickable ml-3"></i>
        </span>
    </div>
    <div class="card-body">
        <div class="bs-example">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">               
                <li class="nav-item">
                    <a href="#monday" data-toggle="tab" class="nav-link active">Monday</a>
                </li>
                <li class="nav-item">
                    <a href="#tuesday" data-toggle="tab" class="nav-link">Tuesday</a>
                </li>
                <li class="nav-item">
                    <a href="#wednesday" data-toggle="tab" class="nav-link">Wednesday</a>
                </li>
                <li class="nav-item">
                    <a href="#thursday" data-toggle="tab" class="nav-link">Thursday</a>
                </li>
                <li class="nav-item">
                    <a href="#friday" data-toggle="tab" class="nav-link">Friday</a>
                </li>
                <li class="nav-item">
                    <a href="#saturday" data-toggle="tab" class="nav-link">Saturday</a>
                </li>
                <li class=" nav-item ">
                    <a href="#sunday" data-toggle="tab" class="nav-link">Sunday</a>
                </li>
                <li class=" nav-item  ml-auto">
                    <a href="{{ route('admin.add-logbook') }}" class="nav-link btn btn-primary rounded btn-xs py-1 px-2 onHover">Add Logbook</a>
                </li>
                 <li class=" nav-item  ml-auto">
                    <a href="#" class="nav-link btn btn-primary rounded btn-xs py-1 px-2 onHover">Add Notes</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content" style="height:200px!important">               
                <div class="tab-pane fade show active in  mt-3 ml-3" id="monday">
                    <!--                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="singleCheckbox2" value="option2" checked aria-label="Single checkbox Two">
                                            <label class="form-check-label" for="singleCheckbox2">
                                            </label>
                                        </div>-->
                    <div class="portlet box bg-primary text-white mb-4">
                        <div class="portlet-title">
                            <!--                            <div class="caption">
                                                            <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Simple Table
                                                        </div>-->
                        </div>
                        <div class="portlet-body bg-white p-2">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th> Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>Airi Satou</td>
                                            <td>Kelly</td>
                                            <td>Satou124</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Angelica</td>
                                            <td>Ramos</td>
                                            <td>Angelica343</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Ashton</td>
                                            <td>Cox</td>
                                            <td>Cox111</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>                                           
                                            <td>Bradley</td>
                                            <td>Greer</td>
                                            <td>Bradley</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade  mt-3 ml-3" id="tuesday">
                    <div class="portlet box bg-primary text-white mb-4">
                        <div class="portlet-title">
                            <!--                            <div class="caption">
                                                            <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Simple Table
                                                        </div>-->
                        </div>
                        <div class="portlet-body bg-white p-2">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th> Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>Airi Satou</td>
                                            <td>Kelly</td>
                                            <td>Satou124</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Angelica</td>
                                            <td>Ramos</td>
                                            <td>Angelica343</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Ashton</td>
                                            <td>Cox</td>
                                            <td>Cox111</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>                                           
                                            <td>Bradley</td>
                                            <td>Greer</td>
                                            <td>Bradley</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade  mt-3 ml-3" id="wednesday">
                    <div class="portlet box bg-primary text-white mb-4">
                        <div class="portlet-title">
                            <!--                            <div class="caption">
                                                            <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Simple Table
                                                        </div>-->
                        </div>
                        <div class="portlet-body bg-white p-2">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th> Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>Airi Satou</td>
                                            <td>Kelly</td>
                                            <td>Satou124</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Angelica</td>
                                            <td>Ramos</td>
                                            <td>Angelica343</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Ashton</td>
                                            <td>Cox</td>
                                            <td>Cox111</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>                                           
                                            <td>Bradley</td>
                                            <td>Greer</td>
                                            <td>Bradley</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade  mt-3 ml-3" id="thursday">
                    <div class="portlet box bg-primary text-white mb-4">
                        <div class="portlet-title">
                            <!--                            <div class="caption">
                                                            <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Simple Table
                                                        </div>-->
                        </div>
                        <div class="portlet-body bg-white p-2">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th> Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>Airi Satou</td>
                                            <td>Kelly</td>
                                            <td>Satou124</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Angelica</td>
                                            <td>Ramos</td>
                                            <td>Angelica343</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Ashton</td>
                                            <td>Cox</td>
                                            <td>Cox111</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>                                           
                                            <td>Bradley</td>
                                            <td>Greer</td>
                                            <td>Bradley</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade  mt-3 ml-3" id="friday">
                    <div class="portlet box bg-primary text-white mb-4">
                        <div class="portlet-title">
                            <!--                            <div class="caption">
                                                            <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Simple Table
                                                        </div>-->
                        </div>
                        <div class="portlet-body bg-white p-2">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th> Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>Airi Satou</td>
                                            <td>Kelly</td>
                                            <td>Satou124</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Angelica</td>
                                            <td>Ramos</td>
                                            <td>Angelica343</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Ashton</td>
                                            <td>Cox</td>
                                            <td>Cox111</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>                                           
                                            <td>Bradley</td>
                                            <td>Greer</td>
                                            <td>Bradley</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade  mt-3 ml-3" id="saturday">
                    <div class="portlet box bg-primary text-white mb-4">
                        <div class="portlet-title">
                            <!--                            <div class="caption">
                                                            <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Simple Table
                                                        </div>-->
                        </div>
                        <div class="portlet-body bg-white p-2">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th> Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>Airi Satou</td>
                                            <td>Kelly</td>
                                            <td>Satou124</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Angelica</td>
                                            <td>Ramos</td>
                                            <td>Angelica343</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Ashton</td>
                                            <td>Cox</td>
                                            <td>Cox111</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>                                           
                                            <td>Bradley</td>
                                            <td>Greer</td>
                                            <td>Bradley</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade  mt-3 ml-3" id="sunday">
                    <!--                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                            <input class="form-check-input" type="checkbox" id="singleCheckbox2" value="option2" checked aria-label="Single checkbox Two">
                                            <label class="form-check-label" for="singleCheckbox2">Order USA Today
                                            </label>
                                        </div>-->
                    <div class="portlet box bg-primary text-white mb-4">
                        <div class="portlet-title">
                            <!--                            <div class="caption">
                                                            <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Simple Table
                                                        </div>-->
                        </div>
                        <div class="portlet-body bg-white p-2">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th> Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>Airi Satou</td>
                                            <td>Kelly</td>
                                            <td>Satou124</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Angelica</td>
                                            <td>Ramos</td>
                                            <td>Angelica343</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Ashton</td>
                                            <td>Cox</td>
                                            <td>Cox111</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>                                           
                                            <td>Bradley</td>
                                            <td>Greer</td>
                                            <td>Bradley</td>
                                            <td>

                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="dropdown1">
                    <div class="form-check abc-checkbox abc-checkbox-primary">
                        <input class="form-check-input" type="checkbox" id="singleCheckbox2" value="option2" checked aria-label="Single checkbox Two">
                        <label class="form-check-label" for="singleCheckbox2">Order USA Today
                        </label>
                    </div>
                    <div class="form-check abc-checkbox abc-checkbox-primary mt-3 ">
                        <input class="form-check-input" type="checkbox" id="singleCheckbox2" value="option2"  aria-label="Single checkbox Two">
                        <label class="form-check-label" for="singleCheckbox2">Order Coffee
                        </label>
                    </div>
                    <div class="form-check abc-checkbox abc-checkbox-primary mt-3">
                        <input class="form-check-input" type="checkbox" id="singleCheckbox2" value="option2"  aria-label="Single checkbox Two">
                        <label class="form-check-label" for="singleCheckbox2">Order Washing Detergent
                        </label>
                    </div>
                    <div class="form-check abc-checkbox abc-checkbox-primary mt-3">
                        <input class="form-check-input" type="checkbox" id="singleCheckbox2" value="option2"  aria-label="Single checkbox Two">
                        <label class="form-check-label" for="singleCheckbox2">Order Blue Ribbon
                        </label>
                    </div>
                </div> 
            </div>   
            <div class="ml-3 d-flex" style="font-size:15px;letter-spacing: 1px;font-family: roboto">
                <a href="#" class="underlineOnHover "> Select All
                    <span class="ml-1">  | </span>
                </a>
                <a href="#" class="underlineOnHover ml-1"> Un-Select All </a>
                <div class="mx-4">
                    <a href="#" class="btn btn-primary  rounded py-1 px-4 ">Save</a>
                </div>
<!--                <div class="mr-4">
                    <a href="#" class="btn btn-success rounded py-1 px-4">Copy</a>
                </div>-->
                <div class="mr-4 ml-auto">
                    <a href="#" class="btn btn-danger rounded py-1 px-4 ">Cancel</a>
                </div>                
            </div>
        </div>        
    </div> 
</div>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
@stop
