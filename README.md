# PureLoveForTypecho简介

### `PureLoveForTypecho`演变历程:

- `PureLoveForTypecho`前身是`Purelove` (`Wrodpress`主题)
- `Purelove`主题是[梦月酱](http://www.wysafe.com/)设计的[`Wrodpress`](https://cn.wordpress.org/)主题, 页面设计简洁美观 完美支持移动设备端, 支持响应式, 兼容主流游览器
- 而本主题是在[`PureLove主题梓喵出没修改版`](https://www.azimiao.com/purelovethemes)基础上再次改版, 使原本是`Wrodpress`的`Purelove`主题能够运行在[`typecho`](http://typecho.org)博客系统上, 如有侵权, 请联系`i#hoehub.com`

### Demo

- [演试地址:www.hoehub.com](http://www.hoehub.com)
- [主题源码](https://gitee.com/HoeXhe/PureLoveForTypecho)

### Description

- 全站`Pjax` (如遇`javascript error Pjax`失效)
- 自定义首页轮播图/侧边栏显示/Logo等
- 代码高亮显示
- 评论区显示系统及浏览器信息 博主标识
- 新增归档页面
- 自动获取文章第一张图片做为缩略图, 如文章无图, 则随机显示8张来自[站酷 (ZCOOL)](http://www.zcool.com.cn)的缩略图
- 设备小于`860px`时, 侧边栏和页脚会隐藏
- 页脚调用金山每日一句接口

### Use

- `git clone https://gitee.com/HoeXhe/PureLoveForTypecho.git`
- 将主题放入`/usr/themes/`目录下
- 登录控制台使用和配置外观即可

### Link

- [主题作者梦月酱](http://www.wysafe.com)
- [梦月酱`PureLove`主题原版](https://www.mywpku.com/purelove.html)
- [`PureLove`主题梓喵出没修改版](https://www.azimiao.com/purelovethemes)

### Defect

- 小尺寸设备时菜单会被截取而不是缩放
- 使用`Pjax`提交评论后, 如按`F5`刷新页面会报错
- 使用`Pjax`提交评论后, 无法再次提交评论

### 类库 [使用BootCDN加速](https://www.bootcdn.cn/)

- `jquery.js` v3.3.1
- `jquery.pjax.js` v2.0.1
- 字体图标 `font-awesome.css` v4.7.0
- 代码高亮 `highlight.js`使用`vs`样式 v9.13.1
- 进度条 `nprogress.js` v0.2.0
- 幻灯片 `responsiveslides.js` v1.55
- 酷炫编辑器 `activate-power-mode.js` 未知版本
- 输入动画库 `typed.js` v2.0.9

### 参与贡献

1. Fork 本项目
2. 新建 Feat_xxx 分支
3. 提交代码
4. 新建 Pull Request