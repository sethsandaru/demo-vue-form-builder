import Vue from 'vue';
import VueRouter from 'vue-router';

// import
import TemplateConfigPage from '@/pages/TemplateConfigPage';
import GUIPage from '@/pages/GUIPage';
import IndexTemplatePage from '@/pages/IndexTemplatePage';
import IntroductionPage from '@/pages/IntroductionPage';

Vue.use(VueRouter);

export const router = new VueRouter({
    routes: [
        {
            path: '/', component: IntroductionPage
        },
        {
            path: '/template', component: IndexTemplatePage
        },
        {
            path: '/template/config/:id?', component: TemplateConfigPage
        },
        {
            path: '/gui', component: GUIPage
        },
    ]
});
