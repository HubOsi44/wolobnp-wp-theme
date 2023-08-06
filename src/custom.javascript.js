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
    // Add data-toggle to link menu
    $('#menu-item-178').find('a').attr('data-bs-toggle', 'modal');
    $('#menu-item-178').find('a').attr('data-bs-target', '#offerformModal');
})();




