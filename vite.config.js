import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/admin-navbar.css',
                'resources/css/editor-navbar.css',
                'resources/css/main-navbar.css',
                'resources/js/app.js'
            ],
                        refresh: true,
        }),
    ],
    build: {
        manifest: true,
        rollupOptions: {
            output: {
assetFileNames: (assetInfo) => {
                    let extType = assetInfo.name.split('.').at(1);
                    if (/css|sass|scss|less|styl/i.test(extType)) {
                        return 'assets/css/[name].[hash][extname]';
                    }
                    return 'assets/[name].[hash][extname]';
                },
            },
        },
    },
});