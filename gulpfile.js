var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss', 'resources/assets/css');
    
    mix.styles([
        'app.css',
        'libs/select2.min.css'
    ], 'public/css/all.css');
    
    mix.scripts([
        'libs/jquery.js',
        'libs/select2.min.js'
    ], 'public/js/all.js');
    /*
    mix.scripts([
        'libs/ckeditor/ckeditor.js',
        'libs/ckeditor/build-config.js',
        'libs/ckeditor/config.js',
        'libs/ckeditor/adapters/jquery.js'
    ], 'public/js/ckeditor.js')
    */
    mix.version([
        'public/css/all.css',
        'public/js/all.js'
    ]);

});
