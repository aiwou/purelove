<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--评论-->
<?php function threadedComments($comments, $options)
{
    $commentClass = $authorIdIcon = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
            $authorIdIcon = '<i class="fa fa-heart-o" aria-hidden="true" title="博主"></i>';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-children' : ' comment-parent';
    ?>
    <li id="li-<?php $comments->theId(); ?>" class="comment<?php
    if ($comments->levels > 0) {
        echo ' comment-children';
        $comments->levelsAlt(' thread-level-odd', ' thread-level-even');
    } else {
        echo ' comment-parent';
    }
    echo $commentClass;
    ?>">
        <div id="<?php $comments->theId(); ?>">
            <!--<div class="coms_floor"><a href="#comment-2573">xx楼</a></div>-->
            <div class="coms_avatar"><?php $comments->gravatar('40', ''); ?></div>
            <div class="coms_main">
                <div class="coms_meta">
                    <span class="coms_author">
                        <span rel="external nofollow" class="url"><?php $comments->author(); ?></span>
                        <span class="user-agent-icon">
                            <?php echo $authorIdIcon; echo getOS($comments->agent); echo getBrowser($comments->agent); ?>
                        </span>
                    </span>
                    <a href="<?php $comments->permalink(); ?>"><?php $comments->date(); ?></a>
                    <a rel="nofollow" class="comment-reply comment-reply-link"><?php $comments->reply(); ?></a>
                </div>
                <p><?php $comments->content(); ?></p>
            </div>
        </div>
        <?php if ($comments->children) { ?>
            <div class="children">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } // if ($comments->children) else ?>
    </li>
<?php } // threadedComments() End ?>


<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <div class="comments-header" id="<?php $this->respondId(); ?>">
        <?php if ($this->allow('comment')): ?>
            <form action="<?php $this->commentUrl() ?>" method="post" id="commentform" data-pjax>
                <h3 class="coms_underline">
                    我来吐槽
                </h3>
                <div id="comment-author-info">
                    <?php if ($this->user->hasLogin()): ?>
                        <div>
                            <a href="<?php $this->options->profileUrl(); ?>">
                                <?php $this->user->screenName(); ?>
                                <?php _e('已登录'); ?>
                            </a>.
                            <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?>&raquo;</a>
                        </div>
                    <?php else: // if($this->user->hasLogin()) else  ?>
                    <p>
                        <label for="author"><?php _e('昵称'); ?></label>
                        <input type="text" name="author" id="author" value="<?php $this->remember('author'); ?>"
                               size="14" tabindex="1" required><em>*</em>
                    </p>
                    <p>
                        <label for="email"><?php _e('邮箱'); ?></label>
                        <input type="email" name="mail" id="email" value="<?php $this->remember('mail'); ?>" size="25"
                               tabindex="1" <?php echo $this->options->commentsRequireMail ? 'required' : ''; ?> >
                        <?php echo $this->options->commentsRequireMail ? '<em>*</em>' : ''; ?>
                    </p>
                    <p>
                        <label for="url"><?php _e('网站'); ?></label>
                        <input type="url" name="url" id="url" value="<?php $this->remember('url'); ?>" size="36"
                               tabindex="1" <?php echo $this->options->commentsRequireURL ? 'required' : ''; ?>
                               placeholder="<?php _e('http://'); ?>">
                        <?php echo $this->options->commentsRequireMail ? '<em>*</em>' : ''; ?>
                    </p>
                </div>
                <?php endif; // if($this->user->hasLogin()) endif ?>
                <div class="post-area">
                    <div class="comment-editor">
                        <a id="comment-smiley" href="javascript:;">表情</a>
                        <a href="javascript:SIMPALED.Editor.pre()">代码</a>
                        <a href="//www.appinn.com/markdown/" target="_blank">MD语法参考</a>
                    </div>
                    <textarea name="text" id="comment" required cols="100%" rows="7" tabindex="4"><?php $this->remember('text'); ?></textarea>
                </div>
                <div class="subcon">
                    <button class="btn btn-primary"><?php _e('吐槽一下'); ?></button>
                    <div class="cancel-comment"><?php $comments->cancelReply(); ?></div>
                </div>
            </form>
        <?php endif; ?>
    </div>
    <?php if ($comments->have()): ?>
        <h3 class="coms_underline" id="comments">
            <?php $this->commentsNum(_t('暂无评论'), _t('仅有 <strong>1</strong> 条评论'), _t('已有 <strong>%d</strong> 条评论')); ?>
        </h3>
        <?php $comments->listComments(); ?>
        <?php $comments->pageNav(); ?>
    <?php endif; ?>
</div>