@extends('layout.master')
@section('title')
  Payment  
@endsection
@section('contentname')
  <a href="{{route('students')}}"><i class="fa fa-users"></i> Student</a>
  <li><i class="fa fa-money"></i> Payment</li> 
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
          <button type="button" class="btn btn-xs btn-success pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Add New Student</button>
        <h3 class="box-title">Payment List : {{$student->name}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($paystuds)>0)
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Amount</th>
                <th>Total</th>
                <th>Levels</th>
                <th>Type</th>
                <th>Location</th>
                <th>Used</th>
                <th>Date</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @foreach($paystuds as $paystud)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$paystud->amount}}</td>
                <td>{{$paystud->total}}</td>
                <td>{{$paystud->levels}}</td>
                <td>{{$paystud->type}}</td>
                <td>{{$paystud->location}}</td>
                <td>{{$paystud->used}}</td>
                <td>{{$paystud->date}}</td>
                <td>
                  <button type="button" class="edit-paystud btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$paystud->id}}"><i class="fa fa-edit"></i> Edit</button>
                  <button type="button" class="delete-paystud btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$paystud->id}}"><i class="fa fa-remove"></i> Delete</button>
                  <a href="{{route('payrefund', $paystud->id)}}" class="delete-paystud btn btn-xs btn-info"><i class="fa fa-credit-card"></i> Refund</a>
                </td>
              </tr>

              <!-- Modal edit -->
                <div class="modal fade" id="modal-edit{{$paystud->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{route('paystud.edit', $paystud->id)}}">
                          {{csrf_field()}}
                          <div class="form-group hide">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Student : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="upuserid" id="upuserid" value="{{$student->id}}" placeholder="Enter User">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Amount : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="number" class="form-control" name="upamount" id="upamount" value="{{$paystud->amount}}" placeholder="Enter Amount">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Total : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="number" class="form-control" name="uptotal" id="uptotal" value="{{$paystud->total}}" placeholder="Enter Totla">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Levels : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="number" class="form-control" name="uplevels" id="uplevels" value="{{$paystud->levels}}" placeholder="Enter Levels">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Type : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="uptype" id="uptype" value="{{$paystud->type}}" placeholder="Enter Type">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Location : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="number" class="form-control" name="uplocation" id="uplocation" value="{{$paystud->location}}" placeholder="Enter Location">
                              </div>
                            </div>
                          </div>
                          <div class="form-group hide">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Used : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="number" class="form-control" name="upused" id="upused" value="{{Auth::user()->id}}" placeholder="Enter Used">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Date : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="update" id="update" value="{{$paystud->date}}" placeholder="Enter Date">
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
                <div class="modal fade" id="modal-delete{{$paystud->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-times"></i> Delete Payment Student</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{route('paystud.delete', $paystud->id)}}">
                          {{csrf_field()}}
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-12">
                              <label>Deleted Payment <span style="color:red;">{{$paystud->userid}}</span></label>
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
          <form method="POST" action="{{route('paystud.store')}}">
            <div class="modal-body">
              {{csrf_field()}}
                <div class="form-group hide">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Student : </label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="userid" id="userid" placeholder="Enter Student" value="{{$student->id}}" required>
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
                            <label>Total : </label>
                        </div>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="total" id="total" placeholder="Enter Total" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Levels : </label>
                        </div>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="levels" id="levels" placeholder="Enter Levels" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Type : </label>
                        </div>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="type" id="type" placeholder="Enter Type" required>
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
                <div class="form-group hide">
                    <div class="row">
                        <div class="col-md-2 ">
                            <label>Used : </label>
                        </div>
                        <div class="col-md-10">
                        <input type="number" class="form-control" name="used" id="used" value="{{Auth::user()->id}}"placeholder="Enter Used" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Date : </label>
                        </div>
                        <div class="col-md-10">
                        <input type="text" class="form-control" name="date" id="date" value="{{date('d-m-Y')}}" placeholder="Enter Date" required>
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