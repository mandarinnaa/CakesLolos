import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    // Configuración esencial para producción
    base: '/build/', // ¡Clave para que funcionen los assets en producción!
    
    // Configuración del servidor (solo desarrollo)
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost',
            protocol: 'ws'
        }
    },

    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/admin.css',
                'resources/css/editor.css',
                'resources/css/messages.css',
                'resources/js/app.js'
            ],
            refresh: [
                'resources/views/**',
                'routes/**'
            ]
        })
    ],

    // Optimización para producción
        build: {
        manifest: true,
        outDir: 'public/build',
        rollupOptions: {
            output: {
                entryFileNames: 'assets/[name].[hash].js',
                assetFileNames: 'assets/[name].[hash][extname]'
            }
        }
    }

});