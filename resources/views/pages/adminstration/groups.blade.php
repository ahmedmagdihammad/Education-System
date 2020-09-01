@extends('layout.master')
@section('title')
  Groups
@endsection
@section('namepage')
  Administration
@endsection
@section('content')

<!-- Table Project -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <button type="button" class="btn btn-xs btn-success pull-right" id="add-group"><i class="fa fa-plus"></i> Add New Group</button>
          <h3 class="box-title">Groups</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
	            <tr>
	                <th>#</th>
					<th>G</th>
	                <th>Track</th>
					<th>Level</th>
					<th>Time</th>
					<th>Start</th>
					<th>Location</th>
					<th><i class="fa fa-users"></i></th>
					<th>Batch</th>
					<th>Teacher</th>
					<th>Status</th>
	            </tr>
            </thead>
            <tbody>
            	@foreach($groups as $group)
				<tr class="groups{{$group->id}}">
					<td>{{$i++}}</td>
					<td>
						@if($group->gender == 'M')
							<span class="label bg-blue"><i class="fa fa-male"></i></span>
						@elseif($group->gender == 'F')
							<span class="label bg-yellow"><i class="fa fa-female"></i></span>
						@elseif($group->gender == 'X')
							<span class="label bg-green"><b>X</b></span>
						@endif
					</td>
					<td>
						@if($group->getTrack)
							<span>{{$group->getTrack->title}}</span>
						@else
							<span style="color:red;">Deleted</span>
						@endif
					</td>
					<td>
						@if($group->getLevel)
							<span>{{$group->getLevel->level}}</span>
						@else
							<span style="color:red;">Deleted</span>
						@endif
					</td>
					<td>
						@if($group->getTime)
							<span>{{$group->getTime->time}}</span>
						@else
							<span style="color:red;">Deleted</span>
						@endif
					</td>
					<td>{{$group->start}}</td>
					<td>
						@if($group->getLocation)
							<span>{{$group->getLocation->name}}</span>
						@else
							<span style="color:red;">Deleted</span>
						@endif
					</td>
					<td>{{$group->count}}</td>
					<td>
						@if($group->getBatch)
							<span>{{$group->getBatch->title}}</span>
						@else
							<span style="color:red;">Deleted</span>
						@endif
					</td>
					<td class="teacher">@if($group->teacher==0||!$group->getTeacher) <button id="add-teacher" data-group="{{$group->id}}" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Add Teacher</button> @else {{substr($group->getTeacher->name,"0","12")}}... &nbsp; <i data-group="{{$group->id}}" style="color:red;cursor:pointer;" class="fa fa-times remove-teacher"></i> @endif</td>
					<td>
                    	<button type="button" class="edit-group btn btn-xs btn-warning" data-id="{{$group->id}}" data-track="{{$group->track}}" data-level="{{$group->level}}" data-gender="{{$group->gender}}" data-time="{{$group->time}}"  data-start="{{$group->start}}" data-end="{{$group->end}}" data-location="{{$group->location}}"  data-count="{{$group->count}}" data-batch="{{$group->batch}}" data-teacher="{{$group->teacher}}"><i class="fa fa-edit"></i> Edit</button>
                    	<button type="button" class="delete-group btn btn-xs btn-danger" data-id="{{$group->id}}" data-track="{{$group->track}}" data-level="{{$group->level}}" data-gender="{{$group->gender}}" data-time="{{$group->time}}"  data-start="{{$group->start}}" data-end="{{$group->end}}" data-location="{{$group->location}}"  data-count="{{$group->count}}" data-batch="{{$group->batch}}" data-teacher="{{$group->teacher}}"><i class="fa fa-remove"></i> Delete</button>
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

<!-- Modal Add -->
<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-graduation-cap"></i> Add New Group</h4>
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
                    <label>Track : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="track" id="track">
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
                    <label>Level: </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="level" id="level">
                    	<option value="">- Select Level -</option>
	                    @foreach($levels as $level)
							<option value="{{$level->id}}">{{$level->level}}</option>
						@endforeach
                    </select>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Gender: </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="gender" id="gender">
                    	<option value=""> - Select Gender - </option>
                    	<option value="M">Male</option>
                    	<option value="F">Female</option>
                    	<option value="X">Mix</option>
                    </select>
                  </div>
                </div>
            </div>
			<div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Time: </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="time" id="time">
                    	<option selected="">- Select Time -</option>
	                    @foreach($times as $time)
							<option value="{{$time->id}}">{{$time->time}}</option>
						@endforeach
                    </select>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Start Date:</label>
                  </div>
                  <div class="col-md-10">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="start" id="start" placeholder="Enter Start" class="form-control pull-right datepicker">
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>End Date:</label>
                  </div>
                  <div class="col-md-10">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="end" id="end" placeholder="Enter End" class="form-control pull-right datepicker">
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Location: </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="location" id="location">
                    	<option value="">- Select Location -</option>
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
                    <label>Batch : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="batch" id="batch">
                    	<option value="">- Select Batch -</option>
	                    @foreach($batches as $batch)
							<option value="{{$batch->id}}">{{$batch->title}}</option>
						@endforeach
                    </select>
                  </div>
                </div>
            </div>
     	</form>
  	</div>
  	<div class="modal-footer">
    	<button type="button" class="btn btn-success save" id="save"><i class="fa fa-check"></i> Save</button>
    	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
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
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Group</h4>
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
                <input type="hidden" id="upid" disabled class="form-control">
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Track : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" id="uptrack">
                    	<option value=""> - Select Track - </option>
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
                    <label>Level: </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" id="uplevel">
                    	<option value=""> - Select Level - </option>
	                    @foreach($levels as $level)
							<option value="{{$level->id}}">{{$level->level}}</option>
						@endforeach
                    </select>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Gender: </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" id="upgender">
                    	<option value=""> - Select Gender - </option>
                    	<option value="M">Male</option>
                    	<option value="F">Female</option>
                    	<option value="X">Mix</option>
                    </select>
                  </div>
                </div>
            </div>
			<div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Time : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" id="uptime">
                    	<option value=""> - Select Time - </option>
	                    @foreach($times as $time)
							<option value="{{$time->id}}">{{$time->time}}</option>
						@endforeach
                    </select>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Start Date:</label>
                  </div>
                  <div class="col-md-10">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="upstart" class="form-control datepicker">
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>End Date:</label>
                  </div>
                  <div class="col-md-10">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="upend" class="form-control datepicker">
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Location : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" id="uplocation">
                    	<option value=""> - Select Location - </option>
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
                    <label>Batch : </label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" id="upbatch">
                    	<option value=""> - Select Batch - </option>
	                    @foreach($batches as $batch)
							<option value="{{$batch->id}}">{{$batch->title}}</option>
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
          <h4 class="modal-title"><i class="fa fa-times"></i> Delete Group</h4>
        </div>
        <div class="modal-body">
	    	<form id="form-delete">
            	{{csrf_field()}}
	            <div class="form-group" hidden="">
                    <input type="hidden" id="delid" class="form-control">
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-3">
	                    <label>Track : </label>
	                  </div>
	                  <div class="col-md-9">
	                    <select class="form-control" id="deltrack" disabled>
		                    @foreach($tracks as $track)
								<option value="{{$track->id}}">{{$track->title}}</option>
							@endforeach
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-3">
	                    <label>Level : </label>
	                  </div>
	                  <div class="col-md-9">
	                    <select class="form-control" id="dellevel" disabled>
		                    @foreach($levels as $level)
								<option value="{{$level->id}}">{{$level->level}}</option>
							@endforeach
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Gender: </label>
                  </div>
                  <div class="col-md-9">
                    <select class="form-control" id="delgender" disabled>
                    	<option value="X">Mix</option>
                    	<option value="M">Male</option>
                    	<option value="F">Femal</option>
                    </select>
                  </div>
                </div>
            </div>
				<div class="form-group">
	                <div class="row">
	                  <div class="col-md-3">
	                    <label>Time : </label>
	                  </div>
	                  <div class="col-md-9">
	                    <select class="form-control" id="deltime" disabled>
		                    @foreach($times as $time)
								<option value="{{$time->id}}">{{$time->time}}</option>
							@endforeach
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-3">
	                    <label>Start Date:</label>
	                  </div>
	                  <div class="col-md-9">
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input type="text" id="delstart" disabled class="form-control">
	                    </div>
	                  </div>
	                  <!-- /.input group -->
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-3">
	                    <label>End Date:</label>
	                  </div>
	                  <div class="col-md-9">
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input type="text" id="delend" disabled="" class="form-control">
	                    </div>
	                  </div>
	                  <!-- /.input group -->
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                  <div class="col-md-3">
	                    <label>Location : </label>
	                  </div>
	                  <div class="col-md-9">
	                    <select class="form-control" id="dellocation" disabled>
		                    @foreach($locations as $location)
								<option value="{{$location->id}}">{{$location->name}}</option>
							@endforeach
	                    </select>
	                  </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-md-3">
	                      <label>Count :</label>
	                    </div>
	                    <div class="col-md-9">
	                        <input type="number" id="delcount" disabled="" class="form-control">
	                    </div>
	                </div>
	            </div>
                <div class="form-group">
	                <div class="row">
	                  <div class="col-md-3">
	                    <label>Batch : </label>
	                  </div>
	                  <div class="col-md-9">
	                    <select class="form-control" id="delbatch" disabled>
		                    @foreach($batches as $batch)
								<option value="{{$batch->id}}">{{$batch->title}}</option>
							@endforeach
	                    </select>
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

<!-- Modal Delete -->
<div class="modal fade" id="modal-teacher">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> Add a teacher to group</h4>
        </div>
        <div class="modal-body">
	    	<form id="form-teacher">
            	{{csrf_field()}}
            	<input type="hidden" name="group" id="group">
				<div class="form-group">
	                <div class="row">
	                    <div class="col-md-2">
	                      <label>Teacher :</label>
	                    </div>
	                    <div class="col-md-10">
		                    <select class="form-control" name="teacher">
		                    	<option value=""> - Select Teacher - </option>
			                    @foreach($employees as $emp)
									<option value="{{$emp->id}}">{{$emp->name}}</option>
								@endforeach
		                    </select>
	                    </div>
	                </div>
	            </div>
	     	</form>
    	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="saveTeacher"><i class="fa fa-check"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<!-- Code Ajax -->
<script type="text/javascript">

	// Code Ajax Add Teacher
	$(document).on('click', '#add-teacher', function() {
		var group = $(this).data("group");
		// $(".groups"+group).addClass("success");
		$('#modal-teacher').modal('show');
		$("#modal-teacher #group").val(group);
	});

	// Code Ajax Add
	$(document).on('click', '#add-group', function() {
		$('#modal-add').modal('show');
		$('#form-add').show();
		$('#add-done').attr('hidden', 'hidden');
		$('#add-error').attr('hidden', 'hidden');
	});

	// Button Save Teacher
	$('#saveTeacher').click(function(e) {
		e.preventDefault();
		var token = $("#modal-teacher input[name=_token]").val();
		var group = $("#modal-teacher input[name=group]").val();
		var teacher = $("#modal-teacher select[name=teacher]").val();
		if(token==''||group==''||teacher==''){ return; }
		$("#saveTeacher").removeClass("btn-success").addClass("btn-warning").html("<i class='fa fa-spinner fa-spin'></i> Saving...");
		$.ajax({
			type: 'POST',
			url: '{{route("groups.addTeacher")}}',
			data: {
				'_token' : token,
				'group' : group,
				'teacher' : teacher,
			},
			success: function(data) {
				// location.reload();
				// setTimeout(function(){
				// 	$("#saveTeacher").removeClass("btn-warning").addClass("btn-success").html("<i class='fa fa-check'></i> Success!");
				// 	setTimeout(function(){
				// 		$("#saveTeacher").html("<i class='fa fa-check'></i> Save");
				// 		$('.table .groups'+data.id+" .teacher").html(data.teacherName+'... &nbsp; <i data-group="'+data.id+'" style="color:red;cursor:pointer;" class="fa fa-times remove-teacher"></i>');
				// 		$('#modal-teacher').modal('hide');
				// 		$('#modal-teacher select[name=teacher]').val("");
				// 	},2000);
				// },2000);
			},
			error: function(data) {
				alert("Error!");
			}
		});
	});

	// remove teacher
	$('.remove-teacher').on("click", function(){
		var token = $("#modal-teacher input[name=_token]").val();
		var group = $(this).data("group");
		$(".table .groups"+group+" .teacher i").removeClass("fa-times").addClass("fa-spinner fa-spin");
		$.ajax({
			type: 'POST',
			url: '{{route("groups.removeTeacher")}}',
			data: {
				'_token' : token,
				'group' : group,
			},
			success: function(data) {
				setTimeout(function(){
					$(".table .groups"+data.id+" .teacher").html('<button id="add-teacher" data-group="'+data.id+'" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Add Teacher</button>');
				},1000);
			},
			error: function(data) {
				alert("Error!");
			}
		});
	});

	// Button Add
	$('#save').click(function(e) {
		e.preventDefault();
		var token = $('input[name=_token]').val();
		var track = $('select[name=track]').val();
		var level = $('select[name=level]').val();
		var gender = $('select[name=gender]').val();
		var time = $('select[name=time]').val();
		var start = $('input[name=start]').val();
		var end = $('input[name=end]').val();
		var location = $('select[name=location]').val();
		var batch = $('select[name=batch]').val();
		// if(token==''||track==''||level==''||gender==''||time==''||start==''||end==''||location==''||batch==''){ return; }
		// $("#save").removeClass("btn-success").addClass("btn-warning").html("<i class='fa fa-spinner fa-spin'></i> Saving...");
		$.ajax({
			type: 'POST',
			url: '{{route("groups.store")}}',
			data: {
				'_token' : token,
				'track' : track,
				'level' : level,
				'gender' : gender,
				'time' : time,
				'start' : start,
				'end' : end,
				'location' : location,
				'batch' : batch,
			},
			success: function(data) {
				window.location.reload(true);
				// setTimeout(function(){
				// 	$("#save").removeClass("btn-warning").addClass("btn-success").html("<i class='fa fa-check'></i> Success!");
				// 	setTimeout(function(){
				// 		$("#save").html("<i class='fa fa-check'></i> Save");
						// 		var gender = '';
						// 		if(data.gender=='M'){ gender = "<span class='label bg-blue'><i class='fa fa-male'></i></span>"; }
						// 		if(data.gender=='F'){ gender = "<span class='label bg-yellow'><i class='fa fa-female'></i></span>"; }
						// 		if(data.gender=='X'){ gender = "<span class='label bg-green'><b>X</b></span>"; }
						// 		$('.table').append(
						// 			"<tr class='groups"+data.id+"'>"+
						// 				"<td>"+data.id+"</td>"+
						// 				"<td>"+gender+"</td>"+
						// 				"<td>"+data.trackTitle+"</td>"+
						// 				"<td>"+data.levelName+"</td>"+
						// 				"<td>"+data.timeSlot+"</td>"+
						// 				"<td>"+data.start+"</td>"+
						// 				"<td>"+data.locationName+"</td>"+
						// 				"<td>"+data.count+"</td>"+
						// 				"<td>"+data.batchTitle+"</td>"+
						// 				"<td><button id='add-teacher' data-group='"+data.id+"' class='btn btn-xs btn-primary'><i class='fa fa-plus'></i> Add Teacher</button></td>"+
						// 				"<td><button type='button' class='edit-group btn btn-xs btn-warning' data-id='"+data.id+"' data-track='"+data.track+"' data-level='"+data.level+"' data-gender='"+data.gender+"' data-time='"+data.time+"'  data-start='"+data.start+"' data-end='"+data.end+"' data-location='"+data.location+"' data-count='"+data.count+"' data-batch='"+data.batch+"' data-teacher='"+data.teacher+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
				// 					"<button type='button' class='delete-group btn btn-xs btn-danger' data-id='"+data.id+"' data-track='"+data.track+"' data-level='"+data.level+"' data-gender='"+data.gender+"' data-time='"+data.time+"'  data-start='"+data.start+"' data-end='"+data.end+"' data-location='"+data.location+"' data-count='"+data.count+"' data-batch='"+data.batch+"' data-teacher='"+data.teacher+"'><i class='fa fa-remove'></i> Delete</button>"+
				// 				"</td>"+
				// 			"</tr>"
				// 		);
				// 		$('#modal-add').modal('hide');
				// 		$('select[name=track]').val("");
				// 		$('select[name=level]').val("");
				// 		$('select[name=gender]').val("");
				// 		$('select[name=time]').val("");
				// 		$('input[name=start]').val("");
				// 		$('input[name=end]').val("");
				// 		$('select[name=location]').val("");
				// 		$('select[name=batch]').val("");
				// 	},2000);
				// },2000);
			},
			error: function(data) {
				alert("Error!");
			}
		});
	});

	// Code Ajax Edit
	$(document).on('click', '.edit-group', function() {
		$('#modal-edit').modal('show');
		$('#form-edit').show();
		$('#upid').val($(this).data('id'));
		$('#uptrack').val($(this).data('track'));
		$('#uplevel').val($(this).data('level'));
		$('#upgender').val($(this).data('gender'));
		$('#uptime').val($(this).data('time'));
		$('#upstart').val($(this).data('start'));
		$('#upend').val($(this).data('end'));
		$('#uplocation').val($(this).data('location'));
		$('#upbatch').val($(this).data('batch'));
		$('#edit-error').attr('hidden', 'hidden');
		$('#edit-done').attr('hidden', 'hidden');
	});

	// Button Edit
	$('#update').click(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '{{route("groups.edit")}}',
			data: {
				'_token' : $('input[name=_token]').val(),
				'id' : $('#upid').val(),
				'track' : $('#uptrack').val(),
				'level' : $('#uplevel').val(),
				'gender' : $('#upgender').val(),
				'time': $('#uptime').val(),
				'start': $('#upstart').val(),
				'end': $('#upend').val(),
				'location': $('#uplocation').val(),
				'batch': $('#upbatch').val(),
			},
			success: function(data) {
				location.reload();
				// var gender = '';
				// if(data.gender=='M'){ gender = "<span class='label bg-blue'><i class='fa fa-male'></i></span>"; }
				// if(data.gender=='F'){ gender = "<span class='label bg-yellow'><i class='fa fa-female'></i></span>"; }
				// if(data.gender=='X'){ gender = "<span class='label bg-green'><b>X</b></span>"; }
				// $('.groups'+ data.id).replaceWith(
				// 	"<tr class='groups"+data.id+"'>"+
				// 		"<td>"+data.id+"</td>"+
				// 		"<td>"+gender+"</td>"+
				// 		"<td>"+data.trackTitle+"</td>"+
				// 		"<td>"+data.levelName+"</td>"+
				// 		"<td>"+data.timeSlot+"</td>"+
				// 		"<td>"+data.start+"</td>"+
				// 		"<td>"+data.locationName+"</td>"+
				// 		"<td>"+data.count+"</td>"+
				// 		"<td>"+data.batchTitle+"</td>"+
				// 		"<td class='teacher'>"+(data.teacher==0?'<button id="add-teacher" data-group="'+data.id+'" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Add Teacher</button>':data.teacherName+'... &nbsp; <i data-group="'+data.id+'" style="color:red;cursor:pointer;" class="fa fa-times remove-teacher"></i>')+"</td>"+
				// 		"<td><button type='button' class='edit-group btn btn-xs btn-warning' data-id='"+data.id+"' data-track='"+data.track+"' data-level='"+data.level+"' data-gender='"+data.gender+"' data-time='"+data.time+"'  data-start='"+data.start+"' data-end='"+data.end+"' data-location='"+data.location+"' data-count='"+data.count+"' data-batch='"+data.batch+"' data-teacher='"+data.teacher+"'><i class='fa fa-edit'></i> Edit</button>&nbsp"+
	            //         	"<button type='button' class='delete-group btn btn-xs btn-danger' data-id='"+data.id+"' data-track='"+data.track+"' data-level='"+data.level+"' data-gender='"+data.gender+"' data-time='"+data.time+"'  data-start='"+data.start+"' data-end='"+data.end+"' data-location='"+data.location+"' data-count='"+data.count+"' data-batch='"+data.batch+"' data-teacher='"+data.teacher+"'><i class='fa fa-remove'></i> Delete</button>"+
	            //       	"</td>"+
				// 	"</tr>"
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
	$(document).on('click', '.delete-group', function() {
		$('#modal-delete').modal('show');
		$('#form-delete').show();
		$('#delid').val($(this).data('id'));
		$('#deltrack').val($(this).data('track'));
		$('#dellevel').val($(this).data('level'));
		$('#delgender').val($(this).data('gender'));
		$('#deltime').val($(this).data('time'));
		$('#delstart').val($(this).data('start'));
		$('#delend').val($(this).data('end'));
		$('#dellocation').val($(this).data('location'));
		$('#delcount').val($(this).data('count'));
		$('#delbatch').val($(this).data('batch'));
		$('#delteacher').val($(this).data('teacher'));
		$('#delete-done').attr('hidden', 'hidden');
		$('#delete-error').attr('hidden', 'hidden');
	});

	// Button Delete
	$('#delete').click(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '{{route("groups.delete")}}',
			data: {
				'_token': $('input[name=_token]').val(),
				'id': $('#delid').val(),
			},
			success: function(data) {
				$('.groups'+$('#delid').val()).remove();
				$('#modal-delete').modal('hide');
			},
			error: function(data) {
				alert("Error!");
			}
		});
	});
</script>
  
@endsection