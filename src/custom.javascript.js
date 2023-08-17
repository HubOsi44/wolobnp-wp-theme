(function () {
    // window.addEventListener('scroll', (event) => {
    //     var btnscroll = document.querySelector('#top-header');
    //     var scrollValue = window.pageYOffset || document.documentElement.scrollTop;
    //     if (scrollValue > 0) {
    //         btnscroll.classList.add("sticky");
    //     } else {
    //         btnscroll.classList.remove("sticky");
    //     }
    // });

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
    // Owl Carousel Slider with youtube films testmonials
    var testmonials = $("#testmonials");
    testmonials.owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsiveClass: true,
        navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false
            },
            1200: {
                items: 3,
                nav: false
            },
            1700: {
                items: 4,
                nav: false
            }
        }
    });
    // Custom Button
    $('.owl-custom-btn-next').click(function () {
        testmonials.trigger('next.owl.carousel');
    });
    $('.owl-custom-btn-prev').click(function () {
        testmonials.trigger('prev.owl.carousel');
    });
    // Open youtube testmonials on modal
    let $videoSrc;
    jQuery('.video-btn').click(function () {
        $videoSrc = jQuery(this).data("src");
    });
    jQuery('#ModalVideo').on('shown.bs.modal', function (e) {
        jQuery("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
    });
    jQuery('#ModalVideo').on('hide.bs.modal', function (e) {
        jQuery("#video").attr('src', $videoSrc);
    });
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
    // Copy form 
    // let template = $('#acceptance-template-wrap .acceptance-template');
    // template.clone().appendTo( "#form-check-input-637 label span.wpcf7-list-item-label" );
    //mytemplate.insertAfter('#form-check-input-637 label span.wpcf7-list-item-label');
})();




