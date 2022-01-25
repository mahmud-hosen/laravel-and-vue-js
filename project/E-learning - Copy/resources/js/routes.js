import dashboard from './components/admin/dashboard/index.vue';
import categorylist from './components/admin/category/list.vue';  //  Step: 3
import categoryadd from './components/admin/category/add.vue';
import categoryedit from './components/admin/category/edit.vue';



export const routes = [
    {
        path: '/',
        component: dashboard
    },

    {   //  Step: 2
        path: '/category',
        component: categorylist
    },
    {
        path: '/addCategory',
        component: categoryadd
    },
    {
        path: '/editCategory/:categoryId',
        component: categoryedit
    },
]