@extends('layout.master')
@section('title')
  Exams
@endsection
@section('namepage')
  Exams
@endsection
@section('content')

<!-- Table Project -->
     <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
         <div class="box-header">
           <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add New Exams</button>
           <h3 class="box-title">Exams List</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
           <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Exam</th>
              <th>Track</th>
              <th>Level</th>
              <th>Duration</th>
              <th>Success Rate</th>
              <th>Option</th>
            </tr>
            </thead>
            <tbody>
               @foreach($exams as $exam)
               <tr>
                  <td>{{$exam->exam}}</td>
                  <td>{{$exam->getTrack['title']}}</td>
                  <td>{{$exam->getLevel['level']}}</td>
                  <td>{{$exam->duration}}</td>
                  <td>{{$exam->success_rate}}</td>
                   <td>
                     <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$exam->id}}"><i class="fa fa-edit"></i> Edit</button>
                     <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$exam->id}}"><i class="fa fa-trash"></i> Delete</button>
                  </td>
               </tr>

               <!-- Modal Edit -->
                  <div class="modal fade" id="modal-edit{{$exam->id}}">
                    <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                       </div>
                        <form method="POST" action="{{route('exam.edit', $exam->id)}}">
                           <div class="modal-body">
                              {{csrf_field()}}
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="exampleInputEmail1">Exam : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <input type="text" class="form-control" name="upexam" id="upexam" value="{{$exam->exam}}" placeholder="Enter exam" required="">
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="exampleInputEmail1">Track : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <select class="form-control uptrack_id" name="uptrack_id" id="uptrack_id{{$exam->id}}" data-id="uptrack_id{{$exam->id}}" required="">
                                       <option selected="" value="{{$exam->getLevel->getTrack['id']}}">{{$exam->getLevel->getTrack['title']}}</option>
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
                                    <label for="exampleInputEmail1">Level : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <select class="form-control" name="uplevel_id" id="uplevel_id{{$exam->id}}" data-id="{{$exam->id}}" required="">
                                       <option selected="" value="{{$exam->getLevel['id']}}">{{$exam->getLevel['level']}}</option>
                                    </select>
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label >Duration : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <input class="form-control" type="text" name="upduration" required="" value="{{$exam->duration}}" placeholder="Enter Duration" required="">
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="exampleInputEmail1">Success Rate : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <input class="form-control" type="text" name="upsuccess_rate" value="{{$exam->success_rate}}" required="">
                                   </div>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">Update</button>
                           </div>
                        </form>
                     </div>
                     <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>

               <!-- Modal Delete -->
                  <div class="modal fade" id="modal-delete{{$exam->id}}">
                    <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
                       </div>
                        <form method="POST" action="{{route('exam.delete', $exam->id)}}">
                           <div class="modal-body">
                              {{csrf_field()}}
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="exampleInputEmail1">Exam : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <p>{{$exam->exam}}</p>
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="exampleInputEmail1">Track : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <p>{{$exam->getLevel->getTrack['title']}}</p>
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="exampleInputEmail1">Level : </label>
                                   </div>
                                   <div class="col-md-10">
                                       <p>{{$exam->getLevel['level']}}</p>
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label >Duration : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <p>{{$exam->duration}}</p>
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="exampleInputEmail1">Success Rate: </label>
                                   </div>
                                   <div class="col-md-10">
                                    <p>{{$exam->success_rate}}</p>
                                   </div>
                                 </div>
                              </div>
                               
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">Delete</button>
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
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title"><i class="fa fa-plus"></i> Add</h4>
        </div>
         <form method="POST" action="{{route('exam.store')}}">
            <div class="modal-body">
               {{csrf_field()}}
               <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                     <label for="exampleInputEmail1">Exam : </label>
                    </div>
                    <div class="col-md-10">
                     <input type="text" class="form-control" name="exam" id="exam" placeholder="Enter exam" required="">
                    </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                     <label for="exampleInputEmail1">Track : </label>
                    </div>
                    <div class="col-md-10">
                     <select class="form-control" name="track_id" id="tarck_id" required="">
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
                     <label for="exampleInputEmail1">Level : </label>
                    </div>
                    <div class="col-md-10">
                     <select class="form-control" name="level_id" id="level_id" required="">
                        <option>- Select Track First -</option>
                     </select>
                    </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                     <label >Duration : </label>
                    </div>
                    <div class="col-md-10">
                     <input class="form-control" type="text" name="duration" required="" placeholder="Enter Duration">
                    </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                     <label for="exampleInputEmail1">Success Rate : </label>
                    </div>
                    <div class="col-md-10">
                     <input class="form-control" type="text" name="success_rate" placeholder="Enter success_rate" required="">
                    </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-success">Save</button>
            </div>
         </form>
      </div>
      <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>

<script type="text/javascript">
   $("#tarck_id").on('change', function() {
      var id = $(this).children("option:selected").val();
         $.ajax({
         type: 'get',
         url: '{{route("getLevel")}}',
         data: {'id': id},
         success: function(data){
            if (data == '') {
               $('#level_id').html('<option disabled selected>- Select Track First -</option>');
            }else{
               var options = "<option disabled selected value=''>- Select Level -</option>";
               $.each(data, function(k,v){
                  options += "<option value='"+v.id+"'>"+v.level+"</option>";
               });
               $("#level_id").html(options);
            }
         },
         error: function(data) {
           alert('errors in Branch');
         }
      }); 
   });

   $(".uptrack_id").on('change', function() {
      var id = $(this).children("option:selected").val();
      var boxId = $(this).data('id');
      alert(boxId);
         $.ajax({
         type: 'get',
         url: '{{route("getLevel")}}',
         data: {'id': id},
         success: function(data){
            if (data == '') { 
               $('#uplevel_id'+boxId).html('<option disabled selected>- Select Track First -</option>');
            }else{
               var options = "<option disabled selected value=''>- Select Level -</option>";
               $.each(data, function(k,v){
                  options += "<option value='"+v.id+"'>"+v.level+"</option>";
               });
               $("#uplevel_id"+boxId).html(options);
            }
         },
         error: function(data) {
           alert('errors in Branch');
         }
      }); 
   });
</script>

@endsection