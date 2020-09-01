@extends('layout.master')
@section('title')
  Students
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
          <h3 class="box-title">Students List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($students)>0)
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Track</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Branch</th>
                <th>Date</th>
                <th>Level</th>
                <th>Group</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)
              <tr class="students{{$student->id}}">
                <td>{{$i++}}</td>
                @if($student->getTrack)
                  <td>{{$student->getTrack['title']}}</td>
                @else
                  <td style="color:red;">Deleted</td>
                @endif
                <td>@if($student->gender == 'M')<i class="fa fa-male"></i>@elseif($student->gender == 'F')<i class="fa fa-female"></i>@endif {{$student->name}}</td>
                <td>{{$student->mobile}}</td>
                <td>{{$student->getBranch['name']}}</td>
                <td>{{date("Y-m-d", strtotime($student->date))}}</td>
                <td><button type="button" class="active-student btn btn-xs btn-warning"><i class="fa fa-graduation-cap"></i> Placement</button></td>
                <td><button type="button" class="active-student btn btn-xs btn-info"><i class="fa fa-group"></i> 123548</button></td>
                <td>
                  <button type="button" class="edit-student btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$student->id}}"><i class="fa fa-edit"></i> Edit</button>
                  <button type="button" class="delete-student btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$student->id}}"><i class="fa fa-remove"></i> Delete</button>
                  <a href="{{route('paystud', $student->id)}}" class="active-student btn btn-xs btn-primary"><i class="fa fa-dollar"></i> Payment</a>
                </td>
              </tr>
              
              <!-- Modal edit -->
                <div class="modal fade" id="modal-edit{{$student->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{route('student.edit', $student->id)}}">
                          {{csrf_field()}}
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Track : </label>
                              </div>
                              <div class="col-md-10">
                                <select class="form-control" name="uptrack" id="uptrack" style="width: 100%; color: #000;">
                                  <option value=""> - Select Track - </option>
                                  @foreach($tracks as $track)
                                  <option value="{{$track->id}}" @if($student->track==$track->id) selected @endif>{{$track->title}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Name : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="upname" id="upname" value="{{$student->name}}" placeholder="Enter Name">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>ID : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="upidnumber" id="upidnumber" value="{{$student->idnumber}}" placeholder="Enter ID Number">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>E-Mail : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="email" class="form-control" name="upemail" id="upemail" value="{{$student->email}}" placeholder="Enter ID E-Mail">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Mobile : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="upmobile" id="upmobile" value="{{$student->mobile}}" placeholder="Enter Mobile">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Mobile 2 : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="upmobile2" id="upmobile2" value="{{$student->mobile2}}" placeholder="Enter Mobile 2">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Branch : </label>
                              </div>
                              <div class="col-md-10">
                                <select class="form-control" name="upbranch" id="upbranch" style="width: 100%; color: #000;">
                                  <option value=""> - Select Branch - </option>
                                  @foreach($locations as $location)
                                  <option value="{{$location->id}}" @if($student->location==$location->id) selected @endif>{{$location->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Area : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="uparea" id="uparea" value="{{$student->area}}" placeholder="Enter Area">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Address : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="upaddress" id="upaddress" value="{{$student->address}}" placeholder="Enter Address">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Job : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="upjob" id="upjob" value="{{$student->job}}" placeholder="Enter Job">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Gender: </label>
                              </div>
                              <div class="col-md-10">
                                <select class="form-control" name="upgender" id="upgender" style="width: 100%; color: #000;">
                                  <option value=""> - Select Gender - </option>
                                  <option value="M" @if($student->gender=='M') selected @endif>Male</option>
                                  <option value="F" @if($student->referal=='F') selected @endif>Female</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Referal : </label>
                              </div>
                              <div class="col-md-10">
                                <select class="form-control" name="upreferal" required>
                                  <option>- Select Referal -</option>
                                  <option value="C" @if($student->referal=='C') selected @endif>Call Center</option>
                                  <option value="F" @if($student->referal=='F') selected @endif>Facebook</option>
                                  <option value="R" @if($student->referal=='R') selected @endif>Friend</option>
                                  <option value="O" @if($student->referal=='O') selected @endif>Others</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Cause : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="upcause" id="upcause" value="{{$student->cause}}" placeholder="Enter Cause" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Target : </label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="uptarget" id="uptarget" value="{{$student->target}}" placeholder="Enter Target" required>
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
                <div class="modal fade" id="modal-delete{{$student->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-times"></i> Delete Student</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{route('student.delete', $student->id)}}">
                          {{csrf_field()}}
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-12">
                                <label>Are you sure to delete : <span style="color:red;">{{$student->name}}</span></label>
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
          <h4 class="modal-title"><i class="fa fa-user"></i> Add New Student</h4>
        </div>
          <form method="POST" action="{{route('student.store')}}">
            <div class="modal-body">
              {{csrf_field()}}
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Track : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="track" id="track" style="width: 100%; color: #000;" required>
                      <option value="">- Select Track -</option>
                      @foreach($tracks as $track)
                      <option value="{{$track->id}}">{{$track->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Name : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>ID :</label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="idnumber" id="idnumber" placeholder="Enter ID Number" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>E-Mail : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter ID E-Mail" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Mobile : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Mobile 2 : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="mobile2" id="mobile2" placeholder="Enter Mobile 2" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Branch : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="branch" id="branch" style="width: 100%; color: #000;" required>
                      <option value="">- Select Branch -</option>
                      @foreach($locations as $location)
                      <option value="{{$location->id}}">{{$location->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Area : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="area" id="area" placeholder="Enter Area" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Address : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Job : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="job" id="job" placeholder="Enter Job" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Gender: </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="gender" id="gender" required>
                      <option value=""> - Select Gender - </option>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Referal : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="referal" required>
                      <option value="">- Select Referal -</option>
                      <option value="C">Call Center</option>
                      <option value="F">Facebook</option>
                      <option value="R">Friend</option>
                      <option value="O">Others</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Cause : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="cause" id="cause" placeholder="Enter why to study this track" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Target : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="target" id="target" placeholder="Enter study target" required>
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