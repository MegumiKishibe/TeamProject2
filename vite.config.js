import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/style.css",
                "resources/js/search.js",
                "resources/js/validate-fade.js"
            ],
            refresh: true,
        }),
        vue(),
    ],
    base: "/",
});
