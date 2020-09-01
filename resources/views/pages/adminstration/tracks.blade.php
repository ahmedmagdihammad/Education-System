@extends('layout.master')
@section('title')
  Tracks
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
          <button type="button" class="btn btn-xs btn-success pull-right" id="add-track"><i class="fa  fa-plus"></i> Add New Track</button>
          <h3 class="box-title">Tracks List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover ">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
				<th>Status</th>
				<th>Options</th>
            </tr>
            </thead>
            <tbody>
            	@foreach($tracks as $track)
				<tr class="tracks{{$track->id}} @if($track->status==0) danger @endif">
					<td>{{$track->id}}</td>
					<td>{{$track->title}}</td>
					<td class="status">
						@if($track->status == 1)
							<span class="label bg-blue">Active</span>
							<a id="actButton" onclick="disactive('{{$track->id}}')" class="deactive-track btn btn-xs btn-danger"><i class="fa fa-refresh"></i></a>&nbsp;
						@elseif($track->status == 0)
							<span class="label bg-red">Inactive</span>
							<a id="actButton" onclick="active('{{$track->id}}')" class="active-track btn btn-xs btn-success"><i class="fa fa-refresh"></i></a>&nbsp;
						@endif
					</td>
                  	<td>
                  		@if($track->status==0) @else @endif
                    	<button type="button" class="edit-track btn btn-xs btn-warning" data-id="{{$track->id}}" data-title="{{$track->title}}" data-status="{{$track->status}}"><i class="fa fa-edit"></i> Edit</button>
                    	<button type="button" class="delete-track btn btn-xs btn-danger" data-id="{{$track->id}}" data-title="{{$track->title}}" data-status="{{$track->status}}"><i class="fa fa-remove"></i> Delete</button>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-university"></i> Add New Track</h4>
        </div>
        <div class="modal-body">
         	<form id="form-add">
            	{{csrf_field()}}
                <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Title : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" required="">
	                  </div>
	                </div>
                </div>
                <div class="form-group" hidden="">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Status : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="radio" name="status" id="status" value="0" checked="" required=""> Deactive
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"></h4>
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
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>ID : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" id="upid"  required="" disabled="">
	                  </div>
	                </div>
                </div>
                <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Title : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" id="uptitle"  required="">
	                  </div>
	                </div>
                </div>
         	</form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="update"><i class="fa fa-check"></i> Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
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
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span></button>
	          <h4 class="modal-title"></h4>
	        </div>
	        <div class="modal-body">
		    	<form id="form-delete">
	            	{{csrf_field()}}
	            	<div class="alert alert-danger alert-dismissible" id="delete-error" hidden="">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <h4><i class="icon fa fa-ban"></i> Errors!</h4>
		                Enter delete the data correctly!!
		             </div>
		             <!-- <div class="alert alert-success alert-dismissible" hidden="" id="delete-done">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <h4><i class="icon fa fa-check"></i> Done Success!</h4>
		                Data delete has been entered.
		            </div> -->
	                <div class="form-group" hidden="">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label>ID : </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" id="delid"  required="" disabled="">
		                  </div>
		                </div>
	                </div>
	                <div class="form-group">
		                <div class="row">
		                  <div class="col-md-12">
		                    <label>How To Deleted : <span id="deltitle" style="color: red"></span></label>
		                  </div>
		                </div>
	                </div>
	         	</form>
	        </div>
	        <div class="modal-footer">
				<button type="button" class="btn btn-danger" id="delete"><i class="fa fa-check"></i> Delete</button>
				<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
	        </div>
	      </div>
	      <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
    </div> 

	<!-- Code Ajax -->
	<script type="text/javascript">

		// Code Ajax Add
		$(document).on('click', '#add-track', function() {
			$('#modal-add').modal('show');
			$('#form-add').show();
			$('#add-error').attr('hidden', 'hidden');
			$('#add-done').attr('hidden', 'hidden');
			$('#status1').attr('checked', 'checked');
		});

		// Button Add
			$('#save').click(function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '{{route("tracks.store")}}',
					data: {
						'_token' : $('input[name=_token]').val(),
						'title' : $('input[name=title]').val(),
						'status' : $('input[name=status]:checked').val(),
					},
					success: function(data) {
						location.reload();
						// $('.table').append(
						// 	"<tr class='tracks"+data.id+"'>"+
						// 		"<td>"+data.id+"</td>"+
						// 		"<td>"+data.title+"</td>"+
						// 		"<td  class='status'>"+((data.status ==1 ? "<span class='label bg-blue'>Active</span>" : "<span class='label bg-danger'>Inactive</span>"))+"</td>"+
			            //       	"<td  class='actived'>"+((data.status==0 ? "<a id='actButton' onclick='active("+data.id+")' class='active-track btn btn-xs btn-success'><i class='fa fa-check'></i> Active</a>&nbsp;" : "< id='actButton' onclick='active("+data.id+")' class='deactive-track btn btn-xs btn-danger'><i class='fa fa-close'></i> Deactivate</a>&nbsp;"))+"&nbsp"+
			            //       	"<button type='button' class='edit-track btn btn-xs btn-warning' data-id='"+data.id+"' data-title='"+data.title+"' data-status='"+data.status+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
			            //         	"<button type='button' class='delete-track btn btn-xs btn-danger' data-id='"+data.id+"' data-title='"+data.title+"' data-status='"+data.status+"'><i class='fa fa-remove'></i> Delete</button>"+
			            //       	"</td>"+
			            // 	"</tr>"
						// );
						// $('.save').html('<i class="fa fa-spin fa-spinner"></i> Saving..');
						// setTimeout(function() {
						// 	$('.save >i').remove();
						// 	$('.save').append(' <i class="fa fa-check"></i>');
						// }, 1000);
						// setTimeout(function() {
						// 	$('.save >i').remove();
						// 	$('.save').removeClass('btn-warning').addClass('btn-success').text('Save');
						// }, 2000);
						// $('#title').val('');
						// $('#status2').removeAttr('checked', 'checked');
						// $('#status1').attr('checked', 'checked');
						// $('#add-error').attr('hidden', 'hidden');
						// $('#add-done').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
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
				url: '{{route("tracks.active")}}',
				data: {'id': id , '_token' : $('input[name=_token]').val()},
				success: function(data){ 
					location.reload();
					// if(data == 1){
					// 	$(".tracks"+id+" .status").html('<span class="label bg-blue">Active</span>');
					// 	$(".tracks"+id+" #actButton").removeClass("btn-success").addClass("btn-danger");
					// 	$(".tracks"+id+" #actButton").html('<i class="fa fa-close"></i> Deactivate');
					// 	$(".tracks"+id+" #actButton").attr('onclick', 'disactive('+id+')');
					// }else{
					// 	alert("false");
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
				url: '{{route("tracks.deactive")}}',
				data: {'id': id , '_token' : $('input[name=_token]').val()},
				success: function(data){
					location.reload();
					// if(data == 1){
					// 	$(".tracks"+id+" .status").html('<span class="label bg-danger">Active</span>');
					// 	$(".tracks"+id+" #actButton").removeClass("btn-danger").addClass("btn-success");
					// 	$(".tracks"+id+" #actButton").html('<i class="fa fa-close"></i> Active');
					// 	$(".tracks"+id+" #actButton").attr('onclick', 'active('+id+')');
					// }else{
					// 	alert("false");
					// }
				},
				error: function(data){
					alert('Errors');
				}
			});	
		}	

	// Cod Ajax Edit
		$(document).on('click', '.edit-track', function() {
			$('#modal-edit').modal('show');
			$('.modal-title').text('Edit Track');
			$('#form-edit').show();
			$('#upid').val($(this).data('id'));
			$('#uptitle').val($(this).data('title'));
			$('#edit-done').attr('hidden', 'hidden');
			$('#edit-error').attr('hidden', 'hidden');
		});

		// Button Edit
			$('#update').click(function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '{{route("tracks.update")}}',
					data: {
						'_token' : $('input[name=_token]').val(),
						'id' : $('#upid').val(),
						'title' : $('#uptitle').val()
					},
					success: function(data) {
						location.reload();
						// $('.tracks'+data.id).replaceWith(
						// 	"<tr class='tracks"+data.id+"'>"+
						// 		"<td>"+data.title+"</td>"+
						// 		"<td  class='status'>"+((data.status ==1 ? "<span class='label bg-blue'>Active</span>" : "<span class='label bg-danger'>Inactive</span>"))+"</td>"+
			            //       	"<td  class='actived'>"+((data.status==0 ? "<a id='actButton' onclick='active("+data.id+")' class='active-track btn btn-xs btn-success'><i class='fa fa-check'></i> Active</a>&nbsp;" : "<a id='actButton' onclick='active("+data.id+")' class='deactive-track btn btn-xs btn-danger'><i class='fa fa-close'></i> Deactivate</a>&nbsp;"))+"&nbsp"+
			            //       	"<button type='button' class='edit-track btn btn-xs btn-warning' data-id='"+data.id+"' data-title='"+data.title+"' data-status='"+data.status+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
			            //         	"<button type='button' class='delete-track btn btn-xs btn-danger' data-id='"+data.id+"' data-title='"+data.title+"' data-status='"+data.status+"'><i class='fa fa-remove'></i> Delete</button>"+
			            //       	"</td>"+
			            // 	"</tr>"
						// );
						// $('#edit-error').attr('hidden', 'hidden');
						// $('#edit-done').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
						// $('#modal-edit').modal('hide');
					},
					error: function(data) {
						$('#edit-done').attr('hidden', 'hidden');
						$('#edit-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
					}
				});
			});

	// Code Ajax Delete
		$(document).on('click', '.delete-track', function() {
			$('#modal-delete').modal('show');
			$('.modal-title').text('Delete Track');
			$('#form-delete').show();
			$('#delid').val($(this).data('id'));
			$('#deltitle').text($(this).data('title'));
			$('#delete-done').attr('hidden', 'hidden');
			$('#delete-error').attr('hidden', 'hidden');
		});

		// Button Delete
			$('#delete').click(function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '{{route("tracks.delete")}}',
					data: {
						'_token' : $('input[name=_token]').val(),
						'id' : $('#delid').val(),
					},
					success: function(data) {
						$('.tracks'+ $('#delid').val()).remove();
						$('#delete-error').attr('hidden', 'hidden');
						$('#delete-done').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
						$('#modal-delete').modal('hide');
					},
					error: function(data) {
						$('#delete-done').attr('hidden', 'hidden');
						$('#delete-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
					}
				});
			});

	</script>
  
@endsection