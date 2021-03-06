@extends('layouts.master')
@section("breadcrumb")
<li class="breadcrumb-item">{{ link_to_route('tags.index', 'Tags')}}</li>
<li class="breadcrumb-item active">Add Tag</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Add Tag</h3>
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

        {!! Form::open(['route' => 'tags.store','method'=>'post']) !!}

                        @csrf


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tag Name</label>

                            <div class="col-md-6">
                               {!! Form::text('name',null,['class'=>'form-control','required']) !!}
                            </div>
                        </div>



      </div>
      <div class="card-footer">
        <div class="row">
          <div class="form-group col-md-4">
            {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
          </div>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
