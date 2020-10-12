@extends('layouts.app')

@section('content')

 <section>
      <h1 class="text-center p-3 text-light" style="background-color: rgba(63, 138, 63, 0.924);">Expenses</h1>
      <div class="container-md">
        <div class="pt-5 pl-3 pr-3">
          <h2 class="p-2 border-bottom border-primary">Expenses</h2>
          <form class="pt-3">
            <div class="form-group row">
              <label for="Date" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-4">
                <input type="date" class="form-control" id="Date">
              </div>
            </div>
            <div class="form-group row">
              <label for="Ex._Type" class="col-sm-2 col-form-label">Ex. Type</label>
              <div class="col-sm-10">
                <select class="custom-select mr-sm-2" id="Ex._Type">
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
                <textarea class="form-control" id="Description" placeholder="Required example textarea"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="Cost" class="col-sm-2 col-form-label">Cost</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Cost">
              </div>
            </div>
            <div class="form-group row">
              <label for="Commit" class="col-sm-2 col-form-label">Commit</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="Commit" placeholder="Required example textarea"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary btn-lg pl-5 pr-5">ADD</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="container-lg">     
        <div class="pt-3">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Ex.Type</th>
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
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td class="text-break">Thornton</td>
                <td>@fat</td>
                <td class="text-break">go</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td class="text-break">the Bird</td>
                <td>@twitter</td>
                <td class="text-break">go</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>




@endsection