/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 */


var elixir = require('laravel-elixir');

require('laravel-elixir-uglify');

elixir(function(mix) {
    mix.sass('app.scss');

    mix.scripts([
        'main.js',
        'PlanosController.js'
    ],'public/assets/js/all.js');

    mix.uglify('**/*.js', '../frontend/assets/js', {
        mangle: true,
        suffix: '.min'
    });

});
