/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { forEach } = require('lodash');

require('./bootstrap');

// window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('[name=outfit_about]')) {
        $('[name=outfit_about]').summernote();
    }
});


document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('#root')) {
        const url = apiUrl + '/' + location.hash.substr(1);
        request(url);
    }
});

window.addEventListener("hashchange", () => {
    const url = apiUrl + '/' + location.hash.substr(1);
    request(url);
});

const request = (url) => {
    const root = document.querySelector('#root');
    axios.get(url, {})
        .then(function(response) {
            root.innerHTML = response.data.html;
            hydrationPagination(root);
        })
        .catch(function(error) {
            console.log(error);
        });
}

const postRequest = (url, data) => {
    axios.post(url, data)
        .then(function(response) {
            window.location.hash = response.data.hash;
        })
        .catch(function(error) {
            console.log(error);
        });
}


const hydrationPagination = node => {
    node.querySelectorAll('a.page-link').forEach(a => {
        a.addEventListener('click', e => {
            e.preventDefault();
            const url = e.target.getAttribute('href');
            request(url);
        })
    })
    node.querySelectorAll('button.btn').forEach(b => {
        b.addEventListener('click', () => {
            const form = b.closest('form');
            const url = form.getAttribute('action');
            const data = {};
            form.querySelectorAll('[name]').forEach(i => {
                data[i.getAttribute('name')] = i.value;
            })
            postRequest(url, data);
        })
    })
}