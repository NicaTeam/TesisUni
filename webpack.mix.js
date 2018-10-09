const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app2.js', 'public/js/app2.js')
   .sass('resources/assets/sass/app.scss', 'public/css');

// mix.scripts([

// 	'resources/assets/js/vue.js',
// 	'resources/assets/js/axios.js',
// 	'resources/assets/js/appVue.js'

// 	], 'public/js/appVue.js')

