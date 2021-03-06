@extends('layouts.app')

@section('content')


 <section>
      <div class="container-lg mb-4">
        <h1 class="text-center pt-4 font-weight-bold">Monthly Artical Sale Graph</h1>
         <form action="/addmonth_artical_sales_graph" method="post">
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
      </div><br>

      <div class="container-lg">
        <canvas id="month_artical" style="height:100vh !important;"></canvas>
      </div>
     <br>
      <span class="pl-2 offset-6">&#160;&#160;&#160;</span>
      <button type="button" onclick="PrintImage();" class="btn btn-Success">Print</button>
      
      <script>
        var ctx = document.getElementById('month_artical');
        var x =  JSON.parse("{{ json_encode($x_axis) }}");
        var print_month = <?php echo json_encode($printmonth); ?>;
        var y = JSON.parse("{{ json_encode($y_axis) }}");
  
        Chart.defaults.global.defaultFontColor = 'gray';
  
        var month_artical = new Chart(ctx, {
        type: 'line',
        data: {
          labels: x,
          datasets: [{
              label: '# of sold Articles',
              data: y,
              fill: false,
              lineTension: 0,
              borderColor:'#'+(0x1000000+(Math.random())*0xffffff).toString(16).substr(1,6),
              // pointRadius: 1,
          }]
      },
      options:{
        title:{
          display:true,
          text:'Number of sold Articles per day ' + print_month,
          fontSize:25,
          fontColor:'black'
        },
        legend:{
          position:'top',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:0,
            right:0,
            bottom:20,
            top:10
          }
        },
        tooltips:{
          enabled:true
        },
        scales:{
                  yAxes: [
                    {
                      scaleLabel: {
                      display: true,
                      labelString: "Qty",
                      fontSize:18
                      },
                      gridLines: {
                        display: true ,
                        color: "black"
                      // borderColor:''
                      // zeroLineColor: '#ffcc33'
                      },
                      ticks: {
                      fontColor: "gray", // this here
                      }
                    },
                  ],
                  xAxes: [
                    {
                      scaleLabel: {
                      display: true,
                      labelString: "Day",
                      fontSize:18
                    },
                      gridLines: {
                        display: true ,
                        color: "black"
                      },
                      ticks: {
                      fontColor: "gray", // this here
                      }
              },
            ],
        },
      }
      });
  
      </script>
    </section>






 
@endsection

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

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

<script>

function PrintImage() {
    var canvas = document.getElementById("month_artical");
    var win = window.open();
    win.document.write("<br><img src='" + canvas.toDataURL() + "'/>");
    win.print();
    win.location.reload();

}

</script>
