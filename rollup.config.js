//CSS Imports
import postcss from "rollup-plugin-postcss";
import sass from "rollup-plugin-sass";
import flexbugs from "postcss-flexbugs-fixes";
import autoprefixer from "autoprefixer";
import cssnano from "cssnano";

//JS Imports
import {terser} from "rollup-plugin-terser";
import resolve from "rollup-plugin-node-resolve";


const config = [
    {
        input: "./sass/style.scss",
        output: {
            name: "Style",
            file: "./style.css",
            format: "iife"
        },
        plugins: [
            postcss( {
                preprocessor: (content, id) => new Promise(
                    (resolve, reject) => {
                        const result = sass.renderSync( {file: id} );
                        resolve( {code: result.css.toString()} );
                    }),
                plugins: [
                    flexbugs,
                    autoprefixer,
                    cssnano
                ],
                sourceMap: true,
                extract: true
                }
             )
        ]
    },
    {
        input: "./js/index.js",
        output: {
            name: "Script",
            file: "./index.js",
            format: "iife",
            sourcemap: true
        },
        plugins: [
            terser( {sourcemap: true} ),
            resolve()
        ],
        onwarn: function(warning) {
            if( warning.code === 'THIS_IS_UNDEFINED' ) {
                return;
            }
            console.warn(warning.message);
        }
    }

];

export default config;