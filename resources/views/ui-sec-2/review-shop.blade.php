@extends('layouts.app')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/review-shop.css') }}">
@endsection

@section('content')
    <section>
        <h2 class="col-md-12 text-center">Review Shop</h2>
    </section>
    <section>
        <div class="text3">
            <div class="text2">
                <div class="text1">
                    <span>Shop name</span>
                </div>
                <div class="text1">
                    <span>Added Date</span>
                </div>
                <div class="text1">
                    <span>City</span>
                </div>
                <div class="text1">
                    <span>Added by</span>
                </div>
                <div class="text1">
                    <span>Business no</span>
                </div>
                <div class="text1">
                    <span>Payment</span>
                </div>
                <div class="text1">
                    <span>Approve</span>
                </div>
                <div class="text1">
                </div>
            </div>
            <div class="mt-2 text-border"></div>
        </div>
        @foreach($shops as $shop)
            <form action="{{ route('approve-shop', [ 'shop' => $shop->id ]) }}" method="post">
                @csrf
                <div class="text3">
                    <div class="text2">
                        <div class="text1 justify-content-center">
                            <span>{{ $shop->name }}</span>
                        </div>
                        <div class="text1 justify-content-center">
                            <span>{{ $shop->created_at }}</span>
                        </div>
                        <div class="text1 justify-content-center">
                            <span>{{ $shop->city }}</span>
                        </div>
                        <div class="text1 justify-content-center">
                            <span>{{ $shop->user->name }}</span>
                        </div>
                        <div class="text1 justify-content-center">
                            <span>{{ $shop->business_id_num }}</span>
                        </div>
                        <div class="text1 justify-content-center">
                            <div class="custom-control custom-checkbox mr-sm-2 ml-sm-4 ml-xl-0 mb-sm-2">
                                <input type="checkbox" class="custom-control-input" id="check1__{{ $shop->id }}"
                                       @if($shop->cash == '1')
                                       checked
                                       @endif
                                       disabled>
                                <label class="custom-control-label" for="check1__{{ $shop->id }}">Cash</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2 ml-sm-4 ml-xl-0 mb-sm-2">
                                <input type="checkbox" class="custom-control-input" id="check2__{{ $shop->id }}"
                                       @if($shop->cheque == '1')
                                       checked
                                       @endif
                                       disabled>
                                <label class="custom-control-label" for="check2__{{ $shop->id }}">Cheque</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2 ml-sm-4 ml-xl-0">
                                <input type="checkbox" class="custom-control-input" id="check3__{{ $shop->id }}"
                                       @if($shop->credit == '1')
                                       checked
                                       @endif
                                       disabled>
                                <label class="custom-control-label" for="check3__{{ $shop->id }}">Credit</label>
                            </div>
                        </div>
                        <div class="text1 justify-content-center">
                            <div class="custom-control custom-radio mr-sm-2 ml-sm-4 ml-xl-0 mb-sm-2">
                                <input type="radio" class="custom-control-input"
                                       id="radio1_{{ $shop->id }}"
                                       name="approval_{{ $shop->id }}"
                                       value="1"
                                       required>
                                <label class="custom-control-label" for="radio1_{{ $shop->id }}">Approve</label>
                            </div>
                            <div class="custom-control custom-radio mr-sm-2 ml-sm-4 ml-xl-0 mb-sm-2">
                                <input type="radio" class="custom-control-input"
                                       id="radio2_{{ $shop->id }}"
                                       name="approval_{{ $shop->id }}"
                                       value="0"
                                       required>
                                <label class="custom-control-label" for="radio2_{{ $shop->id }}">Decline</label>
                            </div>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="text1 justify-content-center">
                            <label for="validationTooltip02">&#160;</label>
                            <div>
                                <button class="btn btn-success" style="width: 100% !important;" type="submit">Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 text-border"></div>
                </div>
            </form>
        @endforeach
    </section>

@endsection
