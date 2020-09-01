@extends('layout.master')
@section('title')
  Absents
@endsection
@section('namepage')
  Absents Manager
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-success pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Add New absent</button>
          <h3 class="box-title">Absents List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($absents)>0)
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Branch</th>
                <th>Teacher</th>
                <th>Date</th>
                <th>Notes</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @foreach($absents as $absent)
              <tr class="absents{{$absent->id}}">
                <td>{{$i++}}</td>
                <td>{{$absent->getBranch['name']}}</td>
                <td>{{$absent->teacher}}</td>
                <td>{{$absent->date}}</td>
                <td>{{$absent->notes}}</td>
                <td>
                  <button type="button" class="edit-absent btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$absent->id}}"><i class="fa fa-edit"></i> Edit</button>
                  <button type="button" class="delete-absent btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$absent->id}}"><i class="fa fa-remove"></i> Delete</button>
                </td>
              </tr>

              <!-- Modal edit -->
                <div class="modal fade" id="modal-edit{{$absent->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                      </div>
                      <form method="POST" action="{{route('absent.update', $absent->id)}}">
                        <div class="modal-body">
                          {{csrf_field()}}
                          @method('PUT')
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Branch : </label>
                              </div>
                              <div class="col-md-10">
                                <select class="form-control" name="upbranch">
                                    <option value="{{$absent->getBranch['id']}}">{{$absent->getBranch['name']}}</option>
                                    @foreach ($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Teacher : </label>
                              </div>
                              <div class="col-md-10">
                                <select class="form-control" name="upteacher">
                                    <option value="{{$absent->id}}">{{$absent->teacher}}</option>
                                </select>
                            </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Notes : </label>
                              </div>
                              <div class="col-md-10">
                              <textarea class="form-control" name="upnotes">{{$absent->notes}}</textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group hide">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Date : </label>
                              </div>
                              <div class="col-md-10">
                                <input class="form-control" name="update" value="{{date('d-m-Y')}}">
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
                <div class="modal fade" id="modal-delete{{$absent->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-times"></i> Delete absent</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{route('absent.destroy', $absent->id)}}">
                          {{csrf_field()}}
                          @method('DELETE')
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-12">
                                <label>Are you sure to delete : <span style="color:red;">{{$absent->teacher}}</span></label>
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
          <h4 class="modal-title"><i class="fa fa-plus"></i> Add New absent</h4>
        </div>
          <form method="POST" action="{{route('absent.store')}}" >
            <div class="modal-body">
              {{csrf_field()}}
              @method('POST')
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Track : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="branch" id="branch" style="width: 100%; color: #000;" required>
                      <option value="">- Select Branch -</option>
                      @foreach($branches as $branch)
                      <option value="{{$branch->id}}">{{$branch->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Teacher : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="teacher" id="teacher" style="width: 100%; color: #000;" required>
                      <option value="">- Select Teacher -</option>
                      <option value="1">1</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Notes : </label>
                  </div>
                  <div class="col-md-10">
                    <textarea class="form-control" name="notes" placeholder="Enter Notes"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group hide">
                <div class="row">
                  <div class="col-md-2">
                    <label>Date : </label>
                  </div>
                  <div class="col-md-10">
                    <input class="form-control" name="date" value="{{date('d-m-Y')}}">
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