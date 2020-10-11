@extends('layouts.app')

@section('content')
<br>
<h2 class="col-md-12 text-center"> Profile</h2>
<br>

<div class ="container">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" value="{{$user->name}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" value="{{$user->email}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">UserName</label>
                <input type="text" class="form-control" value="{{$user->username}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mobile</label>
                <input type="text" class="form-control" value="{{$user->mobile}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Role</label>
                <input type="text" class="form-control" value="{{$user->role}}" disabled>
            </div>

            <button class="btn btn-primary" data-toggle="modal"
             data-name="{{$user->name}}" 
            data-id="{{$user->id}}" 
            data-id="{{$user->email}}" 
            data-id="{{$user->username}}" 
            data-id="{{$user->mobile}}" 
            type="button" 
            onClick="triggerModel('{{$user->name}}', 
            '{{$user->id}}',
            '{{$user->email}}',
            '{{$user->username}}',
            '{{$user->mobile}}'
            )" 
            data-target="#modal-update">Update</button>
         </form>
</div>




<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Profile Update</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="" method="post" action="/updateprofile" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="" class="col-form-label" > Name:</label>
            <input type="text" class="form-control" id="modelFieldName" value="" name="name" required>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label"> Email:</label>
            <input type="email" class="form-control" id="modelFieldEmail" value="" name="email"  required> 
          </div>
          <div class="form-group">
            <label for="" class="col-form-label"> User Name:</label>
            <input type="text" class="form-control" id="modelFieldUsername" value="" name="username" required>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label"> Mobile:</label>
            <input type="tel" pattern="[+/0]{0/1}[0-9]{9,10}" class="form-control" id="modelFieldMobile" value="" name="mobile" required>
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
  function triggerModel(name, id,email,username,mobile) {
    document.getElementById("modelFieldName").value = name;
    document.getElementById("modelFieldId").value = id;
    document.getElementById("modelFieldEmail").value = email;
    document.getElementById("modelFieldUsername").value = username;
    document.getElementById("modelFieldMobile").value = mobile;
  }
</script>