import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'vite-plugin-laravel/inertia'
import { ZiggyVue } from 'ziggy-vue';
import route from 'ziggy';
import Layout from './Layout'
import 'notyf/notyf.min.css';

createInertiaApp({
    // resolve: async(name) => {
    //     const page = await resolvePageComponent(name, import.meta.glob('../views/pages/**/*.vue'))
    //     page.layout = page.layout || Layout
    //     return page
    // },
	resolve: (name) => resolvePageComponent(name, import.meta.glob('../views/pages/**/*.vue')),
	setup({ el, app, props, plugin }) {
		createApp({ render: () => h(app, props) })
			.use(plugin)
            .use(ZiggyVue)
			.mount(el)
	},
})
