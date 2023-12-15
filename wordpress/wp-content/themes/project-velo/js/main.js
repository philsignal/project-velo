import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import 'slick-carousel/slick/slick';

jQuery(document).ready(function ($) {
    console.log("loaded");
    $('.slick-slider-container').slick({
        infinite: true,
        slidesToShow: 4,  // Adjust the number of slides displayed at once
        slidesToScroll: 4,
        autoplay: true,
        dots: true,   // Enable autoplay if you want it to automatically slide
        autoplaySpeed: 2000,  // Set the autoplay speed in milliseconds
        responsive: [
            {
                breakpoint: 1024, // break for larger screens
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768, // break for medium screens
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]

    });
    $('.slick-slider-container-main').slick({
        infinite: true,
        slidesToShow: 1,  // Adjust the number of slides displayed at once
        slidesToScroll: 1,
        autoplay: false,   // Enable autoplay if you want it to automatically slide
        autoplaySpeed: 3000,  // Set the autoplay speed in milliseconds
        // Add other options as needed
    });
});