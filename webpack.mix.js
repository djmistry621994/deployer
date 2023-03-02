const mix = require('laravel-mix');
//css
require('./webpack/css/admin.mix');
require('./webpack/css/front.mix');
//js
require('./webpack/js/admin.mix');
require('./webpack/js/front.mix');

mix.version();
