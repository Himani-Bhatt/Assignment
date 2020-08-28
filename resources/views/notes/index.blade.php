@extends('layouts.master')
@section("breadcrumb")
<li class="breadcrumb-item active">Notes</li>
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
        <h3 class="card-title">Notes &nbsp;
        <a href="{{ route('notes.create')}}" class="btn btn-success">Add</a></h3>
      </div>

      <div class="card-body table-responsive">
        <table class="table" id="data_table">
          <thead class="thead-inverse">
            <tr>

              <th>Candidate</th>
              <th>Note</th>
              <th>Assigned Tags</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $row)
              <tr>

                <td>{{$row->candidate->name}}</td>
                <td>{!! $row->note !!}</td>
                <td>
                  @foreach($row->tags as $record)
                   <button type="button" class="btn btn-primary" style="margin-top:2px"> {{$record->tag->name}}</button> <br>
                  @endforeach
                </td>

                <td>

              <a class="btn btn-success" data-id="{{$row->id}}" data-toggle="modal" data-target="#assigntag" style="margin-top:2px"> Assign Tag</a>
              <a class="btn btn-warning" href="{{ url("notes/".$row->id."/edit") }}" style="margin-top:2px"> Edit</a>
              <a class="btn btn-danger" data-id="{{$row->id}}" data-toggle="modal" data-target="#myModal" style="margin-top:2px"> Delete</a>
              {!! Form::open(['url' => 'notes/'.$row->id,'method'=>'DELETE','class'=>'form-horizontal','id'=>'form_'.$row->id]) !!}

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


<!-- Modal -->
<div id="assigntag" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Assign Tag</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url'=>url('assign-tag'),'id'=>'assign_form']) !!}

          {!! Form::hidden('note_id',"",['id'=>'note_id'])!!}
        <div class="form-group">
          {!! Form::label('tag','Select Tag',['class'=>"form-label"]) !!}
          <select id="tag_id" name="tag_id" class="form-control" required>
              <option value=""></option>
              @foreach($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button id="password" class="btn btn-info" type="submit" >Assign</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close
        </button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


@endsection

@section('script')
<script type="text/javascript">

  $('#assigntag').on('show.bs.modal', function(e) {
    var id = e.relatedTarget.dataset.id;
    $("#note_id").val(id);
  });

  // $('#tag_id').select2({placeholder:'Select tag'});

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
