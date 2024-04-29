import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
    ],
    define: {
        'global': 'window'
    },
    optimizeDeps: {
        include: ["jquery"]
    },
    build: {
        rollupOptions: {
            plugins: [
                {
                    name: 'load-jquery-correctly',
                    load(id) {
                        if (id.endsWith('node_modules/jquery/dist/jquery.js')) {
                            return 'window.jQuery = window.$ = require("jquery");';
                        }
                    }
                }
            ]
        }
    }
});
