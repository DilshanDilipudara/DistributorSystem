@extends('layouts.app')

@section('content')

<section class="pt-3">
        <div class="container">
            <h2 class=" border-primary offset-5">Deliver Pending</h2>
            <div class="pt-5 pl-5 pr-5">
                    <form action="/deliver_pending_show" method="post">
                          @csrf
                    <div class="form-group row">
                        <label for="sales" class="col-sm-12 col-md-2 col-form-label">Order Date</label>
                    </div>
                        <div class="form-group row">
                        
                            <div class="d-sm-block d-md-flex col-md-5 ">
                                <label for="start_date" class="text-top col-form-label pr-md-2">From</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            
                            <div class="d-sm-block d-md-flex col-sm-12 col-md-5 ">
                                <label for="end_date" class="text-right col-form-label  pr-md-2">To</label>
                                <input type="date" class="form-control" id="end_date"  name="end_date" required>
                            </div>
                       
                                <button type="submit" class="btn btn-primary">View</button>
                        </div>
                        </div>
                    </form>
                </div>
        </div>

           <div id="div_print">
                       <br> <br>                   
                         <h2 class = "offset-2"> Deliver Pending Summery  &nbsp; &nbsp; @if(!empty($start_date)) {{$start_date}} to {{$end_date}} @endif </h2>
                         <br>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Deliver Date</th>
                                <th scope="col">Shop</th>
                                <th scope="col">City</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Pending Amount</th>
                                <th scope="col">Item Count</th>
                                <th scope="col">Sales By</th>
                                <th scope="col">Comment</th>
                                <td></td>
                            </tr>
                            </thead>
                                    <tbody>
                            @if(!empty($data))
                                    @foreach($data as $val)
                                    <tr>
                                    <td>{{ $loop->index +1}}</td>
                                        <th scope="row">{{$val->number}}</th>
                                        <td>{{$val->date}}</td>
                                        <td>{{$val->deliver_date}}</td>
                                        <td>{{$val->shop_name}}</td>
                                        <td>{{$val->city}}</td>
                                        <td>{{$val->total}}</td>
                                        <td>{{$val->pending_amount}}</td>
                                        <td>{{$val->item_count}}</td>
                                        <td>{{$val->user_name}}</td>
                                        <td>{{$val->comment}}</td>
                                    </tr>
                                    @endforeach
                                @endif    
                                    </tbody>
                            </table>  
                        </div>  
       
       <button type="submit" onClick="printdiv('div_print');" class="btn btn-primary offset-6">Print Report</button>
    </section>


<script>
        function printdiv(printpage) {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr  +footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>




@endsection


