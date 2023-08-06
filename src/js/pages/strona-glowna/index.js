(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 15,
        responsiveClass: true,
        nav: true,
        navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: true
            },
            1000: {
                items: 3,
                nav: true,
                loop: false
            },
            1200: {
                items: 4,
                nav: false,
                loop: false
            }
        }
    })
})();




