import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';

import LayoutDashboard from './Layouts/Dashboard.vue';
import LayoutSite from './Layouts/Site.vue';

import { ZiggyVue } from 'ziggy';
import { Ziggy } from './ziggy';

import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { fab } from '@fortawesome/free-brands-svg-icons';
import { far } from '@fortawesome/free-regular-svg-icons';

import 'bootstrap';

library.add(fas, fab, far);

createInertiaApp({
    title: title => `Bimi - ${title}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue');
        const resolvePageComponent = (name, pages) => {
            const importPage = pages[`./Pages/${name}.vue`];
            if (!importPage) {
                throw new Error(`Page not found: ./Pages/${name}.vue`);
            }
            return importPage();
        };
        const page = resolvePageComponent(name, pages);
        page.then(module => {
            if (name.startsWith('Dashboard/')) {
                module.default.layout = LayoutDashboard;
            }else{
                module.default.layout = LayoutSite;
            }
        });
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
        .component('font-awesome-icon', FontAwesomeIcon)
        .use(ZiggyVue, Ziggy)
        .use(plugin)
        .mount(el)
    },
    progress: {
        color: '#500cda',
    }
});
