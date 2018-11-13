<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<!--主体部分-->
<section id="container">
    <section id="content">
        <article id="article" itemscope itemtype="http://schema.org/BlogPosting">
            <h1 class="archive-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
            <div class="position">
                当前位置：<a href="#">首页</a> » 本页
            </div>
            <div class="post-content" itemprop="articleBody">
                <?php $this->content(); ?>
            </div>
        </article>
        <?php $this->need('comments.php'); ?>
    </section>
</section>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
