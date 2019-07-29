<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * Engine: typecho
 * Theme Name: PureLoveForTypecho
 * Time: 2018年11月12日11:51
 * Author: Hoe
 * Author URI: http://www.hoehub.com/
 */

/**
 * @param $form
 * 插件设置
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
            'showRecentPosts' => _t('显示最新文章, 条数: 设置->阅读->文章列表数目'),
            'showHotPosts' => _t('显示热门文章, 默认10条'),
            'showTagCloud' => _t('显示标签云, 默认30条'),
            'showRecentComments' => _t('显示最近回复, 条数: 设置->评论->评论列表数目'),
            'showArchive' => _t('显示归档, 默认按月归档, 显示6条'),
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

    // 感谢@fullmetalcoder 反馈的问题 https://gitee.com/HoeXhe/PureLoveForTypecho/issues/IZTE6
    $activatePowerMode = new Typecho_Widget_Helper_Form_Element_Radio('activatePowerMode', ['1' => '开启', '0' => '关闭'], '1', _t('是否开启疯狂打字机模式'), _t('疯狂打字机 <a href="https://gitee.com/HoeXhe/ActivatePowerMode" target="_blank">仓库地址</a> <a href="https://www.hoehub.com/PHP/typecho-ActivatePowerMode.html" target="_blank">简介地址</a>'));
    $form->addInput($activatePowerMode);

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
        ->where('status = ?', 'publish') // 2018年11月29日9:34:49 感谢jiffei反馈
        ->limit($num)
        ->order('commentsNum', Typecho_Db::SORT_DESC);
    $result = $db->fetchAll($sql);
    foreach ($result as &$item) {
        $item = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($item);
    }
}

/**
 * @return bool
 * 是否为移动设备
 */
function isMobile()
{
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
    }
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA'])) {
    // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array('nokia',
            'sony',
            'ericsson',
            'mot',
            'samsung',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'iphone',
            'ipod',
            'blackberry',
            'meizu',
            'android',
            'netfront',
            'symbian',
            'ucweb',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp',
            'wap',
            'mobile'
        );
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
    // 如果只支持wml并且不支持html那一定是移动设备
    // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}
