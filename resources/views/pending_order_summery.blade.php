@extends('layouts.app')

@section('content')

<section class="pt-3">
        <div class="container">
            <h2 class=" border-primary offset-5">Pending Order Summery</h2>
            <div class="pt-5 pl-5 pr-5">
                    <form action="/show_pending_order_summery" method="post">
                          @csrf
                    <div class="form-group row">
                        <label for="sales" class="col-sm-12 col-md-2 col-form-label">Order Date</label>
                    </div>
                        <div class="form-group row">
                        
                            <div class="d-sm-block d-md-flex col-md-5 ">
                                <label for="order_start_date" class="text-top col-form-label pr-md-2">From</label>
                                <input type="date" class="form-control" id="order_start_date" name="order_start_date" required>
                            </div>
                            
                            <div class="d-sm-block d-md-flex col-sm-12 col-md-5 ">
                                <label for="order_end_date" class="text-right col-form-label  pr-md-2">To</label>
                                <input type="date" class="form-control" id="order_end_date"  name="order_end_date" required>
                            </div>
                       
                                <button type="submit" class="btn btn-primary">View</button>
                        </div>
                        </div>
                    </form>

              
                      <div id="div_print">
                       <br> <br>                   
                         <h2 class = "offset-1"> Pending order Summery Report  &nbsp; &nbsp; @if(!empty($start_date)) {{$start_date}} to {{$end_date}} @endif </h2>
                         <br>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Article Name</th>
                                <th scope="col">Shop Name</th>
                                <th scope="col">Volume</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Sale Qty</th>
                                <th scope="col">Free Offer</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                                    <tbody>
                            @if(!empty($data))
                                    @foreach($data as $val)
                                    <tr>
                                    <td>{{ $loop->index +1}}</td>
                                        <th scope="row">{{$val->article_name}}</th>
                                        <td>{{$val->shop_name}}</td>
                                        <td>{{$val->volume}}</td>
                                        <td>{{$val->unit_price}}</td>
                                        <td>{{$val->sale_qty}}</td>
                                        <td>{{$val->free_offer}}</td>
                                        <td>{{$val->total}}</td>
                                    </tr>
                                    @endforeach
                                @endif    
                                    </tbody>
                            </table>  
                        </div>   
                         <button type="submit" onClick="printdiv('div_print');" class="btn btn-primary offset-6">Print Report</button>
                </div>
        </div>
       
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


