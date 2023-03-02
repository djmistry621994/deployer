const paths = require('../constant.mix');
const mix = require('laravel-mix');

mix.scripts([
    `${paths.ADMIN_VENDOR_JS_URL}jquery.min.js`,
    `${paths.ADMIN_VENDOR_JS_URL}bootstrap.bundle.min.js`,
    `${paths.ADMIN_VENDOR_JS_URL}simplebar.min.js`,
    `${paths.ADMIN_VENDOR_JS_URL}jquery-scrollLock.min.js`,
    `${paths.ADMIN_VENDOR_JS_URL}jquery.appear.min.js`,
    `${paths.ADMIN_VENDOR_JS_URL}js.cookie.min.js`,
    `${paths.ADMIN_VENDOR_JS_URL}app.min.js`,
    `${paths.ADMIN_VENDOR_JS_URL}jquery.dataTables.min.js`,
    `${paths.ADMIN_VENDOR_JS_URL}dataTables.bootstrap4.min.js`,
    `${paths.ADMIN_VENDOR_JS_URL}jquery.validate.min.js`,
], paths.PUBLIC_JS_PATH + 'vendors.js');

mix.js([
    paths.ADMIN_JS_URL + 'common/enums.js',
    paths.ADMIN_JS_URL + 'common/validate.js',
    paths.ADMIN_JS_URL + 'common/datatable.js',
    paths.ADMIN_JS_URL + 'common/index.js',
], paths.PUBLIC_JS_PATH + 'common.js');

mix.js(paths.ADMIN_JS_URL + 'login.js', paths.PUBLIC_JS_ADMIN_PATH + 'login.js');

mix.js(paths.ADMIN_JS_URL + 'companies.js', paths.PUBLIC_JS_ADMIN_PATH + 'companies.js');
mix.js(paths.ADMIN_JS_URL + 'company_create.js', paths.PUBLIC_JS_ADMIN_PATH + 'company_create.js');
