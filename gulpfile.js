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
    //mix.less('app.less','resources/assets/lib/css/');

    //mix.rubySass('welcomepage.scss','resources/assets/lib/css/');

    //mix.styles([
    //    "lib/css/basic_site_style.css",
    //    "lib/css/app.css",
    //    "lib/css/welcomepage.css",
    //],'public/css/welcomepage.css','resources/assets/');

    //mix.scripts([
    //    "jquery-1.11.2.min.js",
    //    "bootstrap.min.js",
    //    "html5shiv.min.js",
    //    "respond.min.js"
    //],"public/js/allscripts.js","resources/assets/js");

    //mix.scripts([
    //    "profile-edit.js",
    //],"public/js/allangularscripts.js","resources/assets/lib/js");


    mix.sass('main.scss','resources/assets/lib/css/');
    mix.sass('site_animation.scss','resources/assets/lib/css/');
    mix.sass('message.scss','resources/assets/lib/css/');

    mix.styles([
        'lib/css/basic_site_style.css',
        'lib/css/app.css',
        'lib/css/jquery-ui.css',
        'lib/css/main.css',
        'lib/css/message.css'
    ],'public/css/main.css','resources/assets/');

    mix.styles([
        'lib/css/site_animation.css'
    ],'public/css/site_animation.css','resources/assets/');

    mix.version(["public/css/welcomepage.css","public/css/main.css"]);

    mix.scripts([
        "form-validations.js"
    ],'public/js/form-validations.js','resources/assets/js');

});
