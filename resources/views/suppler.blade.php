@extends('layouts.app')

@section('content')
<br>
<h2 class="col-md-12 text-center"> Suppler </h2>
<br>
<div class="container">
  <form action="/addsuppler" method="post">
    @csrf

     <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Supply(Artical Category)</label>
            <div class="col-sm-10">
              <select class="form-control" id="categoryID" name="categoryID"  required>
                <option ></option>
                @foreach($artical_category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            </div>
        </div>

    <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="name" placeholder="John Maxwel">
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Street</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="street" id="street" placeholder="7th street">
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">City</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="city" id="city" placeholder="New York">
      </div>
    </div>
     <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Telephone</label>
      <div class="col-sm-10">
        <input type="tel" pattern="[+/0]{1}[0-9]{9,10}" class="form-control" name="tel" id="tel" placeholder="021 2 222 222">
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Mobile</label>
      <div class="col-sm-10">
        <input type="tel" pattern="[+/0]{1}[0-9]{9,10}" class="form-control" name="mob" id="mob" placeholder="071 2 222 222">
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" id="email" placeholder="John@gmail.com">
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Reg No</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="regno" id="regno" placeholder="NR5PX">
      </div>
    </div>
    <div class="form-group row">
            <label class="col-sm-2 col-form-lable">Comments</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="" rows="3" name="comments"></textarea>
            </div>
        </div>

    <div class="offset-6"><button type="submit" class="btn btn-outline-primary">Submit</button></div>
  </form>
 
</div>

 <br>
  <br>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col"> Supply</th>
        <th scope="col"> Name</th>
        <th scope="col"> Street</th>
        <th scope="col"> City</th>
        <th scope="col"> Telephone</th>
        <th scope="col"> Mobile</th>
        <th scope="col"> Email</th>
        <th scope="col"> Reg No</th>
        <th scope="col"> Commments</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>

      @foreach($suppler as $val)
      <tr>
        <th scope="row">{{$val->id}}</th>
        <td>{{$val->article_category_id}}</td>
        <td>{{$val->name}}</td>
        <td>{{$val->street}}</td>
        <td>{{$val->city}}</td>
        <td>{{$val->telephone}}</td>
        <td>{{$val->mobile}}</td>
        <td>{{$val->email}}</td>
        <td>{{$val->reg_no}}</td>
        <td>{{$val->comments}}</td>

        <td><button class="btn btn-outline-success" 
        data-toggle="modal" 
        data-category="{{$val->article_category_id}}" 
        data-name="{{$val->name}}"
        data-id="{{$val->id}}" 
        data-street="{{$val->street}}"
        data-city="{{$val->city}}"
        data-telephone="{{$val->telephone}}"
        data-mobile="{{$val->mobile}}"
        data-email="{{$val->email}}"
        data-reg_no="{{$val->reg_no}}"
        data-comments="{{$val->comments}}"
        type="button" 
        onClick="triggerModel(
        '{{$val->name}}', 
        '{{$val->id}}',
        '{{$val->article_category_id}}',
        '{{$val->street}}',
        '{{$val->city}}',
        '{{$val->telephone}}',
        '{{$val->mobile}}',
        '{{$val->email}}',
        '{{$val->reg_no}}',
        '{{$val->comments}}'
        )"

        data-target="#modal-update">Update</button></td>
        @if($val->isActive == true)
          <td><a href="/deletesuppler/{{$val->id}}" class="btn btn-outline-danger">Delete</a></td>
        @else
           <td><a href="/activesuppler/{{$val->id}}" class="btn btn-outline-primary">Active</a></td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>

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
        <form id="" method="post" action="/updatesuppler" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="" class="col-form-label"> Supply :</label>
            <input type="hidden" class="form-control" id="category_id" value="" name="category_id">
            <select class="form-control" id="categoryID" name="categoryID"  required>
                <option ></option>
                @foreach($artical_category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label"> Name :</label>
            <input type="text" class="form-control" id="modalname" value="" name="name">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label"> Street :</label>
            <input type="text" class="form-control" id="modelstreet" value="" name="street">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label"> City :</label>
            <input type="text" class="form-control" id="modelcity" value="" name="city">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label"> Telephone :</label>
            <input type="text" class="form-control" id="telephone" value="" name="tel">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label"> Mobile :</label>
            <input type="text" class="form-control" id="mobile" value="" name="mob">
          </div>
           <div class="form-group">
            <label for="" class="col-form-label"> Email :</label>
            <input type="text" class="form-control" id="modalemail" value="" name="email">
          </div>
           <div class="form-group">
            <label for="" class="col-form-label"> Reg_no :</label>
            <input type="text" class="form-control" id="reg_no" value="" name="reg_no">
          </div>
           <div class="form-group">
            <label for="" class="col-form-label"> Comments :</label>
            <input type="text" class="form-control" id="comments" value="" name="comments">
          </div>
          <input id="modelid" type="hidden" class="form-control" name="id" value="">
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
  function triggerModel(name, id,article_category_id,street,city,telephone,mobile,email,reg_no,comments) {
    document.getElementById("modalname").value = name;
    document.getElementById("modelid").value = id;
    document.getElementById("category_id").value = article_category_id;
    document.getElementById("modelstreet").value = street;
    document.getElementById("modelcity").value = city;
    document.getElementById("telephone").value = telephone;
    document.getElementById("mobile").value = mobile;
    document.getElementById("modalemail").value = email;
    document.getElementById("reg_no").value = reg_no;
    document.getElementById("comments").value = comments;
  }
</script>