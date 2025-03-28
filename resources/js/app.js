import '../css/app.css'
import './bootstrap'
import 'primeicons/primeicons.css'

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import PrimeVue from 'primevue/config'
import Aura from '@primeuix/themes/aura'
import InputText from "primevue/inputtext"
import Password from "primevue/password"
import Button from "primevue/button"
import Card from "primevue/card"
import Message from "primevue/message"
import Checkbox from "primevue/checkbox"
import {Column, DataTable, Dialog, Menu, Menubar, Ripple, Toast, ToastService} from "primevue"

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(PrimeVue, {
                theme: {
                    preset: Aura
                },
                ripple: true,
            })
            .use(ToastService)
            .component('InputText', InputText)
            .component('Password', Password)
            .component('Button', Button)
            .component('Card', Card)
            .component('Message', Message)
            .component('Checkbox', Checkbox)
            .component('Menubar', Menubar)
            .component('Menu', Menu)
            .component('Dialog', Dialog)
            .component('Toast', Toast)
            .component('DataTable', DataTable)
            .component('Column', Column)
            .directive('ripple', Ripple)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
