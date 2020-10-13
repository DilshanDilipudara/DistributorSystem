@extends('layouts.app')

@section('content')

<section class="pt-3">
        <div class="container">
            <h2 class=" border-primary offset-5">Sales Monthly Static</h2>
            <div class="pt-5 pl-5 pr-5">
                    <form action="/monthsale" method="post">
                          @csrf
                        <div class="form-group row">                       
                                <label for="sales_from" class="col-sm-2 col-form-label">Month</label>
                                 <div class="col-sm-10 col-md-12"> 
                                <input type="date" class="form-control"  id="datepicker" name="date" placeholder = "2018-05" required>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="Article_Category" class="col-sm-2 col-form-label">Article Category</label>
                            <div class="col-sm-10 col-md-12"> 
                                <select class="custom-select mr-sm-2" id="categoryID" name="categoryID" onchange="return showcategory('categoryID');" required>
                                    <option selected>Choose...</option>
                                @foreach( $category as $val )
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Article" class="col-sm-2 col-form-label">Article</label>
                            <div class="col-sm-10 col-md-12">
                                <select class="custom-select mr-sm-2" id="articalID" name="articalID" required>
                                    <option></option>
                                    
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row pt-3">
                            <div class="offset-6">
                                <button type="submit" class="btn btn-primary">View</button>
                                <!-- <span class="pl-2">&#160;&#160;&#160;</span>
                                <button type="hidden" class="btn btn-secondary">XLS Expert</button> -->
                            </div>
                        </div>
                    </form>  
            </div>
        </div>
        <br>
        <div class="pt-2 container-md">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Artical Name</th>
                    <th scope="col">Month</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Total Sale Qty</th>
                    <th scope="col">Total Sale Price</th>
                    <th scope="col">Metric</th>
                </tr>
                </thead>
                <tbody>
            @if($data != null)
               @foreach($data as $val)
                <tr> 
                    <td>{{$metrics->name}}</td>
                    <td> {{ $month }} </td>
                    <td>{{$val->unit_price}}</td>
                    <td>{{$val->total_qty}}</td>
                    <td>{{$val->total_sales}}</td> 
                    <td>{{$metrics->Metric->name}}</td>       
                </tr>

             @endforeach
            @endif
               
                </tbody>
            </table>
        </div>
    </section>


<script>

function showcategory(categoryID){

    var elmSelect = document.getElementById('categoryID');
    var pi = parseInt(elmSelect.value);
    var el = <?php echo json_encode($artical); ?>;
    //el.forEach(e =>{console.log(e)});
    const result = el.filter(res => res.article_category_id == pi)
  
  //bind artical name
  document.getElementById('articalID').innerText = null;
  var option = document.createElement("option");
  option.value = null;
  option.text = "Choose...";
  articalID.add(option);
  result.forEach(element =>{
   //console.log(element.id,element.name)
    var option = document.createElement("option");
    option.value = element.id;
    option.text = element.name;
    articalID.add(option);
    
  });
}

$("#datepicker").datepicker( {
    format: "mm-yyyy",
    viewMode: "months", 
    minViewMode: "months"
});

</script>



@endsection