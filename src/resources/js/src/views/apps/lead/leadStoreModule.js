import axios from '@axios'

export default {
    namespaced: true,
    state: {},
    getters: {},
    mutations: {},
    actions: {
        fetchLeads(ctx, queryParams) {
            return new Promise((resolve, reject) => {
                axios
                    .get('/api/leads', {params: queryParams})
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        fetchLead(ctx, {id}) {
            return new Promise((resolve, reject) => {
                axios
                    .get(`/api/lead/${id}`)
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        addLead(ctx, userData) {
            return new Promise((resolve, reject) => {
                axios
                    .post('/apps/user/users', {user: userData})
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        fetchCountries(ctx, userData) {
            return new Promise((resolve, reject) => {
                axios
                    .get('/api/countries')
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },

        fetchCategories(ctx, userData) {
            return new Promise((resolve, reject) => {
                axios
                    .get('/api/category/parents')
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
    },
}
