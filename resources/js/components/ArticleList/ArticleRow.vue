<template>
    <div class="sales_list1" v-bind:class="classDangerObj">
        <div class="sales_list2 p-1 pt-2">
            <p>{{ ind + 1 }}</p>
        </div>
        <div class="sales_list2 p-1 pt-2">
            <p>{{ article.name }}</p>
        </div>
        <div class="sales_list2 p-1 pt-2">
            <p>{{ article.volume}}{{ article.metric.name }}</p>
        </div>
        <div class="sales_list2 p-1 pt-2">
            <p>{{ article.sell_price }}</p>
        </div>
        <div class="sales_list2 p-1 pt-2">
            <input type="number"
                   class="form-control" name="saleQt[]" v-model="saleQt">
        </div>
        <div class="sales_list2 p-1 pt-2">
            <input type="number" steps="0.01" value="0.00"
                   class="form-control" name="discounts[]" v-model="discount">
        </div>
        <div class="sales_list2 p-1 pt-2">
            <p>{{ disVal }}</p>
        </div>
        <div class="sales_list2 p-1 pt-2">
            <p>{{ totalVal }}</p>
        </div>
        <div class="sales_list2 p-1 pt-2">
            <input type="number"
                   class="form-control" name="freeOffer[]" v-model="freeOffer">
        </div>
        <div class="sales_list2 p-1 pt-2">
            <p>{{ article.min_sale_qty }}</p>
        </div>
        <input type="hidden" name="artID[]" :value="article.id">
        <input type="hidden" name="unitPrice[]" :value="article.sell_price">
    </div>
</template>

<script>
    export default {
        props: ['article', 'ind', 'initQts'],

        data() {
            return {
                saleQt: this.initQts.saleQt,
                discount: this.initQts.discount,
                freeOffer: this.initQts.freeOffer,
            };
        },

        computed: {
            disVal() {
                let discount = Math.round(this.article.sell_price * this.saleQt * this.discount) / 100;
                this.$emit('update-discount', [discount, this.ind]);

                return discount;
            },
            totalVal() {
                let total = Math.round(this.article.sell_price * this.saleQt * (100 - this.discount)) / 100;
                this.$emit('update-total', [total, this.ind]);

                return total;
            },
            hasError() {
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
    };
</script>
