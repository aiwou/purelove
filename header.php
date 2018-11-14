<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="<?php $this->options->charset(); ?>">
    <link rel="dns-prefetch" href="//sdn.geekzu.org">
    <link rel='dns-prefetch' href="<?php $this->options->siteUrl(); ?>"/>
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no">
    <meta name="theme-color" content="#ff8c83">
    <meta name="renderer" content="webkit">
    <link rel="canonical" href="<?php $this->options->siteUrl(); ?>"/>
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!--样式-->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
    <!--icon-->
    <!--<link rel="icon" href="https://www.azimiao.com/wp-content/themes/purelove/favicon.ico" type="image/x-icon"/>-->
    <!--图标库-->
    <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel='stylesheet' id='pure-highlightjs-style-css' href='<?php $this->options->themeUrl('css/tomorrow.css'); ?>' type='text/css' media='all'/>
    <link rel='stylesheet' id='pure-highlightjs-css-css' href='<?php $this->options->themeUrl('css/pure-highlight.css'); ?>' type='text/css' media='all'/>
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<!--头部-->
<header class="header">
    <div id="navbar">
        <div class="inner clearfix">
            <div id="caption">
                <?php if ($this->options->logoUrl): ?>
                    <div id="title">
                        <a href="<?php $this->options->siteUrl(); ?>">
                            <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>">
                        </a>
                    </div>
                    <div id="tagline" style="color:#ff8c83;padding:0"><?php $this->options->description() ?></div>
                <?php else: ?>
                    <div id="title">
                        <a href="#">
                            <img src="#" alt="<?php _e('暂无Logo'); ?>">
                        </a>
                    </div>
                    <div id="tagline" style="color:#ff8c83;padding:0"><?php _e('暂无描述'); ?></div>
                <?php endif; ?>
            </div>
            <div class="navpic">
                <img src="<?php $this->options->themeUrl('images/happy2018.png'); ?>" alt="Happy2018">
            </div>
        </div>
    </div>
</header>
<!--菜单-->
<div id="navigation">
    <div class="inner clearfix">
        <div id="menus" class="mynav">
            <div class="menu-menu-container">
                <ul id="menu-menu" class="menu">
                    <li class="<?php $this->is('index') ? 'current-menu-item' : '' ?>">
                        <a href=<?php $this->options->siteUrl(); ?>><i class="fa fa-home"></i> <?php _e('首页'); ?></a>
                    </li>
                    <!--分类-->
                    <li class="menu-item">
                        <a href="#"><i class="fa fa-pencil-square-o"></i> <?php _e('分类'); ?></a>
                        <ul class="sub-menu">
                            <?php $this->widget('Widget_Metas_Category_List')->to($cats);?>
                            <?php while ($cats->next()): ?>
                                <li>
                                    <a href="<?php $cats->permalink()?>" title="<?php $cats->name()?>">
                                        <i class="fa fa-pencil-square-o"></i>
                                        <span><?php $cats->name()?></span>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </li>
                    <!--独立的页面-->
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <li class="<?php $this->is('page', $pages->slug) ? 'current-menu-item' : ''; ?>">
                        <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><i class="fa fa-align-left"></i> <?php $pages->title(); ?></a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <div class="navsearch">
            <form action="<?php $this->options->siteUrl(); ?>" method="get" id="searchform">
                <input name="s" type="text" class="searchtext" value="" placeholder="<?php _e('输入关键字搜索'); ?>"/>
                <input id="searchbtn" type="submit" class="button" value="<?php _e('搜索'); ?>">
            </form>
        </div>
    </div>
</div>