require("./bootstrap");

require("alpinejs");

import axios from "axios";
//const mix = require('laravel-mix');
// app.js
// window.Vue = require('vue').default;

// Vue.component('province', require('./vue/province.vue').default);

// const app = new Vue({
//   el: '#province'
// });

window.host = "http://localhost:8000";

import Vue from "vue";

Vue.component("province", require("./components/province.vue").default);

// creating a vue instance
const app = new Vue({
    el: "#app",
    data: {
        name: "",
    },
    methods: {
        addCategory: function() {

            axios
                .post(host + "/category", {
                    "name" : this.name,
                    "slug" : this.name,

                })
                .then(response => {
                    console.log("There was an response!", response);
                })
                .catch(error => {
                    console.log("There was an error!", error);
                });
        }
    }
});
