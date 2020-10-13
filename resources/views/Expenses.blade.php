@extends('layouts.app')

@section('content')


      <h1 class="text-center p-3 text" style="">Expenses</h1>
      <div class="container-md">
       
          <form class="pt-3">
            <div class="form-group row">
              <label for="Date" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="date">
              </div>
            </div>
            <div class="form-group row">
              <label for="Ex._Type" class="col-sm-2 col-form-label">Expense Type</label>
              <div class="col-sm-10">
                <select class="custom-select mr-sm-2" id="Ex._Type" id="expense_type">
                  <option selected>Choose...</option>
                  <option value="Electronic">Electronic</option>
                  <option value="Stationary">Stationary</option>
                  <option value="Resale">Resale</option>
                  <option value="In house use">In house use</option>
                  <option value="Rent">Rent</option>
                  <option value="Mobile">Mobile</option>
                  <option value="Food & Beverage">Food & Beverage</option>
                </select>            
              </div>
            </div>
            <div class="form-group row">
              <label for="Description" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="Description" placeholder="Fuel for vehicle"></textarea>
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
                <textarea class="form-control" id="Commit" placeholder="Any Comments"></textarea>
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
                <th scope="col">Description</th>
                <th scope="col">Cost</th>
                <th scope="col">Commit</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td class="text-break">Otto</td>
                <td>@mdo</td>
                <td class="text-break">go</td>
              </tr>
   
              
            </tbody>
          </table>
        </div>
      </div>



@endsection