<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600&display=swap"
          rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/add-new-sale.css') }}">
    <title>Add new sale</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-primary font-weight-bold" href="#" style="font-size: 40px !important;">Add New Sale</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

        <form class="form-inline my-2 my-lg-0 ">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
  </nav>
  <section>
    <p style="font-size: 35px !important;" class="text-center text-info">Page Access : Sales REF</p>
  </section>
<div id="app">
    <form action="{{ route('add-new-sale') }}" method="post">
        @csrf
  <section>
    <div class="text3">
      <div class="text2">
        <div class="text1">
          <div class="row">
            <div class="col-md-12 col-lg-10">
              <div class="form-group row">
                <label for="inputPassword" class="col-md-12 col-lg-2 col-form-label">Invoice number</label>
                <div class=" col-lg-10">
                  <input type="text" class="form-control" id="inputPassword" placeholder="invoice number"
                    name="invNum">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-10">
              <div class="form-group row">
                <label for="inputPassword" class="col-md-12 col-lg-2 col-form-label">Shop name</label>
                <div class="col-lg-10">
                  <label class="mr-sm-2 sr-only" for="shopSelect">Preference</label>
                  <select class="custom-select mr-sm-2" id="shopSelect" name="shopID">
                    <option selected value="0">Choose...</option>
                      @foreach($shops as $shop)
                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-10">
              <div class="form-group row">
                <label for="invDate" class="col-md-12 col-lg-2 col-form-label">Date</label>
                <div class=" col-lg-10">
                  <input type="date" class="form-control" id="invDate" name="invDate">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-10">
              <div class="form-group row">
                <label for="articleCatList" class="col-md-12 col-lg-2 col-form-label">Product Category</label>
                <div class="col-lg-10">
                  <select class="custom-select mr-sm-2" id="articleCatList" name="artCatID">
                    <option selected value="0">Choose...</option>
                      @foreach($prod_cat as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section style="overflow-x: auto !important;" class="mt-4 ml-sm-2 mr-sm-2">
    <div class ="sales_list3">
      <div class="border-bottom border-secondary text1 mb-2" ></div>
      <div class="sales_list1">
        <div class="sales_list2 bg-secondary p-1 pt-2">#</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Article name</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Volume</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Unit Price</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Sale Quantity</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Discount</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">%Value</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Total</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Free offer</div>
        <div class="sales_list2 bg-secondary p-1 pt-2">Min qty</div>
      </div>
        <div id="articleList">
            <article-list></article-list>
        </div>
      <div class="border-bottom border-secondary text1 mt-2"></div>
    </div>
  </section>

  <section class="mt-4 pt-4">
    <div class="text3">
      <div class="text2">
        <div class="text1">
          <div class="row">
            <div class="col-md-12 col-lg-10">
              <div class="form-group row">
                <label for="deliverDate" class="col-md-12 col-lg-2 col-form-label">Deliver Date</label>
                <div class=" col-lg-10">
                  <input type="date" class="form-control" id="deliverDate" name="deliverDate">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-10">
              <div class="form-group row">
                <label for="inputPassword" class="col-md-12 col-lg-2 col-form-label">Payment Type</label>
                <div class=" col-lg-10">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="cashCheckbox" name="cashTaken"
                           v-model="cashTaken">
                    <label class="form-check-label" for="cashCheckbox">Cash(>2000.00)</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="chequeCheckbox" name="chequeTaken"
                           v-model="chequeTaken">
                    <label class="form-check-label" for="chequeCheckbox">Cheque</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="creditCheckbox" name="creditTaken"
                           v-model="creditTaken">
                    <label class="form-check-label" for="creditCheckbox">Credit</label>
                  </div>
                </div>
              </div>
                <div class="form-group row">
                    <div class="col-lg-4 offset-lg-2">
                        <input type="number" class="form-control" id="cash_amount" placeholder="cash amount"
                               name="cashAmount" v-bind:disabled="!cashTaken">
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <input type="number" class="form-control" id="cheque_amount" placeholder="check amount"
                               name="chequeAmount" v-bind:disabled="!chequeTaken">
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-10">
              <div class="form-group row">
                <label for="chequeDate" class="col-md-12 col-lg-2 col-form-label">Cheque Date</label>
                <div class=" col-lg-10">
                  <input type="date" class="form-control" id="chequeDate"
                         name="chequeDate" v-bind:disabled="!chequeTaken">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-10">
              <div class="form-group row">
                <label for="inputPassword" class="col-md-12 col-lg-2 col-form-label">Comment</label>
                <div class=" col-lg-10">
                  <textarea class="form-control" id="validationTextarea" placeholder="Required example textarea"
                            name="comments"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-10">
              <div class="form-group row">
                <label for="inputPassword" class="col-md-12 col-lg-2 col-form-label">&#160;</label>
                <div class=" col-lg-10">
                  <button type="submit" class="btn btn-success btn-lg btn-block">Book & Print</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    </form>
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
