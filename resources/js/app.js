
require('./bootstrap');

window.Vue = require('vue');


Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('demo-component', require('./components/DemoComponent.vue').default);
Vue.component('form2-component', require('./components/FormComponent.vue').default);

const app = new Vue({
    el: '#app'
});
