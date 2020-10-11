@extends('layouts.app')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/shop-profile.css') }}">
@endsection

@section('content')
    <section>
        <h2 class="col-md-12 text-center"> Shop Profile</h2>
    </section>

    <section>
        <form action="{{ route('shops.update', ['shop' => $shop->id]) }}" method="post">
            @method('PATCH')
            @csrf
        <div class="text3">
            <div class="text2">
                <div class="text1">
                    <div class="row">
                        <div class="col-md-12 col-lg-10">
                            <div class="form-group row">
                                <label for="shopName" class="col-md-12 col-lg-2 col-form-label">Shop Name</label>
                                <div class=" col-lg-10">
                                    <input type="text" class="form-control" id="shopName"
                                           name="name" value="{{ $shop->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-2">
                            <div class="custom-control custom-checkbox mr-sm-2 mt-2 mb-2">
                                <input type="checkbox" class="custom-control-input" id="activeState"
                                       name="activeState" value="{{ $shop->isActive }}">
                                <label class="custom-control-label" for="activeState">active</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 col-lg-10">
                            <div class="form-group row">
                                <div></div>
                                <label for="ownerName" class="col-sm-12 col-lg-2 col-form-label">Owner Full
                                    name</label>
                                <div class="col-sm-2 col-lg-2">
                                    <div>
                                        <label class="mr-sm-2 sr-only" for="civilStatus">Preference</label>
                                        <select class="custom-select mr-sm-2" id="civilStatus" name="status">
                                            <option value="1" @if($shop->civil_status == '1') selected @endif>Mr
                                            </option>
                                            <option value="2" @if($shop->civil_status == '2') selected @endif>Miss
                                            </option>
                                            <option value="3" @if($shop->civil_status == '3') selected @endif>Mrs
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-lg-8">
                                    <input type="text" class="form-control" id="ownerName"
                                           name="ownerName" value="{{ $shop->owner_name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-10">
                            <div class="form-group row">
                                <label for="nicNo" class="col-md-12 col-lg-2 col-form-label text-danger">NIC
                                    number</label>
                                <div class=" col-lg-10">
                                    <input type="text" class="form-control" id="nicNo" name="nic"
                                           value="{{ $shop->nic }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-10">
                            <div class="form-group row">
                                <label for="email" class="col-md-12 col-lg-2 col-form-label text-danger">email
                                    address</label>
                                <div class=" col-lg-10">
                                    <input type="email" class="form-control" id="email"
                                           name="email" value="{{ $shop->email }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-10">
                            <div class="form-group row">
                                <label for="address" class="col-md-12 col-lg-2 col-form-label">Address</label>
                                <div class=" col-lg-10">
                                    <input type="text" class="form-control" id="address"
                                           name="address" value="{{ $shop->address }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-10">
                            <div class="form-group row">
                                <label for="city" class="col-md-12 col-lg-2 col-form-label">City</label>
                                <div class=" col-lg-10">
                                    <input type="text" class="form-control" id="city"
                                           name="city" value="{{ $shop->city }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-10">
                            <div class="form-group row">
                                <label for="mobile" class="col-md-12 col-lg-2 col-form-label">Telephone
                                    mobile</label>
                                <div class=" col-lg-10">
                                    <input type="text" class="form-control" id="mobile"
                                           name="mobile" value="{{ $shop->tel_mobile }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-10">
                            <div class="form-group row">
                                <label for="mobBis" class="col-md-12 col-lg-2 col-form-label">Telephone
                                    business</label>
                                <div class=" col-lg-10">
                                    <input type="text" class="form-control" id="mobBis"
                                           name="mobBis" value="{{ $shop->tel_business }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-10">
                            <div class="form-group row">
                                <label for="businessId" class="col-md-12 col-lg-2 col-form-label">Business ID
                                    number</label>
                                <div class=" col-lg-10">
                                    <input type="text" class="form-control" id="businessId"
                                           name="businessID" value="{{ $shop->business_id_num }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-10">
                            <div class="form-group row">
                                <label for="formControlFile1" class="col-md-12 col-lg-2 col-form-label">Owner photo
                                </label>
                                <div class=" col-lg-10">
                                    <input type="file" class="form-control-file" id="formControlFile1"
                                           name="owner_image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-10">
                            <div class="form-group row">
                                <label for="formControlFile2" class="col-md-12 col-lg-2 col-form-label">Shop Photo
                                </label>
                                <div class=" col-lg-10">
                                    <input type="file" class="form-control-file" id="formControlFile2"
                                            name="shop_image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-10">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-12 col-lg-2 col-form-label">&#160;</label>
                            <div class=" col-lg-10">
                                <button type="submit" class="btn btn-success btn-block">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
@endsection
