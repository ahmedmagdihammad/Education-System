@extends('layout.master')
@section('title')
Survey
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
        <button type="button" class="btn btn-xs btn-info pull-right" id="add-job" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i>  Add New Survey</button>
        <h3 class="box-title">Survey List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="" class="table table-bordered table-hover">
          <thead>
          <tr>
			<th>ID</th>
            <th>Gender</th>
            <th>Work</th>
            <th>Salary</th>
            <th>Months</th>
            <th>Study Time</th>
            <th>Study Reason</th>
            <th>Age</th>
			<th>DateTime</th>
			<th>Options</th>
          </tr>
          </thead>
          <tbody>
            @foreach($surveys as $survey)
            <tr>
			  <td>{{$i++}}</td>
			  <td>@if ($survey->gender == 'm') <i class="fa fa-male"></i> @else <i class="fa fa-female"></i> @endif</td>
              <td>{{$survey->work}}</td>
              <td>{{$survey->salary}}</td>
              <td>{{$survey->months}}</td>
              <td>{{$survey->study}}</td>
              <td>{{$survey->reason}}</td>
              <td>{{$survey->age}}</td>
			  <td>{{$survey->datetime}}</td>
			  <td>
			  	<button class="btn btn-xs btn-warning" type="button" data-toggle="modal" data-target="#modal-edit{{$survey->id}}"><i class="fa fa-edit"></i> Edit</button>
			  	<button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#modal-delete{{$survey->id}}"><i class="fa fa-trash"></i> Delete</button>
			  </td>
			</tr>
			
			{{-- Modal Edit --}}
			<div class="modal fade" id="modal-edit{{$survey->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
					</div>
					<form method="POST" action="{{route('survey.edit', $survey->id)}}">
						<div class="modal-body">
							{{csrf_field()}}
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1">Do you work: </label>
									</div>
									<div class="col-md-12">
										<select class="form-control" name="upwork" id="upwork" required="">
											<option selected value="{{$survey->work}}">{{$survey->work}}</option>
											<option value="--">- Select Work -</option>
											<option>No</option>
											<option>Yes</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1">Your salary average: </label>
									</div>
									<div class="col-md-12">
										<select class="form-control" name="upsalary" id="upsalary" required="">
											<option selected value="{{$survey->salary}}"> {{$survey->salary}} </option>
											<option > No Salary </option>
											<option>1,000 to 2,000</option>
											<option>2,000 to 3,000</option>
											<option>3,000 to 4,000</option>
											<option>more than 4,000</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1">What is your expected time to reach satisfied level in english (in months): </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="upmonths" id="upmonths" value="{{$survey->months}}">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1">Why do you think you should study english: </label>
									</div>
									<div class="col-md-12">
										<select class="form-control" name="upstudy" id="upstudy" required="">
											<option selected value="{{$survey->study}}">{{$survey->study}}</option>
											<option value="--">- Select -</option>
											<option>Work</option>
											<option>Interview</option>
											<option>Promotion</option>
											<option>Travel</option>
											<option>Study</option>
											<option>Others</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1">Why you choosed 4Level1: </label>
									</div>
									<div class="col-md-12">
										<select class="form-control" name="upreason" id="upreason" required="">
											<option selected value="{{$survey->reason}}">{{$survey->reason}}</option>
											<option value="--">- Select -</option>
											<option>Work</option>
											<option>Interview</option>
											<option>Promotion</option>
											<option>Travel</option>
											<option>Study</option>
											<option>Others</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1">Gender: </label>
									</div>
									<div class="col-md-12">
										<select class="form-control" name="upgender" id="upgender" required="">
											<option value="{{$survey->gender}}">@if ($survey->gender == 'm') Male @else Female @endif</option>
											<option value="m">Male</option>
											<option value="f">Female</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1">Age: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="upage" placeholder="Age" value="{{$survey->age}}">
									</div>
								</div>
							</div> 
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="exampleInputEmail1">Date Time: </label>
									</div>
									<div class="col-md-12">
									<input class="form-control" type="text" name="updatetime" placeholder="Date time" value="{{$survey->datetime}}">
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
			<div class="modal fade" id="modal-delete{{$survey->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
					</div>
					<form method="POST" action="{{route('survey.delete', $survey->id)}}">
						<div class="modal-body">
							{{csrf_field()}}
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label>Are you sure to delete : <span style="color:red;">Survey</span></label>
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
	  <form method="POST" action="{{route('survey.store')}}">
	    <div class="modal-body">
          	{{csrf_field()}}
          	<div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Do you work: </label>
	              	</div>
	              	<div class="col-md-12">
		              	<select class="form-control" name="work" id="work" required="">
		              		<option selected value="--">- Select Work -</option>
		              		<option>No</option>
		              		<option>Yes</option>
		              	</select>
	              	</div>
	            </div>
          	</div>
          	<div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Your salary average: </label>
	              	</div>
	              	<div class="col-md-12">
		              	<select class="form-control" name="salary" id="salary" required="">
		              		<option selected> No Salary </option>
		              		<option>1,000 to 2,000</option>
		              		<option>2,000 to 3,000</option>
		              		<option>3,000 to 4,000</option>
		              		<option>more than 4,000</option>
		              	</select>
	              	</div>
	            </div>
          	</div>
          	<div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">What is your expected time to reach satisfied level in english (in months): </label>
	              	</div>
	              	<div class="col-md-12">
		              	<input class="form-control" type="text" name="months" id="months">
	              	</div>
	            </div>
          	</div>
          	<div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Why do you think you should study english: </label>
	              	</div>
	              	<div class="col-md-12">
		              	<select class="form-control" name="study" id="study" required="">
		              		<option disabled="" selected="">- Select -</option>
		              		<option>Work</option>
		              		<option>Interview</option>
		              		<option>Promotion</option>
		              		<option>Travel</option>
		              		<option>Study</option>
		              		<option>Others</option>
		              	</select>
	              	</div>
	            </div>
          	</div>
          	<div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Why you choosed 4Level1: </label>
	              	</div>
	              	<div class="col-md-12">
		              	<select class="form-control" name="reason" id="reason" required="">
		              		<option disabled="" selected="">- Select -</option>
		              		<option>Work</option>
		              		<option>Interview</option>
		              		<option>Promotion</option>
		              		<option>Travel</option>
		              		<option>Study</option>
		              		<option>Others</option>
		              	</select>
	              	</div>
	            </div>
			</div>
			<div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Gender: </label>
	              	</div>
	              	<div class="col-md-12">
		              	<select class="form-control" name="gender" id="gender" required="">
		              		<option disabled="" selected="">- Select Gender -</option>
		              		<option value="m">Male</option>
		              		<option value="f">Female</option>
		              	</select>
	              	</div>
	            </div>
			</div>
			<div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Age: </label>
	              	</div>
	              	<div class="col-md-12">
					  <input class="form-control" type="text" name="age" placeholder="Age" >
	              	</div>
	            </div>
			</div> 
			<div class="form-group">
	            <div class="row">
	              	<div class="col-md-12">
	                	<label for="exampleInputEmail1">Date Time: </label>
	              	</div>
	              	<div class="col-md-12">
					  <input class="form-control" type="text" name="datetime" placeholder="Date time" value="{{date('d-m-Y')}}">
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