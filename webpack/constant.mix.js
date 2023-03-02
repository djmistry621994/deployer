//resources path
const RESOURCE_URL = 'resources/';
const ASSET_URL = `${RESOURCE_URL}assets/`;

const CSS_URL = `${ASSET_URL}css/`;
const ADMIN_CSS_URL = `${CSS_URL}admin/`
const ADMIN_VENDOR_CSS_URL = `${ADMIN_CSS_URL}vendor/`

const JS_URL = `${ASSET_URL}js/`;
const ADMIN_JS_URL = `${JS_URL}admin/`;
const ADMIN_VENDOR_JS_URL = `${ADMIN_JS_URL}vendor/`;

//public path
const PUBLIC_PATH = 'public/resources/';
const PUBLIC_CSS_PATH = PUBLIC_PATH + 'css/';
const PUBLIC_JS_PATH = PUBLIC_PATH + 'js/';
const PUBLIC_JS_ADMIN_PATH = PUBLIC_JS_PATH + 'admin/';

module.exports = {
    RESOURCE_URL,
    ASSET_URL,

    CSS_URL,
    ADMIN_CSS_URL,
    ADMIN_VENDOR_CSS_URL,

    JS_URL,
    ADMIN_JS_URL,
    ADMIN_VENDOR_JS_URL,

    PUBLIC_PATH,
    PUBLIC_CSS_PATH,
    PUBLIC_JS_PATH,
    PUBLIC_JS_ADMIN_PATH,
};
