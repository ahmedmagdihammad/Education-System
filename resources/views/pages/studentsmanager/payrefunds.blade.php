@extends('layout.master')
@section('title')
  Refund  
@endsection
@section('contentname')
  <a href="{{route('students')}}"><i class="fa fa-users"></i>Student </a>
  <li><a href="#"><i class="fa fa-money"></i>Payment</a></li>
  <li><i class="fa fa-credit-card"></i> Refund</li> 
@endsection
@section('namepage')
  Students Manager
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-success pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Add New Refund</button>
        <h3 class="box-title">Refund List </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($payrefunds)>0)
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Amount</th>
                <th>Location</th>
                <th>Admin</th>
                <th>Date</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @foreach($payrefunds as $refund)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$refund->amount}}</td>
                <td>{{$refund->location}}</td>
                <td>{{$refund->admin}}</td>
                <td>{{$refund->date}}</td>
                <td>
                  <button type="button" class="edit-refund btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$refund->id}}"><i class="fa fa-edit"></i> Edit</button>
                  <button type="button" class="delete-refund btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$refund->id}}"><i class="fa fa-remove"></i> Delete</button>
                </td>
              </tr>

              <!-- Modal edit -->
                <div class="modal fade" id="modal-edit{{$refund->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{route('payrefund.edit', $refund->id)}}">
                          {{csrf_field()}}
                          <div class="form-group hide">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Payment : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="uppayid" id="uppayid" value="{{$paystud->id}}" placeholder="Enter User">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Amount : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="number" class="form-control" name="upamount" id="upamount" value="{{$refund->amount}}" placeholder="Enter Amount">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Location : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="number" class="form-control" name="uplocation" id="uplocation" value="{{$refund->location}}" placeholder="Enter Location">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Date : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="update" id="update" value="{{$refund->date}}" placeholder="Enter Date">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

              <!-- Modal delete -->
                <div class="modal fade" id="modal-delete{{$refund->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-times"></i> Delete Payment Student</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{route('payrefund.delete', $refund->id)}}">
                          {{csrf_field()}}
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-12">
                              <label>Deleted refund <span style="color:red;"></span></label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Delete</button>
                          <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
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
            <center class="text-danger"><i class="fa fa-frown-o"></i> &nbsp; There is no data to show &nbsp; <i class="fa fa-frown-o"></i></center>
            <br><br><br><br><br><br><br><br>
          @endif
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
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Payment</h4>
        </div>
          <form method="POST" action="{{route('payrefund.store')}}">
            <div class="modal-body">
              {{csrf_field()}}
                <div class="form-group hide">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Payment : </label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="payid" id="payid" placeholder="Enter Payment" value="{{$paystud->id}}" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Amount :</label>
                        </div>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Location : </label>
                        </div>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="location" id="location" placeholder="Enter Location" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-2">
                          <label>Date : </label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" class="form-control" name="date" id="date" value="{{date('d/m/Y')}}" placeholder="Enter Date" required>
                      </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  
@endsection