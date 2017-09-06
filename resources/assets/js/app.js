
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Buefy from 'buefy';


Vue.use(Buefy);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('ingredient', require('./components/Ingredient.vue'));
Vue.component('categories', require('./components/Category.vue'));
Vue.component('drop', require('./components/Drop.vue'));
Vue.component('anlass', require('./components/Anlass.vue'));
Vue.component('amount', require('./components/Amount.vue'));
Vue.component('test', require('./components/Test.vue'));
Vue.component('tag', require('./components/Tag.vue'));
Vue.component('clock', require('./components/Clock.vue'));

const app = new Vue({
    el: '#app'
});

