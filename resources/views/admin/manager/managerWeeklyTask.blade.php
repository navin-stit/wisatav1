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
	.disableBtn
	{
		background:#cecece;
		color:#7e7e7e !important;
		border: none;
		cursor: default;
	}
	.disableBtn:hover
	{
		background:#cecece;
		color:#7e7e7e !important;
		border: none !important;
		cursor: default;
	}
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
    .mtask
    {
		padding-bottom: 10px;border-bottom: 1px solid #cecece;margin-bottom: 10px;
	}
	.mtask input{
		margin-top: 7px;
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
                                          	 
                      <div class="form-check abc-checkbox abc-checkbox-primary mtask" id="inpDiv_{{ $headers->managerweeklyheaderid }}">
                        <input type="checkbox" class="form-check-input _inputtask" @if( $details->iscompleted) checked="true" disabled="disabled"  @endif  id="{{$details->managerweeklydetailid}}" aria-label="Single checkbox Two"/>
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
		                    <a href="javascript:void(0);" id="save_{{ $headers->managerweeklyheaderid }}" class="btn btn-primary  rounded py-1 px-4 disableBtn">Save</a>
		                </div>
		                <div class="mr-4">
		                    <a href="javascript:void(0);" id="cancel_{{ $headers->managerweeklyheaderid }}"  class="btn btn-danger rounded py-1 px-4 disableBtn">Cancel</a>
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
	$(document).on('change','._inputtask',function(){
		var Ids = $(this).parent().attr('id').split('_');
		if($(this).is(':checked')== true)	
		{
			$('#save_' + Ids[1]).removeClass('disableBtn');
			$('#save_' + Ids[1]).addClass('_saveCompleteTask');
			$('#cancel_' + Ids[1]).removeClass('disableBtn');
			$('#cancel_' + Ids[1]).addClass('_cancelCompleteTask');			
		}
		else if($(this).is(':checked')== false)	
		{
			var isAll = false;
			$('#myTabContent #id'+Ids[1] + ' .form-check input[type=checkbox]').each(function(){
				if($(this).is(':checked')== true){
					isAll = true;
				}
			});	
			if(isAll === false)	{
				$('#save_' + Ids[1]).addClass('disableBtn');
				$('#save_' + Ids[1]).removeClass('_saveCompleteTask');
				$('#cancel_' + Ids[1]).addClass('disableBtn');
				$('#cancel_' + Ids[1]).removeClass('_cancelCompleteTask');
			}
		}
	});
	$(document).on('change','._selectAll',function(){
		var tId = $(this).attr('id').split('_');
		if($(this).is(':checked')== true)	
		{
			$('#save_' + tId[1]).removeClass('disableBtn');
			$('#save_' + tId[1]).addClass('_saveCompleteTask');
			$('#cancel_' + tId[1]).removeClass('disableBtn');
			$('#cancel_' + tId[1]).addClass('_cancelCompleteTask');
			$('#myTabContent #id'+tId[1] + ' .form-check input[type=checkbox]').each(function(){
				$(this).prop('checked',true);
			});
		}
		else if($(this).is(':checked')== false)	
		{
			$('#save_' + tId[1]).addClass('disableBtn');
			$('#save_' + tId[1]).removeClass('_saveCompleteTask');
			$('#cancel_' + tId[1]).addClass('disableBtn');
			$('#cancel_' + tId[1]).removeClass('_cancelCompleteTask');
			$('#myTabContent #id'+tId[1] + ' .form-check input[type=checkbox]').each(function(){
				$(this).prop('checked',false);
			});
		}
	});
	$(document).on('click','._saveCompleteTask',function(){
		var idString = $(this).attr('id').split('_');		
		if(confirm("Are you sure you want to save.? "))
		{
			$('#myTabContent #id'+ idString[1] + ' .form-check input[type=checkbox]').each(function(){
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');	
				var id = $(this).attr('id');	
				 $.ajax({
		            url: APP_URL + '/admin/updateManagerTaskStatus',
		            type: 'POST',
		            dataType: 'json',
		            data: {_token: CSRF_TOKEN,item: id, anotherValue: Value},
		            success:function(data){
		               if(data.status == true){		               	 
		                  alert(data.message); 	 	
		               }
		            }
		    	});
			});
		}
	});
	$(document).on('click','._cancelCompleteTask',function(){
		var idString = $(this).attr('id').split('_');		
		$('#myTabContent #id'+ idString[1] + ' .form-check input[type=checkbox]').each(function(){
			$(this).prop('checked',false);
			$('#save_' + tId[1]).addClass('disableBtn');
			$('#save_' + tId[1]).removeClass('_saveCompleteTask');
			$('#cancel_' + tId[1]).addClass('disableBtn');
			$('#cancel_' + tId[1]).removeClass('_cancelCompleteTask');
		});
	});
</script>
@stop
