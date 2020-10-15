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
            <input type="text" class="form-control" name="saleQt[]" v-model="saleQt">
        </div>
        <div class="sales_list2 p-1 pt-2">
            <input type="text" class="form-control" name="discounts[]" v-model="discount">
        </div>
        <div class="sales_list2 p-1 pt-2">
           <p>{{ disVal }}</p>
        </div>
        <div class="sales_list2 p-1 pt-2">
            <p>{{ totalVal }}</p>
        </div>
        <div class="sales_list2 p-1 pt-2">
            <input type="text" class="form-control" name="freeOffer[]" v-model="freeOffer">
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
    props: ['article', 'ind'],

    data() {
        return {
            saleQt: 0,
            discount: 0,
            freeOffer: 0,
            hasError: true,
        };
    },

    computed: {
        disVal() {
            let discount =  this.article.sell_price * this.saleQt * this.discount / 100;
            this.$emit('update-discount', [discount, this.ind]);

            return discount;
        },

        totalVal() {
            let total = this.article.sell_price * this.saleQt * (100 - this.discount) / 100;
            this.$emit('update-total', [total, this.ind]);

            return total;
        },

        classDangerObj() {
            return {
                'text-danger': (this.saleQt > 0) && (this.saleQt < this.article.min_sale_qty)
            };
        }
    }
}
</script>
