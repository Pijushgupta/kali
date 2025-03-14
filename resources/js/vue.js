import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import DashboardLayout from './layout/Dashboardlayout.vue';
import '@pijushgupta/toastbite/dist/toastbite.css'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    const page = pages[`./Pages/${name}.vue`]; // Get the page component
    if(name !== 'Login'){
      page.default.layout = page.default.layout || DashboardLayout; // Assign default layout if not already set
    }
    return page;
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
    app.use(plugin); 
    app.mount(el);
  },
});




