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
        height: 200px !important;
    }
    .onHover:hover{
        background-color:#418bca!important;
        color:white!important;
    }
    .onHover{
      font-size:14px;letter-spacing: 1px;font-family: roboto
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
    <div class="card-header bg-primary text-white ">
        <span style="font-size:16px;letter-spacing: 1px;font-family: roboto">
            <!--<i class="livicon" data-name="printer" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>-->
            <i class="livicon" data-name="tasks" data-size="13" data-c="#fff"
               data-hc="white" data-loop="true"></i>
            Manager Weekly Task
        </span>
        <span class="float-right ">
            <i class="fa fa-chevron-up clickable"></i>
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
                    <a href="{{ route('admin.add-task') }}" class="nav-link btn btn-primary rounded btn-xs py-1 px-2 onHover">Admin View</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content" style="height:200px!important">               
                <div class="tab-pane fade show active in  mt-3 ml-3" id="monday">
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
                <div class="tab-pane fade  mt-3 ml-3" id="tuesday">
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
                <div class="tab-pane fade  mt-3 ml-3" id="wednesday">
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
                <div class="tab-pane fade  mt-3 ml-3" id="thursday">
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
                <div class="tab-pane fade  mt-3 ml-3" id="friday">
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
                <div class="tab-pane fade  mt-3 ml-3" id="saturday">
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
                <div class="tab-pane fade mt-3 ml-3" id="sunday">
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
            <div class="ml-3 d-flex" style="font-size:16px;letter-spacing: 1px;font-family: roboto">
                <a href="#" class="underlineOnHover "> Select All
                    <span class="ml-1">  | </span>
                </a>
                <a href="#" class="underlineOnHover ml-1"> Un-Select All </a>
                <div class="mx-4">
                    <a href="#" class="btn btn-primary  rounded py-1 px-4 ">Save</a>
                </div>
                <div class="mr-4">
                    <a href="#" class="btn btn-danger rounded py-1 px-4 ">Cancel</a>
                </div>
<!--                <div class="mr-4">
                    <a href="#" class="btn btn-danger rounded py-1 px-4 onHover">Delete</a>
                </div>-->
            </div>
        </div>        
    </div> 
</div>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
@stop
