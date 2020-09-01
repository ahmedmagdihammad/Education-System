@extends('layout.master')
@section('title')
  Expenses Type
@endsection
@section('namepage')
  Expenses Type
@endsection
@section('content')

<!-- Table Project -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <button type="button" class="btn btn-xs btn-info pull-right"  data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add New Expenses Type</button>
              <h3 class="box-title">Expemses Type List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
	                @foreach($exptypes as $exptype)
	                <tr>
	                  	<td>{{$exptype->name}}</td>
		                <td>
		                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$exptype->id}}"><i class="fa fa-edit"></i> Edit</a>
		                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$exptype->id}}"><i class="fa fa-trash"></i> Delete</a>
		                </td>
	                </tr>

	                <!-- Modal edit -->
					    <div class="modal fade" id="modal-edit{{$exptype->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              <span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
					          </div>
					            <form method="POST" action="{{route('exptype.edit', $exptype->id)}}">
							        <div class="modal-body">
						            	{{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Name : </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upname" id="upname" value="{{$exptype->name}}" placeholder="Enter Name">
							                  </div>
							                </div>
								        </div>
								    </div>
							        <div class="modal-footer">
							            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
							            <button type="submit" class="btn btn-success">Update</button>
							        </div>
					           	</form>
					        </div>
					        <!-- /.modal-content -->
					      </div>
					      <!-- /.modal-dialog -->
					    </div>

					<!-- Modal Delete -->
					    <div class="modal fade" id="modal-delete{{$exptype->id}}">
						    <div class="modal-dialog">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						            <span aria-hidden="true">&times;</span></button>
						          <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
						        </div>
						        <form method="POST" action="{{route('exptype.delete', $exptype->id)}}">
						        	<div class="modal-body">
							          	{{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Name : </label>
							                  </div>
							                  <div class="col-md-10">
							                    <p>{{$exptype->name}}</p>
							                  </div>
							                </div>
							            </div>
						        	</div>
						        	<div class="modal-footer">
						          		<button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
						          		<button type="submit" class="btn btn-danger">Delete</button>
						        	</div>
						       </form>
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
            <h4 class="modal-title"><i class="fa fa-add"></i> Add</h4>
          </div>
            <form method="POST" action="{{route('exptype.store')}}">
		        <div class="modal-body">
	            	{{csrf_field()}}
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Name : </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
		                  </div>
		                </div>
			            </div>
			        </div>
		        <div class="modal-footer">
		            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
		            <button type="submit" class="btn btn-success">Save</button>
		        </div>
           	</form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


@endsection