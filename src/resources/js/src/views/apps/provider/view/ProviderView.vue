<template>
    <b-card>
        <b-row v-if="providerData">
            <b-col cols="12">
                <table class="mt-2 mt-xl-0 w-100">
                    <tr>
                        <th class="pb-50">
                            <feather-icon
                                icon="StarIcon"
                                class="mr-75"
                            />
                            <span class="font-weight-bold">ID</span>
                        </th>
                        <td class="pb-50 text-capitalize">
                            {{ providerData.id }}
                        </td>
                    </tr>
                    <tr>
                        <th class="pb-50">
                            <feather-icon
                                icon="StarIcon"
                                class="mr-75"
                            />
                            <span class="font-weight-bold">Name</span>
                        </th>
                        <td class="pb-50 text-capitalize">
                            {{ providerData.name }}
                        </td>
                    </tr>
                    <tr>
                        <th class="pb-50">
                            <feather-icon
                                icon="StarIcon"
                                class="mr-75"
                            />
                            <span class="font-weight-bold">Brand Name</span>
                        </th>
                        <td class="pb-50 text-capitalize">
                            {{ providerData.brand_name }}
                        </td>
                    </tr>

                    <tr>
                        <th class="pb-50">
                            <feather-icon
                                icon="LayoutIcon"
                                class="mr-75"
                            />
                            <span class="font-weight-bold">Website</span>
                        </th>
                        <td class="pb-50 text-capitalize">
                            {{ providerData.website }}
                        </td>
                    </tr>
                    <tr>
                        <th class="pb-50">
                            <feather-icon
                                icon="MailIcon"
                                class="mr-75"
                            />
                            <span class="font-weight-bold">Email</span>
                        </th>
                        <td class="pb-50 text-capitalize">
                            {{ providerData.email }}
                        </td>
                    </tr>
                    <tr>
                        <th class="pb-50">
                            <feather-icon
                                icon="MapPinIcon"
                                class="mr-75"
                            />
                            <span class="font-weight-bold">Street</span>
                        </th>
                        <td class="pb-50 text-capitalize">
                            {{ providerData.street }}
                        </td>
                    </tr>
                    <tr>
                        <th class="pb-50">
                            <feather-icon
                                icon="StarIcon"
                                class="mr-75"
                            />
                            <span class="font-weight-bold">Zip Code</span>
                        </th>
                        <td class="pb-50 text-capitalize">
                            {{ providerData.zip_code }}
                        </td>
                    </tr>
                    <tr>
                        <th class="pb-50">
                            <feather-icon
                                icon="MapIcon"
                                class="mr-75"
                            />
                            <span class="font-weight-bold">City</span>
                        </th>
                        <td class="pb-50 text-capitalize">
                            {{ providerData.city }}
                        </td>
                    </tr>
                    <tr>
                        <th class="pb-50">
                            <feather-icon
                                icon="MapIcon"
                                class="mr-75"
                            />
                            <span class="font-weight-bold">Country</span>
                        </th>
                        <td class="pb-50 text-capitalize">
                            {{ providerData.country.name }}
                        </td>
                    </tr>
                    <tr>
                        <th class="pb-50">
                            <feather-icon
                                icon="StarIcon"
                                class="mr-75"
                            />
                            <span class="font-weight-bold">VAT Number</span>
                        </th>
                        <td class="pb-50 text-capitalize">
                            {{ providerData.vat_number }}
                        </td>
                    </tr>
                    <tr>
                        <th class="pb-50 pt-50">
                            <feather-icon
                                icon="CalendarIcon"
                                class="mr-75"
                            />
                            <span class="font-weight-bold">Created At</span>
                        </th>
                        <td class="pb-50">
                            {{ providerData.created_at }}
                        </td>
                    </tr>
                </table>
            </b-col>

        </b-row>
    </b-card>
</template>

<script>
import store from '@/store'
import router from '@/router'
import {ref, onUnmounted} from '@vue/composition-api'
import {
    BRow, BCol, BAlert, BLink, BCard
} from 'bootstrap-vue'
import providerStoreModule from "../providerStoreModule";

export default {
    name: "ProviderView",

    data() {
        return {
            providerData: null
        }
    },

    components: {
        BRow,
        BCol,
        BLink,
        BCard,
    },

    created() {
        this.fetchProvider()
    },

    methods: {
        fetchProvider() {
            this.$store.dispatch('app-provider/fetchProvider', {id: router.currentRoute.params.id})
                .then(res => {
                    this.providerData = res.data
                })
                .catch(err => {
                    console.log(err)
                })
        }
    },

    setup() {
        const PROVIDER_STORE_MODULE_NAME = 'app-provider'

        // Register module
        if (!store.hasModule(PROVIDER_STORE_MODULE_NAME)) store.registerModule(PROVIDER_STORE_MODULE_NAME, providerStoreModule)

        // UnRegister on leave
        onUnmounted(() => {
            if (store.hasModule(PROVIDER_STORE_MODULE_NAME)) store.unregisterModule(PROVIDER_STORE_MODULE_NAME)
        })
    }

}
</script>

<style scoped>

</style>
