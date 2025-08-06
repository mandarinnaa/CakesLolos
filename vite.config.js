import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '/build/',
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',    // Estilos generales
                'resources/css/admin.css',  // Solo admin
                'resources/css/editor.css', // Solo editor
                'resources/js/app.js'       // JavaScript
            ],
            refresh: true,
        })
    ],
    build: {
        manifest: true,
        outDir: 'public/build',
        emptyOutDir: false,  // ¡IMPORTANTE! Evita que se borren otros assets
    }
});