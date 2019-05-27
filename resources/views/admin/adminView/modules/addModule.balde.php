@extends('admin.layouts.default')
{{-- Page title --}}
@section('title')
Accordion Tabs
@parent
@stop
{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('css/pages/tab.css') }}" />

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

<!--basic form starts-->
<div class="my-3">
    <div class="card " id="hidepanel1">
        <div class="card-header bg-primary text-white ">
            <span>
                <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                Basic Form 1
            </span>
            <span class="float-right">
                <i class="fa fa-chevron-up clickable"></i>
                <i class="fa fa-times removepanel clickable"></i>
            </span>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="#">
                <!-- CSRF Token -->
                <!-- Name input-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 col-lg-3 col-12 control-label" for="name">Name</label>
                        <div class="col-md-9 col-lg-9 col-12">
                            <input id="name" name="name" type="text" placeholder="Your name" class="form-control"></div>
                    </div>
                </div>
                <!-- Email input-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 col-lg-3 col-12 control-label" for="email">Your E-mail</label>
                        <div class="col-md-9 col-lg-9 col-12">
                            <input id="email" name="email" type="text" placeholder="Your email" class="form-control"></div>
                    </div>
                </div>
                <!-- Message body -->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 col-lg-3 col-12 control-label" for="message">Your message</label>
                        <div class="col-md-9 col-lg-9 col-12">
                            <textarea class="form-control resize_vertical" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3 col-lg-3 col-12 control-label" for="upload">File Upload</label>
                        <div class="col-md-9 col-12 col-lg-9">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                <span class="input-group-btn">
                                    <!-- image-preview-clear button -->
                                    <button type="button" class="btn btn-light image-preview-clear" style="display:none; border-radius:0 !important; border: 1px solid rgba(0, 0, 0, 0.16);">
                                        <span class="fa  fa-times"></span> Clear
                                    </button>
                                    <!-- image-preview-input -->
                                    <div class="btn btn-light image_radius image-preview-input" style="margin-left:-3px;">
                                        <span class="fa fa-folder-open"></span>
                                        <span class="image-preview-input-title">Browse</span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name=""/> <!-- rename it -->
                                    </div>
                                </span>
                            </div><!-- /input-group image-preview [TO HERE]-->
                        </div>
                    </div>
                </div>
                <!-- Form actions -->
                <div class="form-position">
                    <div class="row">
                        <div class="col-md-12  col-sm-12 col-12  col-lg-12 text-right">
                            <button type="submit" class="btn btn-responsive btn-primary btn-sm">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--basic form 2 starts-->






@stop
{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
@stop