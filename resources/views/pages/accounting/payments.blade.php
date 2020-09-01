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
				  <th>ID</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Total</th>
                  <th>Levels</th>
                  <th>Type</th>
                  <th>Location</th>
                  <th>Created By</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
	                @foreach($payments as $paytyp)
	                <tr>
						<td>{{$i++}}</td>
	                  	<td>{{$paytyp->userid}}</td>
	                  	<td>{{$paytyp->amount}}</td>
	                  	<td>{{$paytyp->total}}</td>
	                  	<td>{{$paytyp->levels}}</td>
	                  	<td>{{$paytyp->type}}</td>
	                  	<td>{{$paytyp->location}}</td>
	                  	<td>{{$paytyp->used}}</td>
	                  	<td>{{$paytyp->date}}</td>
					</tr>
					@endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>

@endsection