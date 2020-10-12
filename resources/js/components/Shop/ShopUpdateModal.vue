<template>
    <div class="modal-open modal fade show" style="display: block; opacity: 1;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Update Shop</h4>
                    <button type="button" class="close" @click="$emit('close-modal')">
                        <span>&times;</span>
                    </button>
                </div>
                <form :action="'/shops/' + shop.id" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input id="tokenInp" type="hidden" name="_token" :value="csrf_token">
                        <input id="methodInp" type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <label for="shopName2" class="col-form-label">Shop Name</label>
                            <input type="text" class="form-control" id="shopName2"
                                   name="name" value="" v-model="shop.name" placeholder="Shop Name" required>
                        </div>
                        <div class="form-group row">
                            <label for="ownerName2" class="col-sm-12 col-form-label">Owner Full Name</label>
                            <div class="col-sm-3 col-lg-3">
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
                            <div class="col-sm-9 col-lg-8">
                                <input type="text" class="form-control" id="ownerName2"
                                       name="ownerName" value="" v-model="shop.owner_name" placeholder="Owner Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nicNo2" class="col-form-label">NIC Number</label>
                            <input type="text" class="form-control" id="nicNo2" name="nic"
                                   value="" v-model="shop.nic" placeholder="NIC Number">
                        </div>
                        <div class="form-group">
                            <label for="email2" class="col-form-label">Email Address</label>
                            <input type="email" class="form-control" id="email2"
                                   name="email" value="" v-model="shop.email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="address2" class="col-form-label">Address</label>
                            <input type="text" class="form-control" id="address2"
                                   name="address" value="" v-model="shop.address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="city2" class="col-form-label">City</label>
                            <input type="text" class="form-control" id="city2"
                                   name="city" value="" v-model="shop.city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <label for="mobile2" class="col-form-label">Telephone Mobile</label>
                            <input type="text" class="form-control" id="mobile2"
                                   name="mobile" value="" v-model="shop.tel_mobile" placeholder="Mobile Number">
                        </div>
                        <div class="form-group">
                            <label for="mobBis2" class="col-form-label">Telephone Business</label>
                            <input type="text" class="form-control" id="mobBis2"
                                   name="mobBis" value="" v-model="shop.tel_business" placeholder="Business Telephone">
                        </div>
                        <div class="form-group">
                            <label for="businessId2" class="col-form-label">Business ID number</label>
                            <input type="text" class="form-control" id="businessId2"
                                   name="businessID" value="" v-model="shop.business_id_num" placeholder="Business ID">
                        </div>
                        <div class="form-group form-check offset-3">
                            <input type="checkbox" class="form-check-input" id="cashAllowed2"
                                   name="cashAllowed" v-model="shop.cash">
                            <label class="form-check-label" for="cashAllowed2">Cash payment allow</label>
                        </div>
                        <div class="form-group form-check offset-3">
                            <input type="checkbox" class="form-check-input" id="chequeAllowed2"
                                   name="chequeAllowed" v-model="shop.cheque">
                            <label class="form-check-label" for="chequeAllowed2">Cheque payment allow</label>
                        </div>
                        <div class="form-group form-check offset-3">
                            <input type="checkbox" class="form-check-input" id="creditAllowed2"
                                   name="creditAllowed" v-model="shop.credit">
                            <label class="form-check-label" for="creditAllowed2">Credit payment allow</label>
                        </div>
                        <div class="form-group">
                            <label for="formControlFile3" class="col-form-label">Owner photo
                            </label>
                            <input type="file" class="form-control-file" id="formControlFile3"
                                   name="owner_image">
                        </div>
                        <div class="form-group">
                            <label for="formControlFile4" class="col-form-label">Shop Photo
                            </label>
                            <input type="file" class="form-control-file" id="formControlFile4"
                                   name="shop_image">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" @click="$emit('close-modal')">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['shop'],

        data() {
            return {
                csrf_token: '',
            };
        },

        mounted() {
            const csMeta = document.querySelector('meta[name=\'csrf-token\']');
            this.csrf_token = csMeta.getAttribute('content');
        },

        created() {
            document.body.style.overflow = 'hidden';
        },

        destroyed() {
            document.body.style.overflow = 'auto';
        },
    };
</script>

<style>
    .modal-open {
        overflow-x: hidden;
        overflow-y: auto;
    }

    .fade {
        background: rgba(80, 80, 80, 0.5);
    }

    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 600px;
        }
    }
</style>
