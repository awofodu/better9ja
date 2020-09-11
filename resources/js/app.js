/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

import Gate from './Gate';
Vue.prototype.$gate = new Gate(window.user);

import VueRouter from 'vue-router';
Vue.use(VueRouter);

let routes = [
    /////investor route
    { path: '/dashboard', name: 'myDashboard', component: require('./components/investor/dashboard/Index').default },
    { path: '/investments', name: 'allInvestments', component: require('./components/investor/investment/Index').default },
    { path: '/investment/merges/:id', name: 'investmentMerges', component: require('./components/investor/investment/Merge').default },
    { path: '/invest', name: 'createInvestment', component: require('./components/investor/investment/Create').default },
    { path: '/withdrawals', name: 'allWithdrawals', component: require('./components/investor/withdrawal/Index').default },
    { path: '/withdrawal/merges/:id', name: 'withdrawalMerges', component: require('./components/investor/withdrawal/Merge').default },
    { path: '/maintenance/merges/:id', name: 'maintenanceMerges', component: require('./components/investor/investment/MaintenanceMerge').default },
    { path: '/referral/merges/:id', name: 'referralMerges', component: require('./components/investor/referral/Merge').default },
    { path: '/recommit/:id', name: 'recommitWithdrawal', component: require('./components/investor/investment/Recommit').default },
    { path: '/referrals', name: 'allReferrals', component: require('./components/investor/referral/Index').default },
    { path: '/transactions', name: 'allTransactions', component: require('./components/investor/transaction/Index').default },
    { path: '/profile', name: 'editProfiles', component: require('./components/investor/profile/Index').default },
    { path: '/change-password', name: 'changePassword', component: require('./components/investor/profile/Password').default },
    { path: '/activate-account', name: 'activateAccount', component: require('./components/investor/profile/Activation').default },
    { path: '/testimonies', name: 'myTestimonies', component: require('./components/investor/testimony/Index').default },
    { path: '/generals', component: require('./components/General').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/admin/investors', name: 'allInvestors', component: require('./components/admin/investors/Index').default },
    { path: '/admin/investments', name: 'investorInvestments', component: require('./components/admin/investments/Index').default },
    { path: '/admin/withdrawals', name: 'investorWithdrawals', component: require('./components/admin/withdrawal/Index').default },
    { path: '/admin/maintenances', name: 'investorMaintenances', component: require('./components/admin/maintenance/Index').default },
    { path: '/admin/manage-admin', name: 'manageAdmin', component: require('./components/admin/manage/Create').default },
    { path: '/admin/reports', name: 'allReports', component: require('./components/admin/messages/Report').default },
    { path: '/admin/messages', name: 'allMessages', component: require('./components/admin/messages/Index').default },
    { path: '/admin/testimonies', name: 'allTestimonies', component: require('./components/admin/manage/Testimony').default },

];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

import VueProgressBar from 'vue-progressbar';
const options = {
    color: '#26b575',
    failedColor: '#874b4b',
    thickness: '4px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 800
    },
    autoRevert: true,
    location: 'top',
    inverse: false,
    autoFinish: false,
};
Vue.use(VueProgressBar, options);

import swal from 'sweetalert2';
window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timerProgressBar: true,
    timer: 4000
});
window.toast = toast;

window.Fire = new Vue();

import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);


import { ToggleButton } from 'vue-js-toggle-button';
Vue.component('ToggleButton', ToggleButton);

var moment = require('moment-timezone');
Vue.filter('myDate',  function (date) {
    return moment(date).toISOString().tz('Africa/Lagos').format('YYYY-MM-DD hh:mm:ss');
});

Vue.filter('myDateAddHours',  function (date) {
    return moment(date).toISOString().tz('Africa/Lagos').add(24, 'h').format('YYYY-MM-DD hh:mm:ss');
});

Vue.filter('myDateWithTime',  function (date) {
    return moment(date).format('dddd Do MMMM, YYYY [at] hh:mm A');
});

Vue.filter('shortDateWithTime',  function (date) {
    return moment(date).format('ddd Do MMM, YYYY [at] hh:mm A');
});

Vue.filter('isPast',  function (date) {
    return moment().isSameOrAfter(date);
});

Vue.filter('isFuture',  function (date) {
    return moment().isBefore(date);
});

Vue.filter('capFirstText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
});


Vue.component('pagination', require('laravel-vue-pagination'));

import VueSession from 'vue-session';
Vue.use(VueSession);

import VueCookies from 'vue-cookies';
Vue.use(VueCookies);

import Calendar from 'v-calendar/lib/components/calendar.umd';
import DatePicker from 'v-calendar/lib/components/date-picker.umd';
Vue.component('calendar', Calendar);
Vue.component('date-picker', DatePicker);

import Vuetable from 'vuetable-2'

import VueLazyload from 'vue-lazyload'
Vue.use(VueLazyload);

// Import component
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';

Vue.use(Loading, {
    // props
    color: '#3699FF',
    // Optional parameters
    // container: this.fullPage ? null : this.$refs.formContainer,
    // canCancel: true,
    // onCancel: this.onCancel,
},{
    // slots
})


import Vue from 'vue'
import vueDebounce from 'vue-debounce'

// Or if you want to pass in the lock option
Vue.use(vueDebounce, {
    lock: false,
    listenTo: 'keyup', //@change is another option
    defaultTime: '300ms',
    fireOnEmpty: false
});

import VueClipboard from 'vue-clipboard2'
Vue.use(VueClipboard);

import VueNumeric from 'vue-numeric'
Vue.use(VueNumeric);

import VueAwesomeSwiper from 'vue-awesome-swiper'
// If you use Swiper 6.0.0 or higher
import 'swiper/swiper-bundle.css'
Vue.use(VueAwesomeSwiper, /* { default options with global component } */)

// global register at main.js
import VueCountdownTimer from 'vuejs-countdown-timer'
Vue.use(VueCountdownTimer);

import vueNumeralFilterInstaller from 'vue-numeral-filter';
Vue.use(vueNumeralFilterInstaller, { locale: 'en-gb' });


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('switches', require('./components/admin/order/Index.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});
