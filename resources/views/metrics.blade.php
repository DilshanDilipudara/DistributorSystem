@extends('layouts.app')

@section('content')
<br>
<h2 class="col-md-12 text-center"> Metrics</h2>
<br>
<div class="container">
    <form action="/add"  method="post">
       @csrf 
        <div class="form-group row">
            <label for="inputmetrics" class="col-sm-2 col-form-label">Metrics Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="metricsname" placeholder="metrics">
            </div>
        </div>
         <div class="offset-6"><button type="submit" class="btn btn-outline-primary" >Submit</button></div> 
    </form>
    <br>
    <br>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Metrics Name</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>

  </tbody>
</table>
</div>



@endsection 
