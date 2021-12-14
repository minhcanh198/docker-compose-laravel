<template>
    <b-card no-body>
        <b-card-header class="pb-50">
            <h5>
                Filters
            </h5>
        </b-card-header>
        <b-card-body>
            <b-row>
                <b-col cols="12"
                       md="3"
                       class="mb-md-0 mb-2"
                >
                    <label>Date</label>
                    <flat-pickr
                        v-model="dateFilter"
                        class="form-control"
                    />
                </b-col>
                <b-col
                    cols="12"
                    md="3"
                    class="mb-md-0 mb-2"
                >
                    <label>Provider</label>
                    <v-select
                        :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                        :value="providerFilter"
                        :options="providerOptions"
                        class="w-100"
                        :reduce="val => val.value"
                        @input="(val) => $emit('update:providerFilter', val)"
                    />
                </b-col>
                <b-col
                    cols="12"
                    md="3"
                    class="mb-md-0 mb-2"
                >
                    <label>Country</label>
                    <v-select
                        :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                        :value="countryFilter"
                        :options="countryOptions"
                        class="w-100"
                        :reduce="val => val.value"
                        @input="(val) => $emit('update:countryFilter', val)"
                    />
                </b-col>
                <b-col
                    cols="12"
                    md="3"
                    class="mb-md-0 mb-2"
                >
                    <label>Category</label>
                    <v-select
                        :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                        :value="categoryFilter"
                        :options="categoryOptions"
                        class="w-100"
                        :reduce="val => val.value"
                        @input="(val) => $emit('update:categoryFilter', val)"
                    />
                </b-col>
            </b-row>
        </b-card-body>
    </b-card>
</template>

<script>
import {BCard, BCardHeader, BCardBody, BRow, BCol} from 'bootstrap-vue'
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'

export default {
    components: {
        BRow,
        BCol,
        BCard,
        BCardHeader,
        BCardBody,
        vSelect,
        flatPickr,
    },
    props: {
        providerFilter: {
            type: [String, null],
            default: null,
        },
        countryFilter: {
            type: [Number, null],
            default: null,
        },
        categoryFilter: {
            type: [Number, null],
            default: null,
        },
        providerOptions: {
            type: Array,
            required: true,
        },
        countryOptions: {
            type: Array,
            required: true,
        },
        categoryOptions: {
            type: Array,
            required: true,
        },
    },
    watch: {
        dateFilter() {
            this.$emit('date-changed', this.dateFilter)
        }
    },
    data() {
        return {
            dateFilter: ""
        }
    },
    methods: {}
}
</script>

<style lang="scss">
@import '~@core/scss/vue/libs/vue-select.scss';
@import '~@core/scss/vue/libs/vue-flatpicker.scss';
</style>
