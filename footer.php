<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</section><!-- #content -->
<?php $this->need('sidebar.php'); ?>
</section><!-- #container -->
<span class="clearfix"></span>
<div id="bak_top"></div>
<footer class="footer">
    <div class="inner clearfix footer-top">
        <div class="fotbox">
            <h3 title="金山词霸 每日一句">每日一句</h3>
            <div id="daily-sentence">
                <?php $ICIB = ICIB_API(); ?>
                <p><?php echo property_exists($ICIB, 'content') ? $ICIB->content : ''; ?></p>
                <p><?php echo property_exists($ICIB, 'note') ? $ICIB->note : ''; ?></p>
                <p><?php echo property_exists($ICIB, 'translation') ? $ICIB->translation : ''; ?></p>
            </div>
            <span id="typed"></span>
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
    <div class="copry clearfix footer-bottom">
        <div id="copyright">
            <i class="fa fa-copyright"></i>
            <?php echo $this->options->startAt ? date('Y', strtotime($this->options->startAt)) . ' -' : '';?>
            <?php echo date('Y');?>
            All rights reserved.
            <a href="http://www.miitbeian.gov.cn/" target="_blank">
                <?php echo $this->options->beiAnCode ? $this->options->beiAnCode() : '桂ICP备16007901号-1'?>
            </a>
        </div>
        <span id="mt">
            <span id="duration"></span>
            <a href="//creativecommons.org/licenses/by-nc-sa/3.0/cn/legalcode" target="_blank">
                <i class="fa fa-cc"></i>
            </a>
            <a href="http://typecho.org/" rel="external" target="_blank"><i class="fa fa-tumblr-square" aria-hidden="true"></i>Powered by Typecho</a>
            <a href="http://www.hoehub.com">Theme By Hoe</a>
        </span>
    </div>
</footer>
<!--JQ-->
<script src="//cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/ResponsiveSlides.js/1.55/responsiveslides.min.js"></script>
<script src="//cdn.bootcss.com/highlight.js/9.13.1/highlight.min.js"></script>
<script src="//cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script src="//cdn.bootcss.com/nprogress/0.2.0/nprogress.min.js"></script>
<script src="//cdn.bootcss.com/typed.js/2.0.9/typed.min.js"></script>
<script src="//cdn.bootcss.com/jquery.textcomplete/1.8.4/jquery.textcomplete.min.js"></script>
<script src="//cdn.bootcss.com/emojionearea/3.4.1/emojionearea.min.js"></script>
<script src="<?php $this->options->themeUrl('js/activate-power-mode.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/purelove.js'); ?>"></script>
<?php if ($this->is('index')):?>
<!--首页才会显示幻灯片-->
<script>
    $(function () {
        banner();
    });
</script>
<?php endif;?>
<script>
    function openNew () { // 从新窗口打开不是本站的链接
        var selector = 'a[href]:not(a[href^="#"], a[href^="javascript"], a[href^="mailto"], a[href^="<?php Helper::options()->siteUrl()?>"])';
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
</body>
</html>