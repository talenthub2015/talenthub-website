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
    mix.less('app.less','resources/assets/lib/css/');

    mix.rubySass('welcomepage.scss','resources/assets/lib/css/');

    mix.styles([
        "lib/css/app.css",
        "lib/css/welcomepage.css",
    ],'public/css/welcomepage.css','resources/assets/');


    mix.sass('main.scss','resources/assets/lib/css/');
    mix.sass('site_animation.scss','resources/assets/lib/css/');
    mix.sass('message.scss','resources/assets/lib/css/');
    mix.sass('emails.scss','resources/assets/lib/css/');
    mix.sass('form-styles.scss','resources/assets/lib/css/');
    mix.sass('media-style-767.scss', 'resources/assets/lib/css/')

    mix.styles([
        'lib/css/app.css',
        'lib/css/jquery-ui.css',
        'lib/css/main.css',
        'lib/css/message.css',
        'lib/css/form-styles.css',
        'lib/css/media-style-767.css'
    ],'public/css/main.css','resources/assets/');

    mix.styles([
        'lib/css/site_animation.css'
    ],'public/css/site_animation.css','resources/assets/');

    mix.styles([
        'lib/css/emails.css'
    ],'public/css/emails.css','resources/assets/');

    mix.version(["public/css/welcomepage.css","public/css/main.css"]);

    mix.scripts([
        "form-validations.js"
    ],'public/js/form-validations.js','resources/assets/js');

    mix.scripts(['lodash.js'], 'public/js/lodash.js', 'node_modules/lodash');
});
