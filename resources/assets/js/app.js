
require('./bootstrap')

window.Vue = require('vue')

const app = new Vue({
    el: '#vue-root'
})

import Swiper from 'swiper';

var swiper = new Swiper('.swiper-container', {
    slidesPerView: 'auto',
    centeredSlides: true,
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    autoplay: true,
});
