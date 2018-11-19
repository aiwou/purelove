<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
/**
 * 归档页面
 * @link http://docs.typecho.org/themes/custom-theme#%E8%87%AA%E5%AE%9A%E4%B9%89%E9%A1%B5%E9%9D%A2_page_%E6%A8%A1%E6%9D%BF
 * @package custom
 */
?>
<section id="container">
    <section id="content">
        <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);?>
        <?php while ($archives->next()): ?>
            <p>
                <a href="<?php $archives->permalink() ?>">
                    <?php echo date('Y-m-d', $archives->created); ?>
                    <?php $archives->title(); ?>
                </a>
            </p>
        <?php endwhile;?>
    </section>
    <?php $this->need('sidebar.php'); ?>
</section>
<?php $this->need('footer.php');?>
