@extends('layout.master')
@section('title')
  Levels
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
          <button type="button" class="btn btn-xs btn-success pull-right" id="add-level"><i class="fa fa-plus"></i> Add New Level</button>
          <h3 class="box-title">Levels List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
	            <tr>
	                <th>#</th>
	                <th>Track</th>
					<th>Level</th>
					<th>Sort</th>
					<th>Max Students</th>
					<th>Status</th>
					<th>Options</th>
	            </tr>
            </thead>
            <tbody>
            	@foreach($levels as $level)
				<tr class="levels{{$level->id}} @if($level->status==0) danger @endif">
					<td>{{$i++}}</td>
					<td>
						@if($level->getTrack) <span>{{$level->getTrack['title']}}</span> @else <span style="color: red;">Deleted</span> @endif
					</td>
					<td>{{$level->level}}</td>
					<td>{{$level->order}}</td>
					<td>{{$level->max}}</td>
					<td class="status">
						@if($level->status == 1)
							<span class="label bg-blue">Active</span> <a id="actButton" onclick="disactive('{{$level->id}}')" class="deactive-level btn btn-xs btn-danger"><i class="fa fa-refresh"></i></a>
						@elseif($level->status == 0)
							<span class="label bg-red">Inactive</span> <a id="actButton" onclick="active('{{$level->id}}')" class="active-level btn btn-xs btn-success"><i class="fa fa-refresh"></i></a>
						@endif
					</td>
                    <td>
                    	<button type="button" class="edit-level btn btn-xs btn-warning" data-id="{{$level->id}}" data-track="{{$level->track}}" data-level="{{$level->level}}" data-order="{{$level->order}}" data-max="{{$level->max}}" data-status="{{$level->status}}"><i class="fa fa-edit"></i> Edit</button>
                    	<button type="button" class="delete-level btn btn-xs btn-danger" data-id="{{$level->id}}" data-track="{{$level->getTrack['title']}}" data-level="{{$level->level}}"><i class="fa fa-remove"></i> Delete</button>
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
            <h4 class="modal-title"><i class="fa fa-signal"></i> Add New Level </h4>
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
	                  <div class="col-md-3">
	                    <label>Track : </label>
	                  </div>
	                  <div class="col-md-9">
	                    <select class="form-control" name="track" id="track" required>
	                    	<option value=""> - Select Track - </option>
		                    @foreach($tracks as $track)
								<option value="{{$track->id}}">{{$track->title}}</option>
							@endforeach
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-md-3">
	                      <label>Title: </label>
	                    </div>
	                    <div class="col-md-9">
	                        <input type="text" name="level" id="level" placeholder="Enter Level Title" class="form-control" required>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-md-3">
	                      <label>Sort: </label>
	                    </div>
	                    <div class="col-md-9">
	                        <input type="number" name="order" id="order" placeholder="Enter Level Sort" class="form-control" required>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-md-3">
	                      <label>Max Students: </label>
	                    </div>
	                    <div class="col-md-9">
	                        <input type="number" name="max" id="max" placeholder="Enter Max" class="form-control" required>
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
            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Level</h4>
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
                    <input type="hidden" id="upid" class="form-control" disabled="">
	            </div>
                <div class="form-group">
	                <div class="row">
	                  <div class="col-md-3">
	                    <label>Track : </label>
	                  </div>
	                  <div class="col-md-9">
	                    <select class="form-control" id="uptrack" required>
	                    	<option value=""> - Select Track - </option>
		                    @foreach($tracks as $track)
								<option value="{{$track->id}}">{{$track->title}}</option>
							@endforeach
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-md-3">
	                      <label>Level Title: </label>
	                    </div>
	                    <div class="col-md-9">
	                        <input type="text" id="uplevel" class="form-control">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-md-3">
	                      <label>Level Order:</label>
	                    </div>
	                    <div class="col-md-9">
	                        <input type="text" id="uporder" class="form-control">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-md-3">
	                      <label>Max Students: </label>
	                    </div>
	                    <div class="col-md-9">
	                        <input type="number" id="upmax" class="form-control">
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
	          <h4 class="modal-title"><i class="fa fa-times"></i> Delete Level</h4>
	        </div>
	        <div class="modal-body">
		    	<form id="form-delete">
	            	{{csrf_field()}}
	            	<div class="alert alert-danger alert-dismissible" id="delete-error" hidden="">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <h4><i class="icon fa fa-ban"></i> Errors!</h4>
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
	          <button type="button" class="btn btn-danger" id="delete"><i class="fa fa-check"></i> Delete</button>
	          <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
	        </div>
	      </div>
	      <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
    </div> 

<!-- Code Ajax -->
	<script type="text/javascript">

	// Code Ajax Add
		$(document).on('click', '#add-level', function() {
			$('#modal-add').modal('show');
			$('#form-add').show();
			$('#status').attr('checked', 'checked');
			$('#add-done').attr('hidden', 'hidden');
			$('#add-error').attr('hidden', 'hidden');
		});

		// button Add
			$('#save').click(function(e) {
				e.preventDefault();
				var token = $('input[name=_token]').val();
				var track = $('select[name=track]').val();
				var level = $('input[name=level]').val();
				var order = $('input[name=order]').val();
				var max = $('input[name=max]').val();
				if(token==''||track==''||level==''||order==''||max==''){ return; }
				$.ajax({
					type: 'POST',
					url: '{{route("levels.store")}}',
					data: {
						'_token': token,
						'track': track,
						'level': level,
						'order': order,
						'max': max,
					},
					success: function(data) {
						// location.reload();
						$("#save").removeClass("btn-success").addClass("btn-warning").html("<i class='fa fa-spinner fa-spin'></i> Saving...");
						setTimeout(function(){
							$("#save").removeClass("btn-warning").addClass("btn-success").html("<i class='fa fa-check'></i> Success!");
							setTimeout(function(){
								$("#save").html("<i class='fa fa-check'></i> Save");
								$('.table').append(
									"<tr class='levels"+data.id+"'>"+
										"<td>"+data.id+"</td>"+
										"<td>"+data.trackTitle+"</td>"+
										"<td>"+data.level+"</td>"+
										"<td>"+data.order+"</td>"+
										"<td>"+data.max+"</td>"+
										"<td class='status'><span class='label bg-blue'>Active</span> <a id='actButton' onclick='disactive("+data.id+")' class='active-level btn btn-xs btn-danger'><i class='fa fa-refresh'></i></a></td>"+
										"<td><button type='button' class='edit-level btn btn-xs btn-warning' data-id='"+data.id+"' data-track='"+data.track+"' data-level="+data.level+"' data-order='"+data.order+"' data-max='"+data.max+"' data-status='"+data.status+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
										"<button type='button' class='delete-level btn btn-xs btn-danger' data-id='"+data.id+"' data-track='"+data.track+"' data-level="+data.level+"' data-order='"+data.order+"' data-max='"+data.max+"' data-status='"+data.status+"'><i class='fa fa-remove'></i> Delete</button>"+
										"</td>"+
									"</tr>"
								);
								$('#modal-add').modal('hide');
								$('#track').val('');
								$('#level').val('');
								$('#order').val('');
								$('#max').val('');
							},2000);
						},2000);
					},
					error: function(data) {
						$('#add-done').attr('hidden', 'hidden');
						$('#add-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
					}
				});
			}); 

	// Code Ajax Active 
		function active(id){
 		  	$.ajax({
				type: 'POST',
				url: '{{route("levels.active")}}',
				data: {'id': id , '_token' : $('input[name=_token]').val()},
				success: function(data){ 
					location.reload();
					// if(data == 1){
					// 	$(".levels"+id).removeClass("danger");
					// 	$(".levels"+id+" .status").html('<span class="label bg-blue">Active</span> <button onclick="disactive('+id+')" class="btn btn-xs btn-danger"><i class="fa fa-refresh"></i></button>');
					// }else{
					// 	alert("Error!");
					// }
				},
				error: function(data){
					alert('Error!');
				}
			});	
		}

	// Code Ajax Disactive
		function disactive(id){
 		  	$.ajax({
				type: 'POST',
				url: '{{route("levels.deactive")}}',
				data: {'id': id , '_token' : $('input[name=_token]').val()},
				success: function(data){
					location.reload();
					// if(data == 1){
					// 	$(".levels"+id).addClass("danger");
					// 	$(".levels"+id+" .status").html('<span class="label bg-red">Inactive</span> <button onclick="active('+id+')" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i></button>');
					// }else{
					// 	alert("false");
					// }
				},
				error: function(data){
					alert('Errors');
				}
			});	
		}	

	// Code Ajax Edit
		$(document).on('click', '.edit-level', function() {
			$('#modal-edit').modal('show');
			$('#form-edit').show();
			$('#upid').val($(this).data('id'));
			$('#uptrack').val($(this).data('track'));
			$('#uplevel').val($(this).data('level'));
			$('#uporder').val($(this).data('order'));
			$('#upmax').val($(this).data('max'));
			$('#edit-done').attr('hidden', 'hidden');
			$('#edit-error').attr('hidden', 'hidden');
		});

		// Button Update
			$('#update').click(function(e) {
				e.preventDefault();
				var token = $('input[name=_token]').val();
				var id = $('#upid').val();
				var track = $('#uptrack').val();
				var level = $('#uplevel').val();
				var order = $('#uporder').val();
				var max = $('#upmax').val();
				if(token==''||id==''||track==''||level==''||order==''||max==''){ return; }
				$.ajax({
					type: 'POST',
					url: '{{route("levels.edit")}}',
					data: {
						'_token': token,
						'id': id,
						'track': track,
						'level': level,
						'order': order,
						'max': max,
					},
					success: function(data) {
						location.reload();
						// $("#update").removeClass('btn-success').addClass('btn-warning').html('<i class="fa fa-spinner fa-spin"></i> Updating...');
						// setTimeout(function(){
						// 	$("#update").removeClass('btn-warning').addClass('btn-success').html('<i class="fa fa-check"></i> Success!');
						// 	setTimeout(function(){
						// 		$("#update").html('<i class="fa fa-check"></i> Update');
						// 		$('.levels'+data.id).replaceWith(
						// 			"<tr class='levels"+data.id+"'>"+
						// 				"<td>"+data.id+"</td>"+
						// 				"<td>"+data.trackTitle+"</td>"+
						// 				"<td>"+data.level+"</td>"+
						// 				"<td>"+data.order+"</td>"+
						// 				"<td>"+data.max+"</td>"+
						// 				"<td class='status'>"+(data.status==1 ? "<span class='label bg-blue'>Active</span> <a id='actButton' onclick='disactive("+data.id+")' class='deactive-level btn btn-xs btn-danger'><i class='fa fa-refresh'></i></a>" : "<span class='label bg-red'>Inactive</span> <a id='actButton' onclick='active("+data.id+")' class='active-level btn btn-xs btn-success'><i class='fa fa-refresh'></i></a>")+"</td>"+
						// 				"<td><button type='button' class='edit-level btn btn-xs btn-warning' data-id='"+data.id+"' data-track='"+data.track+"' data-level='"+data.level+"' data-order='"+data.order+"' data-max='"+data.max+"' data-status='"+data.status+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
					    //                 	"<button type='button' class='delete-level btn btn-xs btn-danger' data-id='"+data.id+"' data-track='"+data.trackTitle+"' data-level='"+data.level+"'><i class='fa fa-remove'></i> Delete</button>"+
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
		$(document).on('click', '.delete-level', function() {
			$('#modal-delete').modal('show');
			$('#form-delete').show();
			$('#delid').val($(this).data('id'));
			$('#modal-delete #name').html($(this).data('track')+" | "+$(this).data('level'));
			$('#delete-done').attr('hidden', 'hidden');
			$('#delete-error').attr('hidden', 'hidden');
		});

		// Button Update
			$('#delete').click(function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '{{route("levels.delete")}}',
					data: {
						'_token': $('input[name=_token]').val(),
						'id': $('#delid').val(),
					},
					success: function(data) {
						$('.levels'+ $('#delid').val()).remove();
						$('#modal-delete').modal('hide');
						$('#delete-error').attr('hidden', 'hidden');
						$('#delete-done').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
					},
					error: function(data) {
						$('#delete-done').attr('hidden', 'hidden');
						$('#delete-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
					}
				});
			});

	</script>
  
@endsection