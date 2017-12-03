<?php
/** src/Template/Element/Comments/comment.ctp
* $connected is used to check is user is connected
*/
// debug($comment);?>
<div class="comment-avatar">
    <i class="fa fa-user"></i>
</div>
<div class="comment-container">
    <div class="comment-author">
        <b><?= $comment->user->username; ?></b>
        <span class="comment-date">on <span class="underline">
					<?= $comment->created->format("H:i:s d.m.Y"); ?></span><span>
					<?php if ($connected): ?>
            <a href="#" class="reply" data-id="<?= $comment->id ?>"><i class="fa fa-reply"></i> Reply</a>
			    <?php endif; ?>
        </span></span>
    </div>
    <div class="comment-content">
        <?= h($comment->content); ?>
    </div>
    <?php if ($comment->children): ?>
        <ul class="comment-list">
            <?php foreach ($comment->children as $child) {
                echo $this->Comment->comment($child);
            } ?>
        </ul >
    <?php endif; ?>
</div>
