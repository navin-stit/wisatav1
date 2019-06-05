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
	table tbody tr td i{
		line-height: 38px;
	}
	.disableClass{
		width: 100%;
		border: 1px solid #cecece;
		padding: 5px;
		background: #EBEBEB;
	}
	.nonDisableNotes{
		width: 100%;
		border: 1px solid #cecece;
		padding: 5px;
		background: #FFFFFF;
	}
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
            <ul class="nav nav-tabs loogTabs" style="margin-bottom:2px;margin-top:8px;"> 

                    @foreach ($lokbookHeaders as $headers) 
                <li class="nav-item pb-2" id="LI_{{ $headers->logbookheaderid }}">
                        <a href="#id{{ $headers->logbookheaderid }}"   data-toggle="tab"  class="logBookTab nav-link {{ ($headers->logbookdate==$today) ? 'active' : ''  }}" style="padding-bottom:0px!important">
                            {{ $headers->logbooktitle }}
                        </a>                 
                        <span style="font-size:12px;text-align:center;display:block;">
                            {{ $headers->logbookdate }}
                        </span>  
                    </li>
                    <input type="hidden" name="logbookheaderid" value="{{ $headers->logbookheaderid }}">
                    @endforeach 
            </ul>          
            <div id="myTabContent" class="tab-content" style="height:200px!important">  
                @foreach ($lokbookHeaders as $headers)
                <div class="tab-pane fade show tabContent {{ $headers->logbookdate == $today ? 'active in' : '' }} ml-3" id="id{{$headers->logbookheaderid }}">                   
                    <div class="portlet box bg-primary text-white mb-4">                       
                        <div class="portlet-body bg-white p-2">
                            <div class="table-scrollable">
                                <table class="table table-hover table_{{$headers->logbookheaderid }}" id="table_{{$headers->logbookheaderid }}">
                                    <thead>
                                        <tr>
                                        	<th width="50px" style="line-height:36px;"> Edit</th>
                                        	<th width="50px" style="line-height:36px;"> Delete</th>
                                            <th> Logbook Notes 
                                            <a id="LBook_{{$headers->logbookheaderid}}" data-toggle="modal" data-target="#yourModal" href="javascript:void(0);" class="btn btn-sm btn-primary mdl_open" style="float:right;"><span class="fa fa-plus" ></span>  Add Notes</a>   
                                            </th>  
                                        </tr>
                                    </thead>
                                    <tbody>                                                                    
                                        @if(sizeof($headers->logbookDetails)>0 )
                                        @foreach ( $headers->logbookDetails as $logbookDetail)
                                        <tr>
                                        	<td> @foreach (Session::get('userPermissionDetail') as $userPermissionDetail)
                                                @if( $userPermissionDetail->edit === 1 )
                                                <a class="editNotes" href="javascript:void(0);" id="edit_{{$logbookDetail->logbookdetailid}}">
                                                    <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#418BCA" data-hc="#418BCA"
                                                       data-loop="true"></i>
                                                </a>
                                                @else
                                                 <i class="livicon mr-3" data-name="edit" data-size="18" data-c="#737373" data-hc="#737373"
                                                       data-loop="true"></i>
                                                @endif 
                                                
                                                 @endforeach</td>
                                        	<td>
                                                @foreach (Session::get('userPermissionDetail') as $userPermissionDetail)                                                                                               
                                                @if( $userPermissionDetail->delete === 1 )
                                                <a  href="javascript:void(0);" class="deleteNotes" id="delete_{{$logbookDetail->logbookdetailid}}">
                                                    <i class="livicon" data-name="trash" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
                                                       data-loop="true"></i>
                                                </a>
                                                @else
                                                 <i class="livicon" data-name="trash" data-size="18" data-c="#737373" data-hc="#737373"
                                                       data-loop="true"></i>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="notes" style="position: relative;">
                                                <input type="text" value="{{ $logbookDetail->notes }}" readonly="true" class="disableClass"/>
                                                <a id="{{$logbookDetail->logbookdetailid}}" class="saveNotes" href="javascript:void(0)" style="position: absolute;right: 19px;top: 15px;"><i class="livicon" data-name="save" data-size="24" data-c="#3278B3" data-hc="#5e646b" data-loop="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach 
                                        @else
                                        	<tr>
                                        		<td colspan="3">Notes Not Addes Yet!</td>
                                        	</tr>
										@endif
                                    </tbody>
                                </table>                               
                            </div>
                        </div>
                    </div>
                </div>             
                @endforeach
            </div>   
           
        </div>        
    </div> 
</div>
<div class="modal fade" id="yourModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;right: 20px;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="width:100%;text-align:center;font-weight: bold;color: #EF6F6C;"></h4>
      </div>
      <div class="modal-body">
      		<div class="col-12">
      			<input type="text" class="form-control" id="notes_value" name="notes_value"/>	
      		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary _saveNotes">Save Note</button>
      </div>
    </div>
  </div>
</div>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
<script>
	var _logbookId = 0;
    $(".logBookTab").click(function(){
        var logBookId = $(this).attr("href").replace('#id','');
        var addLogBookUrl  = $("#addLogBook").attr("href").split('?');
        $("#addLogBook").attr("href", addLogBookUrl[0]+"?id="+logBookId);
    });
	$(document).on('click','.editNotes',function(){
		$(this).parent().parent().find('td.notes').find('input').removeClass('disableClass');
		$(this).parent().parent().find('td.notes').find('input').removeAttr('readonly');
		$(this).parent().parent().find('td.notes').find('input').addClass('nonDisableNotes');
	});
	$('.mdl_open').click(function(){
		var ids = $(this).attr('id').split('_');
		var _title = $('.loogTabs li#LI_' + ids[1] + ' a').html();
		var _date = $('.loogTabs li#LI_' + ids[1] + ' span').text();
		$('#yourModal .modal-header .modal-title').html("Notes for " + _title + '  (' +  _date + ')');
		$('#notes_value').val("");
		_logbookId = ids[1];
	});
	// Save New Notes
	$('._saveNotes').click(function(){
		var id = _logbookId;
		var Value = $('#notes_value').val();
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');		
		 $.ajax({
            url: '/admin/saveLogBook',
            type: 'POST',
            dataType: 'json',
            data: {_token: CSRF_TOKEN,item: id, anotherValue: Value},
            success:function(data){
               if(data.status == true){
               	  $('#notes_value').val("");
               	  $('#yourModal').modal('hide');
               	  var row = "<tr>";
               	  if(data.can_edit == true)
               	  {
				  	row += "<td><a class='editNotes' href='javascript:void(0);' id='edit_"+ data.id +"'>";
				  	row += "<i class='livicon mr-3' data-name='edit' data-size='18' data-c='#418BCA' data-hc='#418BCA' data-loop='true'></i>";
					row += "</a></td>";	
				  }
				  else
				  {
				  	row += "<td>";
				  	row += "<i class='livicon mr-3' data-name='edit' data-size='18' data-c='#737373' data-hc='#737373' data-loop='true'></i>";
					row += "</td>";	
				  }	
				  
				  if(data.can_delete == true)
               	  {
				  	row += "<td><a class='deleteNotes' href='javascript:void(0);' id='delete_"+ data.id +"'>";
				  	row += "<i class='livicon mr-3' data-name='trash' data-size='18' data-c='#EF6F6C' data-hc='#EF6F6C' data-loop='true'></i>";
					row += "</a></td>";	
				  }
				  else
				  {
				  	row += "<td>";
				  	row += "<i class='livicon' data-name='trash' data-size='18' data-c='#737373' data-hc='#737373' data-loop='true'></i>";
					row += "</td>";	
				  }	
               	  row += "<td class='notes' style='position: relative;'>";
				  row += "<input type='text' value='"+ Value +"' readonly='true' class='disableClass'/>";
				  row += "<a id='"+ data.id +"' class='saveNotes' href='javascript:void(0)' style='position: absolute;right: 19px;top: 15px;'>";
				  row += "<i class='livicon' data-name='save' data-size='24' data-c='#3278B3' data-hc='#5e646b' data-loop='true'></i></a></td>";
               	  row += "</tr>";
               	  var s = $('.table_'+ id +' tbody tr:eq(0) td').length;               	
               	  if(s == 1)
               	  {
				  	$('.table_'+ id +' tbody tr').remove();
				  }
               	  $('.table_'+ id +' tbody').append(row);
               	  $('.table_'+ id +' tbody tr td i').updateLivicon();
                  alert(data.message); 	 	
               }
            }
    	});
	});
	// Update Notes
	$(document).on('click','.saveNotes',function(){
		var id = $(this).attr('id');
		var OBJ = $(this);
		var Value = $(this).parent().find('input').val();
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');		
		 $.ajax({
            url: '/admin/updateLogBook',
            type: 'POST',
            dataType: 'json',
            data: {_token: CSRF_TOKEN,item: id, anotherValue: Value},
            success:function(data){
               if(data.status == true){
                  $(OBJ).parent().find('input').addClass('disableClass');
				  $(OBJ).parent().find('input').attr('readonly',true);
				  $(OBJ).parent().find('input').removeClass('nonDisableNotes');	
				  alert(data.message);
               }
            }
    	});
	});
	// Delete Notes
	$(document).on('click','.deleteNotes',function(){	
		var idString = $(this).attr('id').split('_');
		var OBJ = $(this);
		var tableId = $(this).parent().parent().parent().parent('table').attr('id');		
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');		
		 $.ajax({
            url: '/admin/deleteLogBookNotes',
            type: 'POST',
            dataType: 'json',
            data: {_token: CSRF_TOKEN,item: idString[1]},
            success:function(data){
               if(data.status == true){
               	 $(OBJ).parent().parent().remove();               	
               	 var _size = $('#' + tableId +' tbody tr').length;               	 
               	 if(_size <=0)
               	 {
				 	$('#' + tableId +' tbody').append("<tr><td colspan='3'>Notes Not Addes Yet!</td></tr>");
				 }
				  alert(data.message);
               }
            }
    	});
	});
</script>
@stop
