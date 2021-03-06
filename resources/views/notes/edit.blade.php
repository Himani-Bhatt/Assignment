@extends('layouts.master')
@section("breadcrumb")
<li class="breadcrumb-item">{{ link_to_route('notes.index', 'Notes')}}</li>
<li class="breadcrumb-item active">Edit Note</li>
@endsection
@section('extra_css')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Edit Note</h3>
      </div>

      <div class="card-body">
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {!! Form::open(['route' => ['notes.update',$data->id],'method'=>'PATCH']) !!}
        {!! Form::hidden('id',$data->id)!!}
            @csrf

            <div class="form-group row">
                {!! Form::label('user_id',"Select Candidate", ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                <div class="col-md-6">
                    <select id="user_id" name="user_id" class="form-control" disabled>
                        <option value="{{$data->user_id}}">{{$data->candidate->name}}</option>
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="note" class="col-md-4 col-form-label text-md-right">Note</label>

                <div class="col-md-6">
                    {!! Form::textarea('note',$data->note,['class'=>'form-control','size'=>'30x2','required']) !!}
                </div>
            </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="form-group col-md-4">
            {!! Form::submit('Update', ['class' => 'btn btn-warning']) !!}
          </div>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/moment.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#user_id').select2({placeholder:'Select Candidate'});

  $('#birth_date').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

});
</script>
@endsection
