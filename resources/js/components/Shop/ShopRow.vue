<template>
    <div class="sales_list1">
        <div class="sales_list2 p-1 pt-2"><p>{{ shop.name }}</p></div>
        <div class="sales_list2 p-1 pt-2"><p>{{ shop.owner_name }}</p></div>
        <div class="sales_list2 p-1 pt-2"><p>{{ shop.nic }}</p></div>
        <div class="sales_list2 p-1 pt-2"><p>{{ shop.email }}</p></div>
        <div class="sales_list2 p-1 pt-2"><p>{{ shop.address }}</p></div>
        <div class="sales_list2 p-1 pt-2"><p>{{ shop.city }}</p></div>
        <div class="sales_list2 p-1 pt-2"><p>{{ shop.tel_mobile }}</p></div>
        <div class="sales_list2 p-1 pt-2"><p>{{ shop.tel_business }}</p></div>
        <div class="sales_list2 p-1 pt-2"><p>{{ shop.business_id_num }}</p></div>
        <div class="sales_list2 p-1 pt-2">
            <button class="btn btn-outline-dark" type="button" @click=showUpdateModal>Update</button>
        </div>
        <div class="sales_list2 p-1 pt-2">
            <button class="btn btn-outline-danger" type="button" @click="showDeleteModal">Delete</button>
        </div>
        <div v-if="!shop.isActive" class="sales_list2 p-1 pt-2" >
            <form :action="'/shops/' + shop.id + '/submit'" method="post">
                <input id="tokenInp" type="hidden" name="_token" :value="csrf_token">
                <button class="btn btn-outline-primary" type="submit">Send</button>
            </form>
        </div>
        <div v-else-if="shop.approved" class="sales_list2 p-1 pt-2">
            <button class="btn btn-success" type="button" disabled>Active</button>
        </div>
        <div v-else class="sales_list2 p-1 pt-2">
            <button class="btn btn-info" type="button" disabled>Pending</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['shop', 'index'],

        data() {
            return {
                csrf_token: '',
            };
        },

        methods: {
            showUpdateModal() {
                this.$emit('show-up-modal', this.index);
            },

            showDeleteModal() {
                this.$emit('show-del-modal', this.index);
            }
        },
        mounted() {
            const csMeta = document.querySelector('meta[name=\'csrf-token\']');
            this.csrf_token = csMeta.getAttribute('content');
        }
    }
</script>
