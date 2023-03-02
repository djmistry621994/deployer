const paths = require('../constant.mix');
const mix = require('laravel-mix');

mix.styles([
    `${paths.ADMIN_VENDOR_CSS_URL}dataTables.bootstrap4.css`,
    `${paths.ADMIN_VENDOR_CSS_URL}buttons.bootstrap4.min.css`,
    `${paths.ADMIN_VENDOR_CSS_URL}style.min.css`
], paths.PUBLIC_CSS_PATH + 'vendors.css');

mix.sass(paths.ADMIN_CSS_URL + 'custom.scss', paths.PUBLIC_CSS_PATH + 'custom.css');

mix.copy(paths.ASSET_URL + 'fonts', paths.PUBLIC_PATH + 'fonts');
mix.copy(paths.ASSET_URL + 'images', paths.PUBLIC_PATH + 'images');
