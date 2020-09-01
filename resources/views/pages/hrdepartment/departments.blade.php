@extends('layout.master')
@section('title')
  Departments
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
          <button type="button" class="btn btn-xs btn-success pull-right" id="add-department"><i class="fa  fa-plus"></i> Add New Department</button>
          <h3 class="box-title">Departments List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($departments)>0)
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Parent</th>
              <th>Manager</th>
              <th>Options</th>
            </tr>
            </thead>
            <tbody>
              @foreach($departments as $depart)
              <tr class="departments{{$depart->id}}">
                <td>{{$depart->id}}</td>
                <td>{{$depart->title}}</td>
                <td>@if($depart->parent==0) -- @else {{$depart->getParent['title']}} @endif</td>
                <td>@if($depart->manager == 0)
                 <button type="button" class="add-manager btn btn-xs btn-info" data-toggle="modal" data-target="#modal_add_manager{{$depart->id}}"><i class="fa fa-user-plus"></i></button>
                  @else {{$depart->getEmployee['name']}} <button type="button" class="delete-manager btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_delete_manager{{$depart->id}}"><i class="fa fa-trash"></i></button> @endif</td>
                <td>
                  <button type="button" class="edit-department btn btn-xs btn-warning" data-id="{{$depart->id}}" data-title="{{$depart->title}}" data-parent="{{$depart->parent}}" data-manager="{{$depart->manager}}"><i class="fa fa-edit"></i> Edit</button>
                  <button type="button" class="delete-department btn btn-xs btn-danger" data-id="{{$depart->id}}" data-title="{{$depart->title}}" data-parent="{{$depart->parent}}" data-manager="{{$depart->manager}}"><i class="fa fa-remove"></i> Delete</button>
                </td>
              </tr>

              <!-- Modal add-manager -->
                <div class="modal fade" id="modal_add_manager{{$depart->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Manager</h4>
                      </div>
                        <form id="form-add-manager" method="POST" action="{{route('addmanager', $depart->id)}}">
                          <div class="modal-body">
                            {{csrf_field()}}
                            <div class="form-group hidden">
                              <div class="row">
                                <div class="col-md-2">
                                  <label for="exampleInputEmail1">Title : </label>
                                </div>
                                <div class="col-md-10">
                                  <input type="text" class="form-control" name="addmanagname" id="addmanagtitle" value="{{$depart->title}}">
                                </div>
                              </div>
                            </div>
                            <div class="form-group hidden">
                              <div class="row">
                                <div class="col-md-2">
                                  <label for="exampleInputEmail1">Parent : </label>
                                </div>
                                <div class="col-md-10">
                                  <select class="form-control " name="addmanagparent" id="addmanagparent" style="width: 100%; color: #000">
                                    @if($depart->parent != 0) <option selected="" value="{{$depart->getParent['id']}}">{{$depart->getParent['title']}}</option> @else <option selected="" value="0">- No Parent -</option> @endif
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                  <label for="exampleInputEmail1">Manager : </label>
                                </div>
                                <div class="col-md-10">
                                  <select class="form-control" name="addmanagmanager" id="addmanagmanager" required="">
                                    <option value="0">- Add Manager -</option>
                                    @foreach($employees as $employee)
                                      <option value="{{$employee->id}}">{{$employee->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success modeladdmanager">Add Manager</button>
                          </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                  </div> 
              
              <!-- Modal delete-manager -->
                <div class="modal fade" id="modal_delete_manager{{$depart->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete Manager</h4>
                      </div>
                        <form id="form-add-manager" method="POST" action="{{route('addmanager', $depart->id)}}">
                          <div class="modal-body">
                            {{csrf_field()}}
                            <div class="form-group hidden">
                              <div class="row">
                                <div class="col-md-2">
                                  <label for="exampleInputEmail1">Title : </label>
                                </div>
                                <div class="col-md-10">
                                  <input type="text" class="form-control" name="addmanagname" id="addmanagtitle" value="{{$depart->title}}">
                                </div>
                              </div>
                            </div>
                            <div class="form-group " hidden="">
                              <div class="row">
                                <div class="col-md-2">
                                  <label for="exampleInputEmail1">Parent : </label>
                                </div>
                                <div class="col-md-10">
                                  <select class="form-control " name="addmanagparent" id="addmanagparent" style="width: 100%; color: #000">
                                    @if($depart->parent != 0) <option selected="" value="{{$depart->getParent['id']}}">{{$depart->getParent['title']}}</option> @else <option selected="" value="0">- No Parent -</option> @endif
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-group" hidden="">
                              <div class="row">
                                <div class="col-md-2">
                                  <label for="exampleInputEmail1">Manager : </label>
                                </div>
                                <div class="col-md-10">
                                  <select class="form-control" name="addmanagmanager" id="addmanagmanager" required="">
                                    <option value="0">- Delete: {{$depart->getEmployee['name']}} -</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-3">
                                  <label for="exampleInputEmail1">Delete Manager : </label>
                                </div>
                                <div class="col-md-9">
                                  <p>{{$depart->getEmployee['name']}}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger modeladdmanager">Delete Manager</button>
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
            <h4 class="modal-title"><i class="fa fa-sitemap"></i> Add New Department</h4>
          </div>
          <div class="modal-body">
            <form id="form-add">
              {{csrf_field()}}
              <div class="alert alert-danger alert-dismissible" id="add-error" hidden="">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Errors!</h4>
                  Enter Add the data correctly!!
               </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Title : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Parent : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control " name="parent" id="parent" style="width: 100%; color: #000">
                      <option value="0">No Parent</option>
                      @foreach($departments as $depart)
                      <option value="{{$depart->id}}">{{$depart->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success save" id="save"><i class="fa fa-check"></i> Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Department</h4>
          </div>
          <div class="modal-body">
            <form id="form-edit">
              {{csrf_field()}}
              <div class="alert alert-danger alert-dismissible" id="edit-error" hidden="">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Errors!</h4>
                  Enter edit the data correctly!!
               </div>
              <div class="form-group" hidden="">
                <div class="row">
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">ID : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="upid" disabled="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Title : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="uptitle">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Parent : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control " id="upparent" style="width: 100%; color: #000">
                      <option value="0">No Parent</option>
                      @foreach($departments as $depart)
                      <option value="{{$depart->id}}">{{$depart->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="update"><i class="fa fa-check"></i> Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

  <!-- Modal Delete -->
  <div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-times"></i> Delete Department</h4>
        </div>
        <div class="modal-body">
          <form id="form-delete">
              {{csrf_field()}}
              <div class="alert alert-danger alert-dismissible" id="delete-error" hidden="">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Errors!</h4>
                  Enter delete the data correctly!!
               </div>
              <div class="form-group" hidden="">
                <div class="row">
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">ID : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="delid" disabled="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputEmail1">Are you sure to delete : <span id="deltitle" style="color: red"> </span> </label>
                  </div>
                </div>
              </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="delete"><i class="fa fa-check"></i> Delete</button>
          <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div> 

  <!-- Code Ajax -->
  <script type="text/javascript">

    // Code Ajax Add
      $(document).on('click', '#add-department', function() {
        $('#modal-add').modal('show');
      });

    // Button Add
    $('#save').click(function() {
      var token = $('input[name=_token]').val();
      var title = $('input[name=title]').val();
      var parent = $('select[name=parent]').val();
      if(token==''||title==''){ return; }
      $.ajax({
        type: 'POST',
        url: '{{route("departments.store")}}',
        data: {
          '_token': token,
          'title': title,
          'parent': parent,
        },
        success: function(data){
          location.reload();
        },
        error: function(data) {

        }
      });
    });

    // Code Ajax edit
      $(document).on('click', '.edit-department', function() {
        $('#modal-edit').modal('show');
        $('#form-edit').show();
        $('#upid').val($(this).data('id'));
        $('#uptitle').val($(this).data('title'));
        $('#upparent').val($(this).data('parent'));
      });

      // Button Update
        $('#update').click(function() {
          $.ajax({
            type: 'POST',
            url: '{{route("departments.edit")}}',
            data: {
              '_token': $('input[name=_token]').val(),
              'id': $('#upid').val(),
              'title': $('#uptitle').val(),
              'parent': $('#upparent').val()
            },
            success: function(data) {
              location.reload();
            },
            error: function(data) {
              $('#edit-done').attr('hidden', 'hidden');
              $('#edit-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
            }
          }); 
        });

    // Code Ajax Delete
      $(document).on('click', '.delete-department', function() {
        $('#modal-delete').modal('show');
        $('#delid').val($(this).data('id'));
        $('#deltitle').text($(this).data('title'));
      });

      // Button Delete
        $('#delete').click(function() {
          $.ajax({
            type: 'POST',
            url: '{{route("departments.delete")}}',
            data: {
              '_token': $('input[name=_token]').val(),
              'id': $('#delid').val(),
            },
            success: function(data) {
              location.reload();
            },
            error: function(data) {
              $('#delete-done').attr('hidden', 'hidden');
              $('#delete-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
            }
          });
        });

  </script>
  
@endsection