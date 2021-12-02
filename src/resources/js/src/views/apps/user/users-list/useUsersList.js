import {ref, watch, computed} from '@vue/composition-api'
import store from '@/store'
import {title} from '@core/utils/filter'

// Notification
import {useToast} from 'vue-toastification/composition'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

export default function useUsersList() {
    // Use toast
    const toast = useToast()

    const refUserListTable = ref(null)

    // Table Handlers
    const tableColumns = [
        {key: 'id', sortable: true},
        {key: 'firstname', sortable: true},
        {key: 'lastname', sortable: true},
        {key: 'email', sortable: true},
        {key: 'role', sortable: true},
        {key: 'actions'},
    ]
    const perPage = ref(10)
    const totalUsers = ref(0)
    const currentPage = ref(1)
    const perPageOptions = [10, 25, 50, 100]
    const searchQuery = ref('')
    const sortBy = ref('id')
    const isSortDirDesc = ref(true)
    const roleFilter = ref(null)
    const statusFilter = ref(null)

    const dataMeta = computed(() => {
        const localItemsCount = refUserListTable.value ? refUserListTable.value.localItems.length : 0
        return {
            from: perPage.value * (currentPage.value - 1) + (localItemsCount ? 1 : 0),
            to: perPage.value * (currentPage.value - 1) + localItemsCount,
            of: totalUsers.value,
        }
    })

    const refetchData = () => {
        refUserListTable.value.refresh()
    }

    watch([currentPage, perPage, searchQuery, roleFilter, statusFilter], () => {
        refetchData()
    })

    const fetchUsers = (ctx, callback) => {
        store
            .dispatch('app-user/fetchUsers', {
                q: searchQuery.value,
                perPage: perPage.value,
                page: currentPage.value,
                // sortBy: sortBy.value,
                // sortDesc: isSortDirDesc.value,
                // role: roleFilter.value,
                // status: statusFilter.value,
            })
            .then(response => {
                const {data} = response.data
                callback(data)
                totalUsers.value = response.data.total
            })
            .catch(() => {
                toast({
                    component: ToastificationContent,
                    props: {
                        title: 'Error fetching users list',
                        icon: 'AlertTriangleIcon',
                        variant: 'danger',
                    },
                })
            })
    }

    // *===============================================---*
    // *--------- UI ---------------------------------------*
    // *===============================================---*

    const resolveUserRoleVariant = role => {
        if (role === 'superadmin') return 'primary'
        if (role === 'provider') return 'warning'
        if (role === 'manager') return 'success'
        return 'primary'
    }

    const resolveUserRoleIcon = role => {
        if (role === 'superadmin') return 'UserIcon'
        if (role === 'provider') return 'SettingsIcon'
        if (role === 'manager') return 'DatabaseIcon'
        return 'UserIcon'
    }

    const resolveUserStatusVariant = status => {
        if (status === 'pending') return 'warning'
        if (status === 'active') return 'success'
        if (status === 'inactive') return 'secondary'
        return 'primary'
    }

    return {
        fetchUsers,
        tableColumns,
        perPage,
        currentPage,
        totalUsers,
        dataMeta,
        perPageOptions,
        searchQuery,
        sortBy,
        isSortDirDesc,
        refUserListTable,

        resolveUserRoleVariant,
        resolveUserRoleIcon,
        resolveUserStatusVariant,
        refetchData,

        // Extra Filters
        roleFilter,
        statusFilter,
    }
}
