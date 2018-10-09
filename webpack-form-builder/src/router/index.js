import Vue from 'vue';
import VueRouter from 'vue-router';

// import
import TemplateConfigPage from '@/pages/TemplateConfigPage';
import GUIPage from '@/pages/GUIPage';

Vue.use(VueRouter);

export const router = new VueRouter({
    routes: [
        {
            path: '/', component: TemplateConfigPage
        },
        {
            path: '/gui', component: GUIPage
        },
    ]
});
