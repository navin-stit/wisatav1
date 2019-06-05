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
            	@foreach ($managerHeaders as $headers)  
                <li class="nav-item pb-2">
                    <a href="#id{{ $headers->managerweeklyheaderid }}"  data-toggle="tab"  class="nav-link {{ ($headers->managerweeklydate==$today) ? 'active' : ''  }}" style="padding-bottom:0px!important">
                        {{ $headers->managerweeklytitle }}
                    </a>
                    <span style="font-size:12px;text-align:center;display:block;">
                        {{ $headers->managerweeklydate }}
                    </span>  
                </li>  
                @endforeach      
               @foreach (Session::get('userPermissionDetail') as $userPermissionDetail)
                @if( $userPermissionDetail->userid ===  Sentinel::getUser()->id ) 
                @if( $userPermissionDetail->edit === 1 )
                <li class=" nav-item  ml-auto">
                    <a href="{{ route('admin.add-task') }}" class="nav-link btn btn-primary rounded btn-xs py-1 px-2 onHover">Admin View</a>
                </li>                   
                @endif
                @endif
                @endforeach 
            </ul>
            <div id="myTabContent" class="tab-content">   
                @foreach ($managerHeaders as $headers)
                <div @if( $headers->managerweeklydate == $today ) class="tab-pane fade show active in" @else class="tab-pane fade" @endif  id="id{{ $headers->managerweeklyheaderid }}">
                      @if( sizeof($headers->managerTaskDetails )>0)
                      @php $counter =1;@endphp
                      @foreach ($headers->managerTaskDetails as $details)
                                          	 
                      <div class="form-check abc-checkbox abc-checkbox-primary">
                        <input type="checkbox" class="form-check-input" @if( $details->iscompleted) checked="true"  @endif  id="{{$details->managerweeklydetailid}}" aria-label="Single checkbox Two"/>
                        <label class="form-check-label" for="{{$details->managerweeklydetailid}}">{{ $details->description }}</label>
                    </div>  
                    	@php $counter++ @endphp
                    @endforeach
                    @else
                    	 <p class="_blank">Task Not Created for this date!</p>
                    @endif
                    @if( sizeof($headers->managerTaskDetails )>0)
                    
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
<script type="text/javascript">
	$(document).on('change','._selectAll',function(){
		var tId = $(this).attr('id').split('_');
		if($(this).is(':checked')== true)	
		{
			$('#myTabContent #id'+tId[1] + ' .form-check input[type=checkbox]').each(function(){
				$(this).prop('checked',true);
			});
		}
		else if($(this).is(':checked')== false)	
		{
			$('#myTabContent #id'+tId[1] + ' .form-check input[type=checkbox]').each(function(){
				$(this).prop('checked',false);
			});
		}
	});
</script>
@stop
