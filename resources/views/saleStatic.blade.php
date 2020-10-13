@extends('layouts.app')

@section('content')

<section class="pt-3">
        <div class="container">
            <h2 class=" border-primary offset-5">Sales Day statistic</h2>
            <div class="pt-5 pl-5 pr-5">
                    <form action="/showsalestatic" method="post">
                          @csrf
                    <div class="form-group row">
                        <label for="sales" class="col-sm-12 col-md-2 col-form-label">Sales Date</label>
                    </div>
                        <div class="form-group row">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="d-sm-block d-md-flex col-sm-12 col-md-5 pl-sm-3 pl-md-0">
                                <label for="sales_from" class="text-top col-form-label pr-md-2">From</label>
                                <input type="date" class="form-control" id="sales_from" name="fromdate" required>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="d-sm-block d-md-flex col-sm-12 col-md-5 pl-sm-3 pl-md-0">
                                <label for="sales_to" class="text-right col-form-label  pr-md-2">To</label>
                                <input type="date" class="form-control" id="sales_to"  name="todate" required>
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
                    <th scope="col">Date</th>
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
                    <td>{{$startdate}}  &nbsp;&nbsp; To &nbsp;&nbsp; {{$enddate}}</td>
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

</script>



@endsection