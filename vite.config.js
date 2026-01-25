import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
// import vue from "@vitejs/plugin-vue";  ←消す

export default defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/app.css",
        "resources/js/app.js",
        "resources/css/style.css",
        "resources/js/search.js",
      ],
      refresh: true,
    }),
    // vue(), ←消す
  ],
  server: {
    host: "0.0.0.0",
    port: 5173,
    strictPort: true,
  },
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
