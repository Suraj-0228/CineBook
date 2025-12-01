$(document).ready(function () {
    // Offer Image Slider {home.php}
    $(document).ready(function () {
        $('.offer-slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3500,
            dots: true,
            arrows: true,
            infinite: true,
            pauseOnHover: true,
            responsive: [
                {
                    breakpoint: 992, // tablets
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768, // mobile
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
});