$(document).ready(function () {
    // Hero Slider {home.php}
    $('.hero-slider').slick({
        arrows: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                arrows: false
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
                arrows: false
            }
        },
        {
            breakpoint: 575,
            settings: {
                slidesToShow: 1,
                arrows: false
            }
        }
        ]
    });
    // Offer Image Slider {home.php}
    $('.img-slider').slick({
        slidesToShow: 2,        // Show 2 on desktop
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        responsive: [
            {
                breakpoint: 768,    // Below 768px (mobile)
                settings: {
                    slidesToShow: 1,  // Show 1 on mobile
                    arrows: false,
                    centerMode: true
                }
            }
        ]
    });
});