/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
const VueFormulate = require('@braid/vue-formulate');

window.Vue = require('vue').default;

Vue.use(VueFormulate.default)

import VueI18n from "vue-i18n"

Vue.use(VueI18n)
const i18n = new VueI18n({
  locale: __locale,
  messages: {
    ja : require('../lang/ja.json'),
    en : require('../lang/en.json')
  }
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('movie-list', require('./components/MoviePlayer/MovieList').default)
Vue.component('file-upload', require('./components/FileUpload.vue').default);
Vue.component('file-upload-not-preview', require('./components/FileUploadNoPreview.vue').default);
Vue.component('search-lessons', require('./components/SearchLessons/SearchLessons.vue').default);
Vue.component('search-advisers', require('./components/SearchAdvisers/SearchAdvisers').default)
Vue.component('language-select', require('./components/SelectWithModal/LanguageSelect').default)
Vue.component('category-select', require('./components/SelectWithModal/CategorySelect').default)
Vue.component('language-select-multi', require('./components/SelectWithModal/LanguageSelectMulti').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.Cookies = require('js-cookie')

const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone

// タイムゾーンがブラウザの既定と違う場合は、クッキーをセットして再読み込み
if (Cookies.get('timezone') !== timezone) {
    Cookies.set('timezone', timezone)
    // noinspection SillyAssignmentJS
    location.href = location.href
}

const app = new Vue({
    el: '#app',
    i18n,
});
