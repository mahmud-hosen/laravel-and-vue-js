import dashboard from './components/admin/dashboard/index.vue';

// Import component for Category
import categorylist from './components/admin/category/list.vue';  //  Step: 3
import categoryadd from './components/admin/category/add.vue';
import categoryedit from './components/admin/category/edit.vue';

// Import component for Sub Category
import subCategorylist from './components/admin/subCategory/list.vue';
import subCategoryadd from './components/admin/subCategory/add.vue';
import subCategoryedit from './components/admin/subCategory/edit.vue';

// Import component for Content
import contentlist from './components/admin/content/list.vue';
import contentadd from './components/admin/content/add.vue';
import contentedit from './components/admin/content/edit.vue';




export const routes = [
    {
        path: '/',
        component: dashboard
    },

    // Start route for category
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
    // End route for category

    // Start route for sub category
    {   //  Step: 2
        path: '/subCategory',
        component: subCategorylist
    },
    {
        path: '/addSubCategory',
        component: subCategoryadd
    },
    {
        path: '/editSubCategory/:subCategoryId',
        component: subCategoryedit
    },
    // End route for sub category



    // Start route for Content
    {   //  Step: 2
        path: '/content',
        component: contentlist
    },
    {
        path: '/addContent',
        component: contentadd
    },
    {
        path: '/editContent/:contentId',
        component: contentedit
    },
    // End route for Content



]