<template>
    <div>
        <shop-row v-for="(shop, index) in shops" :shop="shop" :key="shop.id" :index="index" @show-up-model="showUpdateModel"></shop-row>
        <shop-update-modal :shop="modaledShop" v-if="upModalShowing" @close-modal="upModalShowing = false"></shop-update-modal>
    </div>
</template>

<script>
    import ShopRow from './ShopRow';
    import ShopUpdateModal from './ShopUpdateModal';

    export default {
        components: {
            ShopRow,
            ShopUpdateModal
        },

        data() {
            return {
                shops: [],
                modaledShop: {},
                upModalShowing: false
            };
        },

        methods: {
            showUpdateModel(args) {
                this.modaledShop = this.shops[args];
                this.upModalShowing = true;
            },
        },

        created() {
            axios.get('/shops')
            .then(response =>{
                this.shops = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        }
    }

</script>
