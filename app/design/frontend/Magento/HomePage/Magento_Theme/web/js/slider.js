require(['jquery', 'slick'], function ($) {
    $(document).ready(function () {
        $('.carousel-deal-of-day').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            isFinite:true,
        });
    });
});

require(['jquery', 'slick'], function ($) {
    $(document).ready(function () {
        $('.carousel-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            isFinite:true,
        });
    });
});

