<template>
    <b-row>
        <b-col cols="12">
            <MultistepForm></MultistepForm>
        </b-col>
    </b-row>
</template>

<script>
import {BRow, BCol} from 'bootstrap-vue'
import MultistepForm from "./MultistepForm";

export default {
    components: {
        BRow,
        BCol,
        MultistepForm
    },
}
</script>

<style lang="scss">
@import '~@core/scss/vue/libs/vue-wizard.scss';
@import '~@core/scss/vue/libs/vue-select.scss';
</style>
