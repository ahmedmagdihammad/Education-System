@extends('layout.master')
@section('title')
  Location
@endsection
@section('namepage')
  Administration
@endsection
@section('content')

<!-- Table Project -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <button type="button" class="btn btn-xs btn-success pull-right" id="add-location"><i class="fa  fa-plus"></i> Add New Branch</button>
              <h3 class="box-title">Branches List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
	                <tr>
	                  	<th>#</th>
	                  	<th>Name</th>
						<th>Address</th>
						<th>Telephone:</th>
						<th>Options</th>
	                </tr>
                </thead>
                <tbody>
               		@foreach($locations as $location)
					<tr class="location{{$location->id}}">
						<td>{{$i++}}</td>
						<td>{{$location->name}}</td>
						<td>{{$location->address}}</td>
						<td>{{$location->tel}}</td>
	                    <td>
	                    	<button type="button" class="edit-location btn btn-xs btn-warning" data-id="{{$location->id}}" data-name="{{$location->name}}" data-address="{{$location->address}}" data-tel="{{$location->tel}}"><i class="fa fa-edit"></i> Edit</button>
	                    	<button type="button" class="delete-location btn btn-xs btn-danger" data-id="{{$location->id}}" data-name="{{$location->name}}" data-address="{{$location->address}}" data-tel="{{$location->tel}}"><i class="fa fa-remove"></i> Delete</button>
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
    </section>

<!-- Modal Add -->
    <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><i class="fa fa-map-marker"></i> &nbsp; Add New Branch</h4>
          </div>
          <form id="form-add">
            <div class="modal-body">
            	{{csrf_field()}}
                <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Name : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" name="name" id="name"  required="" placeholder="Name">
	                  </div>
	                </div>
                </div>
                <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Address : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" name="address" id="address" required=""  placeholder="Address">
	                  </div>
	                </div>
                </div>
                <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Telephone: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="number" class="form-control" name="tel" id="tel" required="" placeholder="Telephone">
	                  </div>
	                </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-success save" id="save"><i class="fa fa-check"></i> Save</button>
            	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          	</div>
         </form>
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
            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Location</h4>
          </div>
          <form id="form-edit">
            <div class="modal-body">
            	{{csrf_field()}}
	            <div class="form-group" hidden="">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">ID : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control"id="upid"  required="" disabled="">
	                  </div>
	                </div>
                </div>
                <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Name : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control"id="upname"  required="">
	                  </div>
	                </div>
                </div>
                <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Address : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" id="upaddress" required="">
	                  </div>
	                </div>
                </div>
                <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">Telephone: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="number" class="form-control" id="uptel" required="">
	                  </div>
	                </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-success update"><i class="fa fa-check"></i> Update</button>
            	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          	</div>
         </form>
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
	        <h4 class="modal-title"><i class="fa fa-times"></i> Delete Location</h4>
	      </div>
	      <form id="form-delete">
	        <div class="modal-body">
	        	{{csrf_field()}}
	            <div class="form-group" hidden="">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label for="exampleInputEmail1">ID : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control"id="delid"  required="" disabled="">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-12">
	                    <label for="exampleInputEmail1">Name : <span id="delname" style="color: red"></span></label>
	                  </div>
	                </div>
	            </div>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-danger" id="delete"><i class="fa fa-check"></i> Delete</button>
	        	<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
	      	</div>
	     </form>
	    </div>
	    <!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
	</div>
	
<!-- Code Ajax -->
  	<script type="text/javascript">

  	// Code Ajax Add
		$(document).on('click', '#add-location', function() {
			$('#modal-add').modal('show');
		});

		// Button Add
			$('#save').click(function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '{{route("locations.store")}}',
					data: {
						'_token' : $('input[name=_token]').val(),
						'name' : $('input[name=name]').val(),
						'address' : $('input[name=address]').val(),
						'tel' : $('input[name=tel]').val(),
					},
					success: function(data) {
						location.reload();
						// $('.save').html('<i class="fa fa-spin fa-spinner"></i> Saving..');
						// setTimeout(function() {
						// 	$('.save').html('<i class="fa fa-check"></i> Success..');
						// 	setTimeout(function() {
						// 		$('.table').append(
						// 			"<tr class='location"+data.id+"'>"+
						// 				"<td>"+data.id+"</td>"+
						// 				"<td>"+data.name+"</td>"+
						// 				"<td>"+data.address+"</td>"+
						// 				"<td>"+data.tel+"</td>"+
					    //                 "<td><button type='button' class='edit-location btn btn-xs btn-warning' data-id='"+data.id+"' data-name='"+data.name+"' data-address='"+data.address+"' data-tel='"+data.tel+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
					    //                 	"<button type='button' class='delete-location btn btn-xs btn-danger' data-id='"+data.id+"' data-name='"+data.name+"' data-address='"+data.address+"' data-tel='"+data.tel+"'><i class='fa fa-remove'></i> Delete</button>"+
					    //                 "</td>"+
				        //         	"</tr>"
						// 		);
						// 		$('.save').html('<i class="fa fa-check"></i> Save');
						// 		$('#name').val('');
						// 		$('#address').val('');
						// 		$('#tel').val('');
						// 	}, 2000);
						// }, 2000);
					},
					error: function(data) {
						$('.save').html('<i class="fa fa-spin fa-spinner"></i> Saving..');
						setTimeout(function() {
							$('.save').removeClass('btn-success').addClass('btn-danger').html('<i class="fa fa-times"></i> Error!');
							setTimeout(function() {
								$('.save').removeClass('btn-danger').addClass('btn-success').html('<i class="fa fa-check"></i> Save');
							}, 2000);
						}, 2000);
					}
				});
			});

		// Code Ajax Edit
		$(document).on('click', '.edit-location', function() {
			$('#modal-edit').modal('show');
			$('#form-edit').show();
			$('#upid').val($(this).data('id'));
			$('#upname').val($(this).data('name'));
			$('#upaddress').val($(this).data('address'));
			$('#uptel').val($(this).data('tel'));
			$('#edit-error').attr('hidden', 'hidden');
			$('#edit-done').attr('hidden', 'hidden');
		});

		// Button Update
			$('.update').click(function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '{{route("locations.update")}}',
					data: {
						'_token' : $('input[name=_token]').val(),
						'id' : $('#upid').val(),
						'name' : $('#upname').val(),
						'address' : $('#upaddress').val(),
						'tel' : $('#uptel').val(),
					},
					success: function(data) {
						location.reload();
						// $('.location'+ data.id).replaceWith(
						// 	"<tr class='location"+data.id+"'>"+
						// 		"<td>"+data.name+"</td>"+
						// 		"<td>"+data.address+"</td>"+
						// 		"<td>"+data.tel+"</td>"+
			            //         "<td><button type='button' class='edit-location btn btn-xs btn-warning' data-id='"+data.id+"' data-name='"+data.name+"' data-address='"+data.address+"' data-tel='"+data.tel+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
			            //         	"<button type='button' class='delete-location btn btn-xs btn-danger' data-id='"+data.id+"' data-name='"+data.name+"' data-address='"+data.address+"' data-tel='"+data.tel+"'><i class='fa fa-remove'></i> Delete</button>"+
			            //         "</td>"+
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
		$(document).on('click', '.delete-location', function() {
			$('#modal-delete').modal('show');
			$('#form-delete').show();
			$('#delid').val($(this).data('id'));
			$('#delname').text($(this).data('name'));
			$('#delete-error').attr('hidden', 'hidden');
			$('#delete-done').attr('hidden', 'hidden');
  		});
		
		// Button Delete 
			$('#delete').click(function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '{{route("locations.delete")}}',
					data: {
						'_token' : $('input[name=_token]').val(),
						'id' : $('#delid').val(),
					},
					success: function(data) {
						$('.location' + $('#delid').val()).remove();
						$('#delete-error').attr('hidden', 'hidden');
						$('#delete-done').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
						$('#modal-delete').modal('hide');
					},
					error: function(data){
						$('#delete-done').attr('hidden', 'hidden');
						$('#delete-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
					}
				});
			}); 

	</script>
  
@endsection