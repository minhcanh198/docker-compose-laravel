<template>
    <div>
        <form-wizard
            color="#7367F0"
            :title="null"
            :subtitle="null"
            finish-button-text="Submit"
            back-button-text="Previous"
            class="steps-transparent mb-3"
            @on-complete="submitForm"
        >
            <!-- Setting detail tab -->
            <tab-content
                title="Settings"
            >
                <b-row>
                    <b-col
                        cols="12"
                        class="mb-2"
                    >
                        <h5 class="mb-0">
                            Settings
                        </h5>
                        <small class="text-muted">
                            Enter Your Settings.
                        </small>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Title"
                            label-for="i-title"
                        >
                            <b-form-input
                                id="i-title"
                                placeholder="Volunteer"
                                v-model="form.title"
                            />
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Country"
                            label-for="i-country"
                        >
                            <v-select
                                id="i-country"
                                v-model="selectedCountry"
                                :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                                :options="countries"
                                :selectable="option => ! option.value.includes('select_value')"
                                label="text"
                            />
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Category"
                            label-for="i-category"
                        >
                            <v-select
                                id="i-category"
                                v-model="selectedCategory"
                                :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                                :options="categories"
                                :selectable="option => ! option.value.includes('select_value')"
                                label="text"
                            />
                        </b-form-group>
                    </b-col>

                    <b-col md="6">
                        <b-form-group
                            label="Focus"
                            label-for="i-focus"
                        >
                            <v-select
                                id="i-focus"
                                v-model="selectedFocus"
                                :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                                :options="focuses"
                                :selectable="option => ! option.value.includes('select_value')"
                                label="text"
                            />
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Age"
                            label-for="i-age"
                        >
                            <b-form-input
                                id="i-age"
                                placeholder="30"
                                v-model="form.age"
                            />
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Duration"
                            label-for="i-duration"
                        >
                            <b-form-input
                                id="i-duration"
                                placeholder="20"
                                v-model="form.duration"
                            />
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Price"
                            label-for="i-price"
                        >
                            <b-form-input
                                id="i-price"
                                placeholder="5000"
                                v-model="form.price"
                            />
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Optional Price Info"
                            label-for="i-price-info"
                        >
                            <b-form-textarea
                                id="i-price-info"
                                v-model="form.priceInfo"
                                placeholder="Give the reason why your price"
                                rows="3"
                                :state="form.priceInfo.length <= maxChar.priceInfo"
                                class="char-textarea"
                                :class="form.priceInfo.length >= maxChar.priceInfo ? 'text-danger' : ''"
                            />
                            <small
                                class="textarea-counter-value float-right"
                                :class="form.priceInfo.length >= maxChar.priceInfo ? 'bg-danger' : ''"
                            >
                                <span class="char-count">{{ form.priceInfo.length }}</span> /
                                {{ maxChar.priceInfo }}
                            </small>
                        </b-form-group>
                    </b-col>
                </b-row>
            </tab-content>

            <!-- About -->
            <tab-content
                title="About"
            >
                <b-row>
                    <b-col
                        cols="12"
                        class="mb-2"
                    >
                        <h5 class="mb-0">
                            About
                        </h5>
                        <small class="text-muted">About Your Program.</small>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Overview & Description"
                            label-for="i-description"
                        >
                            <b-form-textarea
                                id="i-description"
                                v-model="form.description"
                                placeholder="Overview & Description"
                                rows="3"
                                :state="form.description.length <= maxChar.description"
                                class="char-textarea"
                                :class="form.description.length >= maxChar.description ? 'text-danger' : ''"
                            />
                            <small
                                class="textarea-counter-value float-right"
                                :class="form.description.length >= maxChar.description ? 'bg-danger' : ''"
                            >
                                <span class="char-count">{{ form.description.length }}</span> /
                                {{ maxChar.description }}
                            </small>
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Highlight-Tags"
                            label-for="i-highlight-tags"
                        >
                            <b-form-tags
                                input-id="i-highlight-tags"
                                class="mb-2"
                            />
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Accommodation"
                            label-for="i-accommodation"
                        >
                            <b-form-textarea
                                id="i-accommodation"
                                v-model="form.accommodation"
                                placeholder="Overview & Description"
                                rows="3"
                                :state="form.accommodation.length <= maxChar.accommodation"
                                class="char-textarea"
                                :class="form.accommodation.length >= maxChar.accommodation ? 'text-danger' : ''"
                            />
                            <small
                                class="textarea-counter-value float-right"
                                :class="form.accommodation.length >= maxChar.accommodation ? 'bg-danger' : ''"
                            >
                                <span class="char-count">{{ form.accommodation.length }}</span> /
                                {{ maxChar.accommodation }}
                            </small>
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Location"
                            label-for="i-location"
                        >
                            <b-form-textarea
                                id="i-location"
                                v-model="form.location"
                                placeholder="Overview & Description"
                                rows="3"
                                :state="form.location.length <= maxChar.location"
                                class="char-textarea"
                                :class="form.location.length >= maxChar.location ? 'text-danger' : ''"
                            />
                            <small
                                class="textarea-counter-value float-right"
                                :class="form.location.length >= maxChar.location ? 'bg-danger' : ''"
                            >
                                <span class="char-count">{{ form.location.length }}</span> /
                                {{ maxChar.location }}
                            </small>
                        </b-form-group>
                    </b-col>
                </b-row>
            </tab-content>

            <!-- volunteering -->
            <tab-content
                title="Volunteering"
            >
                <b-row>
                    <b-col
                        cols="12"
                        class="mb-2"
                    >
                        <h5 class="mb-0">
                            Volunteering
                        </h5>
                        <small class="text-muted">Enter Your Volunteering.</small>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Typical day"
                            label-for="i-typical-day"
                        >
                            <b-form-textarea
                                id="i-location"
                                v-model="form.typicalDay"
                                placeholder="Overview & Description"
                                rows="3"
                                :state="form.typicalDay.length <= maxChar.typicalDay"
                                class="char-textarea"
                                :class="form.typicalDay.length >= maxChar.typicalDay ? 'text-danger' : ''"
                            />
                            <small
                                class="textarea-counter-value float-right"
                                :class="form.typicalDay.length >= maxChar.typicalDay ? 'bg-danger' : ''"
                            >
                                <span class="char-count">{{ form.typicalDay.length }}</span> /
                                {{ maxChar.typicalDay }}
                            </small>
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Requirements & Expectations"
                            label-for="i-expectation"
                        >
                            <b-form-textarea
                                id="i-expectation"
                                v-model="form.expectation"
                                placeholder="Requirements & Expectations"
                                rows="3"
                                :state="form.expectation.length <= maxChar.expectation"
                                class="char-textarea"
                                :class="form.expectation.length >= maxChar.expectation ? 'text-danger' : ''"
                            />
                            <small
                                class="textarea-counter-value float-right"
                                :class="form.expectation.length >= maxChar.expectation ? 'bg-danger' : ''"
                            >
                                <span class="char-count">{{ form.expectation.length }}</span> /
                                {{ maxChar.expectation }}
                            </small>
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Orientation"
                            label-for="i-orientation"
                        >
                            <b-form-textarea
                                id="i-orientation"
                                v-model="form.orientation"
                                placeholder="Orientation"
                                rows="3"
                                :state="form.orientation.length <= maxChar.orientation"
                                class="char-textarea"
                                :class="form.orientation.length >= maxChar.orientation ? 'text-danger' : ''"
                            />
                            <small
                                class="textarea-counter-value float-right"
                                :class="form.orientation.length >= maxChar.orientation ? 'bg-danger' : ''"
                            >
                                <span class="char-count">{{ form.orientation.length }}</span> /
                                {{ maxChar.orientation }}
                            </small>
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group
                            label="Good to know"
                            label-for="i-good-to-know"
                        >
                            <b-form-textarea
                                id="i-location"
                                v-model="form.goodToKnow"
                                placeholder="Good to know"
                                rows="3"
                                :state="form.goodToKnow.length <= maxChar.goodToKnow"
                                class="char-textarea"
                                :class="form.goodToKnow.length >= maxChar.goodToKnow ? 'text-danger' : ''"
                            />
                            <small
                                class="textarea-counter-value float-right"
                                :class="form.goodToKnow.length >= maxChar.goodToKnow ? 'bg-danger' : ''"
                            >
                                <span class="char-count">{{ form.goodToKnow.length }}</span> /
                                {{ maxChar.goodToKnow }}
                            </small>
                        </b-form-group>
                    </b-col>
                </b-row>
            </tab-content>

            <!-- services -->
            <tab-content
                title="Services"
            >
                <b-row>
                    <b-col
                        cols="12"
                        class="mb-2"
                    >
                        <h5 class="mb-0">
                            Services
                        </h5>
                        <small class="text-muted">Enter Your Services</small>
                    </b-col>
                    <b-col
                        cols="12"
                        class="mb-2"
                    >
                        <included-service-repeater></included-service-repeater>
                    </b-col>

                    <b-col
                        cols="12"
                        class="mb-2"
                    >
                        <optional-service-repeater></optional-service-repeater>
                    </b-col>
                </b-row>
            </tab-content>

            <!-- Media -->
            <tab-content
                title="Media"
            >
                <b-row>
                    <b-col
                        cols="12"
                        class="mb-2"
                    >
                        <h5 class="mb-0">
                            Social Links
                        </h5>
                        <small class="text-muted">Enter Your Social Links</small>
                    </b-col>
                    <b-col md="12">
                        <b-form-group
                            label="Upload images"
                            label-for="i-image"
                        >
                            <b-form-file
                                id="i-image"
                                placeholder="Choose a file or drop it here..."
                                drop-placeholder="Drop file here..."
                                multiple
                            />
                        </b-form-group>
                    </b-col>
                    <b-col md="12">
                        <b-form-group
                            label="Video Link"
                            label-for="i-video-link"
                        >
                            <b-form-input
                                id="i-video-link"
                                placeholder="https://youtute.com/abc"
                            />
                        </b-form-group>

                    </b-col>

                </b-row>
            </tab-content>
        </form-wizard>
    </div>
</template>

<script>
import {FormWizard, TabContent} from 'vue-form-wizard'
import BCardCode from "../../../../@core/components/b-card-code/BCardCode";
import vSelect from 'vue-select'
import store from '@/store/index'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import {
    BRow,
    BCol,
    BFormGroup,
    BFormInput,
    BFormTextarea,
    BCardText,
    BFormTags,
    BFormFile
} from 'bootstrap-vue'
import IncludedServiceRepeater from "./IncludedServiceRepeater";
import OptionalServiceRepeater from "./OptionalServiceRepeater";
import programStoreModule from "../programStoreModule";
import {onUnmounted} from "@vue/composition-api";
import useJwt from "../../../../auth/jwt/useJwt";

export default {
    components: {
        FormWizard,
        TabContent,
        BRow,
        BCol,
        BFormGroup,
        BFormInput,
        BFormTextarea,
        vSelect,
        BCardCode,
        BCardText,
        BFormTags,
        IncludedServiceRepeater,
        OptionalServiceRepeater,
        BFormFile,
        // eslint-disable-next-line vue/no-unused-components
        ToastificationContent,
    },

    data() {
        return {
            form: {
                title: '',
                age: '',
                duration: '',
                price: '',
                priceInfo: '',
                description: '',
                accommodation: '',
                location: '',
                typicalDay: '',
                expectation: '',
                orientation: '',
                goodToKnow: ''
            },
            maxChar: {
                priceInfo: 400,
                description: 1200,
                accommodation: 800,
                location: 800,
                typicalDay: 800,
                expectation: 800,
                orientation: 800,
                goodToKnow: 800,
            },
            selectedCountry: null,
            countries: [
                {value: 'select_value', text: 'Select Country'},
            ],
            categories: [
                {value: 'select_value', text: 'Select Category'},
            ],
            selectedCategory: null,
            focuses: [
                {value: 'select_value', text: 'Select Focus'},
            ],
            selectedFocus: null,
        }
    },
    created() {
        this.$store.dispatch('app-program/fetchCountries')
            .then(res => {
                res.data.forEach(({id, name}) => {
                    this.countries.push({value: id.toString(), text: name})
                })
                this.selectedCountry = {text: 'United States', value: "1"}
            })
            .catch(err => {
                this.$toast({
                    component: ToastificationContent,
                    props: {
                        title: "Get countries err",
                        variant: 'danger',
                        icon: 'FrownIcon'
                    },
                })
            })
        this.$store.dispatch('app-program/fetchCategories')
            .then(res => {
                res.data.forEach(({id, name}, index) => {
                    const option = {text: name, value: id.toString()}
                    if (index === 0) {
                        this.selectedCategory = option
                    }
                    this.categories.push(option)
                })
            })
            .catch(err => {
                this.$toast({
                    component: ToastificationContent,
                    props: {
                        title: "Get countries err",
                        variant: 'danger',
                        icon: 'FrownIcon'
                    },
                })
            })

    },
    watch: {
        selectedCategory(newValue) {
            this.fetchFocuses(newValue.value)
        }
    },
    methods: {
        fetchFocuses(catID) {
            this.$store.dispatch('app-program/fetchFocuses', catID)
                .then(res => {
                    res.data.forEach(({id, name}, index) => {
                        const option = {text: name, value: id.toString()}
                        this.focuses.push(option)
                        if (index === 0) {
                            this.selectedFocus = option
                        }
                    })
                })
                .catch(err => {
                    this.$toast({
                        component: ToastificationContent,
                        props: {
                            title: "Get countries err",
                            variant: 'danger',
                            icon: 'FrownIcon'
                        },
                    })
                })
        },
        submitForm() {
            const payload = {
                title: this.form.title,
                countryId: this.selectedCountry.value,
                categoryId: this.selectedCategory.value,
                focusId: this.selectedFocus.value,
                age: this.form.age,
                duration: this.form.duration,
                price: this.form.price,
                description: this.form.description,
                accommodation: this.form.accommodation,
                location: this.form.location,
                providerId: JSON.parse(localStorage.getItem('userData')).id
            }
            this.$store.dispatch('app-program/addProgram', payload)
                .then(res => {
                    this.$toast({
                        component: ToastificationContent,
                        props: {
                            title: 'New program was added',
                            icon: 'EditIcon',
                            variant: 'success',
                        },
                    })
                })
                .catch(err => {

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
