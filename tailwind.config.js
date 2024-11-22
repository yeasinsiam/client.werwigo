/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Roboto", ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                "8xl": "1390px",
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms")({
            strategy: "class",
        }),
        plugin(function groupPeer({ addVariant }) {
            let pseudoVariants = [
                // ... Any other pseudo variants you want to support.
                // See https://github.com/tailwindlabs/tailwindcss/blob/6729524185b48c9e25af62fc2372911d66e7d1f0/src/corePlugins.js#L78
                "checked",
            ].map((variant) =>
                Array.isArray(variant) ? variant : [variant, `&:${variant}`]
            );

            for (let [variantName, state] of pseudoVariants) {
                addVariant(`group-peer-${variantName}`, (ctx) => {
                    let result =
                        typeof state === "function" ? state(ctx) : state;
                    return result.replace(
                        /&(\S+)/,
                        ":merge(.peer)$1 ~ .group &"
                    );
                });
            }
        }),
    ],
};
//    theme: {
//         extend: {
//             fontFamily: {
//                 sans: ["Poppins", ...defaultTheme.fontFamily.sans],
//             },
//             maxWidth: {
//                 "8xl": "1390px",
//             },
//         },
//     },
