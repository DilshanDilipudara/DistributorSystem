@extends('layouts.app')

@section('content')
<br>
<h2 class="col-md-12 text-center"> Metrics</h2>
<br>
<div class="container">
  <form action="/addmetrics" method="post">
    @csrf
    <div class="form-group row">
      <label for="inputmetrics" class="col-sm-2 col-form-label">Metrics Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="metricsname" placeholder="cm">
      </div>
    </div>
    <div class="offset-6"><button type="submit" class="btn btn-outline-primary">Submit</button></div>
  </form>
  <br>
  <br>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Metrics Name</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
   
      @foreach($data as $val)
      <tr>
        <th scope="row">{{$val->id}}</th>
        <td>{{$val->name}}</td>
        <td><button class="btn btn-outline-success" data-toggle="modal" data-name="{{$val->name}}" data-id="{{$val->id}}" type="button" onClick="triggerModel('{{$val->name}}', '{{$val->id}}')" data-target="#modal-update">Update</button></td>
        @if($val->isActive == true)
          <td><a href="/deletemetrics/{{$val->id}}" class="btn btn-outline-danger">Delete</a></td>
        @else
           <td><a href="/activemetrics/{{$val->id}}" class="btn btn-outline-primary">Active</a></td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Metrics Update</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="" method="post" action="/updatemetrics" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="" class="col-form-label">Metrics Name:</label>
            <input type="text" class="form-control" id="modelFieldName" value="" name="name">
          </div>
          <input id="modelFieldId" type="hidden" class="form-control" name="id" value="">
          <div class="modal-footer">
            <div class="text-center">
              <button type="submit" class="btn btn-primary "> Save </button>
              <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection

<script>
  function triggerModel(name, id) {
    document.getElementById("modelFieldName").value = name;
    document.getElementById("modelFieldId").value = id;
  }
</script>