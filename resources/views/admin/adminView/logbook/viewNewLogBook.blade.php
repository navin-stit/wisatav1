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
    <div class="card-body p-0">
        <div class="bs-example">          
            <ul class="nav nav-tabs" style="margin-bottom: 15px;"> 

                    @foreach ($lokbookHeaders as $headers) 
                <li class="nav-item pb-2" >
                        <a href="#id{{ $headers->logbookheaderid }}"   data-toggle="tab"  class="logBookTab nav-link {{ ($headers->logbookdate==$today) ? 'active' : ''  }}" style="padding-bottom:0px!important">
                            {{ $headers->logbooktitle }}
                        </a>                 
                        <span class="ml-3" style="font-size:12px">
                            {{ $headers->logbookdate }}
                        </span>  
                    </li>
                    <input type="hidden" name="logbookheaderid" value="{{ $headers->logbookheaderid }}">
                    @endforeach 

                <li class=" nav-item  ml-auto">
                    <a id="addLogBook" href="{{ route('admin.add-logbook') }}" class="nav-link btn btn-primary rounded btn-xs py-1 px-2 onHover " >Add Logbook</a>
                </li>

            </ul>          
            <div id="myTabContent" class="tab-content" style="height:200px!important">  
                @foreach ($lokbookHeaders as $headers)
                <div class="tab-pane fade show {{ $headers->logbookdate == $today ? 'active in' : '' }}  mt-3 ml-3" id="id{{$headers->logbookheaderid }}">                   
                    <div class="portlet box bg-primary text-white mb-4">
                        <div class="portlet-title">                           
                        </div>
                        <div class="portlet-body bg-white p-2">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> Logbook Notes</th>                                          
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                    
                                        @if( !empty($headers->logbookDetails) )
                                        @foreach ( $headers->logbookDetails as $logbookDetail)
                                        <tr>
                                            <td>
                                                {{ $logbookDetail->notes }}
                                            </td>

                                            <td>
                                                @foreach (Session::get('userPermissionDetail') as $userPermissionDetail)
                                                @if( $userPermissionDetail->edit === 1 )
                                                <a href="">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                @endif                                                
                                                @if( $userPermissionDetail->delete === 1 )
                                                <a href="">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                                @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>             
                @endforeach
            </div>   
            <div class="ml-3 d-flex" style="font-size:15px;letter-spacing: 1px;font-family: roboto">

                <div class="mx-4">
                    <a href="#" class="btn btn-primary  rounded py-1 px-4 ">Save</a>
                </div>               
                <div class="mr-4 mx-auto">
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
<script>
    $(".logBookTab").click(function(){
        var logBookId = $(this).attr("href").replace('#id','');
        var addLogBookUrl  = $("#addLogBook").attr("href").split('?');
        $("#addLogBook").attr("href", addLogBookUrl[0]+"?id="+logBookId);
    });

</script>
@stop
