@extends('layouts.app')

@section('content')

<section>
      <div class="container-md">
        <div class="pt-3 pl-3 pr-3">
            <div class="">
              <h2 class="p-2 border-bottom border-primary">Transport Expenses</h2>
              <form class="pt-3">
                <div class="form-group row">
                  <label for="Date1" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" id="Date1">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Ex._Type1" class="col-sm-2 col-form-label">Ex. Type</label>
                  <div class="col-sm-10">
                    <select class="custom-select mr-sm-2" id="Ex._Type1">
                      <option selected>Choose...</option>
                      <option value="1">Rent</option>
                      <option value="2">Fuel</option>
                      <option value="3">Services</option>
                      <option value="3">Transport</option>
                    </select>            
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Vehicle_Type" class="col-sm-2 col-form-label">Vehicle Type</label>
                  <div class="col-sm-10">
                    <select class="custom-select mr-sm-2" id="Vehicle_Type">
                      <option selected>Choose...</option>
                      <option value="1">Three Wheel</option>
                      <option value="2">Lorry</option>
                      <option value="3">Car</option>
                      <option value="3">Public</option>
                    </select>            
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Cost1" class="col-sm-2 col-form-label">Cost</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Cost1">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Commit1" class="col-sm-2 col-form-label">Commit</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="Commit1" placeholder="Required example textarea"></textarea>
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
      </div>
      <div class="container-lg">
        <div class="pt-3 ">
            <!-- <h2 class="bg-secondary text-center text-light">List</h2> -->
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
                  <td class="text-break">dffkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td class="text-break">Thornton</td>
                  <td>@fat</td>
                  <td class="text-break">dff</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td class="text-break">the Bird</td>
                  <td>@twitter</td>
                  <td class="text-break">dff</td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
    </section>




@endsection