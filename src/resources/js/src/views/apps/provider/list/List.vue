<template>
    <div>
        <!--        <provider-list-filter></provider-list-filter>-->
        <b-card title="All providers">
            <!-- search input -->
            <div class="custom-search d-flex justify-content-end">
                <b-form-group>
                    <div class="d-flex align-items-center">
                        <label class="mr-1">Search</label>
                        <b-form-input
                            v-model="searchTerm"
                            placeholder="Search"
                            type="text"
                            class="d-inline-block"
                            @input="handleSearch"
                        />
                    </div>
                </b-form-group>
            </div>

            <!-- table -->
            <vue-good-table
                mode="remote"
                :columns="columns"
                :rows="rows"
                :rtl="direction"
                :search-options="{
        enabled: true,
        externalQuery: searchTerm
      }"
                :select-options="{
        enabled: true,
        selectOnCheckboxOnly: true,
        selectionInfoClass: 'custom-class',
        selectionText: 'rows selected',
        clearSelectionText: 'clear',
        disableSelectInfo: true,
        selectAllByGroup: true,
      }"
                :pagination-options="{
        enabled: true,
      }"
                @on-sort-change="onSortChange"
            >
                <template
                    slot="table-row"
                    slot-scope="props"
                >
                     <span
                         v-if="props.column.field === 'provider_id'"
                         class="text-nowrap"
                     >
                          <span class="text-nowrap">{{ formatProviderID(props.row.id) }}
                          </span>
                    </span>

                    <!-- Column: Action -->
                    <span v-else-if="props.column.field === 'action'">
                          <span>
                            <b-dropdown
                                variant="link"
                                toggle-class="text-decoration-none"
                                no-caret
                            >
                              <template v-slot:button-content>
                                <feather-icon
                                    icon="MoreVerticalIcon"
                                    size="16"
                                    class="text-body align-middle mr-25"
                                />
                              </template>
                              <b-dropdown-item>
                                <feather-icon
                                    icon="FileTextIcon"
                                    class="mr-50"
                                />
                                <b-link
                                    :to="{ name: 'provider-view', params: { id: props.row.id } }"
                                >
                                   <span>View</span>
                                </b-link>
                              </b-dropdown-item>
                              <b-dropdown-item>
                                <feather-icon
                                    icon="Edit2Icon"
                                    class="mr-50"
                                />
                                <span>Edit</span>
                              </b-dropdown-item>
                              <b-dropdown-item>
                                <feather-icon
                                    icon="TrashIcon"
                                    class="mr-50"
                                />
                                <span>Delete</span>
                              </b-dropdown-item>
                            </b-dropdown>
                          </span>
                    </span>

                    <!-- Column: Common -->
                    <span v-else>
                         {{ props.formattedRow[props.column.field] }}
                    </span>
                </template>

                <!-- pagination -->
                <template
                    slot="pagination-bottom"
                    slot-scope="props"
                >
                    <div class="d-flex justify-content-between flex-wrap">

                        <!-- page length -->
                        <div class="d-flex align-items-center mb-0 mt-1">
                            <span class="text-nowrap ">
                              Showing
                            </span>
                            <b-form-select
                                v-model="pageLength"
                                :options="pages"
                                class="mx-1"
                                @input="handlePageChange"
                            />
                            <span class="text-nowrap"> of {{ total }} entries </span>
                        </div>

                        <!-- pagination -->
                        <div>
                            <b-pagination
                                :value="1"
                                :total-rows="total"
                                :per-page="pageLength"
                                first-number
                                last-number
                                align="right"
                                prev-class="prev-item"
                                next-class="next-item"
                                class="mt-1 mb-0"
                                @change="handleChangePage"
                            >
                                <template #prev-text>
                                    <feather-icon
                                        icon="ChevronLeftIcon"
                                        size="18"
                                    />
                                </template>
                                <template #next-text>
                                    <feather-icon
                                        icon="ChevronRightIcon"
                                        size="18"
                                    />
                                </template>
                            </b-pagination>
                        </div>
                    </div>
                </template>
            </vue-good-table>
        </b-card>
    </div>
</template>

<script>
import {
    BAvatar, BBadge, BPagination, BFormGroup, BFormInput, BFormSelect, BDropdownItem, BDropdown, BCard, BLink,
} from 'bootstrap-vue'
import {VueGoodTable} from 'vue-good-table'
import ProviderListFilter from "./ProviderListFilter";
import store from '@/store/index'
import providerStoreModule from "../providerStoreModule";
import {onUnmounted} from "@vue/composition-api";

export default {
    components: {
        ProviderListFilter,
        VueGoodTable,
        BAvatar,
        BBadge,
        BPagination,
        BFormGroup,
        BFormInput,
        BFormSelect,
        BDropdownItem,
        BDropdown,
        BCard,
        BLink,
    },
    data() {
        return {
            log: [],
            pageLength: 5,
            currentPage: 1,
            total: 0,
            searchTerm: '',
            dir: false,
            pages: ['3', '5', '10'],
            columns: [
                {
                    label: 'Provider ID',
                    field: 'provider_id',
                },
                {
                    label: 'Provider',
                    field: 'name',
                },
                {
                    label: 'Website',
                    field: 'website',
                },
                {
                    label: 'Live Programs',
                    field: 'status',
                },
                {
                    label: 'Action',
                    field: 'action',
                },
            ],
            rows: [],
            status: [{
                1: 'Current', 2: 'Professional', 3: 'Rejected', 4: 'Resigned', 5: 'Applied',
            },
                {
                    1: 'light-primary', 2: 'light-success', 3: 'light-danger', 4: 'light-warning', 5: 'light-info',
                }],
        }
    },

    computed: {
        statusVariant() {
            const statusColor = {
                /* eslint-disable key-spacing */
                Current: 'light-primary',
                Professional: 'light-success',
                Rejected: 'light-danger',
                Resigned: 'light-warning',
                Applied: 'light-info',
                /* eslint-enable key-spacing */
            }

            return status => statusColor[status]
        },
        direction() {
            if (store.state.appConfig.isRTL) {
                // eslint-disable-next-line vue/no-side-effects-in-computed-properties
                this.dir = true
                return this.dir
            }
            // eslint-disable-next-line vue/no-side-effects-in-computed-properties
            this.dir = false
            return this.dir
        },
    },
    created() {
        this.fetchProviders()
    },
    methods: {
        formatProviderID(id) {
            const idAsStringLength = id.toString().length
            if (idAsStringLength >= 3)
                return id
            if (idAsStringLength === 2) {
                return '0' + id
            }
            return '00' + id
        },

        handleSearch(searching) {
            this.log.push(`The user searched for: ${searching}`)
        },
        handleChangePage(page) {
            this.currentPage = page
            this.fetchProviders()
        },
        handlePageChange(active) {
            this.pageLength = active
            this.currentPage = 1
            this.fetchProviders()
        },
        onSortChange(params) {
            this.log.push(`the user ordered:  ${params[0].type}`)
        },
        fetchProviders() {
            this.$store.dispatch('app-provider/fetchProviders', {
                'per_page': this.pageLength,
                'search': this.searchTerm,
                'page': this.currentPage
            })
                .then(res => {
                    this.rows = res.data.data
                    this.total = res.data.total
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


<style lang="scss">
@import '~@core/scss/vue/libs/vue-good-table.scss';
</style>

