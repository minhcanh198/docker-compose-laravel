<template>
    <div>
        <div>
            <b-form
                ref="form"
                :style="{height: trHeight}"
                class="repeater-form"
                @submit.prevent="repeateAgain"
            >
                <!-- Row Loop -->
                <b-row
                    v-for="(item, index) in items"
                    :id="item.id"
                    :key="item.id"
                    ref="row"
                >
                    <!-- Item Name -->
                    <b-col
                        md="9"
                        lg="10"
                    >
                        <b-form-group
                            label="Optional Service"
                            label-for="i-optional-service"
                        >
                            <b-form-input
                                id="i-optional-service"
                                type="text"
                                placeholder="Enter your optional service"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- Remove Button -->
                    <b-col
                        lg="2"
                        md="3"
                        class="mb-50"
                    >
                        <b-button
                            v-ripple.400="'rgba(234, 84, 85, 0.15)'"
                            variant="outline-danger"
                            class="mt-0 mt-md-2"
                            @click="removeItem(index)"
                        >
                            <feather-icon
                                icon="XIcon"
                                class="mr-25"
                            />
                            <span>Delete</span>
                        </b-button>
                    </b-col>
                    <b-col cols="12">
                        <hr>
                    </b-col>
                </b-row>

            </b-form>
        </div>
        <b-button
            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
            variant="primary"
            @click="repeateAgain"
        >
            <feather-icon
                icon="PlusIcon"
                class="mr-25"
            />
            <span>Add New</span>
        </b-button>
    </div>
</template>

<script>
import BCardCode from '@core/components/b-card-code'
import {
    BForm, BFormGroup, BFormInput, BRow, BCol, BButton,
} from 'bootstrap-vue'
import {heightTransition} from '@core/mixins/ui/transition'

import Ripple from 'vue-ripple-directive'

export default {
    components: {
        BCardCode,
        BForm,
        BRow,
        BCol,
        BButton,
        BFormGroup,
        BFormInput,
    },
    directives: {
        Ripple,
    },
    mixins: [heightTransition],
    data() {
        return {
            items: [{
                id: 1,
                selected: 'male',
                selected1: 'designer',
                prevHeight: 0,
            }],
            nextTodoId: 2
        }
    },
    mounted() {
        this.initTrHeight()
    },
    created() {
        window.addEventListener('resize', this.initTrHeight)
    },
    destroyed() {
        window.removeEventListener('resize', this.initTrHeight)
    },
    methods: {
        repeateAgain() {
            this.items.push({
                id: this.nextTodoId += this.nextTodoId,
            })

            this.$nextTick(() => {
                this.trAddHeight(this.$refs.row[0].offsetHeight)
            })
        },
        removeItem(index) {
            this.items.splice(index, 1)
            this.trTrimHeight(this.$refs.row[0].offsetHeight)
        },
        initTrHeight() {
            this.trSetHeight(null)
            this.$nextTick(() => {
                // this.trSetHeight(this.$refs.form.scrollHeight)
                this.trSetHeight(102)
            })
        },
    },
}
</script>

<style lang="scss" scoped>
.repeater-form {
    overflow: hidden;
    transition: .35s height;
}
</style>
