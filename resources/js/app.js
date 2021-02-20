require('./bootstrap');

require('alpinejs');


import Vue from 'vue';
import swal from 'sweetalert';

import  toast from 'vue-toastr';

window.Vue = require('vue');
Vue.use(toast);

Vue.component('example-component',require('./components/ExampleComponent.vue').default);
Vue.component('register-component',require('./components/Auth/RegisterComponent.vue').default);
Vue.component('login-component',require('./components/Auth/LoginComponent.vue').default);
Vue.component('post-component',require('./components/Blog/PostComponent.vue').default);
Vue.component('comment-component',require('./components/Blog/Comment.vue').default);
Vue.component('details-component',require('./components/Blog/DetailsComponent.vue').default);
Vue.component('product-component',require('./components/product/product.vue').default);
Vue.component('category-component',require('./components/Category/Category.vue').default);
Vue.component('newproduct-component',require('./components/product/NewProduct.vue').default);
Vue.component('panel-component',require('./components/product/panel.vue').default);
Vue.component('sr-component',require('./components/Search/search.vue').default);

const app = new Vue({
    el: '#app'
});
const panel = new Vue({
    el: '#panel'
});
