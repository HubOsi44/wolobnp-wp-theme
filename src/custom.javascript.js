(function () {
    window.addEventListener('scroll', (event) => {
        const btnscroll = document.querySelector('#float-btn');
        const widgetscroll = document.querySelector('#widget-float-right-box');
        const scrolledBox = document.querySelector('#co-dobrego-firmie').offsetTop;
        const scrollValue = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollValue > scrolledBox) {
            btnscroll.classList.add("scrolled");
        } else {
            btnscroll.classList.remove("scrolled");
        }
        if (scrollValue > 0) {
            widgetscroll.classList.add("scroll");
        }
    });

    let btnremovescroll = document.querySelector('#widget-right-btn-close');
    let widgetbox = document.querySelector('#widget-float-right-box');
    btnremovescroll.addEventListener('click', function () {
        widgetbox.classList.add('remove-scroll');
    });

    // Owl Carousel Slider with youtube films testmonials
    var testmonials = $("#testmonials");
    testmonials.owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
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
                items: 2,
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
        // jQuery("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=0&amp;showinfo=0");
        jQuery("#video").attr('src', $videoSrc + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1");
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
    // const ip = document.getElementById("name").getAttribute('placeholder');
    // console.log(ip);
    //Scrolltop after clicked btn form
    document.addEventListener('wpcf7mailsent', function (event) {
        const labelsucces = document.querySelector('.wpcf7-response-output');
        const topPos = parseInt(labelsucces.offsetTop) - 550;
        window.scrollTo({ top: topPos, behavior: 'smooth' });
    }, false);
    //Copy to clipboard
    $('.btn-copy-email').click(function () {
        var $this = $(this);
        var originalText = $this.html();
        $this.html('Skopiowane <i class="fa fa-files-o"></i>');
        setTimeout(function () {
            $this.html(originalText)
        }, 5000);
    });
})();