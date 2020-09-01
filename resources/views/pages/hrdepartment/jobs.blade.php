@extends('layout.master')
@section('title')
  Jobs
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
          <button type="button" class="btn btn-xs btn-success pull-right" id="add-job"><i class="fa fa-plus"></i> Add New Job</button>
          <h3 class="box-title">Jobs List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if(count($jobs)>0)
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>Job Title</th>
              <th>Department</th>
              <th>Options</th>
            </tr>
            </thead>
            <tbody>
              @foreach($jobs as $job)
              <tr class="jobs{{$job->id}}">
                <td>{{$job->id}}</td>
                <td>{{$job->title}}</td>
                <td>{{$job->getDepartment['title']}}</td>
                <td>
                  <button type="button" class="edit-job btn btn-xs btn-warning" data-id="{{$job->id}}" data-jobtitle="{{$job->title}}" data-department="{{$job->department}}"><i class="fa fa-edit"></i> Edit</button>
                  <button type="button" class="delete-job btn btn-xs btn-danger" data-id="{{$job->id}}" data-jobtitle="{{$job->title}}" data-department="{{$job->department}}"><i class="fa fa-remove"></i> Delete</button>
                  <button type="button" class="set-privilge btn btn-xs btn-info" data-id="{{$job->id}}" data-jobtitle="{{$job->title}}" data-department="{{$job->department}}"><i class="fa fa-cogs"></i> Privilge</button>
                </td>
              </tr>
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
            <h4 class="modal-title"><i class="fa fa-wrench"></i> Add New Job</h4>
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
                    <label for="exampleInputEmail1">Job Title : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="jobtitle" id="jobtitle" placeholder="Enter Title">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Department: </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control " name="department" id="department" style="width: 100%; color: #000">
                    	<option>- Select Department -</option>
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
            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Job</h4>
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
                    <label for="exampleInputEmail1">Job Title : </label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="upjobtitle">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Department: </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control " id="upddepartment" style="width: 100%; color: #000">
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
          <h4 class="modal-title"><i class="fa fa-times"></i> Delete Job</h4>
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
                    <label for="exampleInputEmail1">Are you sure to delete : <span id="deljobtitle" style="color: red"> </span> </label>
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
      $(document).on('click', '#add-job', function() {
        $('#modal-add').modal('show');
        $('#form-add').show();
        $('#add-done').attr('hidden', 'hidden');
        $('#add-error').attr('hidden', 'hidden');

      });

      // Button Add
        $('.save').click(function(e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: '{{route("jobs.store")}}',
            data: {
              '_token': $('input[name=_token]').val(),
              'title': $('#jobtitle').val(),
              'department': $('select[name=department]').val(),
            },
            success: function(data) {
              location.reload();
              // $('.save').removeClass('btn-success').addClass('btn-warning').text('loading..').append(' <i class="fa fa-refresh fa-spin"></i>');
              // setTimeout(function() {
              //   $('.save >i').remove();
              //   $('.save').append(' <i class="fa fa-check"></i>');
              // }, 1000);
              // setTimeout(function() {
              //   $('.save >i').remove();
              //   $('.save').removeClass('btn-warning').addClass('btn-success').text('Save');
              // }, 2000);
              // $('#add-error').attr('hidden', 'hidden');
              // $('#add-done').removeAttr('hidden', 'hidden');
              // $('#jobtitle').val('');
              // $('#department').val('');
            },
            error: function(data) {
              $('#add-done').attr('hidden', 'hidden');
              $('#add-error').removeAttr('hidden', 'hidden');
            }
          });
        });

    // Code Ajax edit
      $(document).on('click', '.edit-job', function() {
        $('#modal-edit').modal('show');
        $('#form-edit').show();
        $('#upid').val($(this).data('id'));
        $('#upjobtitle').val($(this).data('jobtitle'));
        $('#upddepartment').val($(this).data('department'));
        $('#edit-error').attr('hidden', 'hidden');
        $('#edit-done').attr('hidden', 'hidden');
	    });

      // Button Update
        $('#update').click(function(e) {
            e.preventDefault();
            $.ajax({
              type: 'POST',
              url: '{{route("jobs.edit")}}',
              data: {
                '_token': $('input[name=_token]').val(),
                'id': $('#upid').val(),
                'title': $('#upjobtitle').val(),
                'department': $('#upddepartment').val()
              },
              success: function(data) {
                location.reload();
                // $('.jobs'+ data.id).replaceWith(
                //   "<tr class='jobs"+data.id+"'>"+
                //     "<td>"+data.id+"</td>"+
                //     "<td>"+data.title+"</td>"+
                //     "<td>"+data.departmentTitle+"</td>"+
                //     "<td><button type='button' class='edit-job btn btn-xs btn-warning' data-id='"+data.id+"' data-jobtitle='"+data.jobtitle+"' data-department='"+data.department+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
                //       "<button type='button' class='delete-job btn btn-xs btn-danger' data-id='"+data.id+"' data-jobtitle='"+data.jobtitle+"' data-department='"+data.department+"'><i class='fa fa-remove'></i> Delete</button>"+
                //     "</td>"+
                //   "</tr>"
                // );
                // $('#edit-error').attr('hidden', 'hidden');
                // $('#modal-edit').modal('hide');
                // $('#edit-done').removeAttr('hidden', 'hidden');
              },
              error: function(data) {
                $('#edit-done').attr('hidden', 'hidden');
                $('#edit-error').removeAttr('hidden', 'hidden');
              }
            }); 
          });

    // Code Ajax Delete
	    $(document).on('click', '.delete-job', function() {
	      $('#modal-delete').modal('show');
	      $('#form-delete').show();
	      $('#delid').val($(this).data('id'));
	      $('#deljobtitle').text($(this).data('jobtitle'));
	      $('#delete-error').attr('hidden', 'hidden');
	      $('#delete-done').attr('hidden', 'hidden');
	    }); 
      
      // Button Delete
        $('#delete').click(function(e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: '{{route("jobs.delete")}}',
            data: {
              '_token': $('input[name=_token]').val(),
              'id': $('#delid').val(),
            },
            success: function(data) {
              $('.jobs'+ $('#delid').val()).remove();
              $('#delete-error').attr('hidden', 'hidden');
              $('#modal-delete').modal('hide');
              $('#delete-done').removeAttr('hidden', 'hidden');
            },
            error: function(data) {
              $('#delete-done').attr('hidden', 'hidden');
              $('#delete-error').removeAttr('hidden', 'hidden');
            }
          });
        });

  </script>
  
@endsection