window.Vue = require('vue');
window.axios = require('axios');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//component parent dal quale compilerò tutto quello che mi serve per la mia applicazione
import App from './components/App.vue';

const app = new Vue({
    el: '#root',
    render: h=>h(App)
});

    const navbar = document.querySelector('.fixed-top');
    const hiddenNav = document.querySelector('.my_hidden');
    const toggler = document.querySelector('.fa-bars');
    const menuToggler = document.querySelector('#navbarToggleExternalContent');
    const linkToggler = document.querySelector('.toggler-link');
    const linkToggler2 = document.querySelector('.toggler-link-2');
    const linkToggler3 = document.querySelector('.toggler-link-3');
    const searchIcon = document.querySelector('.fa-search');
    const mailIcon = document.querySelector('.fa-envelope');
    const userIcon = document.querySelector('.user-icon');
    window.onscroll = () => {
        if (window.scrollY > 80) {
            navbar.classList.add('nav-active');
            navbar.classList.remove('navbar-dark');
            navbar.classList.add('navbar-light');
            hiddenNav.classList.remove('show');
            toggler.classList.add('my_blue');
            menuToggler.classList.remove('my_bg-black');
            menuToggler.classList.add('my_bg-white');
            linkToggler.classList.remove('text-light');
            linkToggler.classList.add('text-dark');
            linkToggler2.classList.remove('text-light');
            linkToggler2.classList.add('text-dark');
            linkToggler3.classList.remove('text-light');
            linkToggler3.classList.add('text-dark');
            searchIcon.classList.add('my_black-text');
            mailIcon.classList.add('my_black-text');
            userIcon.classList.add('my_black-text');
            userIcon.classList.remove('text-light');
        } else {
            navbar.classList.remove('nav-active');
            navbar.classList.add('navbar-dark');
            navbar.classList.remove('navbar-light');
            toggler.classList.remove('my_blue');
            menuToggler.classList.remove('my_bg-white');
            menuToggler.classList.add('my_bg-black');
            linkToggler.classList.remove('text-dark');
            linkToggler.classList.add('text-light');
            linkToggler2.classList.remove('text-dark');
            linkToggler2.classList.add('text-light');
            linkToggler3.classList.remove('text-dark');
            linkToggler3.classList.add('text-light');
            searchIcon.classList.remove('my_black-text');
            mailIcon.classList.remove('my_black-text');
            userIcon.classList.remove('my_black-text');
            userIcon.classList.add('text-light');
        }
    };

    window.onresize = () => {
        if (window.innerWidth >= 576) {
            hiddenNav.classList.remove('show')
        }
    };