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
 
   @foreach($data as $val)
    <tr>
      <th scope="row">{{$val->id}}</th>
      <td>{{$val->name}}</td>
      <td><a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-update-{{ $val->id }}">Update</a></td>
      <td><a href="/delete/{{$val->id}}" class="btn btn-outline-danger" >Delete</a></td>
    </tr>

<div class="modal fade" id="modal-update-{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="updatemodelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updatemodelLabel">Metrics Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/update"  method="post">
         @csrf
          <div class="form-group">
            <label for="metrics" class="col-form-label">Metrics Name:</label>
            <input type="text" name ="name" class="form-control" value="{{$val->name}}" >
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    
    </div>
  </div>
</div>

  @endforeach 
  </tbody>
</table>
</div>

@endsection 



 <script>
$('#updatemodel').on('show', function(e) {
    var link     = e.relatedTarget(),
        modal    = $(this),
        name = link.data("name"),

    modal.find("#name").val(name);
});

</script>


