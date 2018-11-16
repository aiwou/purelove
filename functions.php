<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点Logo地址'), _t('左上角的Logo 建议尺寸160*60'));
    $form->addInput($logoUrl);

    $iconUrl = new Typecho_Widget_Helper_Form_Element_Text('iconUrl', NULL, NULL, _t('站点Icon地址'), _t('网站Icon 建议尺寸32*32'));
    $form->addInput($iconUrl);

    $startAt = new Typecho_Widget_Helper_Form_Element_Text('startAt', NULL, NULL, _t('建站时间'), _t('显示本站运行时间 格式: 2018-11-16 11:28:27'));
    $form->addInput($startAt);

    $beiAnCode = new Typecho_Widget_Helper_Form_Element_Text('beiAnCode', NULL, NULL, _t('备案号'), _t('页脚备案号'));
    $form->addInput($beiAnCode);

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock',
        [
            'showSiteInfo' => _t('显示网站信息'),
            'showSiteStatistics' => _t('显示网站统计'),
            'showRecentPosts' => _t('显示最新文章'),
            'showTagCloud' => _t('显示标签云'),
            'showRecentComments' => _t('显示最近回复'),
            'showArchive' => _t('显示归档'),
            'showOther' => _t('显示其它杂项')
        ],
        [
            'showSiteInfo',
            'showSiteStatistics',
            'showRecentPosts',
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
        $browserIcon = '<i class="fa fa-question"></i>';
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