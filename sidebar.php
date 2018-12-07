<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<aside class="sidebar">
    <?php if ($this->options->sidebarBlock && in_array('showSiteStatistics', $this->options->sidebarBlock)): ?>
        <section class="widgetbox">
            <h3><?php _e('网站统计'); ?></h3>
            <ul class="blogroll">
                <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                <li><?php _e('文章总数：'); ?><?php $stat->publishedPostsNum() ?></li>
                <li><?php _e('分类总数：'); ?><?php $stat->categoriesNum() ?></li>
                <li><?php _e('评论总数：'); ?><?php $stat->publishedCommentsNum() ?></li>
                <li><?php _e('页面总数：'); ?><?php echo $stat->publishedPagesNum + $stat->publishedPostsNum; ?></li>
                <li><?php _e('标签总数：'); ?><?php echo getTagCount();?></li>
                <li><?php _e('占个位子：'); ?><i class="fa fa-heartbeat fa-lg" aria-hidden="true"></i></li>
            </ul>
        </section>
    <?php endif; ?>
    <?php if ($this->options->sidebarBlock && in_array('showRecentComments', $this->options->sidebarBlock)): ?>
        <section class="widgetbox">
            <h3><?php _e('最近回复'); ?></h3>
            <div class="textwidget">
                <ul class="commentsArea">
                    <?php $this->widget('Widget_Comments_Recent', 'ignoreAuthor=true')->to($comments); ?>
                    <?php while($comments->next()): ?>
                        <?php
                            if (defined('__TYPECHO_GRAVATAR_PREFIX__')) {
                                $gravatar = __TYPECHO_GRAVATAR_PREFIX__;
                            } else {
                                // https://www.v2ex.com/t/141485
                                $gravatar = 'https://cdn.v2ex.com/gravatar/'; // 头像默认使用V2EX服务器
                            }
                            $size = '40';// 自定义头像大小
                            $rating = Helper::options()->commentsAvatarRating;
                            $hash = md5(strtolower($comments->mail));
                            $avatarUrl = $gravatar . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
                            // 防止html标签意外闭合而导致的页面布局混乱
                            $text = str_replace(['<', '>', '"'], '', $comments->text);
                        ?>
                        <a class="comment-item" href="<?php $comments->permalink(); ?>">
                            <img src="<?php echo $avatarUrl; ?>" alt="<?php _e('评论头像'); ?>" title="<?php echo $text; ?>">
                        </a>
                    <?php endwhile; ?>
                </ul>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($this->options->sidebarBlock && in_array('showHotPosts', $this->options->sidebarBlock)): ?>
        <section class="widgetbox">
            <h3><?php _e('热门文章'); ?></h3>
            <div class="textwidget">
                <ul>
                    <?php hotPosts($result, 10); ?>
                    <?php foreach ($result as $post): ?>
                        <li>
                            <a href="<?php echo $post['permalink']; ?>" title="<?php echo _e('评论数: ') . $post['commentsNum']; ?>"><?php echo $post['title']; ?></a>
                        </li>
                    <?php endforeach?>
                </ul>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($this->options->sidebarBlock && in_array('showRecentPosts', $this->options->sidebarBlock)): ?>
        <section class="widgetbox">
            <h3><?php _e('最新文章'); ?></h3>
            <div class="textwidget">
                <ul>
                    <?php $this->widget('Widget_Contents_Post_Recent')
                        ->parse('<li><a href="{permalink}" title="{title}">{title}</a></li>'); ?>
                </ul>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($this->options->sidebarBlock && in_array('showTagCloud', $this->options->sidebarBlock)): ?>
        <section class="widgetbox">
            <h3><?php _e('标签云'); ?></h3>
            <div class="textwidget">
                <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
                <?php if($tags->have()): ?>
                    <div id="tag-cloud">
                        <?php while ($tags->next()): ?>
                            <a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count() . _e('个话题'); ?> ">
                                <?php $tags->name(); ?>
                            </a>
                        <?php endwhile; ?>
                        <?php else: ?>
                            <li><?php _e('没有任何标签'); ?></li>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($this->options->sidebarBlock && in_array('showArchive', $this->options->sidebarBlock)): ?>
        <section class="widgetbox">
            <h3 class="widget-title"><?php _e('归档'); ?></h3>
            <ul>
                <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y-m-d&limit=6')
                    ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
            </ul>
        </section>
    <?php endif; ?>
    <?php if ($this->options->sidebarBlock && in_array('showOther', $this->options->sidebarBlock)): ?>
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
    <?php endif; ?>
</aside>
