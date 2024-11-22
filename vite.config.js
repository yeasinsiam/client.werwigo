import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    // server: {
    //     host: "192.168.0.106",
    // },
    plugins: [
        laravel({
            input: [
                // Css
                "resources/css/app.css",

                // "resources/css/lib/vanilla-calendar/style.css",

                // Js
                "resources/js/app.js",

                "resources/js/client/app.js",
            ],
            refresh: true,
        }),
    ],
});
