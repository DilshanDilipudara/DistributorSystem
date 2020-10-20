@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/shop-profile.css') }}">
@endsection

@section('content')
    <section>
        <h2 class="col-md-12 text-center"> New Shop</h2>
    </section>

    <section>
        <form action="{{ route('shops.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="text3">
                <div class="text2">
                    <div class="text1">
                        <div class="row">
                            <div class="col-md-12 col-lg-10 offset-lg-1">
                                <div class="form-group row">
                                    <label for="shopName" class="col-md-12 col-lg-2 col-form-label">Shop Name</label>
                                    <div class=" col-lg-10">
                                        <input type="text" class="form-control" id="shopName"
                                               name="name" value="" placeholder="Shop Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-2 offset-lg-3">
                                <div class="custom-control custom-checkbox mr-sm-2 mt-2 mb-2">
                                    <input type="checkbox" class="custom-control-input" id="cashAllowed"
                                           name="cashAllowed">
                                    <label class="custom-control-label" for="cashAllowed">Cash payment allow</label>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-2">
                                <div class="custom-control custom-checkbox mr-sm-2 mt-2 mb-2">
                                    <input type="checkbox" class="custom-control-input" id="chequeAllowed"
                                           name="chequeAllowed">
                                    <label class="custom-control-label" for="chequeAllowed">Cheque payment allow</label>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-2">
                                <div class="custom-control custom-checkbox mr-sm-2 mt-2 mb-2">
                                    <input type="checkbox" class="custom-control-input" id="creditAllowed"
                                           name="creditAllowed">
                                    <label class="custom-control-label" for="creditAllowed">Credit payment allow</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-10 offset-lg-1">
                                <div class="form-group row">
                                    <div></div>
                                    <label for="ownerName" class="col-sm-12 col-lg-2 col-form-label">Owner Full
                                        name</label>
                                    <div class="col-sm-2 col-lg-2">
                                        <div>
                                            <label class="mr-sm-2 sr-only" for="civilStatus">Preference</label>
                                            <select class="custom-select mr-sm-2" id="civilStatus" name="status">
                                                <option value="1" selected>Mr
                                                </option>
                                                <option value="2">Miss
                                                </option>
                                                <option value="3">Mrs
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-8">
                                        <input type="text" class="form-control" id="ownerName"
                                               name="ownerName" value="" placeholder="Owner Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-10 offset-lg-1">
                                <div class="form-group row">
                                    <label for="nicNo" class="col-md-12 col-lg-2 col-form-label text-danger">NIC
                                        number</label>
                                    <div class=" col-lg-10">
                                        <input type="text" class="form-control" id="nicNo" name="nic"
                                               value="" placeholder="NIC Number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-10 offset-lg-1">
                                <div class="form-group row">
                                    <label for="email" class="col-md-12 col-lg-2 col-form-label text-danger">email
                                        address</label>
                                    <div class=" col-lg-10">
                                        <input type="email" class="form-control" id="email"
                                               name="email" value="" placeholder="Email Address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-10 offset-lg-1">
                                <div class="form-group row">
                                    <label for="address" class="col-md-12 col-lg-2 col-form-label">Address</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="address"
                                               name="address" value="" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-10 offset-lg-1">
                                <div class="form-group row">
                                    <label for="city" class="col-md-12 col-lg-2 col-form-label">City</label>
                                    <div class=" col-lg-10">
                                        <input type="text" class="form-control" id="city"
                                               name="city" value="" placeholder="City">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-10 offset-lg-1">
                                <div class="form-group row">
                                    <label for="mobile" class="col-md-12 col-lg-2 col-form-label">Telephone
                                        mobile</label>
                                    <div class=" col-lg-10">
                                        <input type="text" class="form-control" id="mobile"
                                               name="mobile" value="" placeholder="Mobile Number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-10 offset-lg-1">
                                <div class="form-group row">
                                    <label for="mobBis" class="col-md-12 col-lg-2 col-form-label">Telephone
                                        business</label>
                                    <div class=" col-lg-10">
                                        <input type="text" class="form-control" id="mobBis"
                                               name="mobBis" value="" placeholder="Business Telephone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-10 offset-lg-1">
                                <div class="form-group row">
                                    <label for="businessId" class="col-md-12 col-lg-2 col-form-label">Business ID
                                        number</label>
                                    <div class=" col-lg-10">
                                        <input type="text" class="form-control" id="businessId"
                                               name="businessID" value="" placeholder="Business ID">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-10 offset-lg-1">
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
                            <div class="col-md-12 col-lg-10 offset-lg-1">
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
                        <div class="col-md-12 col-lg-10 offset-lg-1">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-md-12 col-lg-2 col-form-label">&#160;</label>
                                <div class=" col-lg-10">
                                    <button type="submit" class="btn btn-success btn-block">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <section  style="overflow-x: auto !important;" class="mt-4 ml-sm-2 mr-sm-2">
        <div class="sales_list3">
            <div class="border-bottom border-secondary text1 mb-2"></div>
            <div class="sales_list1">
                <div class="sales_list2 bg-secondary p-1 pt-2">Shop Name</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Owner Full Name</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">NIC number</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Email address</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Address</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">City</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Telephone mobile</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Telephone business</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Business ID number</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Update</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Delete</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Sent to review</div>
            </div>
            <div>
                <shop-list></shop-list>
            </div>
            <div class="border-bottom border-secondary text1 mt-2"></div>
        </div>
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('js/shop-create.js') }}"></script>
@endsection
