<template>
    <div class="modal-open modal fade show" style="display: block; opacity: 1;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Update Shop</h4>
                    <button type="button" class="close" @click="$emit('delete-modal')">
                        <span>&times;</span>
                    </button>
                </div>
                <form :action="'/shops/' + shop.id" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input id="tokenInp" type="hidden" name="_token" :value="csrf_token">
                        <input id="methodInp" type="hidden" name="_method" value="DELETE">
                        <div class="form-group">
                            <p>Are you sure want to delete {{ shop.name }} ?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Delete</button>
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
