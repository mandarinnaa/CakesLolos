import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '/build/', // ¡Esto es esencial para producción!
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true
        }),
    ],
    build: {
        outDir: 'public/build',
        manifest: true,
        emptyOutDir: true
    }
});