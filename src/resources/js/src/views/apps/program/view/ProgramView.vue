<template>
    <div v-if="program">
        <b-row>
            <b-col md="12" xl="6">
                <b-card title="Main Information">
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
                                {{ program.id }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="FlagIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Country</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.country.name }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="ZapIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Category</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.category.name }}
                            </td>
                        </tr>

                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="ZapIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Focus</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.focus.name }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="StarIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Program Name</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.title }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="CheckIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Status</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.status }}
                            </td>
                        </tr>
                    </table>
                </b-card>
            </b-col>
            <b-col md="12" xl="6">
                <b-card title="Extra Information">
                    <table class="mt-2 mt-xl-0 w-100">
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="MapPinIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Accommodation</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.accommodation }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="StarIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Age</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.age }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="CalendarIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Created At</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.created_at }}
                            </td>
                        </tr>

                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="AlignLeftIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Description</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.description }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="StarIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Duration</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.duration }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="StarIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Expectation</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.expectation }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="StarIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Good To Know</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.good_to_know }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="CommandIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Included Services</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.included_services }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="MapIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Location</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.location }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50">
                                <feather-icon
                                    icon="CommandIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Optional Services</span>
                            </th>
                            <td class="pb-50 text-capitalize">
                                {{ program.optional_services }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50 pt-50">
                                <feather-icon
                                    icon="ActivityIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Orientaion</span>
                            </th>
                            <td class="pb-50">
                                {{ program.orientation }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50 pt-50">
                                <feather-icon
                                    icon="DollarSignIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Price</span>
                            </th>
                            <td class="pb-50">
                                {{ program.price }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50 pt-50">
                                <feather-icon
                                    icon="AlignLeftIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Price Info</span>
                            </th>
                            <td class="pb-50">
                                {{ program.price_info }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50 pt-50">
                                <feather-icon
                                    icon="StarIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Tags</span>
                            </th>
                            <td class="pb-50">
                                {{ program.tags }}
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-50 pt-50">
                                <feather-icon
                                    icon="CalendarIcon"
                                    class="mr-75"
                                />
                                <span class="font-weight-bold">Typical Day</span>
                            </th>
                            <td class="pb-50">
                                {{ program.typical_day }}
                            </td>
                        </tr>
                    </table>
                </b-card>
            </b-col>
        </b-row>
        <b-row class="justify-content-center">
            <b-col cols="2">
                <b-button
                    variant="danger"
                    block
                    type="button"
                >
                    Delete
                </b-button>
            </b-col>
            <b-col cols="2">
                <b-button
                    variant="primary"
                    block
                    type="button"
                >
                    Edit
                </b-button>
            </b-col>
        </b-row>
    </div>
</template>

<script>
import store from '@/store'
import router from '@/router'
import {ref, onUnmounted} from '@vue/composition-api'
import {
    BRow, BCol, BAlert, BLink, BCard, BButton
} from 'bootstrap-vue'
import programSoreModule from "../programStoreModule";

export default {
    name: "ProgramView",

    data() {
        return {
            program: null
        }
    },

    components: {
        BRow,
        BCol,
        BLink,
        BCard,
        BButton
    },

    created() {
        this.fetchProvider()
    },

    methods: {
        fetchProvider() {
            this.$store.dispatch('app-program/fetchProgram', {id: router.currentRoute.params.id})
                .then(res => {
                    this.program = res.data
                })
                .catch(err => {
                    console.log(err)
                })
        }
    },

    setup() {
        const PROGRAM_STORE_MODULE_NAME = 'app-program'

        // Register module
        if (!store.hasModule(PROGRAM_STORE_MODULE_NAME)) store.registerModule(PROGRAM_STORE_MODULE_NAME, programSoreModule)

        // UnRegister on leave
        onUnmounted(() => {
            if (store.hasModule(PROGRAM_STORE_MODULE_NAME)) store.unregisterModule(PROGRAM_STORE_MODULE_NAME)
        })
    }

}
</script>

<style scoped>

</style>
