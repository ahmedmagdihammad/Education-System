@extends('layout.master')
@section('title')
Vacations
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
        <button type="button" class="btn btn-xs btn-info pull-right" id="add-job" data-toggle="modal" data-target="#modal-default"><i class="fa fa-calendar"></i>  Vacations History</button>
        <h3 class="box-title">Vacation Request List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="" class="table table-bordered table-hover">
          <thead>
          <tr>
            <!-- <th>Employee</th> -->
            <th>Start Date</th>
            <th>End Date</th>
            <th># of Days</th>
            <th>Credit</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
            @foreach($vacations as $vacation)
            <tr>
              <!-- <td>{{$vacation->account}}</td> -->
              <td>{{$vacation->start_date}}</td>
              <td>{{$vacation->end_date}}</td>
              <td>{{$vacation->of_dayes}}</td>
              <td>{{$vacation->credit}}</td>
              <td>
                @if($vacation->status == 0)
                <a href="{{route('acceptVacation', $vacation->id)}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i> Accept</a>
                <a href="{{route('rejectVacation', $vacation->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Reject</a>
                @endif
                @if($vacation->status == 1)
                  <p style="color: green"><i class="fa fa-check"></i> Accepted</p>
                @endif
                @if($vacation->status == 2)
                  <p style="color: red"><i class="fa fa-times"></i> Rejected</p>
                @endif
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


@endsection