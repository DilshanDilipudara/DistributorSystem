@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/add-new-sale.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div id="app">
        <section>
            <h2 class="col-md-12 text-center"> Add New Sale</h2>
        </section>
        <form id="add-new-sale-form" action="{{ route('add-new-sale') }}" method="post">
            @csrf
            <section>
                <div class="text3">
                    <div class="text2">
                        <div class="text1">
                            <div class="row">
                                <div class="col-md-12 col-lg-10">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-md-12 col-lg-2 col-form-label">Invoice
                                            number</label>
                                        <div class=" col-lg-10">
                                            <input type="text" class="form-control" id="inputPassword"
                                                   placeholder="invoice number"
                                                   name="invNum" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-10">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-md-12 col-lg-2 col-form-label">Shop
                                            name</label>
                                        <div class="col-lg-10">
                                            <label class="mr-sm-2 sr-only" for="shopSelect">Preference</label>
                                            <select class="custom-select mr-sm-2" id="shopSelect" name="shop"
                                                    v-model="shop" required>
                                                <option selected value="0">Choose...</option>
                                                @foreach($shops as $shop)
                                                    <option value="{{ $shop }}">{{ $shop->name }}</option>
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
                                            <input type="date" class="form-control" id="invDate"
                                                   name="invDate" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-10">
                                    <div class="form-group row">
                                        <label for="articleCatList" class="col-md-12 col-lg-2 col-form-label">Product
                                            Category</label>
                                        <div class="col-lg-10">
                                            <select class="custom-select mr-sm-2" id="articleCatList"
                                                    name="artCatID" required>
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
                    @verbatim
                    <div id="articleList">
                        <article-list @error-state-change="handleArticleError" @total-change="handleTotalChange"></article-list>
                    </div>
                    @endverbatim
            </section>

            <section class="mt-4 pt-4">
                <div class="text3">
                    <div class="text2">
                        <div class="text1">
                            <div class="row">
                                <div class="col-md-12 col-lg-10">
                                    <div class="form-group row">
                                        <label for="deliverDate" class="col-md-12 col-lg-2 col-form-label">Deliver
                                            Date</label>
                                        <div class=" col-lg-10">
                                            <input type="date" class="form-control" id="deliverDate"
                                                   name="deliverDate" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-10">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-md-12 col-lg-2 col-form-label">Payment
                                            Type</label>
                                        <div class="col-lg-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="cashCheckbox"
                                                       name="cashTaken"
                                                       :disabled="cashNotAllowed"
                                                       v-model="cashTaken">
                                                <label class="form-check-label"
                                                       for="cashCheckbox">Cash</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="chequeCheckbox"
                                                       name="chequeTaken"
                                                       :disabled="chequeNotAllowed"
                                                       v-model="chequeTaken">
                                                <label class="form-check-label" for="chequeCheckbox">Cheque</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="creditCheckbox"
                                                       name="creditTaken"
                                                       :disabled="creditNotAllowed"
                                                       v-model="creditTaken">
                                                <label class="form-check-label" for="creditCheckbox">Credit</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4 offset-lg-2">
                                            <input type="number" class="form-control" id="cash_amount"
                                                   placeholder="cash amount"
                                                   name="cashAmount"
                                                   :disabled="!cashTaken"
                                                   v-model="cashAmount" required>
                                        </div>
                                        <div class="col-lg-4 offset-lg-1">
                                            <input type="number" class="form-control" id="cheque_amount"
                                                   placeholder="check amount"
                                                   name="chequeAmount"
                                                   :disabled="!chequeTaken"
                                                    v-model="chequeAmount" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-10">
                                    <div class="form-group row">
                                        <label for="chequeDate" class="col-md-12 col-lg-2 col-form-label">Due
                                            Date</label>
                                        <div class=" col-lg-10">
                                            <input type="date" class="form-control" id="chequeDate"
                                                   name="chequeDate" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-10">
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                               class="col-md-12 col-lg-2 col-form-label">Comment</label>
                                        <div class=" col-lg-10">
                                                <textarea class="form-control" id="validationTextarea"
                                                          placeholder="Required example textarea"
                                                          name="comments">
                                                </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-10">
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                               class="col-md-12 col-lg-2 col-form-label">&#160;</label>
                                        <div class=" col-lg-10">
                                            <button id="sale-sub-btn" type="submit"
                                                    class="btn btn-success btn-lg btn-block">Book & Print
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
        <modal-window v-if="showErrorModal"
                  :title="'RECHECK!'"
                  :message="errorMessage"
                  :allow-btn-msg="''"
                  :cancel-btn-msg="'Close'"
                  @hide-modal="showErrorModal = false"></modal-window>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/add-new-sale.js') }}"></script>
@endsection
