
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import transFilter from 'vue-trans';
Vue.use(transFilter);

import vSelect from 'vue-select';
Vue.component('v-select', vSelect);


import datepicker from 'vue-date';
Vue.component('vue-date', datepicker);


Vue.prototype.trans = (key) => {
    return _.get(window.trans, key, key);
};
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/ExampleComponent.vue'));
// Vue.component('users', require('./components/Users.vue'));
Vue.component('profileInfo', require('./components/profile/profileInfo.vue'));
Vue.component('personal-info', require('./components/profile/personalInfo.vue'));
Vue.component('change-password', require('./components/profile/changePassword.vue'));



const app = new Vue({
    el: '#app',
    // dosearch:'',
    // result:[],
    // methods: {
    //     autoSearch(){
    //         this.results=[];
    //        // alert(this.dosearch);
    //         axios.post('/doSearch',{
    //             dosearch:this.dosearch
    //         })
    //             .then(function (resp) {
    //
    //
    //
    //
    //
    //             })
    //             .catch(function (resp) {
    //                 console.log(resp);
    //                 app.result=resp.data;
    //                 // alert(app.result.length);
    //
    //             });
    //     }
    // }
});


