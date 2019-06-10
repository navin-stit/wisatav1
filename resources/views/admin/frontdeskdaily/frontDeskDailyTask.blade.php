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
               @php $counter=1 @endphp         
               @foreach ($frontdeskHeaders['dates'] as $key=>$headers)                 	
                <li class="nav-item pb-2">
                	@php $id = str_replace(':','_',$key) @endphp
                	@if($counter == 1)
                		<a href="#id_{{ $frontdeskHeaders['frontdeskHeaders'][0]->frontdeskdailyheaderid}}_{{$counter}}"  data-toggle="tab"  class="nav-link active" style="padding-bottom:0px!important">
	               	@else
	               		<a href="#id_{{ $frontdeskHeaders['frontdeskHeaders'][0]->frontdeskdailyheaderid}}_{{$counter}}"  data-toggle="tab"  class="nav-link" style="padding-bottom:0px!important">
	               	@endif                    
                        {{ $key }}
                    </a>                    
                </li> 
                @php $counter++ @endphp 
                @endforeach
                @foreach (Session::get('userPermissionDetail') as $userPermissionDetail)
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
            	 	@php $counter=1 @endphp
                    @foreach ($frontdeskHeaders['dates'] as $key=>$headers)
                    	@php $id = str_replace(':','_',$key) @endphp
                    	@if($counter == 1) 
                       <div  class="tab-pane fade show active in"  id="id_{{ $frontdeskHeaders['frontdeskHeaders'][0]->frontdeskdailyheaderid}}_{{$counter}}">
                        @else
                       	<div  class="tab-pane fade"  id="id_{{ $frontdeskHeaders['frontdeskHeaders'][0]->frontdeskdailyheaderid}}_{{$counter}}">
                       	@endif
                       	 
	                    @if(sizeof($frontdeskHeaders['dates'][$key])>0)	                      
		                      @foreach ($headers as $details)
		                      
		                      <div class="form-check abc-checkbox abc-checkbox-primary mtask" id="inpDiv_{{ $frontdeskHeaders['frontdeskHeaders'][0]->frontdeskdailyheaderid}}_{{$counter}}">
		                        <input type="checkbox" class="form-check-input _inputtask" @if( $details->iscompleted) checked="true" disabled="disabled"  @endif  id="{{$details->frontdeskdailydetailid}}" aria-label="Single checkbox Two"/>
		                        <label class="form-check-label" for="{{$details->frontdeskdailydetailid}}">{{ $details->description }}</label>
		                    </div> 
		                      		                    	
		                    @endforeach
	                    @else
	                    	 <p class="_blank">Task Not Created for this date!</p>
	                    @endif
	                    @if(sizeof($frontdeskHeaders['dates'][$key])>0)	  
	                    
	                    <div class="ml-3 d-flex" style="font-size:16px;letter-spacing:1px;font-family:roboto;position:absolute;bottom:0;">                    	
			                 <div class="form-check abc-checkbox abc-checkbox-primary">
		                        <input class="form-check-input _selectAll" id="check_{{ $frontdeskHeaders['frontdeskHeaders'][0]->frontdeskdailyheaderid}}_{{$counter}}" type="checkbox" aria-label="Single checkbox Two">
		                        <label class="form-check-label" for="check_{{ $frontdeskHeaders['frontdeskHeaders'][0]->frontdeskdailyheaderid}}_{{$counter}}">Select All</label>
		                    </div>		                
			                <div class="mx-4">
		                    <a href="javascript:void(0);" id="save_{{ $frontdeskHeaders['frontdeskHeaders'][0]->frontdeskdailyheaderid}}_{{$counter}}" class="btn btn-primary  rounded py-1 px-4 disableBtn">Save</a>
		                </div>
		                <div class="mr-4">
		                    <a href="javascript:void(0);" id="cancel_{{ $frontdeskHeaders['frontdeskHeaders'][0]->frontdeskdailyheaderid}}_{{$counter}}"  class="btn btn-danger rounded py-1 px-4 disableBtn">Cancel</a>
		                </div>
			            </div>
			            @endif
	                </div> 
	                @php $counter++ @endphp		
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
			$('#save_' + Ids[1] + '_' + Ids[2]).removeClass('disableBtn');
			$('#save_' + Ids[1]+ '_' + Ids[2]).addClass('_saveCompleteTask');
			$('#cancel_' + Ids[1]+ '_' + Ids[2]).removeClass('disableBtn');
			$('#cancel_' + Ids[1]+ '_' + Ids[2]).addClass('_cancelCompleteTask');			
		}
		else if($(this).is(':checked')== false)	
		{
			var isAll = false;
			$('#myTabContent #id_'+ Ids[1] + Ids[2] + ' .form-check input[type=checkbox]').each(function(){
				if($(this).is(':checked')== true){
					isAll = true;
				}
			});	
			if(isAll === false)	{
				$('#save_' + Ids[1]+ '_' + Ids[2]).addClass('disableBtn');
				$('#save_' + Ids[1]+ '_' + Ids[2]).removeClass('_saveCompleteTask');
				$('#cancel_' + Ids[1]+ '_' + Ids[2]).addClass('disableBtn');
				$('#cancel_' + Ids[1]+ '_' + Ids[2]).removeClass('_cancelCompleteTask');
			}
		}
	});
	$(document).on('change','._selectAll',function(){
		var tId = $(this).attr('id').split('_');		
		if($(this).is(':checked')== true)	
		{
			$('#save_' + tId[1] + '_'+ tId[2]).removeClass('disableBtn');
			$('#save_' + tId[1] + '_'+ tId[2]).addClass('_saveCompleteTask');
			$('#cancel_' + tId[1] + '_'+ tId[2]).removeClass('disableBtn');
			$('#cancel_' + tId[1] + '_'+ tId[2]).addClass('_cancelCompleteTask');
			$('#myTabContent #id_'+tId[1] + '_'+ tId[2] + ' .form-check input[type=checkbox]').each(function(){	
				$(this).prop('checked',true);
			});
		}
		else if($(this).is(':checked')== false)	
		{
			$('#save_' + tId[1] + '_'+ tId[2]).addClass('disableBtn');
			$('#save_' + tId[1] + '_'+ tId[2]).removeClass('_saveCompleteTask');
			$('#cancel_' + tId[1] + '_'+ tId[2]).addClass('disableBtn');
			$('#cancel_' + tId[1] + '_'+ tId[2]).removeClass('_cancelCompleteTask');
			$('#myTabContent #id_'+tId[1] + '_'+ tId[2] + ' .form-check input[type=checkbox]').each(function(){
				$(this).prop('checked',false);
			});
		}
	});
	$(document).on('click','._saveCompleteTask',function(){
		var idString = $(this).attr('id').split('_');		
		if(confirm("Are you sure you want to save.? "))
		{
			$('#myTabContent #id'+ idString[1] + '_' + idString[2] + ' .form-check input[type=checkbox]').each(function(){
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');	
				var id = $(this).attr('id');	
				 $.ajax({
		            url: APP_URL + '/admin/updateFrontTaskStatus',
		            type: 'POST',
		            dataType: 'json',
		            data: {_token: CSRF_TOKEN,item: id},
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
