@extends('layout.master')
@section('title')
  Expenses
@endsection
@section('namepage')
  Expenses
@endsection
@section('content')

<!-- Table Project -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add New Expenses</button>
              <h3 class="box-title">Expemses List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Amount</th>
                  <th>Branch</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
	                @foreach($expenses as $expense)
	                <tr class="expensees{{$expense->id}} @if($expense->status == 0) danger @endif">
	                  	<td>{{$expense->amount}}</td>
	                  	<td>{{$expense->getBranch['name']}}</td>
	                  	<td>{{$expense->desc}}</td>
	                  	<td>{{$expense->date}}</td>
	                  	<td>@if($expense->status == 1)
							<span class="label bg-blue">Active</span>
							<a href="{{route('expense.deactive', $expense->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-refresh"></i></a>
							@elseif($expense->status == 0)
								<span class="label bg-red">Inactive</span>
								<a href="{{route('expense.active', $expense->id)}}" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i></a>
							@endif
						</td>
		                 <td>
		                    <button type="button" class="edit-expensees btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$expense->id}}"><i class="fa fa-edit"></i> Edit</button>
		                    <button type="button" class="delete-expensees btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$expense->id}}"><i class="fa fa-trash"></i> Delete</button>
		                </td>
	                </tr>

	                <!-- Modal Edit -->
					    <div class="modal fade" id="modal-edit{{$expense->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              <span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
					          </div>
					            <form method="POST" action="{{route('expense.edit', $expense->id)}}">
							        <div class="modal-body">
						            	{{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">amount : </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input type="text" class="form-control" name="upamount" id="upamount" value="{{$expense->amount}}" placeholder="Enter amount">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Branch : </label>
							                  </div>
							                  <div class="col-md-10">
							                    <select class="form-control" name="upbranch_id" required="">
							                    	<option selected="" value="{{$expense->getBranch['id']}}">{{$expense->getBranch['name']}}</option>
							                    	@foreach($branches as $branch)
							                    	<option value="{{$branch->id}}">{{$branch->name}}</option>
							                    	@endforeach
							                    </select>
							                  </div>
							                </div>
							            </div>
							            <div class="form-group hide">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Created by : </label>
							                  </div>
							                  <div class="col-md-10">
											  <input class="form-control" type="text" name="upuserid" value="{{Auth::user()->id}}" placeholder="Enter Created by" required>
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label >Date : </label>
							                  </div>
							                  <div class="col-md-10">
							                    <input class="form-control" type="text" name="update" required="" value="{{$expense->date}}" placeholder="Enter Date">
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Description : </label>
							                  </div>
							                  <div class="col-md-10">
							                    <textarea class="form-control" name="updescription" placeholder="Enter Description">{{$expense->desc}}</textarea>
							                  </div>
							                </div>
							            </div>
							             
							        </div>
							        <div class="modal-footer">
							            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
							            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-close"></i> Close</button>
							        </div>
					           	</form>
					        </div>
					        <!-- /.modal-content -->
					      </div>
					      <!-- /.modal-dialog -->
					    </div>

					<!-- Modal Delete -->
					    <div class="modal fade" id="modal-delete{{$expense->id}}">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					              <span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
					          </div>
					            <form method="POST" action="{{route('expense.delete', $expense->id)}}">
							        <div class="modal-body">
						            	{{csrf_field()}}
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Amount : </label>
							                  </div>
							                  <div class="col-md-10">
							                    <p>{{$expense->amount}}</p>
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Branch : </label>
							                  </div>
							                  <div class="col-md-10">
							                    <p>{{$expense->getBranch['name']}}</p>
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label >Date : </label>
							                  </div>
							                  <div class="col-md-10">
							                    <p>{{$expense->date}}</p>
							                  </div>
							                </div>
							            </div>
							            <div class="form-group">
							                <div class="row">
							                  <div class="col-md-2">
							                    <label for="exampleInputEmail1">Description: </label>
							                  </div>
							                  <div class="col-md-10">
							                    <p>{{$expense->desc}}</p>
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
            <form method="POST" action="{{route('expense.store')}}">
		        <div class="modal-body">
	            	{{csrf_field()}}
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Amount : </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter amount" required>
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Branch : </label>
		                  </div>
		                  <div class="col-md-10">
		                    <select class="form-control" name="branch_id" required="">
		                    	@foreach($branches as $branch)
		                    	<option value="{{$branch->id}}">{{$branch->name}}</option>
		                    	@endforeach
		                    </select>
		                  </div>
		                </div>
		            </div>
		            <div class="form-group hide">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Created by : </label>
		                  </div>
		                  <div class="col-md-10">
						  	<input class="form-control" type="text" name="userid" value="{{Auth::user()->id}}" placeholder="Enter Created by" required>
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label >Date : </label>
		                  </div>
		                  <div class="col-md-10">
		                    <input class="form-control" type="text" name="date" value="{{date('d-m-Y')}}" required="" placeholder="Enter Date">
		                  </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-2">
		                    <label for="exampleInputEmail1">Description : </label>
		                  </div>
		                  <div class="col-md-10">
		                    <textarea class="form-control" name="description" placeholder="Enter Description"></textarea>
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