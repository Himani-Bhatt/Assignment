@extends('layouts.master')
@section("breadcrumb")
<li class="breadcrumb-item active">Candidates</li>
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
        <h3 class="card-title">Candidates &nbsp;
        <a href="{{ route('candidates.create')}}" class="btn btn-success">Add</a></h3>
      </div>

      <div class="card-body table-responsive">
        <table class="table" id="data_table">
          <thead class="thead-inverse">
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone no.</th>
              <th>Gender</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $row)
              <tr>
                <td>
                  <img src="{{asset('uploads/'.$row->image)}}" height="70px" width="70px">
                </td>
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->phone}}</td>
                <td>{{($row->gender == 1)?"Female":"Male"}}</td>
                <td>
              <a class="btn btn-warning" href="{{ url("candidates/".$row->id."/edit") }}"> Edit</a>
              <a class="btn btn-danger" data-id="{{$row->id}}" data-toggle="modal" data-target="#myModal"> Delete</a>
              {!! Form::open(['url' => 'candidates/'.$row->id,'method'=>'DELETE','class'=>'form-horizontal','id'=>'form_'.$row->id]) !!}

              {!! Form::hidden("id",$row->id) !!}

              {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Record</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Confirm Delete?</p>
      </div>
      <div class="modal-footer">
        <button id="del_btn" class="btn btn-danger" type="button" data-submit="">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
@endsection

@section('script')
<script type="text/javascript">
  $("#del_btn").on("click",function(){
    var id=$(this).data("submit");
    $("#form_"+id).submit();
  });

  $('#myModal').on('show.bs.modal', function(e) {
    var id = e.relatedTarget.dataset.id;
    $("#del_btn").attr("data-submit",id);
  });

</script>
@endsection
