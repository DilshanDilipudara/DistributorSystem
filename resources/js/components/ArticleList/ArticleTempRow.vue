<template>
    <div class="sales_list1" v-bind:class="classDangerObj">
        <div class="low_width p-1 pt-2">
            <p>{{ ind + 1 }}</p>
        </div>
        <div class="mid_width p-1 pt-2">
            <p>{{ article.name }}</p>
        </div>
        <div class="mid_width p-1 pt-2">
            <p>{{ article.volume}}{{ article.metric.name }}</p>
        </div>
        <div class="mid_width p-1 pt-2">
            <p>{{ article.sell_price }}</p>
        </div>
        <div class="mid_width p-1 pt-2">
            <input type="text" class="form-control" name="dumb1[]" v-model="saleQt">
        </div>
        <div class="mid_width p-1 pt-2">
            <input type="text" class="form-control" name="dumb2[]" v-model="discount">
        </div>
        <div class="mid_width p-1 pt-2">
           <p>{{ disVal }}</p>
        </div>
        <div class="mid_width p-1 pt-2">
            <p>{{ totalVal }}</p>
        </div>
        <div class="mid_width p-1 pt-2">
            <input type="text" class="form-control" name="dumb3[]" v-model="freeOffer">
        </div>
        <div class="mid_width p-1 pt-2">
            <span>{{ article.min_sale_qty }}</span>
        </div>
        <div class="mid_width p-1 pt-2">
            <input class="form-check-input" type="checkbox" :id="'add-check-' + ind"
                   v-model="added" @change="onAddChange">
            <label class="form-check-label" :for="'add-check-' + ind">Add</label>
        </div>

        <modal-window @change-allowed=""
                      @hide-modal="hideModal"
                      :title="'Please recheck!'"
                      :message="'Sale Quantity is less than Min Qty!'"
                      :allow-btn-msg="''"
                      :cancel-btn-msg="'Cancel'"
                      v-if="showModal"></modal-window>
    </div>
</template>

<script>
export default {
    props: ['article', 'ind', 'itmList'],
    data() {
        return {
            saleQt: 0,
            discount: 0,
            freeOffer: 0,
            added: false,
            showModal: false,
        };
    },
    computed: {
        disVal() {
            let discount =  Math.round(this.article.sell_price * this.saleQt * this.discount)/100;
            this.$emit('update-discount', [discount, this.ind]);

            return discount;
        },
        totalVal() {
            let total = Math.round(this.article.sell_price * this.saleQt * (100 - this.discount) )/ 100;
            this.$emit('update-total', [total, this.ind]);

            return total;
        },
        hasError(){
            let isError = (this.saleQt > 0) && (this.saleQt < this.article.min_sale_qty);
            this.$emit('error-status-change', [isError, this.ind]);

            return isError;
        },
        classDangerObj() {
            return {
                'text-danger': this.hasError,
            };
        },
    },
    methods: {
        onAddChange() {
            // if (!(this.saleQt <= 0 || this.saleQt < this.article.min_sale_qty)) {
                this.$emit('add-changed',
                    [this.ind, this.added, this.article.id, this.saleQt, this.discount, this.freeOffer]);
            /*}
            else {
                this.showModal = true;
            }*/
        },
        hideModal() {
            this.showModal = false;
            this.added = false;
        }
    },
    mounted() {
        this.added = (this.itmList.findIndex((itm) => {
            return itm.id === this.article.id;
        }) >= 0);
    }
}
</script>
