import '@fortawesome/fontawesome-free/js/all.js';
import './bootstrap';

//ここを追記
import './users';

import jQuery from 'jquery';
window.$ = jQuery;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
