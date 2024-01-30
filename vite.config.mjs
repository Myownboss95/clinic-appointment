import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import run from "vite-plugin-run"

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
            detectTls: true
        }),
        // run([
        //     {
        //         name: "Run Pint",
        //         run: ["./vendor/bin/pint"],
        //         condition: (file) => [
        //             "routes", "app", "database", "lang", "config"
        //         ].filter(
        //             (path) => file.includes(`/${path}`)
        //         ).length,
        //     }

        // ])
    ],

    resolve: {
        alias: {
            "@": "resources/js/",
            "~": "node_modules/"
        }
    }
});