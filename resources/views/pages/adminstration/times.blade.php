@extends('layout.master')
@section('title')
  Time Slots
@endsection
@section('namepage')
  Administration
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-success pull-right" id="add-time"><i class="fa fa-plus"></i> Add New Time</button>
          <h3 class="box-title">Time Slots</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Track</th>
				<th>Time</th>
				<th>Sort</th>
				<th>Status</th>
				<th>Options</th>
            </tr>
            </thead>
            <tbody>
            	@foreach($times as $time)
					<tr class="times{{$time->id}} @if($time->status==0) danger @endif">
						<td>{{$time->id}}</td>
						@if($time->getTrack)<td>{{$time->getTrack->title}}</td> @else <td style="color: red;">Deleted</td> @endif
						<td>{{$time->time}}</td>
						<td>{{$time->sort}}</td>
						<td class="status">
							@if($time->status == 1)
								<span class="label bg-blue">Active</span> <a id="actButton" onclick="disactive('{{$time->id}}')" class="deactive-track btn btn-xs btn-danger"><i class="fa fa-refresh"></i></a>
							@elseif($time->status == 0)
								<span class="label bg-red">Inactive</span> <a id="actButton" onclick="active('{{$time->id}}')" class="active-time btn btn-xs btn-success"><i class="fa fa-refresh"></i></a>
							@endif
						</td>
	                  	<td>
	                    	<button type="button" class="edit-time btn btn-xs btn-warning" data-id="{{$time->id}}" data-track="{{$time->track}}" data-time="{{$time->time}}" data-sort="{{$time->sort}}"><i class="fa fa-edit"></i> Edit</button>
	                    	<button type="button" class="delete-time btn btn-xs btn-danger" data-id="{{$time->id}}" data-track="{{$time->getTrack['title']}}" data-time="{{$time->time}}"><i class="fa fa-remove"></i> Delete</button>
	                  	</td>
            	</tr>
            	@endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>

<!-- Modal Add -->
    <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-clock-o"></i> Add New Time</h4>
        </div>
        <div class="modal-body">
         	<form id="form-add">
            	{{csrf_field()}}
            	<div class="alert alert-danger alert-dismissible" id="add-error" hidden="">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-ban"></i> Errors!</h4>
	                Enter Add the data correctly!!
	             </div>
                <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Track : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control" name="track" id="track" required>
							<option value="">- Select Track -</option>
		                    @foreach($tracks as $track)
								<option value="{{$track->id}}">{{$track->title}}</option>
							@endforeach
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-md-2">
	                    	<label>Time :</label>
	                    </div>
	                    <div class="col-md-10">
							<input type="text" name="time" id="time" class="form-control timepicker">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-md-2">
	                    	<label>Sort :</label>
	                    </div>
	                    <div class="col-md-10">
							<input type="number" name="sort" id="sort" class="form-control">
	                    </div>
	                </div>
	            </div>
         	</form>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-success save" id="save"><i class="fa fa-check"></i> Save</button>
        	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      	</div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

<!-- Modal Edit -->
    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Time Slot</h4>
          </div>
          <div class="modal-body">
            <form id="form-edit">
            	{{csrf_field()}}
            	<div class="alert alert-danger alert-dismissible" id="edit-error" hidden="">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-ban"></i> Errors!</h4>
	                Enter edit the data correctly!!
	             </div>
	            <div class="form-group" hidden="">
                    <input type="hidden" id="upid" class="form-control " disabled="" >
	            </div>
                <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Track : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control" id="uptrack" required>
							<option value="">- Select Track -</option>
		                    @foreach($tracks as $track)
								<option value="{{$track->id}}">{{$track->title}}</option>
							@endforeach
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-md-2">
	                      <label>Time :</label>
	                    </div>
	                    <div class="col-md-10">
	                        <input type="text" id="uptime"  class="form-control timepicker" required>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-md-2">
	                      <label>Sort :</label>
	                    </div>
	                    <div class="col-md-10">
	                        <input type="number" id="upsort"  class="form-control" required>
	                    </div>
	                </div>
	            </div>
         	</form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="update"><i class="fa fa-check"></i> Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

<!-- Modal Delete -->
    <div class="modal fade" id="modal-delete">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <h4 class="modal-title"><i class="fa fa-times"></i> Delete Time Slot</h4>
	        </div>
	        <div class="modal-body">
		    	<form id="form-delete">
	            	{{csrf_field()}}
	            	<div class="alert alert-danger alert-dismissible" id="delete-error" hidden="">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <h4><i class="fa fa-ban"></i> Errors!</h4>
		                Enter delete the data correctly!!
		             </div>
		            <div class="form-group" hidden="">
	                    <input type="hidden" id="delid" class="form-control">
		            </div>
	                <div class="form-group">
		                <div class="row">
		                	<div class="col-md-12">	                		
			                    <label>Are you sure to delete : <span style="color: red;" id="name"></span></label>
		                	</div>
		                </div>
		            </div>
	         	</form>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-danger" id="delete"><i class="icon fa fa-check"></i> Delete</button>
	          <button type="button" class="btn btn-info" data-dismiss="modal"><i class="icon fa fa-times"></i> Close</button>
	        </div>
	      </div>
	      <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
    </div> 

<!-- Code Ajax -->
<script type="text/javascript">

	// Code Ajax Add
	$(document).on('click', '#add-time', function() {
		$('#modal-add').modal('show');
		$('#form-add').show();
		$('#add-done').attr('hidden', 'hidden');
		$('#add-error').attr('hidden', 'hidden');
	});

	// button Add
	$('#save').click(function(e){
		e.preventDefault();
		var token = $('input[name=_token]').val();
		var track = $('select[name=track]').val();
		var time = $('input[name=time]').val();
		var sort = $('input[name=sort]').val();
		if(token==''||track==''||time==''||sort==''){ return; }
		$.ajax({
			type: 'POST',
			url: '{{route("times.store")}}',
			data: {
				'_token': token,
				'track': track,
				'time': time,
				'sort': sort,
			},
			success: function(data) {
				location.reload();
				// $("#save").removeClass("btn-success").addClass("btn-warning").html("<i class='fa fa-spinner fa-spin'></i> Saving...");
				// setTimeout(function(){
				// 	$("#save").removeClass("btn-warning").addClass("btn-success").html("<i class='fa fa-check'></i> Success!");
				// 	setTimeout(function(){
				// 		$("#save").html("<i class='fa fa-check'></i> Save");
				// 		$('.table').append(
				// 			"<tr class='times"+data.id+"'>"+
				// 				"<td>"+data.id+"</td>"+
				// 				"<td>"+data.trackTitle+"</td>"+
				// 				"<td>"+data.time+"</td>"+
				// 				"<td>"+data.sort+"</td>"+
				// 				"<td class='status'><span class='label bg-blue'>Active</span> <a id='actButton' onclick='disactive("+data.id+")' class='active-time btn btn-xs btn-danger'><i class='fa fa-refresh'></i></a></td>"+
				// 				"<td><button type='button' class='edit-time btn btn-xs btn-warning' data-id='"+data.id+"' data-track='"+data.track+"' data-time="+data.time+"' data-sort='"+data.sort+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
				// 				"<button type='button' class='delete-time btn btn-xs btn-danger' data-id='"+data.id+"' data-track='"+data.track+"' data-time="+data.time+"'><i class='fa fa-remove'></i> Delete</button>"+
				// 				"</td>"+
				// 			"</tr>"
				// 		);
				// 		$('#modal-add').modal('hide');
				// 		$('#track').val('');
				// 		$('#time').val('');
				// 		$('#sort').val('');
				// 	},2000);
				// },2000);
			},
			error: function(data) {
				$('#add-done').attr('hidden', 'hidden');
				$('#add-error').removeAttr('hidden', 'hidden').slideDwon(700).slideUp(700);;
			}
		});
	}); 

	// Code Ajax Active 
	function active(id){
		  	$.ajax({
			type: 'POST',
			url: '{{route("times.active")}}',
			data: {'id': id , '_token' : $('input[name=_token]').val()},
			success: function(data){
				location.reload();
				// if(data == 1){
				// 	$(".times"+id).removeClass("danger");
				// 	$(".times"+id+" .status").html('<span class="label bg-blue">Active</span> <button onclick="disactive('+id+')" class="btn btn-xs btn-danger"><i class="fa fa-refresh"></i></button>');
				// }else{
				// 	alert("Error!");
				// }
			},
			error: function(data){
				alert('Errors');
			}
		});	
	}

	// Code Ajax Disactive
	function disactive(id){
		  	$.ajax({
			type: 'POST',
			url: '{{route("times.deactive")}}',
			data: {'id': id , '_token' : $('input[name=_token]').val()},
			success: function(data){
				location.reload();
				// if(data == 1){
				// 	$(".times"+id).addClass("danger");
				// 	$(".times"+id+" .status").html('<span class="label bg-red">Inactive</span> <button onclick="active('+id+')" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i></button>');
				// }else{
				// 	alert("Error!");
				// }
			},
			error: function(data){
				alert('Error!');
			}
		});	
	}	

	// Code Ajax Edit
	$(document).on('click', '.edit-time', function() {
		$('#modal-edit').modal('show');
		$('#form-edit').show();
		$('#upid').val($(this).data('id'));
		$('#uptrack').val($(this).data('track'));
		$('#uptime').val($(this).data('time'));
		$('#upsort').val($(this).data('sort'));
		$('#edit-done').attr('hidden', 'hidden');
		$('#edit-error').attr('hidden', 'hidden');
	});

	// Button Update
	$('#update').click(function(e) {
		e.preventDefault();
		var token = $('input[name=_token]').val();
		var id = $('#upid').val();
		var track = $('#uptrack').val();
		var time = $('#uptime').val();
		var sort = $('#upsort').val();
		if(token==''||id==''||track==''||time==''||sort==''){ return; }
		$.ajax({
			type: 'POST',
			url: '{{route("times.edit")}}',
			data: {
				'_token': token,
				'id': id,
				'track': track,
				'time': time,
				'sort': sort,
			},
			success: function(data) {
				location.reload();
				// $("#update").removeClass('btn-success').addClass('btn-warning').html('<i class="fa fa-spinner fa-spin"></i> Updating...');
				// setTimeout(function(){
				// 	$("#update").removeClass('btn-warning').addClass('btn-success').html('<i class="fa fa-check"></i> Success!');
				// 	setTimeout(function(){
				// 		$("#update").html('<i class="fa fa-check"></i> Update');
				// 		$('.times'+data.id).replaceWith(
				// 			"<tr class='times"+data.id+"'>"+
				// 				"<td>"+data.id+"</td>"+
				// 				"<td>"+data.trackTitle+"</td>"+
				// 				"<td>"+data.time+"</td>"+
				// 				"<td>"+data.sort+"</td>"+
				// 				"<td class='status'>"+(data.status==1 ? "<span class='label bg-blue'>Active</span> <a id='actButton' onclick='disactive("+data.id+")' class='deactive-time btn btn-xs btn-danger'><i class='fa fa-refresh'></i></a>" : "<span class='label bg-red'>Inactive</span> <a id='actButton' onclick='active("+data.id+")' class='active-time btn btn-xs btn-success'><i class='fa fa-refresh'></i></a>")+"</td>"+
				// 				"<td><button type='button' class='edit-time btn btn-xs btn-warning' data-id='"+data.id+"' data-track='"+data.track+"' data-time='"+data.time+"' data-sort='"+data.sort+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
			    //                 	"<button type='button' class='delete-time btn btn-xs btn-danger' data-id='"+data.id+"' data-track='"+data.trackTitle+"' data-time='"+data.time+"'><i class='fa fa-remove'></i> Delete</button>"+
			    //               	"</td>"+
				// 			"</tr>");
				// 		$('#modal-edit').modal('hide');
				// 	},2000);
				// },2000);
			},
			error: function(data) {
				alert("Error!");
			}
		});
	});

	// Code Ajax Delete
	$(document).on('click', '.delete-time', function() {
		$('#modal-delete').modal('show');
		$('#form-delete').show();
		$('#delid').val($(this).data('id'));
		$('#modal-delete #name').html($(this).data('track')+" | "+$(this).data('time'));
		$('#delete-done').attr('hidden', 'hidden');
		$('#delete-error').attr('hidden', 'hidden');
	});

	// Button Update
	$('#delete').click(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '{{route("times.delete")}}',
			data: {
				'_token': $('input[name=_token]').val(),
				'id': $('#delid').val(),
			},
			success: function(data) {
				$('.times'+ $('#delid').val()).remove();
				$('#modal-delete').modal('hide');
				$('#delete-error').attr('hidden', 'hidden');
				$('#delete-done').removeAttr('hidden', 'hidden').slideDwon(700).slideUp(700);
			},
			error: function(data) {
				$('#delete-done').attr('hidden', 'hidden');
				$('#delete-error').removeAttr('hidden', 'hidden').slideDwon(700).slideUp(700);;
			}
		});
	});
		
</script>
  
@endsection