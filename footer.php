<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?></article><!-- article -->
</section><!-- #container -->
<span class="clearfix"></span>
<div id="bak_top"></div>
</div>
<footer class="footer">
        <div class="inner clearfix">
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
            <?php if($tags->have()): ?>
            <div class="fotbox">
                <h3>标签云</h3>
                <?php while ($tags->next()): ?>
                    <a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题">
                        <?php $tags->name(); ?>
                    </a>
                <?php endwhile; ?>
                <?php else: ?>
                    <li><?php _e('没有任何标签'); ?></li>
                <?php endif; ?>
            </div>
            <div class="fotbox link">
                <h3>版权声明</h3>
                1.您可自由分发和演绎本站内容，只需保留本站署名且非商业使用(CC BY-NC-SA 3.0 CN)。<br/>
                2.本站引用资源会尽最大可能标明出处及著作权所有者，但不能保证对所有资源都可声明上述内容。侵权请联络XXX<br/></div>
            <div class="fotbox2">
                <h3>我的介绍</h3>
                <p>·野兔，男，天秤座。<span class='myinfo_pic'><a href='http://music.163.com/#/user/home?id=42209280'
                                                         target='_blank'><span
                                    class='fa fa-home' title='网易云音乐'></span></a><a
                                href='http://steamcommunity.com/id/yetui' target='_blank'><span
                                    class='fa fa-home' title='Steam'></span></a><a
                                href='http://sighttp.qq.com/authd?IDKEY=5929de917711dbd2c7605f448208620a72f5a7a4af81f532'
                                target='_blank'><span class='fa fa-home' title='腾讯QQ'></span></a><a
                                href='mailto:admin@azimiao.com'><span class='fa fa-home'
                                                                      title='发送邮件'></span></a><span
                                class='fa fa-home' title='占位置'></span></span></p>
                <p>·轻微中二病患者，白学学者与棒棒伲购美病研究人员。</p>
                <p>·泡茶，曲奇，散步，野游，微醉。</p>
                <p>·摄影门外汉，北漂酷码农。</p>
                <p>·梓喵出没名称的由来：<a href='//www.azimiao.com/li-shi-de-jin-cheng'>梓喵出没编年史</a></p></div>
        </div>
        <div class="copry clearfix">
            <div class="maxt">
            <span id="mt">
                <a href="//cn.wordpress.org" rel="external" target="_blank">
                    <i class="fa fa-ravelry"></i>
                </a>
                <a href="//creativecommons.org/licenses/by-nc-sa/3.0/cn/legalcode" target="_blank">
                    <i class="fa fa-cc"></i>
                </a>
                Theme Purelove by <a href="//www.azimiao.com/purelovethemes" target="_blank">梦月酱</a>
            </span>
                <div id="copyright">
                    <i class="fa fa-copyright"></i>
                    2014-2018 梓喵出没 | <a href="//www.azimiao.com/sitemap.html"target="_blank">[网站地图]</a> |
                    <a href="http://www.miitbeian.gov.cn/" TARGET="_BLANK">冀ICP备15008710号</a>
                    <a href="http://www.miitbeian.gov.cn/" TARGET="_BLANK">冀ICP备15008710号</a>
                </div>
            </div>
        </div>
    </footer>
<!--JQ-->
<script src="//cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/ResponsiveSlides.js/1.55/responsiveslides.min.js"></script>
<script src="//cdn.bootcss.com/highlight.js/9.1.0/highlight.min.js"></script>
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
<script src="<?php $this->options->themeUrl('js/purelove.js'); ?>"></script>
<?php $this->footer(); ?>
