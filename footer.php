<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<span class="clearfix"></span>
<div id="bak_top"></div>
<footer class="footer">
    <div class="inner clearfix">
        <div class="fotbox">
            <h3 title="金山词霸 每日一句">每日一句</h3>
            <p>目标并不一定总是用于去达成的，很多时候它仅仅是为了给你方向感。</p>
            <p>A goal is not always meant to be reached, and it often serves simply as som...</p>
        </div>
        <div class="fotbox">
            <h3>版权声明</h3>
            <?php if ($this->options->copyright):?>
                <?php $this->options->copyright(); ?>
            <?php else: ?>
                <p>1.您可自由分发和演绎本站内容，只需保留本站署名且非商业使用(CC BY-NC-SA 3.0 CN)。</p>
                <p>2.本站引用资源会尽最大可能标明出处及著作权所有者，但不能保证对所有资源都可声明上述内容。侵权请联络作者。</p>
            <?php endif; ?>
        </div>
        <div class="fotbox2">
            <h3>我的介绍</h3>
            <?php if ($this->options->selfIntroduction): ?>
                <?php $this->options->selfIntroduction(); ?>
            <?php else: ?>
                <p>
                    <span>· Hoe，男，后端开发</span>
                    <span class='myinfo_pic'>
                        <a href="https://github.com/HoeXHe" target='_blank'><i class='fa fa-github' title='github'></i></a>
                        <a href="https://gitee.com/HoeXhe" target='_blank'><i class='fa fa-git' title='gitee'></i></a>
                        <a href='mailto:i@hoehub.com'><i class='fa fa-envelope-o' title='i@hoehub.com'></i></a>
                    </span>
                </p>
                <p>· BUG制造者 爱打羽毛球</p>
                <p>· 我每天都在思考如何把脑子里的钱存入银行</p>
                <p>· 采得百花成蜜后，为谁辛苦为谁甜。—— 罗隐《蜂》</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="copry clearfix">
        <div class="maxt">
            <div id="copyright">
                <a href="<?php $this->options->siteUrl(); ?>">
                    <i class="fa fa-copyright"></i>
                    <?php echo date('Y');?>
                    <?php $this->options->title(); ?>
                    All rights reserved.
                </a>
                <a href="http://www.miitbeian.gov.cn/" target="_blank">
                    <?php echo $this->options->beiAnCode ? $this->options->beiAnCode() : '桂ICP备16007901号-1'?>
                </a>
            </div>
            <span id="mt">
                <span id="duration"></span>
                <a href="//creativecommons.org/licenses/by-nc-sa/3.0/cn/legalcode" target="_blank">
                    <i class="fa fa-cc"></i>
                </a>
                <a href="http://typecho.org/" rel="external" target="_blank">Powered by Typecho</a>
            </span>
        </div>
    </div>
</footer>
</body>
<!--JQ-->
<script src="//cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/ResponsiveSlides.js/1.55/responsiveslides.min.js"></script>
<script src="//cdn.bootcss.com/highlight.js/9.1.0/highlight.min.js"></script>
<script src="//cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script src="//cdn.bootcss.com/nprogress/0.2.0/nprogress.min.js"></script>
<script src="<?php $this->options->themeUrl('js/purelove.js'); ?>"></script>
<?php if ($this->is('index')):?>
<!--首页才会显示幻灯片-->
<script>
    jQuery(document).ready(function ($) {
        //幻灯片
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
    });
</script>
<?php endif;?>
<script>
    function openNew () { // 从新窗口打开不是本站的链接
        var selector = 'a[href]:not(a[href="#"], a[href^="javascript"], a[href^="mailto"], a[href^="<?php Helper::options()->siteUrl()?>"])';
        $("#article " + selector).each(function (key, item) {
            $(item).attr('target', '_blank');
        });
        $("footer " + selector).each(function (key, item) {
            $(item).attr('target', '_blank');
        });
    }
    $(function () {
        var options = {
            container: '#content',
            fragment: '#content',
            timeout: 8000
        };
        // Pjax
        $(document).pjax('a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"], a[no-pjax])', options);
        durationTime("<?php echo $this->options->startAt ?: '10/01/2016 08:00:00'; ?>");
        openNew();
    });
</script>
<?php if ($this->options->tongJiJs): ?>
<script>
    try {
        <?php $this->options->tongJiJs(); ?>
    } catch (e) {
        console.log("统计代码出错!");
    }
</script>
<?php endif; ?>

<?php $this->footer(); ?>
