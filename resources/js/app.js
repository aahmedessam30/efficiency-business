import './bootstrap';
import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.es.js';
import {Ziggy} from './ziggy';
import {i18nVue} from 'laravel-vue-i18n'
import 'flowbite';
import AOS from 'aos';
import 'aos/dist/aos.css'

createInertiaApp({
    title: title => title,
    progress: {
        // The delay after which the progress bar will appear, in milliseconds...
        delay: 250,

        // The color of the progress bar...
        color: '#9BB5C0',

        // Whether to include the default NProgress styles...
        includeCSS: true,

        // Whether the NProgress spinner will be shown...
        showSpinner: false,
    },
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        return pages[`./Pages/${name}.vue`];
    },
    setup({el, App, props, plugin}) {
        const app = createApp({
            beforeCreate() {
                AOS.init();
            },
            render: () => h(App, props)});
        app.config.globalProperties.$route = route;
        app.use(plugin, ZiggyVue, Ziggy)
            .use(i18nVue, {
                lang: 'en',
                resolve: async lang => {
                    const langs = import.meta.glob('../../lang/*.json');
                    return await langs[`../../lang/${lang}.json`]();
                }
            })
            .mount(el);
    },
})

