<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * Engine: typecho
 * Theme Name: PureLoveForTypecho
 * Time: 2018年11月12日11:51
 * Author: Hoe
 * Author URI: http://www.hoehub.com/
 */

function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', null, null, _t('站点Logo地址'), _t('左上角的Logo 建议尺寸160*60'));
    $form->addInput($logoUrl);

    $iconUrl = new Typecho_Widget_Helper_Form_Element_Text('iconUrl', null, null, _t('站点Icon地址'), _t('网站Icon 建议尺寸32*32'));
    $form->addInput($iconUrl);

    $description = _t('Json格式 如 <pre class="description" style="font-family: Consolas; font-size: 12px;">
[
    {"imgUrl": "绝对路径", "url": "跳转地址", "desc": "描述"},
    {"imgUrl": "https://www.hoehub.com/banner1.png", "url": "http://www.hoehub.com", "desc": "描述1"},
    {"imgUrl": "https://www.hoehub.com/banner2.png", "url": "http://www.baidu.com", "desc": "描述2"},
    {"imgUrl": "https://www.hoehub.com/banner3.png", "url": "http://www.baidu.com", "desc": "描述3"}
] </pre>');
    $banners = new Typecho_Widget_Helper_Form_Element_Textarea('banners', null, null, _t('首页轮播 图片建议尺寸700*250'), $description);
    $form->addInput($banners);

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock',
        [
            'showSiteInfo' => _t('显示网站信息'),
            'showSiteStatistics' => _t('显示网站统计'),
            'showRecentPosts' => _t('显示最新文章'),
            'showHotPosts' => _t('显示热门文章'),
            'showTagCloud' => _t('显示标签云'),
            'showRecentComments' => _t('显示最近回复'),
            'showArchive' => _t('显示归档'),
            'showOther' => _t('显示其它杂项')
        ],
        [
            'showSiteInfo',
            'showSiteStatistics',
            'showRecentPosts',
            'showHotPosts',
            'showTagCloud',
            'showRecentComments',
            'showArchive',
            'showOther',
        ], _t('侧边栏显示'));
    $form->addInput($sidebarBlock->multiMode());

    $copyright = new Typecho_Widget_Helper_Form_Element_Textarea('copyright', null, null, _t('版权声明'), _t('页脚的版权声明, 允许使用html标签'));
    $form->addInput($copyright);

    $selfIntroduction = new Typecho_Widget_Helper_Form_Element_Textarea('selfIntroduction', null, null, _t('我的介绍'), _t('页脚的我的介绍, 允许使用html标签'));
    $form->addInput($selfIntroduction);

    $beiAnCode = new Typecho_Widget_Helper_Form_Element_Text('beiAnCode', null, null, _t('备案号'), _t('页脚备案号'));
    $form->addInput($beiAnCode);

    $startAt = new Typecho_Widget_Helper_Form_Element_Text('startAt', null, null, _t('建站时间'), _t('显示本站运行时间 格式: 10/01/2016 08:00:00 兼容Safari浏览器'));
    $form->addInput($startAt);

    $tongJiJs = new Typecho_Widget_Helper_Form_Element_Textarea('tongJiJs', null, null, _t('网站统计Js代码'), _t('直接填入统计代码即可'));
    $form->addInput($tongJiJs);

    $advertisingJs = new Typecho_Widget_Helper_Form_Element_Textarea('advertisingJs', null, null, _t('广告JS代码'), _t('请填入包括script标签的代码'));
    $form->addInput($advertisingJs);
}

/**
 * @param $agent
 * @return string
 * 获取浏览器信息
 */
function getBrowser($agent)
{
    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
        $browserIcon = '<i class="fa fa-internet-explorer"></i>';
    } else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
        $browserIcon = '<i class="fa fa-firefox"></i>';
    } else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $browserIcon = '<i class="fa fa-chrome"></i>';
    } else if (preg_match('/QQBrowser\/([^\s]+)/i', $agent, $regs)) {
        $browserIcon = '<i class="fa fa-qq"></i>';
    } else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
        $browserIcon = '<i class="fa fa-safari"></i>';
    } else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $browserIcon = '<i class="fa fa-opera"></i>';
    } else {
        $browserIcon = '<i class="fa fa-question-circle"></i>';
    }
    return $browserIcon;
}

/**
 * 获取操作系统信息
 * @param $agent
 * @return string
 */
function getOS($agent)
{
    if (preg_match('/win/i', $agent)) {
        $osIcon = '<i class="fa fa-windows"></i>';
    } else if (preg_match('/android/i', $agent)) {
        $osIcon = '<i class="fa fa-android"></i>';
    } else if (preg_match('/linux/i', $agent)) {
        $osIcon = '<i class="fa fa-linux"></i>';
    } else if (preg_match('/mac/i', $agent)) {
        $osIcon = '<i class="fa fa-apple"></i>';
    } else if (preg_match('/iphone/i', $agent)) {
        $osIcon = '<i class="fa fa-apple"></i>';
    } else if (preg_match('/ipad/i', $agent)) {
        $osIcon = '<i class="fa fa-apple"></i>';
    } else {
        $osIcon = '<i class="fa fa-laptop"></i>';
    }
    return $osIcon;
}

/**
 * @return int
 * @throws Typecho_Db_Exception
 * 查询标签总数
 */
function getTagCount()
{
    $db = Typecho_Db::get();
    $widget = new Widget_Metas_Tag_Cloud(new Typecho_Request(), new Typecho_Response());
    // 查询
    $select = $widget->select()->where('type = ?', 'tag');
    $tags = $db->fetchAll($select, [$widget, 'push']); // 获取上级评论对象
    return count($tags);
}

/**
 * @param $archive
 * 关闭反垃圾机制 否则Pjax无法提交评论
 */
function themeInit($archive)
{
    Helper::options()->commentsAntiSpam = false;
}

/**
 * @param $article
 * @return string
 * 文章无图时, 随机输出缩略图
 */
function articleThumb($article)
{
    // 当文章无图片时的默认缩略图
    $pattern = '/<img[\s\S]*?src\s*=\s*[\"|\'](.*?)[\"|\'][\s\S]*?>/';
    preg_match_all($pattern, $article->content, $matches);
    if (isset($matches[1][0])) {
        $thumb = $matches[1][0];
    } else {
        $ran = mt_rand(1, 8);
        $thumb = $article->widget('Widget_Options')->themeUrl . '/thumb/' . $ran . '.jpg'; // 随机图片
    }
    return $thumb;
}

/**
 * 调取金山每日一句
 * @return array 接口数据
 */
function ICIB_API()
{
    $date = date('y-m-d');
    $content = file_get_contents('http://open.iciba.com/dsapi/?date=' . $date);
    $result = json_decode($content);
    return $result;
}

/**
 * @param array $result
 * @param int $num
 * @throws Typecho_Db_Exception
 * @throws Typecho_Exception
 * 热门文章
 */
function hotPosts(&$result, $num = 5)
{
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
        ->where('type = ?', 'post')
        ->limit($num)
        ->order('commentsNum', Typecho_Db::SORT_DESC);
    $result = $db->fetchAll($sql);
    foreach ($result as &$item) {
        $item = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($item);
    }
}