import axios from '@axios'

export default {
    namespaced: true,
    state: {},
    getters: {},
    mutations: {},
    actions: {
        fetchUsers(ctx, queryParams) {
            return new Promise((resolve, reject) => {
                axios
                    .get('/api/users', {params: queryParams})
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        fetchUser(ctx, {id}) {
            return new Promise((resolve, reject) => {
                axios
                    .get(`/api/user/${id}`)
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        addUser(ctx, userData) {
            const data = new FormData();
            data.append('firstname', userData.firstName);
            data.append('lastname', userData.lastName);
            data.append('email', userData.email);
            data.append('password', userData.password);
            data.append('role', userData.role);

            return new Promise((resolve, reject) => {
                axios
                    .post('/api/user', data)
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        updateUser(ctx, userData) {
            const data = new FormData();
            data.append('firstname', userData.firstname);
            data.append('lastname', userData.lastname);
            data.append('phone_number', userData.phone_number);
            data.append('role', userData.roles[0].name);

            return new Promise((resolve, reject) => {
                axios
                    .post(`/api/user/${userData.id}`, data)
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
    },
}
