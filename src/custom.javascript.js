(function () {
    window.addEventListener('scroll', (event) => {
        var btnscroll = document.querySelector('#top-header');
        var scrollValue = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollValue > 0) {
            btnscroll.classList.add("sticky");
        } else {
            btnscroll.classList.remove("sticky");
        }
    });

    // Owl slider houses
    $(".owl-slider-houses").each(function () {
        var $this = $(this);
        $this.owlCarousel({
            loop: true,
            lazyLoad: true,
            margin: 30,
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
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true
                },
                1500: {
                    items: 1,
                    nav: true,
                    loop: true
                },
                1700: {
                    items: 1,
                    nav: true,
                    loop: true
                }
            }
        });
    });
    var maincats = $("#maincats");
    maincats.owlCarousel({
        loop: true,
        margin: 30,
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
                items: 2,
                nav: true
            },
            1000: {
                items: 2,
                nav: true,
                loop: false
            },
            1500: {
                items: 3,
                nav: true,
                loop: false
            },
            1700: {
                items: 4,
                nav: true,
                loop: false
            }
        }
    });
    var logotypes = $("#slider-offer");
    logotypes.owlCarousel({
        loop: true,
        lazyLoad: true,
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
                lazyLoad: true,
                nav: true
            },
            600: {
                items: 1,
                lazyLoad: true,
                nav: true
            },
            1000: {
                items: 1,
                nav: true,
                lazyLoad: true,
                loop: false
            },
            1200: {
                items: 1,
                lazyLoad: true,
                nav: true,
                loop: true
            },
            1700: {
                items: 1,
                lazyLoad: true,
                nav: true,
                loop: true
            }
        }
    });
    //Qookie
    var sName = "cookiesok";
    $("#close-cookie-warn").click(function () {
        var oExpire = new Date();
        oExpire.setTime((new Date()).getTime() + 3600000 * 24 * 365);
        document.cookie = sName + "=1;expires=" + oExpire;
        $("#cookie-warn").hide("slow");
    });
    var sStr = '; ' + document.cookie + ';';
    var nIndex = sStr.indexOf('; ' + escape(sName) + '=');
    if (nIndex === -1) {
        $("#cookie-warn").show();
    }

    // Scroll Counter number
    if (window.location.pathname === '/') {
        var counted = 0;
        $(window).scroll(function () {

            var oTop = $('#counter').offset().top - window.innerHeight;

            if (counted == 0 && $(window).scrollTop() > oTop) {
                $('.count').each(function () {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                        countNum: countTo
                    },
                        {
                            duration: 2000,
                            easing: 'swing',
                            step: function () {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function () {
                                $this.text(this.countNum);
                                //console.log(countTo);
                            }
                        });
                });
                counted = 1;
            }
        });
    }

    // Add data-toggle to link menu
    $('#menu-item-178').find('a').attr('data-bs-toggle', 'modal');
    $('#menu-item-178').find('a').attr('data-bs-target', '#offerformModal');
})();




