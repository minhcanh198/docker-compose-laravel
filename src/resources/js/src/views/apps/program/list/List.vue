<template>
    <div>
        <!--        <program-list-filter></program-list-filter>-->
        <b-card title="All programs">
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

                    <!-- Column: Program ID -->
                    <span
                        v-if="props.column.field === 'program_id'"
                        class="text-nowrap"
                    >
                        <span class="text-nowrap">{{ formatProgramID(props.row.id) }}</span>
                    </span>

                    <!-- Column: Program Name -->
                    <span
                        v-if="props.column.field === 'provider_name'"
                        class="text-nowrap"
                    >
                        <span class="text-nowrap">{{ props.row.provider.name }}</span>
                    </span>

                    <!-- Column: Country -->
                    <span
                        v-if="props.column.field === 'country_name'"
                        class="text-nowrap"
                    >
                    <span class="text-nowrap">{{ props.row.country.name }}</span>
                    </span>

                    <!-- Column: Category -->
                    <span
                        v-if="props.column.field === 'category_name'"
                        class="text-nowrap"
                    >
                    <span class="text-nowrap">{{ props.row.category.name }}</span>
                    </span>
                    <!-- Column: Focus -->
                    <span
                        v-if="props.column.field === 'focus_name'"
                        class="text-nowrap"
                    >
                    <span class="text-nowrap">{{ props.row.focus.name }}</span>
                    </span>

                    <!-- Column: Status -->
                    <span v-else-if="props.column.field === 'status'">
                      <b-badge :variant="statusVariant(props.row.status)">
                        {{ props.row.status }}
                      </b-badge>
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
    BAvatar, BBadge, BPagination, BFormGroup, BFormInput, BFormSelect, BDropdownItem, BDropdown, BCard,
} from 'bootstrap-vue'
import ProgramListFilter from "./ProgramListFilter";
import {VueGoodTable} from 'vue-good-table'
import store from '@/store/index'
import programStoreModule from "../programStoreModule";
import {onUnmounted} from "@vue/composition-api";

export default {
    components: {
        ProgramListFilter,
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
    },
    data() {
        return {
            log: [],
            pageLength: 5,
            total: 0,
            dir: false,
            pages: ['3', '5', '10'],
            columns: [
                {
                    label: 'Program ID',
                    field: 'program_id',
                },
                {
                    label: 'Provider',
                    field: 'provider_name',
                },
                {
                    label: 'Country',
                    field: 'country_name',
                },
                {
                    label: 'Category',
                    field: 'category_name',
                },
                {
                    label: 'Focus',
                    field: 'focus_name',
                },
                {
                    label: 'Program Name',
                    field: 'title',
                },
                {
                    label: 'Status',
                    field: 'status',
                },
                {
                    label: 'Action',
                    field: 'action',
                },
            ],
            rows: [],
            searchTerm: '',
        }
    },
    computed: {
        statusVariant() {
            const statusColor = {
                /* eslint-disable key-spacing */
                PENDING: 'light-primary',
                LIVE: 'light-success',
                INACTIVE: 'light-danger',
                NEW: 'light-warning',
                UPDATED: 'light-info',
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
        this.fetchPrograms()
    },
    methods: {
        formatProgramID(id) {
            const idAsStringLength = id.toString().length
            if (idAsStringLength >= 4)
                return id
            if (idAsStringLength === 3) {
                return '0' + id
            }
            if (idAsStringLength === 2) {
                return '00' + id
            }
            return '000' + id
        },
        handleSearch(searching) {
            this.log.push(`The user searched for: ${searching}`)
        },
        handleChangePage(page) {
            this.currentPage = page
            this.fetchPrograms()
        },
        handlePageChange(active) {
            this.pageLength = active
            this.currentPage = 1
            this.fetchPrograms()
        },
        onSortChange(params) {
            this.log.push(`the user ordered:  ${params[0].type}`)
        },
        fetchPrograms() {
            this.$store.dispatch('app-program/fetchPrograms', {
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
        const PROGRAM_STORE_MODULE_NAME = 'app-program'

        // Register module
        if (!store.hasModule(PROGRAM_STORE_MODULE_NAME)) store.registerModule(PROGRAM_STORE_MODULE_NAME, programStoreModule)

        // UnRegister on leave
        onUnmounted(() => {
            if (store.hasModule(PROGRAM_STORE_MODULE_NAME)) store.unregisterModule(PROGRAM_STORE_MODULE_NAME)
        })
    }
}
</script>


<style lang="scss">
@import '~@core/scss/vue/libs/vue-good-table.scss';
</style>

