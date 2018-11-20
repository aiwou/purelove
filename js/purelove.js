jQuery(document).ready(function ($) {
    $('#aio_swc span').mouseover(function () {
        $(this).addClass("on").siblings().removeClass();
        $("." + $(this).attr("id")).fadeIn(650).siblings().hide();
    });
    $('.menu li').hover(function () {
        $(this).find('ul:first').slideDown(200);
        $(this).addClass("hover");
    }, function () {
        $(this).find('ul').css('display', 'none');
        $(this).removeClass("hover");
    });

    function hide_submenu() {
        $('.menu li li').find('ul').css('display', 'none');
    }

    $('.menu li li:has(ul)').find("a:first").append(" &raquo; ");
    document.onclick = hide_submenu;


    tooltip();

    jQuery('#bak_top').click(function () {
        jQuery('html,body').animate({scrollTop: '0px'}, 800);
    });


    jQuery('.postspicbox a img').hover(
        function () {
            jQuery(this).fadeTo("fast", 0.6);
        },
        function () {
            jQuery(this).fadeTo("fast", 1);
        });

    function d() {
        document.title = document[b] ? "人呢? 快回来" : a
    }

    var b, c, a = document.title;
    "undefined" != typeof document.hidden ? (b = "hidden", c = "visibilitychange") : "undefined" != typeof document.mozHidden ? (b = "mozHidden", c = "mozvisibilitychange") : "undefined" != typeof document.webkitHidden && (b = "webkitHidden", c = "webkitvisibilitychange"), ("undefined" != typeof document.addEventListener || "undefined" != typeof document[b]) && document.addEventListener(c, d, !1)

    // 代码高亮
    codeHighlight();

    $(document).on('pjax:send', function () {
        NProgress.start(); // 加载动画效果开始
    });
    $(document).on('pjax:complete', function () {
        pjaxComplete();
    });

    $(document).on('submit', 'form[data-pjax]', function (event) {
        $.pjax.submit(event, '#content', {
            fragment: '#content',
            timeout: 8000,
        });
    });
    // input
    POWERMODE.colorful = true; // make power mode colorful 颜色
    POWERMODE.shake = true; // turn off shake 振动
    document.body.addEventListener('input', POWERMODE);

    var typed = new Typed('#typed', {
        stringsElement: '#daily-sentence',
        typeSpeed: 30,
        backSpeed: 10,
        backDelay: 3000,
        loop: true,
    });
});

function pjaxComplete() {
    NProgress.done(); // 加载动画效果结束
    // 重新加载代码高亮
    codeHighlight();
    openNew();
    banner();
    tooltip();
}

window.onscroll = function () {
    document.documentElement.scrollTop + document.body.scrollTop > 100 ? document.getElementById("bak_top").style.display = "block" :
        document.getElementById("bak_top").style.display = "none";
};


// 本站运行时长
var startAt;

function durationTime(at) {
    startAt = at;
    window.setTimeout("durationTime(startAt)", 1000);
    var BirthDay = new Date(at); // 建站日期
    var today = new Date();
    var timeold = (today.getTime() - BirthDay.getTime());
    var msPerDay = 24 * 60 * 60 * 1000;
    var e_daysold = timeold / msPerDay;
    var daysold = Math.floor(e_daysold);
    var e_hrsold = (daysold - e_daysold) * -24;
    var hrsold = Math.floor(e_hrsold);
    var e_minsold = (hrsold - e_hrsold) * -60;
    var minsold = Math.floor((hrsold - e_hrsold) * -60);
    var seconds = Math.floor((minsold - e_minsold) * -60);
    if (minsold < 10) {
        minsold = '0' + minsold;
    }
    if (seconds < 10) {
        seconds = '0' + seconds;
    }
    duration.innerHTML = daysold + "天" + hrsold + "小时" + minsold + "分" + seconds + "秒";
}


function banner() {
    // 幻灯片
    $("#slider").responsiveSlides({
        auto: true,
        nav: true,
        speed: 500,
        pauseControls: true,
        pager: true,
        manualControls: "auto",
        namespace: "slide"
    });
    //幻灯片导航
    $(".mySliderBar").hover(function () {
        $(".slide_nav").fadeIn(200)
    }, function () {
        $(".slide_nav").fadeOut(200)
    });
}

function codeHighlight() {
    $('pre code').each(function (i, block) {
        hljs.highlightBlock(block);
    });
}

function tooltip() {
    $("body *").each(function (b) {
        if (this.title) {
            var c = this.title;
            var a = 30;
            $(this).mouseover(function (d) {
                this.title = "";
                $("body").append('<div id="tooltip">' + c + "</div>");
                $("#tooltip").css({
                    left: (d.pageX + a) + "px",
                    top: d.pageY + "px",
                    opacity: "0.8"
                }).show(250)
            }).mouseout(function () {
                this.title = c;
                $("#tooltip").remove()
            }).mousemove(function (d) {
                $("#tooltip").css({
                    left: (d.pageX + a) + "px",
                    top: d.pageY + "px"
                })
            })
        }
    })
}