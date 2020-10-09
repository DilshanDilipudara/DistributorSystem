@extends('layouts.app')

@section('content')
<br>
<h2 class="col-md-12 text-center"> Add Stock To Warehouse</h2>
<br>
<div class="container">
  <form action="/addwarehouse" method="post">
    @csrf
    <div class="form-group row">
      <label for="inputmetrics" class="col-sm-2 col-form-label">Article Category</label>
      <div class="col-sm-10">
        <select class="form-control" id="categoryID" name="categoryID"  required>
                <option ></option>
                @foreach($category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
         </select> 
      </div>
    </div>
    <div class="form-group row">
      <label for="inputmetrics" class="col-sm-2 col-form-label">Article Name</label>
      <div class="col-sm-10">
         <select class="form-control" id="articalID" name="articalID"  required>
                <option ></option>
                @foreach($artical as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
         </select> 
      </div>
    </div>
     <div class="form-group row">
      <label for="inputmetrics" class="col-sm-2 col-form-label">Supplier</label>
      <div class="col-sm-10">
        <select class="form-control" id="supplierID" name="supplierID"  required>
                <option ></option>
                @foreach($supplier as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
         </select> 
      </div>
    </div>
    <div class="form-group row">
      <label for="inputmetrics" class="col-sm-2 col-form-label">Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="date" id="" >
      </div>
    </div>
    <div class="form-group row">
      <label for="inputmetrics" class="col-sm-2 col-form-label">Bid ID/Order Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="bidID" id="" >
      </div>
    </div>
    <div class="form-group row">
      <label for="inputmetrics" class="col-sm-2 col-form-label">Invoice Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="invoice" id="" >
      </div>
    </div>
    <div class="form-group row">
      <label for="inputmetrics" class="col-sm-2 col-form-label">Total Price</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="total" id="" >
      </div>
    </div>
    <div class="form-group row">
      <label for="inputmetrics" class="col-sm-2 col-form-label">Quantity</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="qty" id="" >
      </div>
    </div>
     <div class="form-group row">
            <div class="form-check offset-6 tab-space">
                <input type="checkbox" class="form-check-input" name="buying">
                <label class="form-check-lable">Buying</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 offset-6 form-check tab-space">
                <input type="checkbox" class="form-check-input" name="selling">
                <label class="form-check-lable">Selling</label>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-lable">Comments</label>
            <div class="col-sm-8">
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
        <th scope="col">Article Category</th>
        <th scope="col">Article Name</th>
        <th scope="col">Supplier</th>
        <th scope="col">Date</th>
        <th scope="col">Bid ID</th>
        <th scope="col">Invoice No.</th>
        <th scope="col">Total</th>
        <th scope="col">Quantity</th>
        <th scope="col">Buying</th>
        <th scope="col">Selling</th>
        <th scope="col">Comments</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>

      @foreach($warehouse as $val)
      <tr>
        <th scope="row">{{$val->id}}</th>
        <td>{{$val->article_category_id}}</td>
        <td>{{$val->article_id}}</td>
        <td>{{$val->suppler_id}}</td>
        <td>{{$val->date}}</td>
        <td>{{$val->order_number}}</td>
        <td>{{$val->invoice_number}}</td>
        <td>{{$val->price}}</td>
        <td>{{$val->quantity}}</td>
        <td>{{$val->buying}}</td>
        <td>{{$val->selling}}</td>
        <td>{{$val->comment}}</td>
        <td><button class="btn btn-outline-success" data-toggle="modal" data-article_category_id="{{$val->article_category_id}}" data-id="{{$val->id}}" type="button" onClick="triggerModel('{{$val->article_category_id}}', '{{$val->id}}')" data-target="#modal-update">Update</button></td>
        @if($val->isActive == true)
          <td><a href="/deletewarehouse/{{$val->id}}" class="btn btn-outline-danger">Delete</a></td>
        @else
           <td><a href="/activewarehouse/{{$val->id}}" class="btn btn-outline-primary">Active</a></td>
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