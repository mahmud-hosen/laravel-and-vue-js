import Axios from "axios"

export default {
    //  Step: 9
    state: {
        category: [],
        subCategory: [],
        content: [],



    },

    //  Step: 11
    getters: {
        categoryList(state) {
            return state.category
        },

        subCategoryList(state) {
            return state.subCategory
        },
        contentList(state) {
            return state.content
        }

    },

    //  Step: 5
    actions: {

        getCategoryList(context) {
            Axios.get('/CategoryList').then((response) => {
                context.commit('categoryListItem', response.data.categoryList)
            })
        },

        getSubCategoryList(context) {
            Axios.get('/subCategoryList').then((response) => {
                context.commit('subCategoryList', response.data.subCategoryList)
            })
        },

        getContentList(context) {
            Axios.get('/contentList').then((response) => {
                context.commit('contentList', response.data.contentList)
            })
        },


    },

    //  Step: 8
    mutations: {
        categoryListItem(state, responseData) {
            return state.category = responseData
        },

        subCategoryList(state, responseData) {
            return state.subCategory = responseData
        },

        contentList(state, responseData) {
            return state.content = responseData
        },
    }
}