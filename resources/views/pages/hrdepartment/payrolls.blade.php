@extends('layout.master')
@section('title')
    Payroll
@endsection
@section('namepage')
    HR Manager
@endsection
@section('content')

<!-- Table Project -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header">
        <button type="button" class="btn btn-xs btn-info pull-right" id="add-job" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i>  Add New Payroll</button>
        <h3 class="box-title">Payroll List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="" class="table table-bordered table-hover">
          <thead>
          <tr>
			<th>ID</th>
            <th>Code</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Salary</th>
            <th>Work days</th>
            <th>Overtime</th>
            <th>deduction</th>
			<th>Advance</th>
			<th>All owance</th>
			<th>Total</th>
			<th>Date</th>
			<th>Options</th>
          </tr>
          </thead>
          <tbody>
            @foreach($payrolls as $payroll)
            <tr>
			  <td>{{$i++}}</td>
              <td>{{$payroll->code}}</td>
              <td>{{$payroll->name}}</td>
              <td>{{$payroll->mobile}}</td>
              <td>{{$payroll->salary}}</td>
              <td>{{$payroll->workdays}}</td>
              <td>{{$payroll->overtime}}</td>
			  <td>{{$payroll->deduction}}</td>
			  <td>{{$payroll->advance}}</td>
			  <td>{{$payroll->allowance}}</td>
			  <td>{{$payroll->total}}</td>
			  <td>{{$payroll->date}}</td>
			  <td>
			  	<button class="btn btn-xs btn-warning" type="button" data-toggle="modal" data-target="#modal-edit{{$payroll->id}}"><i class="fa fa-edit"></i> Edit</button>
			  	<button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#modal-delete{{$payroll->id}}"><i class="fa fa-trash"></i> Delete</button>
			  </td>
			</tr>
			
			{{-- Modal Edit --}}
			<div class="modal fade" id="modal-edit{{$payroll->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
					</div>
					<form method="POST" action="{{route('payroll.update', $payroll->id)}}">
						<div class="modal-body">
                            {{csrf_field()}}
                            @method('PUT')
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1"> Code: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="upcode" id="upcode" value="{{$payroll->code}}" required>
									</div>
								</div>
                            </div>
                            <div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1"> Name: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="upname" id="upname" value="{{$payroll->name}}" required>
									</div>
								</div>
                            </div>
                            <div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1"> Mobile: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="upmobile" id="upmobile" value="{{$payroll->mobile}}" required>
									</div>
								</div>
                            </div>
                            <div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1"> Salary: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="upsalary" id="upsalary" value="{{$payroll->salary}}" required>
									</div>
								</div>
                            </div>
                            <div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1"> Work Days: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="upworkdays" id="upworkdays" value="{{$payroll->workdays}}" required>
									</div>
								</div>
                            </div>
                            <div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1"> Overtime: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="upovertime" id="upovertime" value="{{$payroll->overtime}}" required>
									</div>
								</div>
                            </div>
                            <div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1"> Deduction: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="updeduction" id="updeduction" value="{{$payroll->deduction}}" required>
									</div>
								</div>
                            </div>
                            <div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1"> Advance: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="upadvance" id="upadvance" value="{{$payroll->advance}}" required>
									</div>
								</div>
                            </div>
                            <div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1"> All owance: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="upallowance" id="upallowance" value="{{$payroll->allowance}}" required>
									</div>
								</div>
                            </div>
                            <div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1"> Total: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="uptotal" id="uptotal" value="{{$payroll->total}}" required>
									</div>
								</div>
                            </div>
                            <div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1"> Date: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="update" id="update" value="{{$payroll->date}}" required>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
						</div>
					</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>

			{{-- Modal Delete --}}
			<div class="modal fade" id="modal-delete{{$payroll->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
					</div>
					<form method="POST" action="{{route('payroll.destroy', $payroll->id)}}">
						<div class="modal-body">
                            {{csrf_field()}}
                            @method('DELETE')
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label>Are you sure to delete : <span style="color:red;"> {{$payroll->name}}</span></label>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Add</h4>
	  </div>
	  <form method="POST" action="{{route('payroll.store')}}">
	    <div class="modal-body">
          	{{csrf_field()}}
          	<div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Code: </label>
	              	</div>
	              	<div class="col-md-12">
		              	<input class="form-control" type="text" name="code" id="code" placeholder="Enter Code" required>
	              	</div>
	            </div>
          	</div>
			<div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Name: </label>
	              	</div>
	              	<div class="col-md-12">
					  <input class="form-control" type="text" name="name" placeholder="name" placeholder="Enter Name" required>
	              	</div>
	            </div>
			</div> 
			<div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Mobile: </label>
	              	</div>
	              	<div class="col-md-12">
					  <input class="form-control" type="text" name="mobile" placeholder="Enter Date time" required>
	              	</div>
	            </div>
          	</div> 
            <div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Salary: </label>
	              	</div>
	              	<div class="col-md-12">
					  <input class="form-control" type="text" name="salary" placeholder="Enter Salary" required>
	              	</div>
	            </div>
            </div>
            <div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Work Days: </label>
	              	</div>
	              	<div class="col-md-12">
					  <input class="form-control" type="text" name="workdays" placeholder="Enter Work Days" required>
	              	</div>
	            </div>
            </div>
            <div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Overtime: </label>
	              	</div>
	              	<div class="col-md-12">
					  <input class="form-control" type="text" name="overtime" placeholder="Enter Over Time" required>
	              	</div>
	            </div>
          	</div>
            <div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Deduction: </label>
	              	</div>
	              	<div class="col-md-12">
					  <input class="form-control" type="text" name="deduction" placeholder="Enter Deduction" required>
	              	</div>
	            </div>
            </div>
            <div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Advance: </label>
	              	</div>
	              	<div class="col-md-12">
					  <input class="form-control" type="text" name="advance" placeholder="Enter Advance" required>
	              	</div>
	            </div>
            </div>
            <div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">All owance: </label>
	              	</div>
	              	<div class="col-md-12">
					  <input class="form-control" type="text" name="allowance" placeholder="Enter All owance" required>
	              	</div>
	            </div>
            </div>
            <div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Total: </label>
	              	</div>
	              	<div class="col-md-12">
					  <input class="form-control" type="text" name="total" placeholder="Enter Total" required>
	              	</div>
	            </div>
            </div>
            <div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Date: </label>
	              	</div>
	              	<div class="col-md-12">
                      <input class="form-control" type="text" name="date" placeholder="Enter Date" value="{{date('d-m-Y')}}" required>
	              	</div>
	            </div>
          	</div>
        </div>
      	<div class="modal-footer">
        	<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
        	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
	  	</div>
	</form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@endsection