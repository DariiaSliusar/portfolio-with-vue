import { createRouter, createWebHistory } from "vue-router";

import homeIndex from '../components/pages/home/Index.vue';
import AdminHomeIndex from '../components/admin/home/Index.vue';
import AdminAboutEdit from '../components/admin/abouts/Edit.vue';
import NotFoundPage from '../components/NotFoundPage.vue';

const routes = [
    {
        path:'/',
        name: 'home',
        component: homeIndex,
    },
    {
        path:'/admin/dashboard',
        name: 'admin.home.index',
        component:AdminHomeIndex,
    },
    {
        path:'/admin/abouts',
        name: 'admin.abouts',
        component:AdminAboutEdit,
    },
    {
        path:'/:any(.*)*',
        name:'notFoundPage',
        component: NotFoundPage,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
