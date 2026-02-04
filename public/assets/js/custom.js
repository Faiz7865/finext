$(document).ready(function () {
    
    // Logo Slider
    $('.fnx-slick-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: false,
        infinite: true,
        speed: 500,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    // Testimonial Slider
    $("#testimonial-slider").slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 1000,
        arrows: false,
        dots: false,
        infinite: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    // Counter Animation
    $('.timer').each(function () {
        var $this = $(this);
        var countTo = $this.data('to');
        
        $({ countNum: 0 }).animate(
            { countNum: countTo },
            {
                duration: 4000,
                easing: 'swing',
                step: function () {
                    $this.text(Math.ceil(this.countNum));
                },
                complete: function () {
                    $this.text(countTo);
                }
            }
        );
    });
});