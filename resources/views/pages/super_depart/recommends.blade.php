@extends('layout.master')
@section('title')
  Recommend
@endsection
@section('namepage')
  Recommend
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-success pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Add New recommend</button>
          <h3 class="box-title">Recommend List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($recommends)>0)
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
              @foreach($recommends as $recommend)
              <tr class="recommends{{$recommend->id}}">
                <td>{{$i++}}</td>
                <td>{{$recommend->getBranch['name']}}</td>
                <td>{{$recommend->teacher}}</td>
                <td>{{$recommend->date}}</td>
                <td>{{$recommend->notes}}</td>
                <td>
                  <button type="button" class="edit-recommend btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$recommend->id}}"><i class="fa fa-edit"></i> Edit</button>
                  <button type="button" class="delete-recommend btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$recommend->id}}"><i class="fa fa-remove"></i> Delete</button>
                </td>
              </tr>

              <!-- Modal edit -->
                <div class="modal fade" id="modal-edit{{$recommend->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                      </div>
                      <form method="POST" action="{{route('recommends.update', $recommend->id)}}">
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
                                    <option value="{{$recommend->getBranch['id']}}">{{$recommend->getBranch['name']}}</option>
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
                                    <option value="{{$recommend->id}}">{{$recommend->teacher}}</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Recommend: </label>
                              </div>
                              <div class="col-md-10">
                              <input class="form-control" name="uprecommend" value="{{$recommend->recommend}}" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-2">
                                <label>Notes : </label>
                              </div>
                              <div class="col-md-10">
                              <textarea class="form-control" name="upnotes">{{$recommend->notes}}</textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
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
                <div class="modal fade" id="modal-delete{{$recommend->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{route('recommends.destroy', $recommend->id)}}">
                          {{csrf_field()}}
                          @method('DELETE')
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-12">
                                <label>Are you sure to delete : <span style="color:red;">{{$recommend->teacher}}</span></label>
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
          <h4 class="modal-title"><i class="fa fa-plus"></i> Add New recommend</h4>
        </div>
          <form method="POST" action="{{route('recommends.store')}}" >
            <div class="modal-body">
              {{csrf_field()}}
              @method('POST')
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Branch : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="branch" id="branch" style="width: 100%; color: #000;" required>
                      <option value="--">- Select Branch -</option>
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
                      <option value="--">- Select Teacher -</option>
                      <option value="1">1</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Recommend : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" class="form-control" name="recommend" placeholder="Enter Recommend" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Notes : </label>
                  </div>
                  <div class="col-md-10">
                    <textarea class="form-control" name="notes" placeholder="Enter Notes" required></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Date : </label>
                  </div>
                  <div class="col-md-10">
                    <input class="form-control" name="date" value="{{date('d-m-Y')}}" required>
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