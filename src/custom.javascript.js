(function () {
    if (window.location.pathname === '/') {
        window.addEventListener('scroll', (event) => {
            const btnscroll = document.querySelector('#float-btn');
            const scrolledBox = document.querySelector('#co-dobrego-firmie').offsetTop;
            const scrollValue = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollValue > scrolledBox) {
                btnscroll.classList.add("scrolled");
            } else {
                btnscroll.classList.remove("scrolled");
            }
        });
        let btnremovescroll = document.querySelector('#widget-right-btn-close');
        let widgetbox = document.querySelector('#widget-float-right-box');
        btnremovescroll.addEventListener('click', function () {
            widgetbox.classList.add('remove-scroll');
        });
    }
    // Show more faq list
    const faqlist = document.getElementById('show-more-faq');
    if (faqlist) {
        const faqbutton = document.getElementById('show-more-faq');
        faqbutton.addEventListener('click', function () {
            const items = document.querySelectorAll('.faq-hide');
            items.forEach(item => {
                item.style.display = 'block';
            });
            faqbutton.style.display = 'none';
        });
    }
    // Owl Carousel Slider with youtube films testmonials
    var testmonials = $("#testmonials");
    if (testmonials.length && $.fn && $.fn.owlCarousel) {
        testmonials.owlCarousel({
        //loop: true,
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
                items: 3,
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
    }
    // Open youtube testmonials on modal
    const $modalVideo = jQuery('#ModalVideo');
    const $video = jQuery('#video');

    $modalVideo.on('show.bs.modal', function (e) {
        const src = jQuery(e.relatedTarget).data('src');
        if (!src) return;
        const separator = src.indexOf('?') === -1 ? '?' : '&';
        $modalVideo.addClass('is-loading');
        $video.attr('src', src + separator + 'rel=0&controls=1&autoplay=1');
    });

    $video.on('load', function () {
        if ($video.attr('src')) {
            $modalVideo.removeClass('is-loading');
        }
    });

    // Pusty src, żeby poprzedni film nie mignął przy otwarciu kolejnego
    $modalVideo.on('hidden.bs.modal', function () {
        $video.attr('src', '');
        $modalVideo.removeClass('is-loading');
    });
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