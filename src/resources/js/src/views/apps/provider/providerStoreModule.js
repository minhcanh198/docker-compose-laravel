import axios from '@axios'

export default {
    namespaced: true,
    state: {},
    getters: {},
    mutations: {},
    actions: {
        fetchProviders(ctx, queryParams) {
            return new Promise((resolve, reject) => {
                axios
                    .get('/api/providers', {params: queryParams})
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        fetchProvider(ctx, {id}) {
            return new Promise((resolve, reject) => {
                axios
                    .get(`/api/provider/${id}`)
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        addProvider(ctx, userData) {
            return new Promise((resolve, reject) => {
                axios
                    .post('/apps/user/users', {user: userData})
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
    },
}
