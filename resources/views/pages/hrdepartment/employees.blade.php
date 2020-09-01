@extends('layout.master')
@section('title')
  Employees
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
          <button type="button" class="btn btn-xs btn-success pull-right" id="add-employee"><i class="fa  fa-plus"></i> Add New Employee</button>
          <h3 class="box-title">Employees List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Department</th>
              <th>Job</th>
              <th>Branch</th>
              <th>Mobile</th>
              <th>Status</th>
              <th>Options</th>
            </tr>
            </thead>
            <tbody>
              @foreach($employees as $employee)
              <tr class="employees{{$employee->id}} @if($employee->getUser->status==0) danger @endif">
                <td>{{$i++}}</td>
                <td>@if($employee->gender== 'M' ) <i class="fa fa-male"></i> @else <i class="fa fa-female"></i> @endif &nbsp; {{$employee->name}}</td>
                <td>@if($employee->department) {{$employee->Department['title']}} @else <p style="color: red">Deleted Department</p> @endif</td>
                <td class="jobdel">@if($employee->job) {{$employee->getJobtitle['title']}} @else <p style="color: red">Deleted Job</p> @endif</td>
                <td>@if($employee->branch) {{$employee->getBranch['name']}} @else <p style="color: red">Deleted Branch</p> @endif</td>
                <td>{{$employee->mobile}}</td>
                <td>
                	@if($employee->getUser->status==0)
                		<span id="status" class="label bg-red">Inactive</span> <a id="actButton" onclick="active('{{$employee->id}}')" class="active-emploee btn btn-xs btn-success"><i class="fa fa-refresh"></i></a>
                  	@else
                  		<span id="status" class="label bg-green">Active</span> <a id="actButton" onclick="disactive('{{$employee->id}}')" class="deactive-emploee btn btn-xs btn-danger"><i class="fa fa-refresh"></i></a>
                  	@endif
                </td>
                <td>
                  	<button type="button" class="edit-employee btn btn-xs btn-warning" data-id="{{$employee->id}}" data-code="{{$employee->code}}" data-gender="{{$employee->gender}}" data-name="{{$employee->name}}" data-mobile="{{$employee->mobile}}" data-email="{{$employee->email}}" data-address="{{$employee->address}}" data-nationality="{{$employee->nationality}}" data-startdate="{{$employee->startdate}}" data-salarytype="{{$employee->salarytype}}" data-salary="{{$employee->salary}}" data-department="{{$employee->department}}" data-job="{{$employee->job}}" data-branch="{{$employee->branch}}" data-birthdate="{{$employee->birthdate}}"><i class="fa fa-edit"></i> Edit</button>
                  	<button type="button" class="delete-employee btn btn-xs btn-danger" data-id="{{$employee->id}}" data-name="{{$employee->name}}"><i class="fa fa-remove"></i> Delete</button>&nbsp;
                  	<a href="javascript:void(0)" class="profile-employee btn btn-xs btn-info"><i class="fa fa-user"></i> Profile</a>
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

<!-- Modal add -->
    <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-user"></i> Add New Employee</h4>
          </div>
          <div class="modal-body">
            <form id="form-add">
              {{csrf_field()}}
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Code : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" name="code" id="code" placeholder="Enter Code">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Name : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Gender : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control " name="gender" id="gender" style="width: 100%; color: #000">
	                      <option value="M">Male</option>
	                      <option value="F">Female</option>
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Mobile: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Phone: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Email: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Address: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Nationality: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Enter Country">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>start Date: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control datepicker" name="startdate" id="startdate" placeholder="Enter Start Date">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Salary Type: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control " name="salarytype" id="salarytype" style="width: 100%; color: #000">
	                      <option id="salarytypesel">- Select Type -</option>
	                      <option value="F">Full Time</option>
	                      <option value="P">Part Time</option>
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Salary: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="number" class="form-control" name="salary" id="salary" placeholder="Enter Salary">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Department: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control " name="department" id="department" style="width: 100%; color: #000">
	                      <option>- Select Department -</option>
	                      @foreach($departments as $department)
	                      <option value="{{$department->id}}">{{$department->title}}</option>
	                      @endforeach
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Job Title: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control " name="job" id="job" style="width: 100%; color: #000">
	                      <option>- Select Department First -</option>
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Branch: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control " name="branch" id="branch" style="width: 100%; color: #000">
	                      <option>- Select Branch -</option>
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
	                    <label>Birthdate : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control datepicker" name="birthdate" id="birthdate" placeholder="Enter Dirth Date">
	                  </div>
	                </div>
	            </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success save" id="save">Save</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

<!-- Modal edit -->
    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Employee</h4>
          </div>
          <div class="modal-body">
            <form id="form-edit">
              {{csrf_field()}}
	            <div class="form-group" hidden="">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>ID : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" id="upid" disabled="">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Code : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" id="upcode">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Name : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" id="upname">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Gender : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control " id="upgender" style="width: 100%; color: #000">
	                      <option value="M">Male</option>
	                      <option value="F">Female</option>
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Mobile: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="number" class="form-control" id="upmobile">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Email: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="email" class="form-control" id="upemail">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Address: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" id="upaddress">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Nationality: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" id="upnationality">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>start Date: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" id="upstartdate">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Salary Type: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control" id="upsalarytype" style="width: 100%; color: #000">
	                      <option>- Select Type -</option>
	                      <option value="F">Full Time</option>
	                      <option value="P">Part Time</option>
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Salary: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" id="upsalary">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Department: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control " id="updepartment" style="width: 100%; color: #000">
	                      <option>- Select Department -</option>
	                      @foreach($departments as $department)
	                      <option value="{{$department->id}}">{{$department->title}}</option>
	                      @endforeach
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Job Title: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control " id="upjob" style="width: 100%; color: #000">
	                      <option value="">- Select Job -</option>
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>Branch: </label>
	                  </div>
	                  <div class="col-md-10">
	                    <select class="form-control " id="upbranch" style="width: 100%; color: #000">
	                      <option>- Select Branch -</option>
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
	                    <label>Birthdate</label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" id="upbirthdate">
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
            <h4 class="modal-title"><i class="fa fa-times"></i> Delete Employee</h4>
          </div>
          <div class="modal-body">
            <form id="form-delete">
              {{csrf_field()}}
	            <div class="form-group" hidden="">
	                <div class="row">
	                  <div class="col-md-2">
	                    <label>ID : </label>
	                  </div>
	                  <div class="col-md-10">
	                    <input type="text" class="form-control" id="delid" disabled="">
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-12">
	                    <label>Are you sure to delete : <span id="delname" style="color: red"></span></label>
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
      $(document).on('click', '#add-employee', function() {
        $('#modal-add').modal('show');
        $('#form-add').show();
        $('#add-done').attr('hidden', 'hidden');
        $('#add-error').attr('hidden', 'hidden');
      });

      // Button Add
        $('#save').click(function(e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: '{{route("employees.store")}}',
            data: {
              '_token': $('input[name=_token]').val(),
              'code': $('input[name=code]').val(),
              'name': $('input[name=name]').val(),
              'address': $('input[name=address]').val(),
              'birthdate': $('input[name=birthdate]').val(),
              'startdate': $('input[name=startdate]').val(),
              'salarytype': $('select[name=salarytype]').val(),
              'salary': $('input[name=salary]').val(),
              'job': $('select[name=job]').val(),
              'department': $('select[name=department]').val(),
              'branch': $('select[name=branch]').val(),
              'gender': $('select[name=gender]').val(),
              'mobile': $('input[name=mobile]').val(),
              'phone': $('input[name=phone]').val(),
              'email': $('input[name=email]').val(),
              'nationality': $('input[name=nationality]').val(),
            },
            success: function(data) {
            	$('.table').append(
            		"<tr class='employees"+data.id+"'>"+
		                "<td>"+(data.gender=='M' ? "<i class='fa fa-male'></i>" : "<i class='fa fa-female'></i>")+"&nbsp;"+data.name+"</td>"+
		                "<td>"+data.jobtitle+"</td>"+
		                "<td>"+(data.salarytype== 'F' ? "<p>Full Time</p>" : "<p>Part Time</p>")+"</td>"+
		                "<td>"+data.branch+"</td>"+
		                "<td>"+data.mobile+"</td>"+
		                "<td>"+(data.status==0 ? "<a id='actButton' onclick='active("+data.id+")' class='active-emploee btn btn-xs btn-success'><i class='fa fa-check'></i> Active</a>&nbsp;" : "<a id='actButton' onclick='disactive("+data.id+")' class='deactive-emploee btn btn-xs btn-danger'><i class='fa fa-close'></i> Deactivate</a>&nbsp;")+"&nbsp"+
		                  	"<button type='button' class='edit-employee btn btn-xs btn-warning' data-id='"+data.id+"' data-gender='"+data.gender+"' data-name='"+data.name+"' data-mobile='"+data.mobile+"' data-email='"+data.email+"' data-address='"+data.address+"' data-country='"+data.country+"' data-state='"+data.state+"' data-startdate='"+data.startdate+"' data-salarytype='"+data.salarytype+"' data-salary='"+data.salary+"' data-department='"+data.department+"' data-job='"+data.job+"' data-branch='"+data.branch+"' data-birthdate='"+data.birthdate+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
		                  	"<button type='button' class='delete-employee btn btn-xs btn-danger' data-id='"+data.id+"' data-gender='"+data.gender+"' data-name='"+data.name+"' data-mobile='"+data.mobile+"' data-email='"+data.email+"' data-address='"+data.address+"' data-country='"+data.country+"' data-state='"+data.state+"' data-startdate='"+data.startdate+"' data-salarytype='"+data.salarytype+"' data-salary='"+data.salary+"' data-department='"+data.department+"' data-job='"+data.job+"' data-branch='"+data.branch+"' data-birthdate='"+data.birthdate+"'><i class='fa fa-remove'></i> Delete</button>&nbsp;&nbsp"+
		                  	"<a href='#' class='profile-employee btn btn-xs btn-info'><i class='fa fa-user'></i> Profile</a>"+
		                "</td>"+
		            "</tr>"
            	);
            	$('.save').removeClass('btn-success').addClass('btn-warning').text('loading..').append(' <i class="fa fa-refresh fa-spin"></i>');
				setTimeout(function() {
					$('.save >i').remove();
					$('.save').append(' <i class="fa fa-check"></i>');
				}, 1000);
				setTimeout(function() {
					$('.save >i').remove();
					$('.save').removeClass('btn-warning').addClass('btn-success').text('Save');
				}, 2000);
            	$('#name').val('');
            	$('#gender').val('');
            	$('#mobile').val('');
            	$('#phone').val('');
            	$('#email').val('');
            	$('#address').val('');
            	$('#nationality').val('');
            	$('#startdate').val('');
            	$('#salarytype').val('');
            	$('#salary').val('');
            	$('#department').val('');
            	$('#job').val('');
            	$('#branch').val('');
            	$('#birthdate').val('');
            },
            error: function(data) {
              $('#add-done').attr('hidden', 'hidden');
              $('#add-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
            }
          });
        }); 

	// Code Ajax Active 
		function active(id){
 		  	$.ajax({
				type: 'POST',
				url: '{{route("employees.active")}}',
				data: {'id': id , '_token' : $('input[name=_token]').val()},
				success: function(data){ 
					if(data == 1){
						$(".employees"+id).removeClass("danger");
						$(".employees"+id+" #actButton").removeClass("btn-success").addClass("btn-danger");
						$(".employees"+id+" #status").html('Active').removeClass("bg-red").addClass("bg-green");
						$(".employees"+id+" #actButton").attr('onclick', 'disactive('+id+')');
					}else{
						alert("false");
					}
				},
				error: function(data){
					alert('Errors');
				}
			});	
		}

	// Code Ajax Disactive
		function disactive(id){
 		  	$.ajax({
				type: 'POST',
				url: '{{route("employees.deactive")}}',
				data: {'id': id , '_token' : $('input[name=_token]').val()},
				success: function(data){
					if(data == 1){
						$(".employees"+id).addClass("danger");
						$(".employees"+id+" #actButton").removeClass("btn-danger").addClass("btn-success");
						$(".employees"+id+" #status").html('Inactive').removeClass("bg-green").addClass("bg-red");
						$(".employees"+id+" #actButton").attr('onclick', 'active('+id+')');
					}else{
						alert("false");
					}
				},
				error: function(data){
					alert('Errors');
				}
			});	
		}	

    // Code Ajax edit
      $(document).on('click', '.edit-employee', function() {
        $('#modal-edit').modal('show');
        $('#form-edit').show();
        $('#upid').val($(this).data('id'));
        $('#upcode').val($(this).data('code'));
        $('#upname').val($(this).data('name'));
    	$('#upgender').val($(this).data('gender'));
    	$('#upmobile').val($(this).data('mobile'));
    	$('#upemail').val($(this).data('email'));
    	$('#upaddress').val($(this).data('address'));
    	$('#upnationality').val($(this).data('nationality'));
    	$('#upstartdate').val($(this).data('startdate'));
    	$('#upsalarytype').val($(this).data('salarytype'));
    	$('#upsalary').val($(this).data('salary'));
    	$('#updepartment').val($(this).data('department'));
    	$('#upjob').val($(this).data('job'));
    	var department = $(this).data('department');
    	var job = $(this).data('job');
	    $.ajax({
            type: 'get',
            url: '{{route("getJobs")}}',
            data: { 'id': department },
            success: function(data) {
            	if (data == '') {
					$('#upjob').html('<option> -- There is no jobs here -- </option>');
				}else{
	            	$("#upjob").html("").append('<option>- Select Job -</option>');
					for (var i = 0; i < data.length; i++) {
						if(data[i].id==job){
							var o = "<option value='"+data[i].id+"' selected>"+data[i].title+"</option>";
						}else{
							var o = "<option value='"+data[i].id+"'>"+data[i].title+"</option>";
						}
						$("#upjob").append(o);
					}
				}          	
            },
            error: function(data) {
            }
    	}); 
    	$('#upbranch').val($(this).data('branch'));
    	$('#upbirthdate').val($(this).data('birthdate'));
        $('#edit-error').attr('hidden', 'hidden');
        $('#edit-done').attr('hidden', 'hidden');
      });

    // Button Update
        $('#update').click(function(e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: '{{route("employees.edit")}}',
            data: {
              	'_token': $('input[name=_token]').val(),
              	'id': $('#upid').val(),
              	'code': $('#upcode').val(),
              	'name': $('#upname').val(),
		    	'gender': $('#upgender').val(),
		    	'mobile': $('#upmobile').val(),
		    	'phone': $('#upphone').val(),
		    	'email': $('#upemail').val(),
		    	'address': $('#upaddress').val(),
		    	'nationality': $('#upnationality').val(),
		    	'startdate': $('#upstartdate').val(),
		    	'salarytype': $('#upsalarytype').val(),
		    	'salary': $('#upsalary').val(),
		    	'department': $('#updepartment').val(),
		    	'job': $('#upjob').val(),
		    	'branch': $('#upbranch').val(),
		    	'birthdate': $('#upbirthdate').val()
            },
            success: function(data) {
            	$("#update").removeClass('btn-success').addClass('btn-warning').html("<i class='fa fa-spinner fa-spin'></i> Updating...");
            	setTimeout(function(){
	            	$("#update").removeClass('btn-warning').addClass('btn-success').html("<i class='fa fa-check'></i> Success!");
	            	setTimeout(function(){
		            	$("#update").html("<i class='fa fa-check'></i> Update");
		            	$('.employees'+ data.id).replaceWith(
				            "<tr class='employees"+data.id+"'>"+
				                "<td>"+data.id+"</td>"+
				                "<td>"+(data.gender=='M' ? "<i class='fa fa-male'></i>" : "<i class='fa fa-female'></i>")+"&nbsp;"+data.name+"</td>"+
				                "<td>"+data.department.title+"</td>"+
				                "<td>"+data.jobtitle+"</td>"+
				                "<td>"+data.branch.name+"</td>"+
				                "<td>"+data.mobile+"</td>"+
				                "<td>"+(data.status==0?'<span id="status" class="label bg-red">Inactive</span> <a id="actButton" onclick="active('+data.id+')" class="active-emploee btn btn-xs btn-success"><i class="fa fa-refresh"></i></a>':'<span id="status" class="label bg-green">Active</span> <a id="actButton" onclick="disactive('+data.id+')" class="deactive-emploee btn btn-xs btn-danger"><i class="fa fa-refresh"></i></a>')+"</td>"+
				                "<td><button type='button' class='edit-employee btn btn-xs btn-warning' data-id='"+data.id+"' data-code='"+data.code+"' data-gender='"+data.gender+"' data-name='"+data.name+"' data-mobile='"+data.mobile+"' data-email='"+data.email+"' data-address='"+data.address+"' data-nationality='"+data.nationality+"' data-startdate='"+data.startdate+"' data-salarytype='"+data.salarytype+"' data-salary='"+data.salary+"' data-department='"+data.department.id+"' data-job='"+data.job+"' data-branch='"+data.branch.id+"' data-birthdate='"+data.birthdate+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
				                  	"<button type='button' class='delete-employee btn btn-xs btn-danger' data-id='"+data.id+"' data-name='"+data.name+"'><i class='fa fa-remove'></i> Delete</button>&nbsp;&nbsp"+
				                  	"<a href='javascript:void(0)' class='profile-employee btn btn-xs btn-info'><i class='fa fa-user'></i> Profile</a>"+
				                "</td>"+
				            "</tr>"
			            );
            	        $('#modal-edit').modal('hide');
	            	},1000);
            	},2000);
            },
            error: function(data) {
              $('#edit-done').attr('hidden', 'hidden');
              $('#edit-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
            }
          }); 
        });

    // Code Ajax Delete
      $(document).on('click', '.delete-employee', function() {
        $('#modal-delete').modal('show');
        $('#form-delete').show();
        $('#delid').val($(this).data('id'));
        $('#delname').text($(this).data('name'));
        $('#delete-error').attr('hidden', 'hidden');
        $('#delete-done').attr('hidden', 'hidden');
      });

	    // Button Delete
	        $('#delete').click(function(e) {
	          e.preventDefault();
	          $.ajax({
	            type: 'POST',
	            url: '{{route("employees.delete")}}',
	            data: {
	              '_token': $('input[name=_token]').val(),
	              'id': $('#delid').val(),
	            },
	            success: function(data) {
	              $('.employees'+ $('#delid').val()).remove();
	              $('#delete-error').attr('hidden', 'hidden');
	              $('#modal-delete').modal('hide');
	              $('#delete-done').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
	            },
	            error: function(data) {
	              $('#delete-done').attr('hidden', 'hidden');
	              $('#delete-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
	            }
	          });
	        });

	$("#department").on('change', function() {
		var id = $(this).children("option:selected").val();
		$.ajax({
			type: 'get',
			url: '{{route("getJobs")}}',
			data: { 'id': id, },
			success: function(data) {
				if (data == '') {
					$('#job').html('<option> -- There is no jobs here -- </option>');
				}else{
					$("#job").html(" ").append('<option>- Select Job -</option>');
					for (var i = 0; i < data.length; i++) {
						var o = new Option(data[i].title, data[i].id);
						$("#job").append(o);
					}
				}          	
			},
			error: function(data) {
			$('#edit-done').attr('hidden', 'hidden');
			$('#edit-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
			}
		}); 
	});

		$("#updepartment").on('change', function() {
			var id = $(this).children("option:selected").val();
			$.ajax({
				type: 'get',
				url: '{{route("editgetJobs")}}',
				data: { 'id': id, },
				success: function(data) {
					if (data == '') {
						$('#upjob').html('<option> -- There is no jobs here -- </option>');
					}else{
						$("#upjob").html(" ").append('<option >- Select Job -</option>');
						for (var i = 0; i < data.length; i++) {
							var o = new Option(data[i].jobtitle, data[i].id);
								$(o).html('<option val='+data[i].id+'>'+data[i].jobtitle+'</option>');
								$("#upjob").append(o);
							}
					}
				},
				error: function(data) {
				$('#edit-done').attr('hidden', 'hidden');
				$('#edit-error').removeAttr('hidden', 'hidden').slideDown(700).slideUp(700);
				}
			}); 
		});
  </script>
  
@endsection