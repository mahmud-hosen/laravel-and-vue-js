import Axios from "axios"

export default {
    //  Step: 9
    state: {
        category: [],

    },

    //  Step: 11
    getters: {
        categoryList(state) {
            return state.category
        }

    },

    //  Step: 5
    actions: {
        getCategoryList(context) {
            Axios.get('/CategoryList').then((response) => {
                context.commit('categoryListItem', response.data.categoryList)

            })
        }

    },

    //  Step: 8
    mutations: {
        categoryListItem(state, responseData) {
            return state.category = responseData
        }
    }
}