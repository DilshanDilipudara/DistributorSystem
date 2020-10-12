@extends('layouts.app')

@section('content')

<section class="pt-3">
        <div class="container">
            <h2 class="border-bottom border-primary">Sales statistic</h2>
            <div class="pt-5 pl-5 pr-5">
                    <form>
                        <div class="form-group row">
                            <label for="sales" class="col-sm-12 col-md-2 col-form-label">Sales Date</label>
                            <div class="d-sm-block d-md-flex col-sm-12 col-md-5 pl-sm-3 pl-md-0">
                                <label for="sales_from" class="text-right col-form-label pr-md-2">From</label>
                                <input type="date" class="form-control" id="sales_from">
                            </div>
                            <div class="d-sm-block d-md-flex col-sm-12 col-md-5 pl-sm-3 pl-md-0">
                                <label for="sales_to" class="text-right col-form-label  pr-md-2">To</label>
                                <input type="date" class="form-control" id="sales_to">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Article_Category" class="col-sm-2 col-form-label">Article Category</label>
                            <div class="col-sm-10 col-md-5">
                                <select class="custom-select mr-sm-2" id="Article_Category">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Article" class="col-sm-2 col-form-label">Article</label>
                            <div class="col-sm-10 col-md-5">
                                <select class="custom-select mr-sm-2" id="Article">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row pt-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">View</button>
                                <span class="pl-2">&#160;</span>
                                <button type="submit" class="btn btn-secondary">XLS Expert</button>
                            </div>
                        </div>
                    </form>  
            </div>
        </div>
        <div class="pt-3 container-md">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Art Name</th>
                    <th scope="col">Sold Qty</th>
                    <th scope="col">Kg</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td><input type="text" class="form-control" id="sale"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>






@endsection