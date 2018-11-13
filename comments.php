<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<h3 class="coms_underline">
    我来吐槽
</h3>
<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
    <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    <?php $comments->listComments(); ?>
    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
<?php endif; ?>

<?php if($this->allow('comment')): ?>
<div id="<?php $this->respondId(); ?>" class="respond">
    <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
    </div>
    <form action="<?php $this->commentUrl() ?>" method="post" id="commentform">
        <div id="comment-author-info">
        <?php if($this->user->hasLogin()): ?>
    		<h5>
    		    <?php _e('登录身份: '); ?>
    		    <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>.
    		    <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
    		</h5>
            <?php else: // if($this->user->hasLogin()) else ?>
            <p>
                <label for="author"><?php _e('昵称'); ?></label>
                <input type="text" name="author" id="author" value="<?php $this->remember('author'); ?>" size="14" tabindex="1" required><em>*</em>
            </p>
            <p>
                <label for="email"><?php _e('邮箱'); ?></label>
                <input type="email" name="email" id="email" value="<?php $this->remember('mail'); ?>" size="25" tabindex="2" <?php echo $this->options->commentsRequireMail ? 'required' : ''; ?> > <?php echo $this->options->commentsRequireMail ? '<em>*</em>' : ''; ?>
            </p>
            <p>
                <label for="url"><?php _e('网站'); ?></label>
                <input type="url" name="url" id="url" value="<?php $this->remember('url'); ?>" size="36" tabindex="3" <?php echo $this->options->commentsRequireURL ? 'required' : ''; ?> placeholder="<?php _e('http://'); ?>"> <?php echo $this->options->commentsRequireMail ? '<em>*</em>' : ''; ?>
            </p>
        </div>
        <?php endif; // if($this->user->hasLogin()) endif ?>
        <div class="post-area">
            <!--<div id="smileys"><a title="mrgreen" href="javascript:grin(':mrgreen:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_mrgreen.gif"></a><a title="razz" href="javascript:grin(':razz:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_razz.gif"></a><a title="sad" href="javascript:grin(':sad:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_sad.gif"></a><a title="smile" href="javascript:grin(':smile:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_smile.gif"></a><a title="oops" href="javascript:grin(':oops:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_redface.gif"></a><a title="grin" href="javascript:grin(':grin:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_biggrin.gif"></a><a title="eek" href="javascript:grin(':eek:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_surprised.gif"></a><a title="???" href="javascript:grin(':???:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_confused.gif"></a><a title="cool" href="javascript:grin(':cool:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_cool.gif"></a><a title="lol" href="javascript:grin(':lol:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_lol.gif"></a><a title="mad" href="javascript:grin(':mad:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_mad.gif"></a><a title="twisted" href="javascript:grin(':twisted:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_twisted.gif"></a><a title="roll" href="javascript:grin(':roll:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_rolleyes.gif"></a><a title="wink" href="javascript:grin(':wink:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_wink.gif"></a><a title="idea" href="javascript:grin(':idea:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_idea.gif"></a><a title="arrow" href="javascript:grin(':arrow:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_arrow.gif"></a><a title="neutral" href="javascript:grin(':neutral:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_neutral.gif"></a><a title="cry" href="javascript:grin(':cry:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_cry.gif"></a><a title="?" href="javascript:grin(':?:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_question.gif"></a><a title="evil" href="javascript:grin(':evil:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_evil.gif"></a><a title="shock" href="javascript:grin(':shock:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_eek.gif"></a><a title="!" href="javascript:grin(':!:')"><img src="https://www.azimiao.com/wp-content/themes/purelove/images/smilies/icon_exclaim.gif"></a></div>-->
            <div class="comment-editor">
                <a id="comment-smiley" href="javascript:;">表情</a>
                <a href="javascript:SIMPALED.Editor.pre()">代码</a>
                <a href="//www.appinn.com/markdown/" target="_blank">MD语法参考</a>
            </div>
            <textarea name="text" id="textarea" required cols="100%" rows="7" tabindex="4"><?php $this->remember('text'); ?></textarea>
            <div id="loading" style="display: none;">正在提交, 请稍候...</div>
            <div id="error" style="display: none;">#</div>
        </div>
        <div class="subcon">
            <input class="btn primary" type="submit" name="submit" id="submit" tabindex="5" value="<?php _e('吐槽一下'); ?>">
        </div>
    </form>

<?php else: // if($this->allow('comment')) else ?>
    <h3><?php _e('评论已关闭'); ?></h3>
<?php endif; // if($this->allow('comment')) endif ?>