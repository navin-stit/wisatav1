@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
Accordion Tabs
@parent
@stop
{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('css/pages/tab.css') }}" />


<!--<script type="text/javascript">
$(document).on('click', '.nav-link', function () {
    var str = $(this).attr('href');
    var tabsId = str.replace('#', '');
    //alert(tabsId);
    var tabContentId = $('.card-body').find('#myTabContent').children('div').attr('id');    
    var tabContentId = tabsId;
   // alert(tabContentId);return false;
    if ( tabsId == tabContentId )
    {    
        $('.card-body').find('#myTabContent').find("id = " + tabsId).parent('#myTabContent').children('div').addClass('active show');
        //$('.card-body').find('#myTabContent').children('div').addClass('active show');
    } else {
        $('.card-body').find('#myTabContent').children('div').removeClass('active show');
    }
    //alert(tabContentId);
    //$('.tab-pane').toggleClass('active');
});

</script>-->
<!--<script type="text/javascript">
 function getCurrentDate() {
     var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
     var a = new Date();
     console.log(weekday[a.getDay()]);
     var today = weekday[a.getDay()];

     var tabDay = $('.nav-tabs').children('li').children('a').html();
     $(tabDay).each(function (key, val) {           
            console.log(val);
    
     });
     console.log(tabDay);
 }
</script>-->
<style>
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
                @foreach ($data as $headers) 
                <li class="nav-item pb-2">
                    <a href="#id{{ $headers->logbookheaderid }}"  data-toggle="tab"  class="nav-link {{ ($headers->logbookdate==$today) ? 'active' : ''  }}" style="padding-bottom:0px!important">
                        {{ $headers->logbooktitle }}
                    </a>
                    <span class="ml-3" style="font-size:12px">
                        {{ $headers->logbookdate }}
                    </span>  

                </li>
                @endforeach
              
                <li class=" nav-item  ml-auto">
                    <a href="{{ route("admin.view-logbok") }}" class="nav-link btn btn-primary rounded btn-xs py-1 px-2 onHover">Admin View</a>
                </li>     
                 <!-- @if( !empty($user_data->user_permissions))
                @if($user_data->user_permissions->edit === 0)-->
              <!--  @endif
                @endif-->
            </ul>
            <div id="myTabContent" class="tab-content">   
                @foreach ($data as $headers)
                <div @if( $headers->logbookdate == $today ) class="tab-pane fade show active in" @else class="tab-pane fade" @endif  id="id{{ $headers->logbookheaderid }}">
                      @if( !empty($headers->logbookDetails ))
                      @foreach ($headers->logbookDetails as $details)
                      <p>
                        {{ $details->notes }}
                    </p>
                    @endforeach
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
