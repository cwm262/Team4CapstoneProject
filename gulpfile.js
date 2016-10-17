const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.webpack([
            './node_modules/lodash/lodash.js',
            './node_modules/underscore/underscore.js',
            './node_modules/moment/moment.js',
            './node_modules/angular/angular.js',
            './node_modules/angular-aria/angular-aria.js',
            './node_modules/angular-animate/angular-animate.js',
            './node_modules/angular-messages/angular-messages.js',
            './node_modules/angular-route/angular-route.js',
            './node_modules/angular-touch/angular-touch.js',
            './node_modules/angular-ui-bootstrap/dist/ui-bootstrap-tpls.js',
            './node_modules/restangular/dist/restangular.js',
            './node_modules/ngprogress/build/ngProgress.js',
            './node_modules/angularjs-slider/dist/rzslider.js',
            './node_modules/angular-moment/angular-moment.js',
            './node_modules/angular-barcode-listener/angular-barcode-listener.js',
            './node_modules/angular-confirm/angular-confirm.js'
        ])
        .styles([
            './node_modules/ngprogress/ngProgress.css',
            './node_modules/angularjs-slider/dist/rzslider.css'
        ])
});
