@extends('layout.master')
@section('title')
  Questions
@endsection
@section('namepage')
  Questions
@endsection
@section('content')

<!-- Table Project -->
     <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
         <div class="box-header">
           <button type="button" class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa  fa-plus"></i> Add New Questions</button>
           <h3 class="box-title">Questions List</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
           <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Exam</th>
              <th>Question</th>
              <th>Q. Type </th>
              <th>A. Type </th>
              <th>Status</th>
              <th>Option</th>
            </tr>
            </thead>
            <tbody>
               @foreach($questions as $question)
               <tr>
                  <td>{{$question->getExam->getLevel['level']}} {{$question->getExam['exam']}}</td>
                  <td>{{$question->question_type}}</td>
                  <td>{{$question->question}}</td>
                  <td>{{$question->answer_type}}</td>
                  <td>{{$question->correct_answer}}</td>
                  <td>@if($question->status == 1) <p style="color: #26dad2" >Active</p> @endif</td>
                   <td>
                     <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{$question->id}}"><i class="fa fa-edit"></i> Edit</button>
                     <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{$question->id}}"><i class="fa fa-trash"></i> Delete</button>
                  </td>
               </tr>

               <!-- Modal Edit -->
                  <div class="modal fade" id="modal-edit{{$question->id}}">
                    <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                       </div>
                        <form method="POST" action="{{route('question.edit', $question->id)}}">
                           <div class="modal-body">
                              {{csrf_field()}}
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="questionpleInputEmail1">Exam : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <select class="form-control" name="upexam_id" required="">
                                      @foreach($exams as $exam)
                                       <option value="{{$exam->id}}">{{$exam->getLevel->getTrack['title']}} | {{$exam->getLEvel['level']}} {{$exam->exam}}</option>
                                      @endforeach
                                    </select>
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="questionpleInputEmail1">Question Type : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <select class="form-control" name="upquestion_type" required="">
                                      <option>- Select Qusetion Type -</option>
                                      <option>Plain Question</option>
                                      <option>Paragraph Question</option>
                                      <option>Audio Qusetion</option>
                                      <option>Image Question</option>
                                    </select>
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                   <div class="col-md-2">
                                    <label for="questionpleInputEmail1">Question : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <input class="form-control" type="text" name="upquestion" value="{{$question->question}}" required="">
                                   </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                   <div class="col-md-2">
                                    <label>Answer Type : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <select class="form-control" name="upanswer_type" required="">
                                      <option>- Select Answer Type -</option>
                                      <option>MCQ Answer</option>
                                      <option>True of False</option>
                                      <option>Writting Answer</option>
                                    </select>
                                   </div>
                                </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="questionpleInputEmail1">Correct Answer : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <input class="form-control" type="text" name="upcorrect_answer" value="{{$question->correct_answer}}" required="">
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
                  <div class="modal fade" id="modal-delete{{$question->id}}">
                    <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
                       </div>
                        <form method="POST" action="{{route('question.delete', $question->id)}}">
                           <div class="modal-body">
                              {{csrf_field()}}
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="questionpleInputEmail1">Exam : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <p>{{$question->getExam['exam']}}</p>
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="questionpleInputEmail1">Question Type : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <p>{{$question->question_type}}</p>
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="questionpleInputEmail1">Question : </label>
                                   </div>
                                   <div class="col-md-10">
                                       <p>{{$question->question}}</p>
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label >Answer Type : </label>
                                   </div>
                                   <div class="col-md-10">
                                    <p>{{$question->answer_type}}</p>
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row">
                                   <div class="col-md-2">
                                    <label for="questionpleInputEmail1">Correct Answer: </label>
                                   </div>
                                   <div class="col-md-10">
                                    <p>{{$question->correct_answer}}</p>
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
         <form method="POST" action="#">
            <div class="modal-body">
              {{csrf_field()}}
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                   <label for="exampleInputEmail1">Exam : </label>
                  </div>
                  <div class="col-md-10">
                   <select class="form-control" name="exam_id" required="">
                     <option selected="" disabled="">- Select Exam -</option>
                     @foreach($exams as $exam)
                     <option value="{{$exam->id}}">{{$exam->getLevel->getTrack['title']}} | {{$exam->getLEvel['level']}} {{$exam->exam}}</option>
                     @endforeach
                   </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-2">
                  <label for="questionpleInputEmail1">Question Type : </label>
                 </div>
                 <div class="col-md-10">
                  <select class="form-control" name="question_type" required="">
                    <option>- Select Qusetion Type -</option>
                    <option value="Q">Plain Question</option>
                    <option value="P">Paragraph Question</option>
                    <option value="A">Audio Qusetion</option>
                    <option value="I">Image Question</option>
                  </select>
                 </div>
               </div>
              </div>
              <div class="form-group">
                 <div class="row">
                   <div class="col-md-2">
                    <label for="questionpleInputEmail1">Question : </label>
                   </div>
                   <div class="col-md-10">
                    <input class="form-control" type="text" name="question" placeholder="Enter Question" required="">
                   </div>
                 </div>
              </div>
              <div class="form-group">
                 <div class="row">
                   <div class="col-md-2">
                    <label>Answer Type : </label>
                   </div>
                   <div class="col-md-10">
                    <select class="form-control" name="answer_type" required="">
                      <option>- Select Answer Type -</option>
                      <option>MCQ Answer</option>
                      <option>True of False</option>
                      <option>Writting Answer</option>
                    </select>
                   </div>
                 </div>
              </div>
              <div class="form-group">
                 <div class="row">
                   <div class="col-md-2">
                    <label for="questionpleInputEmail1">Correct Answer : </label>
                   </div>
                   <div class="col-md-10">
                    <input class="form-control" type="text" name="correct_answer" placeholder="Enter Correct Answer" required="">
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

@endsection