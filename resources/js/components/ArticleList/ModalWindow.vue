<template>
    <div class="modal-open modal fade show" style="display: block; opacity: 1;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">{{ title }}</h4>
                    <button type="button" class="close" @click="$emit('hide-modal')">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p v-html="message"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" @click="$emit('change-allowed')"
                                v-show="allowBtnMsg">{{ allowBtnMsg }}</button>
                        <button type="button" class="btn btn-danger" v-show="cancelBtnMsg"
                                @click="$emit('hide-modal')">{{ cancelBtnMsg }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['title', 'message', 'allowBtnMsg', 'cancelBtnMsg'],

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
