import axios from '@axios'

export default {
    namespaced: true,
    state: {},
    getters: {},
    mutations: {},
    actions: {
        fetchPrograms(ctx, queryParams) {
            return new Promise((resolve, reject) => {
                axios
                    .get('/api/programs', {params: queryParams})
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        fetchProgram(ctx, {id}) {
            return new Promise((resolve, reject) => {
                axios
                    .get(`/api/lead/${id}`)
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        addProgram(ctx, userData) {
            return new Promise((resolve, reject) => {
                axios
                    .post('/apps/user/users', {user: userData})
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
    },
}
