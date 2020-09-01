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
        <button type="button" class="btn btn-xs btn-info pull-right" id="add-job" data-toggle="modal" data-target="#modal-add"><i class="fa fa-user"></i>  Add New Survey</button>
        <h3 class="box-title">Survey List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      	@if(count($leads)>0)
        <table id="" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>datetime</th>
            <th>Lead Name	</th>
            <th>Lead Mobile	</th>
            <th>Branch</th>
            <th>Track</th>
            <th>Employee</th>
            <th>Agent</th>
            <th>Options</th>
            <!-- <th>Status</th> -->
          </tr>
          </thead>
          <tbody>
            @foreach($leads as $lead)
            <tr>
	            <td>{{$lead->created_at}}</td>
	           	<td>{{$lead->name}}</td>
	            <td>{{$lead->mobile}}</td>
	            <td>{{$lead->branch}}</td>
	            <td>{{$lead->track}}</td>
	            <td>{{$lead->account}}</td>
	           	<td>
	           		@if($lead->agent == 0) 
	           			<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-agnet{{$lead->id}}"><i class="fa fa-plus"></i> Agent</button> 
	           		@else 
	           			{{$lead->agent}} 
	           		@endif
	            </td>
              	<td>
	            	<button type="button" class="btn btn-xs btn-primary">Make a Call</button>
	            </td>
	            <!-- <td>
	            	<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$lead->id}}"><i class="fa fa-edit"></i> Edit</button>
	            	<button type="button" class="btn btn-xs btn-danger"  data-toggle="modal" data-target="#modal-delete{{$lead->id}}"><i class="fa fa-trash"></i> Delete</button>
	            </td> -->
            </tr>

            <!-- Modal Edit Lead -->
				<div class="modal fade" id="modal-agnet{{$lead->id}}">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">Add Agent</h4>
				      </div>
				    <form method="POST" action="#">
				      	<div class="modal-body">
				          {{csrf_field()}}
				          	<div class="form-group">
					            <div class="row">
					              	<div class="col-md-2">
					                	<label for="exampleInputEmail1">Add Agent: </label>
					              	</div>
					              	<div class="col-md-10">
						              	<select class="form-control" name="upsource" id="upsource" required="">
						              	@foreach($employees as $employee)
						              		<option selected="{{$employee->id}}">{{$employee->name}}</option>
						              	@endforeach
						              	</select>
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

            <!-- Modal Edit Lead -->
				<div class="modal fade" id="modal-edit{{$lead->id}}">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">Edit</h4>
				      </div>
				    <form method="POST" action="{{route('lead.edit', $lead->id)}}">
				      	<div class="modal-body">
				          {{csrf_field()}}
				          	<div class="form-group hidden">
					            <div class="row">
					              	<div class="col-md-2">
					                	<label for="exampleInputEmail1">Employee: </label>
					              	</div>
					              	<div class="col-md-10">
						              	<input class="form-control" type="text" name="upaccount" id="upaccount" value="{{Auth::user()->id}}" required="">
					              	</div>
					            </div>
				          	</div>
				          	<div class="form-group">
					            <div class="row">
					              	<div class="col-md-2">
					                	<label for="exampleInputEmail1">Lead Name: </label>
					              	</div>
					              	<div class="col-md-10">
						              	<input class="form-control" type="text" name="upname" id="upname" value="{{$lead->name}}" required="">
					              	</div>
					            </div>
				          	</div>
				          	<div class="form-group">
					            <div class="row">
					              	<div class="col-md-2">
					                	<label for="exampleInputEmail1">Lead Number: </label>
					              	</div>
					              	<div class="col-md-10">
						              	<input class="form-control" type="number" name="upmobile" id="upmobile" value="{{$lead->mobile}}" required="">
					              	</div>
					            </div>
				          	</div>
				          	<div class="form-group">
					            <div class="row">
					              	<div class="col-md-2">
					                	<label for="exampleInputEmail1">Lead Source: </label>
					              	</div>
					              	<div class="col-md-10">
						              	<select class="form-control" name="upsource" id="upsource" required="">
						              		<option selected="">{{$lead->source}}</option>
						              		<option>Facebook</option>
						              		<option>Friend</option>
						              		<option>Sales</option>
						              	</select>
					              	</div>
					            </div>
				          	</div>
				          	<div class="form-group">
					            <div class="row">
					              	<div class="col-md-2">
					                	<label for="exampleInputEmail1">Lead Track: </label>
					              	</div>
					              	<div class="col-md-10">
						              	<select class="form-control" name="uptrack" id="uptrack">
						              		<option selected="">{{$lead->track}}</option>
						              		<option> No Track </option>
						              		<option>Web</option>
						              		<option>Mobile</option>
						              		<option>Python</option>
						              	</select>
					              	</div>
					            </div>
				          	</div>
				          	<div class="form-group">
					            <div class="row">
					              	<div class="col-md-2">
					                	<label for="exampleInputEmail1">Branch: </label>
					              	</div>
					              	<div class="col-md-10">
						              	<select class="form-control" name="upbranch" id="upbranch" required="">
						              		<option>{{$lead->branch}}</option>
						              		<option selected="">Nasr City</option>
						              	</select>
					              	</div>
					            </div>
				          	</div>
				          	<div class="form-group">
					            <div class="row">
					              	<div class="col-md-2">
					                	<label for="exampleInputEmail1">Notes: </label>
					              	</div>
					              	<div class="col-md-10">
						              	<textarea class="form-control" name="upnotes" id="upnotes" placeholder="Nots">{{$lead->notes}}</textarea>
					              	</div>
					            </div>
				          	</div>
				      	</div>
					    <div class="modal-footer">
					        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-success">Edit</button>
					    </div>
				    </form>
				    </div>
				    <!-- /.modal-content -->
				  </div>
				  <!-- /.modal-dialog -->
				</div>

			<!-- Modal delete Lead -->
				<div class="modal fade" id="modal-delete{{$lead->id}}">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">Delete</h4>
				      </div>
				    <form method="POST" action="{{route('lead.delete', $lead->id)}}">
				      	<div class="modal-body">
				          {{csrf_field()}}
				          	<div class="form-group">
					            <div class="row">
					              	<div class="col-md-2">
					                	<label for="exampleInputEmail1">Lead Name </label>
					              	</div>
					              	<div class="col-md-2">
					              		<p>{{$lead->name}}</p>
					              	</div>
					              	<div class="col-md-2">
					                	<label for="exampleInputEmail1">Lead Mobile </label>
					              	</div>
					              	<div class="col-md-2">
					              		<p>{{$lead->mobile}}</p>
					              	</div>
					              	<div class="col-md-2">
					                	<label for="exampleInputEmail1">Branch </label>
					              	</div>
					              	<div class="col-md-2">
					              		<p>{{$lead->branch}}</p>
					              	</div>
					            </div>
					            <div class="row">
					            	<div class="col-md-2">
					                	<label for="exampleInputEmail1">Track </label>
					              	</div>
					              	<div class="col-md-10">
					              		<p>{{$lead->track}}</p>
					              	</div>
					            </div>
				          	</div>
				      	</div>
					    <div class="modal-footer">
					        <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-danger">Delete</button>
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
        @else
	        <br><br><br><br><br>
	        <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; Not Leads &nbsp; <i class="fa fa-frown-o"></i></center>
	        <br><br><br><br><br><br><br><br>
	    @endif
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>

<!-- Modal Add Lead -->
	<div class="modal fade" id="modal-add">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Default Modal</h4>
	      </div>
	    <form method="POST" action="{{route('lead.store')}}">
	      	<div class="modal-body">
	          {{csrf_field()}}
	          	<div class="form-group hidden">
		            <div class="row">
		              	<div class="col-md-2">
		                	<label for="exampleInputEmail1">Employee: </label>
		              	</div>
		              	<div class="col-md-10">
			              	<input class="form-control" type="text" name="account" id="account" value="{{Auth::user()->id}}" required="">
		              	</div>
		            </div>
	          	</div>
	          	<div class="form-group">
		            <div class="row">
		              	<div class="col-md-2">
		                	<label for="exampleInputEmail1">Lead Name: </label>
		              	</div>
		              	<div class="col-md-10">
			              	<input class="form-control" type="text" name="name" id="name" placeholder="Name" required="">
		              	</div>
		            </div>
	          	</div>
	          	<div class="form-group">
		            <div class="row">
		              	<div class="col-md-2">
		                	<label for="exampleInputEmail1">Lead Number: </label>
		              	</div>
		              	<div class="col-md-10">
			              	<input class="form-control" type="number" name="mobile" id="mobile" placeholder="Mobile" required="">
		              	</div>
		            </div>
	          	</div>
	          	<div class="form-group">
		            <div class="row">
		              	<div class="col-md-2">
		                	<label for="exampleInputEmail1">Lead Source: </label>
		              	</div>
		              	<div class="col-md-10">
			              	<select class="form-control" name="source" id="source" required="">
			              		<option>Facebook</option>
			              		<option>Friend</option>
			              		<option>Sales</option>
			              	</select>
		              	</div>
		            </div>
	          	</div>
	          	<div class="form-group">
		            <div class="row">
		              	<div class="col-md-2">
		                	<label for="exampleInputEmail1">Lead Track: </label>
		              	</div>
		              	<div class="col-md-10">
			              	<select class="form-control" name="track" id="track">
			              		<option selected=""> No Track </option>
			              		<option>Web</option>
			              		<option>Mobile</option>
			              		<option>Python</option>
			              	</select>
		              	</div>
		            </div>
	          	</div>
	          	<div class="form-group">
		            <div class="row">
		              	<div class="col-md-2">
		                	<label for="exampleInputEmail1">Branch: </label>
		              	</div>
		              	<div class="col-md-10">
			              	<select class="form-control" name="branch" id="branch" required="">
			              		<option selected="">Nasr City</option>
			              	</select>
		              	</div>
		            </div>
	          	</div>
	          	<div class="form-group">
		            <div class="row">
		              	<div class="col-md-2">
		                	<label for="exampleInputEmail1">Notes: </label>
		              	</div>
		              	<div class="col-md-10">
			              	<textarea class="form-control" name="notes" id="notes" placeholder="Nots"></textarea>
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