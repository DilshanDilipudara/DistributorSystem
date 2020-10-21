@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/to-be-collected.css') }}">
@endsection

@section('content')

    <div>
        <section>
            <h2 class="col-md-12 text-center">To Be Collected</h2>
        </section>
        <section>
            <div class="text3">
                <div class="text2">
                    <div class="text1">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="search-form" action="" method='get'>
                                <div class="form-group row">
                                    <div class="col-sm-9 col-lg-2">
                                        <input class="form-control mr-sm-2" type="number" placeholder="Search"
                                               name="invoiceNumber"
                                               aria-label="Search">
                                    </div>
                                    <div class="col-sm-3 col-lg-1">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search
                                        </button>
                                    </div>

                                    <label for="min-date-input" class="col-sm-12 col-lg-2 col-form-label text-right">
                                        Order Date from</label>
                                    <div class="col-sm-12 col-lg-2">
                                        <input type="date" class="form-control" id="min-date-input"
                                               name="minDate">
                                    </div>
                                    <label for="max-date-input"
                                           class="col-sm-12 col-lg-1 col-form-label mt-sm-2 mt-xl-0 text-right">
                                        To</label>
                                    <div class="col-sm-12 col-lg-2">
                                        <input type="date" class="form-control" id="max-date-input"
                                               name="maxDate">
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="invoice-table" style="overflow-x: auto !important;" class="mt-4 ml-sm-2 mr-sm-2">
            @include('ui-sec-2.to-be-collected-filtered')
        </section>
    </div>


@endsection

@section('javascript')
    <script>
    function validateForm(form) {
        if (form["cashTaken"].checked || form['chequeTaken'].checked) {
            return true;
        }
        else {
            alert("Please select a payment method");
            return false;
        }
    }

    document.getElementById('min-date-input').addEventListener('change', (event) => {
        const maxDate = document.getElementById('max-date-input').value;

       axios.get(`/invoices/filtered-to-be-collected?minDate=${ event.target.value }&maxDate=${ maxDate }`)
        .then(res => {
           document.getElementById('invoice-table').innerHTML = res.data;
       })
        .catch(error => {
            console.error(error);
       });
    });

    document.getElementById('max-date-input').addEventListener('change', event => {
        const minDate = document.getElementById('min-date-input').value;

        axios.get(`/invoices/filtered-to-be-collected?minDate=${ minDate }&maxDate=${ event.target.value }`)
        .then(res => {
            document.getElementById('invoice-table').innerHTML = res.data;
        })
        .catch(error => {
            console.error(error);
        });
    });

    document.getElementById('search-form').addEventListener('submit', event => {
        event.preventDefault();

        axios.get(`/invoices/filtered-to-be-collected?invoiceNumber=${ event.target["invoiceNumber"].value }`)
        .then(res => {
            document.getElementById('invoice-table').innerHTML = res.data;
        })
        .catch(error => {
            console.error(error);
        });
    })
    </script>
@endsection
