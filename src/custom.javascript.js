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
    var maincats = $("#testmonials");
    maincats.owlCarousel({
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
                items: 3,
                nav: true,
                loop: true
            },
            1700: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });

    // Add data-toggle to link menu
    $('#menu-item-178').find('a').attr('data-bs-toggle', 'modal');
    $('#menu-item-178').find('a').attr('data-bs-target', '#offerformModal');
})();




