import dashboard from './components/admin/dashboard/index.vue';

import categoryList from './components/admin/category/categoryList.vue';
import categoryAdd from './components/admin/category/categoryAdd.vue';
import categoryEdit from './components/admin/category/categoryEdit.vue';




export const routes = [
    {
        path: '/categoryList',
        component: categoryList
    },

    {
        path: '/categoryAdd',
        component: categoryAdd
    },
    {
        path: '/categoryEdit',
        component: categoryEdit
    },

    
  

]