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
        margin: 15,
        nav: true,
        responsiveClass: true,
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
                nav: true
            },
            1200: {
                items: 3,
                nav: true
            },
            1700: {
                items: 4,
                nav: true
            }
        }
    });
    // Custom Button
    $('.customNextBtn').click(function () {
        testmonials.trigger('next.owl.carousel');
    });
    $('.customPreviousBtn').click(function () {
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
})();




