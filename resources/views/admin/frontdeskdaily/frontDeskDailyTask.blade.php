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
        <span style="font-size:15px;letter-spacing: 1px;font-family: roboto">
            <!--<i class="livicon" data-name="printer" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>-->
            <i class="livicon" data-name="tasks" data-size="12" data-c="#fff"
               data-hc="white" data-loop="true"></i>
            Front Desk Daily Task
        </span>
        <span class="float-right pt-1" style="font-size:14px;letter-spacing: 1px;font-family: roboto">
            Today's Date : {!! date('Y-M-d') !!}
            <i class="fa fa-chevron-up clickable ml-3"></i>
        </span>
    </div>
    <div class="card-body">
        <div class="bs-example">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">               
               @foreach ($frontdeskHeaders as $headers)  
                <li class="nav-item pb-2">
                    <a href="#id{{ $headers->logbookheaderid }}"  data-toggle="tab"  class="nav-link {{ ($headers->frontdeskdailydate==$today) ? 'active' : ''  }}" style="padding-bottom:0px!important">
                        {{ $headers->frontdeskdailytitle }}
                    </a>
                    <span style="font-size:12px;text-align:center;display:block;">
                        {{ $headers->frontdeskdailydate }}
                    </span>  
                </li>  
                @endforeach
                @foreach (Session::get('userPermissionDetail') as $userPermissionDetail)
<!--               {{ $userPermissionDetail }}           -->
                @if( $userPermissionDetail->userid ==  Sentinel::getUser()->id ) 
                @if( $userPermissionDetail->edit == 1 )
                <li class=" nav-item  ml-auto">
                    <a href="{{ route('admin.add-front-desk-task') }}" class="nav-link btn btn-primary rounded btn-xs py-1 px-2 onHover">Admin View</a>
                </li>                   
                @endif
                @endif
                @endforeach                  
            </ul>
            <div id="myTabContent" class="tab-content" style="height:200px!important">  
            	@foreach ($frontdeskHeaders as $headers)
                <div @if( $headers->frontdeskdailydate == $today ) class="tab-pane fade show active in" @else class="tab-pane fade" @endif  id="id{{ $headers->frontdeskdailyheaderid }}">
                      @if( sizeof($headers->frontdeskDetails )>0)
                      @php $counter =1;@endphp
                      @foreach ($headers->frontdeskDetails as $details)
                      <p class="notes_list">                      
                        {{ $details->description }}
                      </p>
                    	@php $counter++ @endphp
                    @endforeach
                    @else
                    	 <p class="_blank">Task Not Created for this date!</p>
                    @endif
                    @if( sizeof($headers->frontdeskDetails )>0)
                    
                    <div class="ml-3 d-flex" style="font-size:16px;letter-spacing:1px;font-family:roboto;position:absolute;bottom:0;">                    	
		                 <div class="form-check abc-checkbox abc-checkbox-primary">
	                        <input class="form-check-input _selectAll" id="check_{{ $headers->managerweeklyheaderid }}" type="checkbox" aria-label="Single checkbox Two">
	                        <label class="form-check-label" for="check_{{ $headers->managerweeklyheaderid }}">Select All</label>
	                    </div>		                
		                <div class="mx-4">
		                    <a href="#" class="btn btn-primary  rounded py-1 px-4 ">Save</a>
		                </div>
		                <div class="mr-4">
		                    <a href="#" class="btn btn-danger rounded py-1 px-4 ">Cancel</a>
		                </div>
		            </div>
		            @endif
                </div> 
                @endforeach  
            </div> 
        </div>        
    </div> 
</div>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
@stop
