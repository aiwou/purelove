<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<aside class="sidebar">
    <section class="widgetbox">
        <h3><?php $this->options->title(); ?></h3>
        <p class="description"><?php $this->options->description() ?></p>
    </section>
    <section class="widgetbox">
        <h3><?php _e('网站统计'); ?></h3>
        <ul class="blogroll">
            <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
            <li><?php _e('文章总数：'); ?><?php $stat->publishedPostsNum() ?></li>
            <li><?php _e('分类总数：'); ?><?php $stat->categoriesNum() ?></li>
            <li><?php _e('评论总数：'); ?><?php $stat->publishedCommentsNum() ?></li>
            <li><?php _e('页面总数：'); ?><?php $stat->publishedPagesNum() ?></li>
            <li><?php _e('标签总数：'); ?>X</li>
            <li><?php _e('网站运行：'); ?>X</li>
        </ul>
    </section>
    <section class="widgetbox">
        <h3><?php _e('最近回复'); ?></h3>
        <div class="textwidget">
            <ul>
                <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                <?php while($comments->next()): ?>
                    <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?>: <?php $comments->excerpt(35, '...'); ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </section>
    <section class="widgetbox">
        <h3 class="widget-title"><?php _e('归档'); ?></h3>
        <ul>
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y-m-d&limit=6')
                ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
    </section>
    <section class="widgetbox">
        <h3 class="widget-title"><?php _e('其它'); ?></h3>
        <ul class="">
            <?php if($this->user->hasLogin()): ?>
                <li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
            <li><a href="http://www.typecho.org">Typecho</a></li>
        </ul>
    </section>
</aside>
