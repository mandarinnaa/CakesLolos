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
        outDir: 'public/build',
        emptyOutDir: true, // Limpia el directorio en cada build
        manifest: true, // Genera manifest.json
        rollupOptions: {
            output: {
                entryFileNames: 'assets/js/[name].[hash].js',
                chunkFileNames: 'assets/js/[name].[hash].js',
                assetFileNames: ({ name }) => {
                    if (/\.(css|scss)$/.test(name ?? '')) {
                        return 'assets/css/[name].[hash][extname]';
                    }
                    return 'assets/[name].[hash][extname]';
                }
            }
        }
    },

    // Resolución de paths
    resolve: {
        alias: {
            '@': '/resources/js',
            '~bootstrap': 'bootstrap/dist/js/bootstrap.bundle.min.js'
        }
    }
});