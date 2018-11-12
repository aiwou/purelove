<?php
/**
 * PureLoveForTypecho
 * 
 * @package PureLoveForTypecho 纯真的爱
 * @author Hoe
 * @version 1.0.0
 * @link http://www.hoehub.com http://www.wysafe.com http://www.azimiao.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<!--主体部分-->
<section id="container">
    <section id="content">
        <div class="mySliderBar">
            <ul class="rslides" id="slider">
                <li><img src='<?php $this->options->themeUrl('images/tmp68686407_p0.jpg'); ?>'></li>
                <li><img src='<?php $this->options->themeUrl('images/tmp68577569_p0_master1200.jpg'); ?>'></li>
            </ul>
        </div>
        <?php while($this->next()): ?>
            <article class="posts" itemscope itemtype="http://schema.org/BlogPosting">
                <div class="label">
                    <a href="#" rel="category tag"><?php _e('分类: '); ?><?php $this->category(','); ?></a>
                    <i class="label-arrow"></i>
                </div>
                <h2 class="entry-title">
                    <a itemprop="url" href="<?php $this->permalink() ?>" rel="bookmark">
                        <span itemprop="name"><?php $this->title() ?></span>
                    </a>
                </h2>
                <div class="entry-meta">
                    <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time> /
                    Write by /
                    <span itemprop="author" itemscope itemtype="http://schema.org/Person"><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
                    </span>
                    <span itemprop="interactionCount">
                        <a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('%d评论'); ?></a>
                    </span>
                </div>
                <div class="clearfix"></div>
                <div class="postspicbox">
                    <div class="thumbnail">
                        <a href="#" title="RenderTexture Sprite截图并解决画面太暗的问题"
                           target="_blank">
                            <img src="<?php $this->options->themeUrl('images/tmpd146bc003ca994b28015b2c81b36c40e-140-100.jpg'); ?>"
                                 alt="RenderTexture Sprite截图并解决画面太暗的问题">
                        </a>
                    </div>
                </div>
                <div class="postscontent entry-content" itemprop="articleBody">
                    <?php $this->excerpt(160); ?>
                </div>
            </article>
        <?php endwhile; ?>
</section><!-- #content -->
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
