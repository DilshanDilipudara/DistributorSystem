@extends('layouts.app')

@section('content')
    <section>
      <h1 class="text-center p-3 text-light" style="background-color: rgba(63, 138, 63, 0.924);">Graph</h1>
      <div class="container-lg mb-4">
        <h1 class="text-center pt-4 font-weight-bold">Sales Graph</h1>
        <form class="pt-4 mt-3">
          <div class="form-group row">
            <label for="inputEmail34" class="col-sm-2 col-form-label">Select Month</label>
              <div class="col-sm-5 d-flex">
                <label for="selectYear" class="col-form-label pr-3">Year</label>
                <select class="form-control" id="selectYear">
                  <option>2008</option>
                  <option>2009</option>
                  <option>2010</option>
                  <option>2011</option>
                  <option>2012</option>
                  <option>2013</option>
                  <option>2014</option>
                  <option>2015</option>
                  <option>2016</option>
                  <option>2017</option>
                  <option>2018</option>
                  <option>2019</option>
                  <option>2020</option>
                  <option>2021</option>
                </select>             </div>
              <div class="col-sm-5 d-flex">
                <label for="selectMonth" class="col-form-label pr-3">Month</label>
                <select class="form-control" id="selectMonth">
                  <option>January</option>
                  <option>February</option>
                  <option>March</option>
                  <option>April</option>
                  <option>May</option>
                  <option>June</option>
                  <option>July</option>
                  <option>August</option>
                  <option>September</option>
                  <option>October</option>
                  <option>November</option>
                  <option>December</option>
                </select>            
              </div>
          </div>
          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Article Category</label>
            <div class="col-sm-8">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="col-sm-2 text-left ml-0 pl-0 text-danger">
              &#8727;
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleFormControlSelect11" class="col-sm-2 col-form-label">Article</label>
            <div class="col-sm-8">
              <select class="form-control" id="exampleFormControlSelect11">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="col-sm-2 text-left ml-0 pl-0 text-danger">
              &#8727;
            </div>
          </div>
        </form>
      </div>
      <div class="container-lg">
        <div class="d-flex">
          <button type="button" class="btn btn-primary btn-lg m-4 pl-4 pr-4">view</button>
          <button type="button" class="btn btn-outline-success btn-lg m-4 pl-4 pr-4">print</button>
        </div>
        <canvas id="myChart" style="height:100vh !important;"></canvas>
      </div>
  
      <script>
        var ctx = document.getElementById('myChart');
  
        Chart.defaults.global.defaultFontColor = 'gray';
  
        var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
          datasets: [{
              label: '# of sold Articles',
              data: [12, 19, 3, 5, 2, 3],
              fill: false,
              lineTension: 0,
              borderColor:'crimson',
              // pointRadius: 1,
          }]
      },
      options:{
        title:{
          display:true,
          text:'Number of sold Articles per day',
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
    <section class="pt-4">
      <div class="container-lg mb-4">
        <form class="pt-4 mt-3">
          <div class="form-group row">
            <label for="inputEmail34" class="col-sm-2 col-form-label">Select year</label>
              <div class="col-sm-5 d-flex">
                <label for="selectYear" class="col-form-label pr-3">Year</label>
                <select class="form-control" id="selectYear">
                  <option>2008</option>
                  <option>2009</option>
                  <option>2010</option>
                  <option>2011</option>
                  <option>2012</option>
                  <option>2013</option>
                  <option>2014</option>
                  <option>2015</option>
                  <option>2016</option>
                  <option>2017</option>
                  <option>2018</option>
                  <option>2019</option>
                  <option>2020</option>
                  <option>2021</option>
                </select>
              </div>
          </div>
          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Article Category</label>
            <div class="col-sm-8">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="col-sm-2 text-left ml-0 pl-0 text-danger">
              &#8727;
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleFormControlSelect11" class="col-sm-2 col-form-label">Article</label>
            <div class="col-sm-8">
              <select class="form-control" id="exampleFormControlSelect11">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="col-sm-2 text-left ml-0 pl-0 text-danger">
              &#8727;
            </div>
          </div>
        </form>
      </div>
      <div class="container-lg">
        <div class="d-flex">
          <button type="button" class="btn btn-primary btn-lg m-4 pl-4 pr-4">view</button>
          <button type="button" class="btn btn-outline-success btn-lg m-4 pl-4 pr-4">print</button>
        </div>
        <canvas id="myChart2" style="height:100vh !important;"></canvas>
      </div>
  
      <script>
        var ctx = document.getElementById('myChart2');
  
        Chart.defaults.global.defaultFontColor = 'gray';
  
        var myChart2 = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["January","February","March","April","May","June","July","August","September","October","November","December"],
          datasets: [{
              label: '# of sold Articles',
              data: [12, 19, 3, 5, 2, 3],
              fill: false,
              lineTension: 0,
              borderColor:'orange'
          }]
      },
      options:{
        title:{
          display:true,
          text:'Number of sold Articles per month',
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
                      labelString: "Month",
                      fontSize:18
                },
              },
            ],
          },
      }
      });
  
      </script>
    </section>
<!-- Article Category graph -->
    <section class="pt-4">
      <div class="container-lg mb-4">
        <h1 class="text-center mt-4 font-weight-bold">Article Category graph</h1>
        <form class="pt-4 mt-3">
          <div class="form-group row">
            <label for="inputEmail34" class="col-sm-2 col-form-label">Select Month</label>
              <div class="col-sm-5 d-flex">
                <label for="selectMonth" class="col-form-label pr-3">Month</label>
                <select class="form-control" id="selectMonth">
                  <option>January</option>
                  <option>February</option>
                  <option>March</option>
                  <option>April</option>
                  <option>May</option>
                  <option>June</option>
                  <option>July</option>
                  <option>August</option>
                  <option>September</option>
                  <option>October</option>
                  <option>November</option>
                  <option>December</option>
                </select>            
              </div>
              <div class="col-sm-5 d-flex">
                <label for="selectYear" class="col-form-label pr-3">Year</label>
                <select class="form-control" id="selectYear">
                  <option>2008</option>
                  <option>2009</option>
                  <option>2010</option>
                  <option>2011</option>
                  <option>2012</option>
                  <option>2013</option>
                  <option>2014</option>
                  <option>2015</option>
                  <option>2016</option>
                  <option>2017</option>
                  <option>2018</option>
                  <option>2019</option>
                  <option>2020</option>
                  <option>2021</option>
                </select>             
              </div>
          </div>
        </form>
      </div>
      <div class="container-lg">
        <div class="d-flex">
          <button type="button" class="btn btn-primary btn-lg m-4 pl-4 pr-4">view</button>
          <button type="button" class="btn btn-outline-success btn-lg m-4 pl-4 pr-4">print</button>
        </div>
        <canvas id="myChart3" style="height:100vh !important;"></canvas>
      </div>
  
      <script>
        var ctx = document.getElementById('myChart3');
  
        Chart.defaults.global.defaultFontColor = 'gray';
        var data = {
          datasets:[
              {
                  label: 'one',
                  backgroundColor: "blue",
                  data: [10, 20, 25, 40],
              },
              {
                label: 'two',
                backgroundColor: "red",
                data: [10, 20, 30, 40],
              },
              {
                label: 'three',
                backgroundColor: "green",
                data: [10, 20, 30, 40],
              }
          ],
          labels: ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
        };
        var myChart3 = new Chart(ctx, {
        type: 'bar',
        data: data,
        options:{
          title:{
            display:true,
            text:'Number of Articles category per day',
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
    <section class="pt-4">
      <div class="container-lg mb-4">
        <form class="pt-4 mt-3">
          <div class="form-group row">
            <label for="inputEmail34" class="col-sm-2 col-form-label">Select Year</label>
              <div class="col-sm-5 d-flex">
                <label for="selectYear1" class="col-form-label pr-3">Year</label>
                <select class="form-control" id="selectYear1">
                  <option>2008</option>
                  <option>2009</option>
                  <option>2010</option>
                  <option>2011</option>
                  <option>2012</option>
                  <option>2013</option>
                  <option>2014</option>
                  <option>2015</option>
                  <option>2016</option>
                  <option>2017</option>
                  <option>2018</option>
                  <option>2019</option>
                  <option>2020</option>
                  <option>2021</option>
                </select>             
              </div>
          </div>
        </form>
      </div>
      <div class="container-lg">
        <div class="d-flex">
          <button type="button" class="btn btn-primary btn-lg m-4 pl-4 pr-4">view</button>
          <button type="button" class="btn btn-outline-success btn-lg m-4 pl-4 pr-4">print</button>
        </div>
        <canvas id="myChart4" style="height:100vh !important;"></canvas>
      </div>
  
      <script>
        var ctx = document.getElementById('myChart4');
  
        Chart.defaults.global.defaultFontColor = 'gray';
        var data = {
          labels: ["January","February","March","April","May","June","July","August","September","October","November","December"],
          datasets:[
              {
                  label: "Blue",
                  backgroundColor: "blue",
                  data: [3,7,4],
                  labelString:"Blue"
              },
              {
                  label: "Red",
                  backgroundColor: "red",
                  data: [4,3,5]
              },
              {
                  label: "Green",
                  backgroundColor: "green",
                  data: [1,2,6]
              }
          ]
        };
        var myChart3 = new Chart(ctx, {
        type: 'bar',
        data: data,
        options:{
          title:{
            display:true,
            text:'Number of Articles category per day',
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
   