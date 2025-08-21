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
    // Movie Card Slider {home.php}
    $('.card-slider').slick({
        arrows: true,
        infinite: false,
        slidesToShow: 5,
        slidesToScroll: 2,
        centermode: true,
        dots: false,
        speed: 300,
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
                slidesToShow: 2,
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
    // Movie Slider {movies.php}
    $('.movie-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
        dots: false,
        infinite: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });
    // Catagory-slider {movies.php}
    $('.catagory-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        arrows: false,
        dots: true,
        autoplay: false,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});