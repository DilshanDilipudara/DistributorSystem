<template>
    <div>
        <shop-row v-for="(shop, index) in shops" :shop="shop" :key="shop.id" :index="index"
                  @show-up-modal="showUpdateModal" @show-del-modal="showDeleteModal"></shop-row>
        <shop-update-modal :shop="modaledShop" v-if="upModalShowing"
                           @close-modal="upModalShowing = false"></shop-update-modal>
        <shop-delete-modal :shop="modaledShop" v-if="delModalShowing"
                           @close-modal="delModalShowing = false"></shop-delete-modal>
    </div>
</template>

<script>
    import ShopRow from './ShopRow';
    import ShopUpdateModal from './ShopUpdateModal';
    import ShopDeleteModal from './ShopDeleteModal';

    export default {
        components: {
            ShopRow,
            ShopUpdateModal,
            ShopDeleteModal,
        },

        data() {
            return {
                shops: [],
                modaledShop: {},
                upModalShowing: false,
                delModalShowing: false,
            };
        },

        methods: {
            showUpdateModal(args) {
                this.modaledShop = this.shops[args];
                this.upModalShowing = true;
            },
            showDeleteModal(args) {
                this.modaledShop = this.shops[args];
                this.delModalShowing = true;
            },
        },

        created() {
            axios.get('/shops').then(response => {
                this.shops = response.data;
            }).catch(error => {
                console.log(error);
            });
        },
    };

</script>
