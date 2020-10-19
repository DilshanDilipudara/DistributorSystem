@extends('layouts.app')

@section('content')

<br>
<h2 class="col-md-12 text-center"> User Details</h2>
<br>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">UserName</th>
      <th scope="col">Mobile</th>
      <th scope="col">Role</th>
      <th scope="col">Active</th>
      <th scope="col">Role Update</th>
    </tr>
  </thead>
  <tbody>
   @foreach($user as $val)
    <tr>
      <th scope="row">{{$val->id}}</th>
      <td>{{$val->name}}</td>
      <td>{{$val->email}}</td>
      <td>{{$val->username}}</td>
      <td>{{$val->mobile}}</td>
      <td>{{$val->role}}</td>
       @if($val->isActive == true)
          <td><a href="/deleterole/{{$val->id}}" class="btn btn-outline-danger">Delete</a></td>
        @else
           <td><a href="/activerole/{{$val->id}}" class="btn btn-outline-primary">Active</a></td>
        @endif
       <td><button class="btn btn-outline-success" data-toggle="modal" data-role="{{$val->role}}" data-id="{{$val->id}}" type="button" onClick="triggerModel('{{$val->role}}', '{{$val->id}}')" data-target="#modal-update">Update</button></td>
    </tr>
    @endforeach
  </tbody>
</table>



<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Role Update</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="" method="post" action="/updaterole" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="" class="col-form-label">Role:</label>
            <input type="hidden" class="form-control" id="modelFieldRole" value="" name="">
            <select class="form-control" id="modelFieldRole" name="role"  required>
                <option ></option>      
                <option value="rep">Rep</option>
                <option value="manager"> Manager</option>
                <option value="stock_keeper"> Stock Keeper</option>
                <option value="admin">Admin</option>
            </select>
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
  function triggerModel(role, id) {
    document.getElementById("modelFieldRole").value = role;
    document.getElementById("modelFieldId").value = id;
  }
</script>