@extends('layouts.app')

@section('content')


 <section>
      <div class="container-lg mb-4">
        <h1 class="text-center pt-4 font-weight-bold">Yealy Artical Sale Graph</h1>
        <br><br>
         <form action="/addmonth_artical_category_sales_graph" method="post">
                          @csrf
                        <div class="form-group row">                       
                                <label for="sales_from" class="col-sm-2 col-form-label">Month</label>
                                 <div class="col-md-10"> 
                                <input type="date" class="form-control"  id="datepicker" name="date" placeholder = "2018-05" required>
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
        <canvas id="month_artical_category" style="height:100vh !important;"></canvas>
      </div>
       <br>
      <span class="pl-2 offset-6">&#160;&#160;&#160;</span>
      <button type="button" onclick="PrintImage();" class="btn btn-Success">Print</button>

  
 <script>
        var ctx = document.getElementById('month_artical_category');
       
        var x = <?php echo json_encode($x_axis); ?>;
        var y = <?php echo json_encode($obj); ?>;
        var print_month = <?php echo json_encode($printmonth); ?>;
        var category = <?php echo json_encode($artical_category); ?>;
        var dataset = [];
            
              
        for(var i=0;i<category.length;i++){
            
            dataset[i] = {
                  
                        label:category[i].name ,
                        backgroundColor: '#'+(0x1000000+(Math.random())*0xffffff).toString(16).substr(1,6),
                        data:y[i+1], //remove the data[0] value there for adding 1.
                    }
            
        }

        Chart.defaults.global.defaultFontColor = 'gray';
        var data = {
          datasets:dataset,
          labels: x,
        };
        var month_artical_category = new Chart(ctx, {
        type: 'bar',
        data: data,
        options:{
          title:{
            display:true,
            text:'Number of Articles category per day  ' + print_month,
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
                    },
                  ],
                  xAxes: [
                    {
                      scaleLabel: {
                      display: true,
                      labelString: "Day",
                      fontSize:18
                },
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

function PrintImage() {
    var canvas = document.getElementById("month_artical_category");
    var win = window.open();
    win.document.write("<br><img src='" + canvas.toDataURL() + "'/>");
    win.print();
    win.location.reload();

}

</script>
