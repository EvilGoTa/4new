var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.sass('app.scss');
});

elixir(function(mix) {
    var vendor_path = 'vendor/blueimp/jquery-file-upload/';
    var public_path = 'public/css/fileupload/';
    mix.copy(vendor_path+'css/jquery.fileupload-noscript.css', public_path+'jquery.fileupload-noscript.css');
    mix.copy(vendor_path+'css/jquery.fileupload-ui-noscript.css', public_path+'jquery.fileupload-ui-noscript.css');
    mix.copy(vendor_path+'css/jquery.fileupload-ui.css', public_path+'jquery.fileupload-ui.css');
    mix.copy(vendor_path+'css/jquery.fileupload.css', public_path+'jquery.fileupload.css');
});

elixir(function(mix) {
    var vendor_path = 'vendor/blueimp/jquery-file-upload/';
    var public_path = 'public/js/fileupload/';
    mix.copy(vendor_path+'js/jquery.iframe-transport.js', public_path+'jquery.iframe-transport.js');
    mix.copy(vendor_path+'js/jquery.fileupload.js', public_path+'jquery.fileupload.js');
    mix.copy(vendor_path+'js/jquery.fileupload-process.js', public_path+'jquery.fileupload-process.js');
    mix.copy(vendor_path+'js/jquery.fileupload-image.js', public_path+'jquery.fileupload-image.js');
    mix.copy(vendor_path+'js/jquery.fileupload-video.js', public_path+'jquery.fileupload-video.js');
    mix.copy(vendor_path+'js/jquery.fileupload-validate.js', public_path+'jquery.fileupload-validate.js');
    mix.copy(vendor_path+'js/vendor/jquery.ui.widget.js', public_path+'/vendor/jquery.ui.widget.js');
    mix.copy(vendor_path+'js/jquery.fileupload-ui.js', public_path+'/jquery.fileupload-ui.js');
});