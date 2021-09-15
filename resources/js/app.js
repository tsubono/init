/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const VueFormulate = require('@braid/vue-formulate');

window.Vue = require('vue').default;

Vue.use(VueFormulate.default)

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
Vue.component('lesson-form-language-select', require('./components/LessonForm/LessonFormLanguageSelect').default)
Vue.component('lesson-form-category-select', require('./components/LessonForm/LessonFormCategorySelect').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
