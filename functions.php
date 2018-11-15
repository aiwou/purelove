<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

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