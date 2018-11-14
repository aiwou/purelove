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
        <?php if ($this->is('index')):?>
            <div class="mySliderBar">
                <ul class="rslides" id="slider">
                    <li><img src='<?php $this->options->themeUrl('images/tmp68686407_p0.jpg'); ?>'></li>
                    <li><img src='<?php $this->options->themeUrl('images/tmp68577569_p0_master1200.jpg'); ?>'></li>
                </ul>
            </div>
        <?php else:?>
            <h3 class="archive-title">
                <?php $this->archiveTitle(array(
                    'category'  =>  _t('分类 %s 下的文章'),
                    'search'    =>  _t('包含关键字 %s 的文章'),
                    'tag'       =>  _t('标签 %s 下的文章'),
                    'author'    =>  _t('%s 发布的文章')
                ), '', ''); ?>
            </h3>
        <?php endif;?>
        <?php while ($this->next()): ?>
            <article class="posts" itemscope itemtype="http://schema.org/BlogPosting">
                <div class="label">
                    <a href="#" rel="category tag"><?php $this->category(','); ?></a>
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
                    <span itemprop="author" itemscope itemtype="http://schema.org/Person">
                        <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
                    </span>
                    <span itemprop="interactionCount">
                        <a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('%d评论'); ?></a>
                    </span>
                </div>
                <div class="clearfix"></div>
                <div class="postspicbox">
                    <div class="thumbnail">
                        <a href="<?php $this->permalink() ?>" title="<?php $this->title(); ?>">
                            <img src="<?php $this->options->themeUrl('images/tmpd146bc003ca994b28015b2c81b36c40e-140-100.jpg'); ?>"
                                 alt="<?php $this->excerpt(160); ?>">
                        </a>
                    </div>
                </div>
                <div class="postscontent entry-content" itemprop="articleBody">
                    <?php $this->excerpt(160); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;', 5, '...', ['wrapTag' => 'div', 'wrapClass' => 'pagenavi']); ?>
    </section><!-- #content -->
    <?php $this->need('sidebar.php'); ?>
</section>
<?php $this->need('footer.php'); ?>
