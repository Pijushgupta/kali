import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';


export default defineConfig({
    
    plugins: [
        vue(),
        laravel({
            
            input: ['resources/css/app.css', 'resources/js/app.js','resources/js/vue.js'],
            refresh: true,
        }),
        
    ],
    server: {
        fs: {
          strict: false, // Allows serving files outside the root.
        },
      },
    
    
});