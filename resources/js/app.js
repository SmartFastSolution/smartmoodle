/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//require('./wordfind');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import draggable from "vuedraggable";
Vue.component('draggable', draggable);
// import select2 from 'v-select2-component';
// Vue.component('select2', select2);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('drag-component', require('./components/DragComponent.vue').default);
//Vue.component('letra-component', require('./components/LetraComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

if(document.getElementById('app')){
        const app = new Vue({
    		el: '#app',
		}); 
                }
if(document.getElementById('tallerlist')){
  require('./talleres');   
                }

if(document.getElementById('cruc')){
           require('./crucigrama');  
                }





