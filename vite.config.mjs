import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'public/lineone/css/jquery-jvectormap-1.2.2.css',
                'public/lineone/css/preloader.min.css',
                'public/lineone/css/bootstrap.min.css',
                'public/lineone/css/icons.min.css',
                'public/lineone/css/app.min.css',
                'resources/js/app.js',
                'public/lineone/js/libs/jquery/jquery.min.js',
                'public/lineone/js/libs/bootstrap/js/bootstrap.bundle.min.js',
                'public/lineone/js/libs/metismenu/metisMenu.min.js',
                'public/lineone/js/libs/simplebar/simplebar.min.js',
                'public/lineone/js/libs/node-waves/waves.min.js',
                'public/lineone/js/libs/feather-icons/feather.min.js',
                'public/lineone/js/libs/pace-js/pace.min.js',
                'public/lineone/js/libs/nouislider/nouislider.min.js',
                'public/lineone/js/libs/wnumb/wNumb.min.js',
                'public/lineone/js/js/pages/product-filter-range.init.js',
                'public/lineone/js/js/pages/pass-addon.init.js',
                'public/lineone/js/js/pages/password-addon.init.js',
                'public/lineone/js/js/app.js'
            ],
            refresh: true,
            detectTls: true
        }),
    ],
    resolve: {
        alias: {
            "@": "resources/js/",
            "~": "node_modules/"
        }
    }
});