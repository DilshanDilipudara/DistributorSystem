@extends('layouts.app')

@section('content')

      <h1 class="text-center p-3 text" style="">Trasport  Expenses</h1>
      <div class="container-md">
       
          <form action="addTrasportExpenses" method="post">
           @csrf
            <div class="form-group row">
              <label for="Date" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="date" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="Ex._Type" class="col-sm-2 col-form-label">Expense Type</label>
              <div class="col-sm-10">
                <select class="custom-select mr-sm-2" id="Ex._Type" name="expense_type" required>
                  <option value="">Choose...</option>
                  @foreach($ex_type as $val)
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
                </select>            
              </div>
            </div>
              <div class="form-group row">
              <label for="Ex._Type" class="col-sm-2 col-form-label">Trasport Type</label>
              <div class="col-sm-10">
                <select class="custom-select mr-sm-2" id="Ex._Type" name="trasport_type" required>
                  <option value="">Choose...</option>
                  @foreach($vehicle as $val)
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
                </select>            
              </div>
            </div>
            <div class="form-group row">
              <label for="Description" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="Description" name="description" placeholder="Fuel for vehicle"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="Cost" class="col-sm-2 col-form-label">Cost</label>
              <div class="col-sm-10">
                <input type="number"  name="cost" class="form-control" id="Cost">
              </div>
            </div>
            <div class="form-group row">
              <label for="Commit" class="col-sm-2 col-form-label">Comment</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="comment" id="comment" placeholder="Any Comments"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary btn-lg pl-5 pr-5 offset-6">ADD</button>
              </div>
            </div>
          </form>

      </div>
      <div class="container-lg">     
        <div class="pt-3">
          <table class="table">
            <thead class="thead-dark">
              <tr>
              
                <th scope="col">Date</th>
                <th scope="col">Expense Type</th>
                <th scope="col">Trasport Type</th>
                <th scope="col">Description</th>
                <th scope="col">Cost</th>
                <th scope="col">Commit</th>
                       <th scope="col">Update</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $val)
              <tr>
               
                <td>{{$val->date}}</td>
                <td>{{$val->ExpenseType->name}}</td>
                <td>{{$val->VehicleType->name}}</td>
                <td>{{$val->description}}</td>
                <td>{{$val->cost}}</td>
                <td>{{$val->comment}}</td>
                <td><button class="btn btn-outline-success" 
                            data-toggle="modal" 
                            data-date="{{$val->date}}" 
                            data-id="{{$val->id}}"
                            data-expensetypeID="{{$val->ExpenseType->id}}"
                            data-trasportID = "{{$val->VehicleType->id}}"
                            data-cost="{{$val->cost}}"
                            data-comment="{{$val->comment}}" 
                            type="button" 
                            onClick="triggerModel('{{$val->date}}',
                             '{{$val->id}}',
                             '{{$val->ExpenseType->id}}',
                             '{{$val->VehicleType->id}}',
                             '{{$val->description}}',
                             '{{$val->cost}}',
                             '{{$val->comment}}')"
                             data-target="#modal-update">Update</button></td>
              </tr>
            @endforeach
              
            </tbody>
          </table>
        </div>
      </div>



<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Expense Update</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="" method="post" action="/updateTrasportExpenses" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="" class="col-form-label">Date : </label>
            <input type="date" class="form-control" id="m_date" name="date">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Expense Type : </label>
            <input type="hidden" class="form-control" id="m_expense_type_id" name="">
             <select class="custom-select mr-sm-2" id="" name="expense_type" required>
                  <option value="">Choose...</option>
                  @foreach($ex_type as $val)
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
                </select> 
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Trasport Type : </label>
            <input type="hidden" class="form-control" id="m_transport_type_id" name="">
             <select class="custom-select mr-sm-2" id="" name="trasport_type" required>
                  <option value="">Choose...</option>
                  @foreach($ex_type as $val)
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
                </select> 
          </div>
          
          <div class="form-group">
            <label for="" class="col-form-label">Description : </label>
            <textarea type="text" class="form-control" id="m_description" name="description"></textarea>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">cost :  </label>
            <input type="number" class="form-control" id="m_cost" name="cost">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Comments : </label>
            <textarea type="text" class="form-control" id="m_comment" name="comment"></textarea>
          </div>
          <input id="m_id" type="hidden" class="form-control" name="id" value="">
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
  function triggerModel(date, id,expenseTypeID,trasportID,description,cost,comment) {
    document.getElementById("m_date").value = date;
    document.getElementById("m_id").value = id;
    document.getElementById("m_expense_type_id").value = expenseTypeID;
    document.getElementById("m_transport_type_id").value = transportTypeID;
    document.getElementById("m_description").value = description;
    document.getElementById("m_cost").value = cost;
    document.getElementById("m_comment").value = comment;
  }
</script>