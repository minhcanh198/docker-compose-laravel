<template>
    <div>

        <!-- Media -->
        <b-media class="mb-2">
            <template #aside>
                <b-avatar
                    ref="previewEl"
                    :src="userData.avatar"
                    :text="avatarText(userData.firstname)"
                    :variant="`light-${resolveUserRoleVariant(userData.roles[0].name)}`"
                    size="90px"
                    rounded
                />
            </template>
            <h4 class="mb-1">
                {{ userData.fullName }}
            </h4>
            <div class="d-flex flex-wrap">
                <b-button
                    variant="primary"
                    @click="$refs.refInputEl.click()"
                >
                    <input
                        ref="refInputEl"
                        type="file"
                        class="d-none"
                        @input="inputImageRenderer"
                    >
                    <span class="d-none d-sm-inline">Update</span>
                    <feather-icon
                        icon="EditIcon"
                        class="d-inline d-sm-none"
                    />
                </b-button>
                <b-button
                    variant="outline-secondary"
                    class="ml-1"
                >
                    <span class="d-none d-sm-inline">Remove</span>
                    <feather-icon
                        icon="TrashIcon"
                        class="d-inline d-sm-none"
                    />
                </b-button>
            </div>
        </b-media>

        <!-- User Info: Input Fields -->
        <b-form>
            <b-row>

                <!-- Field: Email -->
                <b-col
                    cols="12"
                    md="4"
                >
                    <b-form-group
                        label="Email"
                        label-for="email"
                    >
                        <b-form-input
                            id="email"
                            v-model="userData.email"
                        />
                    </b-form-group>
                </b-col>

                <!-- Field: First Name -->
                <b-col
                    cols="12"
                    md="4"
                >
                    <b-form-group
                        label="Firstname"
                        label-for="first-name"
                    >
                        <b-form-input
                            id="first-name"
                            v-model="userData.firstname"
                        />
                    </b-form-group>
                </b-col>

                <!-- Field: Lastname -->
                <b-col
                    cols="12"
                    md="4"
                >
                    <b-form-group
                        label="Lastname"
                        label-for="lastname"
                    >
                        <b-form-input
                            id="lastname"
                            v-model="userData.lastname"
                        />
                    </b-form-group>
                </b-col>

                <!--                &lt;!&ndash; Field: Password &ndash;&gt;-->
                <!--                <b-col-->
                <!--                    cols="12"-->
                <!--                    md="4"-->
                <!--                >-->
                <!--                    <b-form-group-->
                <!--                        label="New password"-->
                <!--                        label-for="password"-->
                <!--                    >-->
                <!--                        <b-form-input-->
                <!--                            id="password"-->
                <!--                            v-model="userData.password"-->
                <!--                            type="password"-->
                <!--                        />-->
                <!--                    </b-form-group>-->
                <!--                </b-col>-->

                <!-- Field: Role -->
                <b-col
                    cols="12"
                    md="6"
                >
                    <b-form-group
                        label="User Role"
                        label-for="user-role"
                    >
                        <v-select
                            v-model="userData.roles[0].name"
                            :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                            :options="roleOptions"
                            :reduce="val => val.value"
                            :clearable="false"
                        />
                    </b-form-group>
                </b-col>

                <!-- Field: Phone -->
                <b-col
                    cols="12"
                    md="6"
                >
                    <b-form-group
                        label="Phone"
                        label-for="phone"
                    >
                        <b-form-input
                            id="phone"
                            v-model="userData.phone_number"
                        />
                    </b-form-group>
                </b-col>

            </b-row>
        </b-form>

        <!-- PERMISSION TABLE -->
        <b-card
            no-body
            class="border mt-1"
        >
            <b-card-header class="p-1">
                <b-card-title class="font-medium-2">
                    <feather-icon
                        icon="LockIcon"
                        size="18"
                    />
                    <span class="align-middle ml-50">Permission</span>
                </b-card-title>
            </b-card-header>
            <b-table
                striped
                responsive
                class="mb-0"
                :items="permissionsData"
            >
                <template #cell(module)="data">
                    {{ data.value }}
                </template>
                <template #cell()="data">
                    <b-form-checkbox :checked="data.value"/>
                </template>
            </b-table>
        </b-card>

        <!-- Action Buttons -->
        <b-button
            variant="primary"
            class="mb-1 mb-sm-0 mr-0 mr-sm-1"
            :block="$store.getters['app/currentBreakPoint'] === 'xs'"
            @click="updateUser"
        >
            Save Changes
        </b-button>
        <b-button
            variant="outline-secondary"
            type="reset"
            :block="$store.getters['app/currentBreakPoint'] === 'xs'"
        >
            Reset
        </b-button>
    </div>
</template>

<script>
import {
    BButton,
    BMedia,
    BAvatar,
    BRow,
    BCol,
    BFormGroup,
    BFormInput,
    BForm,
    BTable,
    BCard,
    BCardHeader,
    BCardTitle,
    BFormCheckbox,
} from 'bootstrap-vue'
import {avatarText} from '@core/utils/filter'
import vSelect from 'vue-select'
import {useInputImageRenderer} from '@core/comp-functions/forms/form-utils'
import {onUnmounted, ref} from '@vue/composition-api'
import useUsersList from '../users-list/useUsersList'
import ToastificationContent from "../../../../@core/components/toastification/ToastificationContent";
import store from '@/store'
import userStoreModule from "../userStoreModule";

export default {
    components: {
        BButton,
        BMedia,
        BAvatar,
        BRow,
        BCol,
        BFormGroup,
        BFormInput,
        BForm,
        BTable,
        BCard,
        BCardHeader,
        BCardTitle,
        BFormCheckbox,
        vSelect,
    },
    props: {
        userData: {
            type: Object,
            required: true,
        },
    },

    methods: {
        updateUser() {
            store.dispatch('app-user/updateUser', this.userData)
                .then(response => {
                    this.$toast({
                        component: ToastificationContent,
                        position: 'top-right',
                        props: {
                            title: `Update user successfully`,
                            icon: 'CoffeeIcon',
                            variant: 'success',
                            text: '',
                        },
                    })
                })
                .catch(error => {
                    this.$toast({
                        component: ToastificationContent,
                        position: 'top-right',
                        props: {
                            title: `Somthing went wrong`,
                            icon: 'CoffeeIcon',
                            variant: 'danger',
                            text: '',
                        },
                    })
                })
        }
    },

    setup(props) {
        const {resolveUserRoleVariant} = useUsersList()

        const roleOptions = [
            {label: 'Super admin', value: 'superadmin'},
            {label: 'Provider', value: 'provider'},
            {label: 'Manager', value: 'manager'},

        ]

        const permissionsData = [
            {
                module: 'Users',
                read: true,
                write: false,
                create: false,
                delete: false,
            },
            {
                module: 'Leads',
                read: false,
                write: true,
                create: false,
                delete: false,
            },
            {
                module: 'Agencies',
                read: true,
                write: false,
                create: true,
                delete: false,
            },
            {
                module: 'Programs',
                read: false,
                write: false,
                create: false,
                delete: false,
            },
        ]

        // ? Demo Purpose => Update image on click of update
        const refInputEl = ref(null)
        const previewEl = ref(null)

        const {inputImageRenderer} = useInputImageRenderer(refInputEl, base64 => {
            // eslint-disable-next-line no-param-reassign
            props.userData.avatar = base64
        })

        return {
            resolveUserRoleVariant,
            avatarText,
            roleOptions,
            permissionsData,

            //  ? Demo - Update Image on click of update button
            refInputEl,
            previewEl,
            inputImageRenderer,
        }
        const USER_APP_STORE_MODULE_NAME = 'app-user'

        // Register module
        if (!store.hasModule(USER_APP_STORE_MODULE_NAME)) store.registerModule(USER_APP_STORE_MODULE_NAME, userStoreModule)

        // UnRegister on leave
        onUnmounted(() => {
            if (store.hasModule(USER_APP_STORE_MODULE_NAME)) store.unregisterModule(USER_APP_STORE_MODULE_NAME)
        })
    },
}
</script>

<style lang="scss">
@import '~@core/scss/vue/libs/vue-select.scss';
</style>
