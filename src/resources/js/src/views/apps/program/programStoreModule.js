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
                    .get(`/api/program/${id}`)
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        addProgram(ctx, formData) {
            const data = new FormData();
            data.append('title', formData.title);
            data.append('country_id', formData.countryId);
            data.append('category_id', formData.categoryId);
            data.append('focus_id', formData.focusId);
            data.append('age', formData.age);
            data.append('duration', formData.duration);
            data.append('price', formData.price);
            data.append('description', formData.description);
            data.append('accommodation', formData.accommodation);
            data.append('location', formData.location);
            data.append('provider_id', formData.providerId);
            return new Promise((resolve, reject) => {
                axios
                    .post('/api/program', data)
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        fetchCountries() {
            return new Promise((resolve, reject) => {
                axios
                    .get('/api/countries')
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        fetchCategories() {
            return new Promise((resolve, reject) => {
                axios
                    .get('/api/category/parents')
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        },
        fetchFocuses(ctx, catID) {
            return new Promise((resolve, reject) => {
                axios
                    .get(`/api/category/${catID}/subcat`)
                    .then(response => resolve(response))
                    .catch(error => reject(error))
            })
        }

    },
}
