/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import { createApp } from 'vue';
import ContactPage from './components/ContactPage';

createApp({
    components: {
        ContactPage
    }
}).mount('#app')
