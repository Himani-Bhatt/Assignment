@extends('layouts.master')
@section("breadcrumb")
<li class="breadcrumb-item active">Field Settings</li>
@endsection
@section('extra_css')
<style type="text/css">
  .checkbox, #chk_all{
    width: 20px;
    height: 20px;
  }
</style>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Update Field Settings &nbsp;

      </div>
      {!! Form::open(['url' => 'settings','method'=>'post']) !!}

      @csrf
      <div class="card-body">
        <div class="row">
          <label for="name" class="col-form-label">Selecct fields you want to show in candidates list</label>
        </div>
        <div class="row">
          <div class="col-md-3">
            <input type="checkbox" name="set[name]" value="1" class="flat-red form-control" @if(Setting::get('name')==1) checked @endif>&nbsp; Name<br>
          </div>
          <div class="col-md-3">
            <input type="checkbox" name="set[email]" value="1" class="flat-red form-control" @if(Setting::get('email')==1) checked @endif>&nbsp; Email<br>
          </div>
          <div class="col-md-3">
            <input type="checkbox" name="set[birth_date]" value="1" class="flat-red form-control" @if(Setting::get('birth_date')==1) checked @endif>&nbsp; Birth Date<br>
          </div>
          <div class="col-md-3">
            <input type="checkbox" name="set[phone]" value="1" class="flat-red form-control" @if(Setting::get('phone')==1) checked @endif>&nbsp; Phone No.<br>
          </div>
          <div class="col-md-3">
            <input type="checkbox" name="set[gender]" value="1" class="flat-red form-control" @if(Setting::get('gender')==1) checked @endif>&nbsp; Gender<br>
          </div>
          <div class="col-md-3">
            <input type="checkbox" name="set[city]" value="1" class="flat-red form-control" @if(Setting::get('city')==1) checked @endif>&nbsp; City<br>
          </div>
          <div class="col-md-3">
            <input type="checkbox" name="set[country]" value="1" class="flat-red form-control" @if(Setting::get('country')==1) checked @endif>&nbsp; Country<br>
          </div>
          <div class="col-md-3">
            <input type="checkbox" name="set[image]" value="1" class="flat-red form-control" @if(Setting::get('image')==1) checked @endif>&nbsp; Image<br>
          </div>
          <div class="col-md-3">
            <input type="checkbox" name="set[pdf]" value="1" class="flat-red form-control" @if(Setting::get('pdf')==1) checked @endif>&nbsp; PDF<br>
          </div>
        </div>

      </div>

      <div class="card-footer">
        <div class="row">
          <div class="form-group col-md-4">
            {!! Form::submit('Update', ['class' => 'btn btn-info']) !!}
          </div>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




@endsection

@section('script')
<script type="text/javascript">

$(document).ready(function() {

    //Flat green color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });
  });
</script>
@endsection
