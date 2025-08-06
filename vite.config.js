import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
 base: '/build/',
     plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/admin.css',
                'resources/css/editor.css',
                'resources/js/app.js'
            ],
                        refresh: true,
        })
    ],
      build: {
        manifest: true,
        outDir: 'public/build',
        emptyOutDir: true,
    }

});