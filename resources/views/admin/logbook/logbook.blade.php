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
        <div class="bs-example">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;" id="matchDay">               
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
                    <a href="{{ route("admin.view-logbok") }}" class="nav-link btn btn-primary rounded btn-xs py-1 px-2 onHover">Admin View</a>
                </li>
                <!--                <li class=" nav-item disabled">
                                    <a class="nav-link disabled">Disabled</a>
                                </li>-->
            </ul>
            <div id="myTabContent" class="tab-content">                
                <div class="tab-pane fade" id="monday">
                    <p  class="m-r-6">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                    </p>
                </div>
                <div class="tab-pane fade" id="tuesday">
                    <p  class="m-r-6">
                        hello
                    </p>
                </div>
                <div class="tab-pane fade" id="wednesday">
                    <p  class="m-r-6">
                        hello                    
                    </p>
                </div>
                <div class="tab-pane fade" id="thursday">
                    <p  class="m-r-6">
                        hello                    
                    </p>
                </div>
                <div class="tab-pane fade" id="friday">
                    <p  class="m-r-6">
                        hello                    
                    </p>
                </div>
                <div class="tab-pane fade" id="saturday">
                    <p  class="m-r-6">
                        hello                    
                    </p>
                </div>
                <div class="tab-pane fade show active in" id="sunday">
                    <p class="m-r-6">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                    </p>
                </div>  
                <div class="tab-pane fade" id="dropdown1">
                    <p class="m-r-6">
                        hello
                    </p>
                </div>
                <!--                <div class="tab-pane fade" id="dropdown2">
                                    <p class="m-r-6">
                                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                    </p>
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
