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
        <select class="form-control" id="categoryID" name="categoryID"  onchange="return showcategory('categoryID');" required>
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
        <td>{{$val->article->articleCategory->name}}</td>
        <td>{{$val->article->name}}</td>
        <td>{{$val->supplier->name}}</td>
        <td>{{$val->date}}</td>
        <td>{{$val->order_number}}</td>
        <td>{{$val->invoice_number}}</td>
        <td>{{$val->price}}</td>
        <td>{{$val->quantity}}</td>
        <td>{{$val->buying}}</td>
        <td>{{$val->selling}}</td>
        <td>{{$val->comment}}</td>
        <td><button class="btn btn-outline-success" data-toggle="modal"
        data-id="{{$val->id}}"
        data-article_category_id="{{$val->article->articleCategory->id}}"
        data-article_id = "{{$val->article_id}}"
        data-suppler_id ="{{$val->suppler_id}}"
        data-date = "{{$val->date}}"
        data-order_number = "{{$val->order_number}}"
        data-invoice_number = "{{$val->invoice_number}}"
        data-price = "{{$val->price}}"
        data-quantity = "{{$val->quantity}}"
        data-buying = "{{$val->buying}}"
        data-selling = "{{$val->selling}}"
        data-comment = "{{$val->comment}}"

        type="button"
        onClick="triggerModel(
          '{{$val->id}}',
          '{{$val->article->articleCategory->id}}',
          '{{$val->article_id}}',
          '{{$val->suppler_id}}',
          '{{$val->date}}',
          '{{$val->order_number}}',
          '{{$val->invoice_number}}',
          '{{$val->price}}',
          '{{$val->quantity}}',
          '{{$val->buying}}',
          '{{$val->selling}}',
          '{{$val->comment}}'
          )"

           data-target="#modal-update">Update</button></td>
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
        <h4 class="modal-title w-100 font-weight-bold">Warehouse Update</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="" method="post" action="/updatewarehouse" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="" class="col-form-label">Artical Category Name : </label>
             <input type="hidden" class="form-control" id="marticle_category_id" value="" name="">
              <select class="form-control" name="categoryID"  required>
                  <option value=""></option>
                  @foreach($category as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Artical Name : </label>
            <input type="hidden" class="form-control" id="marticle_id" value="" name="">
            <select class="form-control" name="articleID"  required>
                  <option value=""></option>
                  @foreach($artical as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Supplier Name : </label>
            <input type="hidden" class="form-control" id="msuppler_id" value="" name="">
            <select class="form-control" name="suppler_id"  required>
                  <option value=""></option>
                  @foreach($supplier as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
              </select>
          </div>
           <div class="form-group">
            <label for="" class="col-form-label">Date : </label>
            <input type="date" class="form-control" id="mdate" value="" name="date">
          </div>
           <div class="form-group">
            <label for="" class="col-form-label">Bid ID/Order Number : </label>
            <input type="text" class="form-control" id="morder_number" value="" name="order_number">
          </div>
           <div class="form-group">
            <label for="" class="col-form-label">Invoice Number : </label>
            <input type="text" class="form-control" id="minvoice_number" value="" name="invoice_number">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Total Price : </label>
            <input type="text" class="form-control" id="mprice" value="" name="price">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Quantity : </label>
            <input type="text" class="form-control" id="mquantity" value="" name="qty">
          </div>
          <div class="form-check offset-3">
              <input class="form-check-input" type="checkbox" name="buying" id="mbuying">
              <label class=" form-check-label" for="defaultCheck1">
                  : Buying
              </label>
          </div>
          <div class="form-check offset-3">
              <input class="form-check-input" type="checkbox" name="selling" id="mselling">
              <label class="form-check-label" for="defaultCheck1">
                  : Selling
              </label>
          </div>

          <div class="form-group ">
              <label for="" class="col-form-label"> Comments:</label>
              <textarea type="text" class="form-control" id="mcomment" value="" name="comments"></textarea>
          </div>
          <input id="mId" type="hidden" class="form-control" name="id" value="">
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
  function triggerModel(id,article_category_id,article_id,suppler_id,date,order_number,invoice_number,price,quantity,buying,selling,comment) {
    console.log(id);
    document.getElementById("mId").value = id;
    document.getElementById("marticle_category_id").value = article_category_id;

    document.getElementById("marticle_id").value = article_id;
    document.getElementById("msuppler_id").value = suppler_id;
    document.getElementById("mdate").value = date;
    document.getElementById("morder_number").value = order_number;
    document.getElementById("minvoice_number").value = invoice_number;
    document.getElementById("mprice").value = price;
    document.getElementById("mquantity").value = quantity;

     if (buying == 1) {
            document.getElementById("mbuying").checked = true;
        } else {
            document.getElementById("mbuying").checked = false;
        }
        if (selling == 1) {
            document.getElementById("mselling").checked = true;
        } else {
            document.getElementById("mselling").checked = false;
        }
        document.getElementById("mcomment").value = comment;
  }

function showcategory(categoryID){
  
  var elmSelect = document.getElementById('categoryID');
  var pi = parseInt(elmSelect.value);
 // console.log(pi);

  var el = <?php echo json_encode($artical); ?>;
  //filter array element
  const result = el.filter(res => res.article_category_id == pi)
  
  //bind artical name
  document.getElementById('articalID').innerText = null;
  var option = document.createElement("option");
  option.value = null;
  option.text = "";
  articalID.add(option);
  result.forEach(element =>{
   // console.log(element.id,element.name)
    var option = document.createElement("option");
    option.value = element.id;
    option.text = element.name;
    articalID.add(option);
    
  });


   
}

 
</script>
