<template>
    <div :class="['alert', 'alert-' + type, 'alert-dismissible']" role="alert" v-if="visible">
        <button type="button" class="close" @click="closeAlert">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ message }}
    </div>
</template>

<script>
    export default {
        props: ['type', 'message'],
        data: function () {
            return {
                visible: true
            }
        },
        methods: {
            closeAlert: function () {
                this.visible = false;
            }
        }
    }
</script>