@extends('layout.master')
@section('title')
  Paytypes
@endsection
@section('namepage')
  Accounting
@endsection
@section('content')

<!-- Table Project -->
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add New</button>
              <h3 class="box-title">Payment Types List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Levels</th>
                  <th>Track</th>
                  <th>status</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
	                @foreach($paytypes as $paytyp)
	                <tr class="paytypes{{$paytyp->id}} @if($paytyp->status == 0) danger @endif">
	                  	<td>{{$paytyp->type}}</td>
	                  	<td>{{$paytyp->amount}}</td>
	                  	<td>{{$paytyp->levels}}</td>
	                  	<td>{{$paytyp->getTrack['title']}}</td>
	                  	<td>
							@if($paytyp->status == 1)
								<span class="label bg-blue">Active</span>
		                    	<a href="{{route('paytypes.active', $paytyp->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-refresh"></i></a>
							@elseif($paytyp->status == 0)
								<span class="label bg-red">Inactive</span>
		                    	<a href="{{route('paytypes.deactive', $paytyp->id)}}" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i></a>
							@endif
						</td>
		                 <td>
		                    <button type="button" class="edit-paytypes btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$paytyp->id}}"><i class="fa fa-edit"></i> Edit</button>
		                    <button type="button" class="delete-paytypes btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$paytyp->id}}"><i class="fa fa-remove"></i> Delete</button>
		                </td>
					</tr>
					
					<!-- Modal Edit -->
						<div class="modal fade" id="modal-edit{{$paytyp->id}}">
							<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
								</div>
								<form id="form-edit">
								<div class="modal-body">
									{{csrf_field()}}
									<div class="form-group">
										<div class="row">
											<div class="col-md-2">
												<label for="exampleInputEmail1">Type : </label>
											</div>
											<div class="col-md-10">
												<input type="text" class="form-control" id="uptype" value="{{$paytyp->type}}" required placeholder="Enter Type">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-2">
												<label for="exampleInputEmail1">Amount : </label>
											</div>
											<div class="col-md-10">
											<input type="number" class="form-control" id="upamount" value="{{$paytyp->amount}}">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-2">
												<label for="exampleInputEmail1">Levels : </label>
											</div>
											<div class="col-md-10">
											<input type="number" class="form-control" id="uplevels" value="{{$paytyp->levels}}" required placeholder="Enter Levels">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-2">
												<label for="exampleInputEmail1">Track : </label>
											</div>
											<div class="col-md-10">
												<select class="form-control" name="uptrack" required>
													<option value="{{$paytyp->id}}">{{$paytyp->getTrack['title']}}</option>
													@foreach ($tracks as $track)
													<option value="{{$track->id}}">{{$track->title}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-success" id="update"><i class="fa fa-check"></i> Update</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
								</div>
							</form>
							</div>
							<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						
						<!-- Modal Delete -->
							<div class="modal fade" id="modal-delete{{$paytyp->id}}">
								<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title"></h4>
									</div>
									<div class="modal-body">
									<form id="form-delete" method="POST" action="{{route('paytypes.delete')}}">
										{{csrf_field()}}
										<div class="form-group">
											<div class="row">
											<div class="col-md-12">
											<label for="exampleInputEmail1">How To Deketed : <span id="deltitle" style="color: red">{{$paytyp->type}}</span></label>
											</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Delete</button>
										<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
									</div>
								</form>
								</div>
								<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div> 
					
						@endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>

<!-- Modal add -->
    <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-plus"></i> Add</h4>
		  </div>
		  <form method="post" action="{{route('paytypes.store')}}">
	        <div class="modal-body">
            	{{csrf_field()}}
	            <div class="form-group">
	            	<div class="row">
			            <div class="col-md-2">
			                <label for="exampleInputEmail1">Type : </label>
			            </div>
			            <div class="col-md-10">
			                <input type="text" class="form-control" name="type" id="type" required placeholder="Enter Type">
			            </div>
		          	</div>
				</div>
				<div class="form-group">
	            	<div class="row">
			            <div class="col-md-2">
			                <label for="exampleInputEmail1" >Amount : </label>
			            </div>
			            <div class="col-md-10">
			                <input type="text" class="form-control" name="amount" id="amount" required placeholder="Enter Amount">
			            </div>
		          	</div>
		        </div>
		        <div class="form-group">
	            	<div class="row">
			            <div class="col-md-2">
			                <label for="exampleInputEmail1">Levels : </label>
			            </div>
			            <div class="col-md-10">
			                <input type="text" class="form-control" name="levels" id="levels" required placeholder="Enter Levels">
			            </div>
		          	</div>
				</div>
				<div class="form-group">
	            	<div class="row">
			            <div class="col-md-2">
			                <label for="exampleInputEmail1">Track : </label>
			            </div>
			            <div class="col-md-10">
							<select class="form-control" name="track" id="track" required>
								<option selected value="--">- Select Track -</option>
								@foreach ($tracks as $track)
									<option value="{{$track->id}}">{{$track->title}}</option>
								@endforeach
							</select>
						</div>
		          	</div>
		        </div>
           </div>
          	<div class="modal-footer">
            	<button type="submit" class="btn btn-success save" id="save"><i class="fa fa-check"></i> Save</button>
            	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
		  	</div>
		</form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

<!-- Code Ajax -->
{{-- <script type="text/javascript">
	// Code Ajax Add
		$(document).on('click', '#add-paytypes', function() {
			$('#modal-add').modal('show');
			$('.modal-title').text('Add Payment Types');
			$('#form-add').show();
			$('#add-error').attr('hidden', 'hidden');
			$('#add-done').attr('hidden', 'hidden');

		// Boutton Add
			$('#save').click(function() {
				$.ajax({
					type: 'POST',
					url: '{{route("paytypes.store")}}',
					data: {
						'_token': $('input[name=_token]').val(),
						'title': $('input[name=title]').val(),
						'amount': $('input[name=amount]').val(),
						'levels': $('input[name=levels]').val(),
						'status': $('input[name=status]:checked').val(),
					},
					success: function(data) {
						location.reload();
					},
					error: function(data) {
						location.reload();

					}
				});
			});
		});

	// Code Ajax edit
		$(document).on('click', '.edit-paytypes', function() {
			$('#modal-edit').modal('show');
			$('.modal-title').text('Edit Paytypes');
			$('#form-edit').show();
			$('#upid').val($(this).data('id'));
			$('#uptitle').val($(this).data('title'));
			$('#upamount').val($(this).data('amount'));
			$('#uplevels').val($(this).data('levels'));
			$('#upstatus1').removeAttr('checked', 'checked');
			$('#upstatus2').removeAttr('checked', 'checked');
			$(($(this).data('status')==1 ? $('#upstatus1').attr('checked', 'checked') : $('#upstatus2').attr('checked', 'checked')).val($(this).data('status')));
			$('#edit-done').attr('hidden', 'hidden');
			$('#edit-error').attr('hidden', 'hidden');

			// Button Update
			$('#update').click(function() {
			$.ajax({
				type: 'POST',
				url: '{{route("paytypes.edit")}}',
				data: {
					'_token': $('input[name=_token]').val(),
					'id': $('#upid').val(),
					'title': $('#uptitle').val(),
					'amount': $('#upamount').val(),
					'levels': $('#uplevels').val(),
					'status': $('input[name=upstatus]:checked').val(),
				},
				success: function(data) {
					location.reload();
				},
				error: function(data) {
					location.reload();

				}
			});
			});
		});

	// Code Ajax Delete
		$(document).on('click', '.delete-paytypes', function() {
			$('#modal-delete').modal('show');
			$('.modal-title').text('Delete Paytypes');
			$('#form-delete').show();
			$('#delid').val($(this).data('id'));
			$('#deltitle').text($(this).data('title'));
			$('#delete-error').attr('hidden', 'hidden');
			$('#delete-done').attr('hidden', 'hidden');

		// Button Delete
			$('#delete').click(function() {
				$.ajax({
					type: 'POST',
					url: '{{route("paytypes.delete")}}',
					data: {
						'_token': $('input[name=_token]').val(),
						'id': $('#delid').val(),
					},
					success: function(data) {
						location.reload();
					},
					error: function(data) {
						location.reload();
					}
				});
			});
		});
</script> --}}
  
@endsection