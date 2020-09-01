@extends('layout.master')
@section('title')
	Profile
@endsection
@section('content')
	    <meta name="csrf-token" content="{{ csrf_token() }}" />

	<section class="content">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <!-- <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> -->

              <!-- <h3 class="profile-username text-center">Nina Mcintire</h3> -->

              <p class="text-muted text-center">{{Auth::user()->Employee->name}}</p>

	            <ul class="list-group list-group-unbordered">
	                <li class="list-group-item">
	                  <b>Staff ID:</b> <a class="pull-right">{{Auth::user()->Employee->user_id}}</a>
	                </li>
	                <li class="list-group-item">
	                  <b>Job Title:</b> <a class="pull-right">{{Auth::user()->Employee->getJobtitle['jobtitle']}}</a>
	                </li>
	                <li class="list-group-item">
	                  <b>Department:</b> <a class="pull-right">{{Auth::user()->Employee->Department['title']}}</a>
	                </li>
	                <li class="list-group-item">
	                  <b>Manager:</b> <a class="pull-right">{{Auth::user()->Employee->manager}}</a>
	                  <br>
	                  <br>
	                  <b>Teaching Band:</b> <a class="pull-right">{{Auth::user()->Employee->getBranch['name']}}</a>
	                </li>
	                <li class="list-group-item">
	                  <b>Teaching Band:</b> <a class="pull-right"></a>
	                </li>
	                <li class="list-group-item">
	                  <b>Upto Level:</b> <a class="pull-right"></a>
	                </li>
	            </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">Contact Details</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <ul class="list-group list-group-unbordered">
		                <li class="list-group-item">
		                  <b><i class="fa fa-mobile"></i> Mobile:</b> <a class="pull-right">{{Auth::user()->Employee->mobile}}</a>
		                </li>
		                <li class="list-group-item">
		                  <b><i class="fa fa-phone"></i> Phone:</b> <a class="pull-right"></a>
		                </li>
		                <li class="list-group-item">
		                  <b><i class="fa fa-envelope"></i> Email:</b> <a class="pull-right">{{Auth::user()->Employee->email}}</a>
		                </li><br>
		                <li class="list-group-item">
		                  <b><i class="fa fa-map-marker"></i> Address:</b> <a class="pull-right">{{Auth::user()->Employee->address}}</a>
		                  <br>
		                </li>
		            </ul>
	            </div>
	            <!-- /.box-body -->
	        </div>
          <!-- /.box -->
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">Emergency Contact</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <ul class="list-group list-group-unbordered">
		                <li class="list-group-item">
		                  <b><i class="fa fa-user"></i> Name:</b> <a class="pull-right"></a>
		                </li>
		                <li class="list-group-item">
		                  <b><i class="fa fa-envelope"></i> Relation:</b> <a class="pull-right"></a>
		                </li>
		                <li class="list-group-item">
		                  <b><i class="fa fa-phone"></i> Phone:</b> <a class="pull-right"></a>
		                </li>
		            </ul>
	            </div>
	            <!-- /.box-body -->
	        </div>
	          <!-- /.box -->
	    </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active" ><a href="#activity" data-toggle="tab">Performance</a></li>
              <li><a href="#settings" data-toggle="tab">Update Info</a></li>
              <li><a href="#timeline" data-toggle="tab">Payroll</a></li>
              <li><a href="#vacations" data-toggle="tab">Vacations & Leaves</a></li>
            </ul>
            <div class="tab-content">

              <div class=" tab-pane" id="settings">
                <form class="form-horizontal" action="#">
                  {{ csrf_field() }}

                  <div class="form-group">
                    <div class="box-header with-border">
                      <h3 class="col-sm-3 control-label box-title">Contact Info</h3>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">ID</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="id" id="id" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputMobile" class="col-sm-2 control-label">Mobile</label>

                    <div class="col-sm-10">
                      <input type="mobile" class="form-control" name="mobile" id="mobile" disabled="" placeholder="Mobile">
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPhone" placeholder="Phone">
                    </div>
                  </div> -->
                  <div class="form-group">
                    <div class="col-md-2" style="width: 60px; margin-left: 70px">
                    <label>Branch </label>
                    </div>
                    <div class="col-md-10">
                      <select class="form-control " name="branch" id="branch" style="width: 100%; color: #000">
                          @foreach($emp as $employ)
                          <option value="{{$employ->getBranch['id']}}">{{$employ->getBranch['name']}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary" id="save-contact"><i class="fa fa-save"></i> Save Contact Details</button>
                    </div>
                  </div>
                </form>
                <hr>
                <form class="form-horizontal">
                  
                  <div class="form-group">
                      <div class="box-header with-border">
                      <h3 class="col-sm-3 control-label box-title">Emergency Contact</h3>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="relation" class="col-sm-2 control-label">Relation</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="relation" placeholder="Mobile">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPhone" placeholder="Mobile">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save Emergency Details</button>
                    </div>
                  </div>
                </form>
              </div>

            <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Response">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                      <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
            </div>

            <!-- /.tab-vacation -->
            <div class=" tab-pane" id="vacations">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <!-- <button type="button" class="btn btn-xs btn-info pull-right" id="add-job"><i class="fa fa-plus"></i> Add New</button> -->
                      <h3 class="box-title">Vacations & Leves Credit</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>Type</th>
                          <th>Credit</th>
                          <th>Year</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <button type="button" class="btn btn-xs btn-info pull-right" id="add-job" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Request New Vacation</button>
                      <h3 class="box-title">Vacations & Leves History</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="" class="table table-bordered table-hover">
                        <thead>
                        <tr>
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
                            <td>{{$vacation->start_date}}</td>
                            <td>{{$vacation->end_date}}</td>
                            <td>{{$vacation->of_dayes}}</td>
                            <td>{{$vacation->credit}}</td>
                            <td>
                              @if($vacation->status == 0)
                                <p><i class="fa fa-spin fa-spinner"></i> Pending</p>
                              @endif
                              @if($vacation->status == 1)
                                <p><i class="fa fa-check"></i> Accepted</p>
                              @endif
                              @if($vacation->status == 2)
                                <p><i class="fa fa-times"></i> Rejected</p>
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

                <!-- Model Add -->
                  <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Add</h4>
                        </div>
                          <form id="form-add" method="POST" action="{{route('vacationstore')}}">
                            <div class="modal-body">
                                {{csrf_field()}}
                                <div class="form-group hidden">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label for="exampleInputEmail1">Account : </label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="hidden" class="form-control" name="account" id="account" value="{{Auth::user()->id}}">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label for="exampleInputEmail1">Start Date : </label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="date" class="form-control" onkeyup="OfDayes()" name="start_date" id="start_date" placeholder="Start Date">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label for="exampleInputEmail1">End Date : </label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="date" class="form-control" onkeyup="OfDayes()" name="end_date" id="end_date" placeholder="End Date">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label for="exampleInputEmail1"># of Days : </label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="number" class="form-control" name="of_dayes" id="of_days" placeholder="# of days">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label for="exampleInputEmail1"> Of credit : </label>
                                    </div>
                                    <div class="col-md-10">
                                      <select class="form-control" name="credit" id="credit" >
                                        <option>- Select Credit -</option>
                                        <option>2015[14 days]</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
              </div>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

<!-- Code Ajax  -->
  <script>

    function OfDayes(){
      var start = new Date($('#start_date').val());
      var end = new Date($('#end_date').val());
      var diff = new Date(end - start) / (1000 * 60 * 60 * 24);
      var age = Math.floor(diff);
      $('#of_days').val(age);
    }

    // Button Ajax Save Contact Info
        $(document).ready(function(){
          $('#name').val('{{Auth::user()->Employee->name}}');
          $('#id').val('{{Auth::user()->Employee->id}}');
          $('#mobile').val('{{Auth::user()->Employee->mobile}}');
          $('#branch').val('{{Auth::user()->Employee->branch}}');
          $('#email').val('{{Auth::user()->Employee->email}}');
          $('#address').val('{{Auth::user()->Employee->address}}');
          $('#gender').val('{{Auth::user()->Employee->gender}}');
          $('#country').val('{{Auth::user()->Employee->country}}');
          $('#state').val('{{Auth::user()->Employee->state}}');
          $('#startdate').val('{{Auth::user()->Employee->startdate}}');
          $('#salarytype').val('{{Auth::user()->Employee->salarytype}}');
          $('#department').val('{{Auth::user()->Employee->department}}');
          $('#salary').val('{{Auth::user()->Employee->salary}}');
          $('#job').val('{{Auth::user()->Employee->job}}');
          $('#birthdate').val('{{Auth::user()->Employee->birthdate}}');


            $("#save-contact").click(function(e){
              e.preventDefault();
                $.ajax({
                    /* the route pointing to the post function */
                    url: "{{ url('profiles/store') }}",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {
                      _token: $('input[name=_token]').val(),
                     id: $('input[name=id]').val(),
                      name: $('input[name=name]').val(),
                      mobile: $('input[name=mobile]').val(),
                      branch: $('select[name=branch]').val(),
                      email: $('input[name=email]').val(),
                      address: $('input[name=address]').val(),
                    },
                    success: function (data) { 
                        window.location.reload();

                    }
                }); 
            });
       });    
    
    //   e.preventDefault();
    //   $.ajax({
    //     method: 'post',
    //     data:{
    //       "_token": "{{ csrf_token() }}",
    //       // 'id': $('input[name=id]').val(),
    //       // 'name': $('input[name=name]').val(),
    //       // 'mobile': $('input[name=mobile]').val(),
    //       // 'branch': $('input[name=branch]').val(),
    //       // 'email': $('input[name=email]').val(),
    //       // 'address': $('input[name=address]').val(),
    //       // 'country': $('input[name=country]').val(),
    //       // 'state': $('input[name=state]').val(),
    //       // 'startdate': $('input[name=startdate]').val(),
    //       // 'salarytype': $('input[name=salarytype]').val(),
    //       // 'salary': $('input[name=salary]').val(),
    //       // 'department': $('input[name=department]').val(),
    //       // 'job': $('input[name=job]').val(),
    //       // 'birthdate': $('input[name=birthdate]').val(),
    //     }
    //     url: 'profiles/store',
     
    //     success: function(data) {
    //       alert(data);
    //     },
    //     error: function(data) {
    //       alert('erorr');
    //     }
    //   });
    // });
    
    // })
  </script>
	
@endsection