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
	._blank{
		background: #ececec;padding: 10px;text-align: center;border: 1px solid #cecece;
	}
	.slimScrollDiv{
		height:auto !important;
	}
	.notes_list{
		background: #ececec;
		padding: 5px;
		border-radius: 3px;
	}
	#myTabContent{
		height:auto !important;
	}
    @media (min-width:320px) and (max-width:425px){
        .popover.left{
            width:100px !important;
        }
    }
    /*    .tab-content {
            height: auto !important;
        }*/
    .onHover:hover{
        background-color:#418bca!important;
        color:white!important;
    }
    .onHover{
        font-size:14px;
        letter-spacing: 1px;
        font-family: roboto
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
    <div class="card-header bg-primary text-white" style="font-size:16px;letter-spacing: 1px;font-family: roboto">
        <span>
            <!--<i class="livicon" data-name="printer" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>-->
            <i class="livicon" data-name="tasks" data-size="13" data-c="#fff"
               data-hc="white" data-loop="true"></i>
            Log Book Notes
        </span>
        <span class="float-right ">
            <i class="fa fa-chevron-up clickable"></i>
        </span>
    </div>
    <div class="card-body">
        <div class="bs-example" id="mainBody">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">  
                @foreach ($lokbookHeaders as $headers)  
                <li class="nav-item pb-2">
                    <a href="#id{{ $headers->logbookheaderid }}"  data-toggle="tab"  class="nav-link {{ ($headers->logbookdate==$today) ? 'active' : ''  }}" style="padding-bottom:0px!important">
                        {{ $headers->logbooktitle }}
                    </a>
                    <span style="font-size:12px;text-align:center;display:block;">
                        {{ $headers->logbookdate }}
                    </span>  
                </li>  
                @endforeach   
				
                @foreach (Session::get('userPermissionDetail') as $userPermissionDetail)
<!--               {{ $userPermissionDetail }}           -->
                @if( $userPermissionDetail->userid ===  Sentinel::getUser()->id ) 
                @if( $userPermissionDetail->edit === 1 )
                <li class=" nav-item  ml-auto">
                    <a href="{{ route("admin.view-logbok") }}" class="nav-link btn btn-primary rounded btn-xs py-1 px-2 onHover">Admin View</a>
                </li>                   
                @endif
                @endif
                @endforeach 

            </ul>
            <div id="myTabContent" class="tab-content">   
                @foreach ($lokbookHeaders as $headers)
                <div @if( $headers->logbookdate == $today ) class="tab-pane fade show active in" @else class="tab-pane fade" @endif  id="id{{ $headers->logbookheaderid }}">
                      @if( sizeof($headers->logbookDetails )>0)
                      @php $counter =1;@endphp
                      @foreach ($headers->logbookDetails as $details)
                      <p class="notes_list">
                      	{{$counter}})  
                        {{ $details->notes }}
                    </p>
                    	@php $counter++ @endphp
                    @endforeach
                    @else
                    	 <p class="_blank">Logs Not Created for this date!</p>
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
