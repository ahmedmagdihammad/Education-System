@extends('layout.master')
@section('title')
  Profile
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
              <h3 class="box-title">Student Profile</h3>
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="height: 250px; margin-top: 30px">
              <table id="table" class="table text-center" style="height: 100px; top: ">
			        <input type="text" class="form-control " id="profile" style="width: 28%; margin-left: 35%; height: 45px">
			        <br>
			        <button type="button" class="btn btn-info" id="add-dashboard" style="margin-left: 45%"> Find Details</button>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
  
@endsection