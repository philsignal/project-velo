import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import 'slick-carousel/slick/slick';

jQuery(document).ready(function ($) {
    // console.log("loaded.");
    $('.slick-slider-container').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        dots: true,
        autoplaySpeed: 3000, // timeout between each slide
        speed:600, // slide transition speed
        // centerMode: false,
        // adaptiveHeight: false,
        // variableWidth: false,
        // swipe: true,
    });

});