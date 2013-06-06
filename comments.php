<?php 
namespace Habari;
if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<?php if ( Session::has_messages() ) {
		Session::messages_out();
	}
?>
<!-- place to hold comments -->
<div id="comments">
<h3><?php $theme->comments_count($post,'%d Responses','%d Response','%d Responses'); ?> <?php _e('to'); ?> <?php echo $post->title; ?></h3>
<a href="<?php echo $post->comment_feed_link; ?>"><?php _e("Feed For this entry"); ?></a>
<?php if ($post->comments->pingbacks->count) { ?>
<div id="pings">
<h4><?php $theme->pingback_count($post); ?></h4>
				<ul id="pings-list">
					<?php foreach ( $post->comments->pingbacks->approved as $pingback ) { ?>
						<li id="ping-<?php echo $pingback->id; ?>">

								<div class="comment-content">
								<?php echo $pingback->content; ?>
								</div>
								<div class="ping-meta"><a href="<?php echo $pingback->url; ?>" title=""><?php echo $pingback->name; ?></a></div>
						</li>
					<?php } ?>
				</ul>
</div>
<?php } ?>
<h4 class="commentheading"><?php echo $post->comments->comments->approved->count; ?> <?php echo _n( 'Comment', 'Comments', $post->comments->comments->approved->count ); ?></h4>

		<?php if ( $post->comments->moderated->count ) { ?>
        	<?php // Utils::debug( $post->threadedComments ); ?>
			<ul id="commentlist">
            <?php if ($post->threadedComments) 
			{
            	foreach ($post->threadedComments as $comment)
        			$theme->output_comment($post, $comment, 1, $theme->commentThreadMaxDepth);
			} else { ?>
            	<?php foreach ( $post->comments->comments->moderated as $comment ) {
			$class = 'class="comment';
			if ( $comment->status == Comment::STATUS_UNAPPROVED ) {
				$class.= '-unapproved';
			}
			$class.= '"';
		?>
			<li id="comment-<?php echo $comment->id; ?>" <?php echo $class; ?>>
 				<div class="comment-content">
		        <?php echo $comment->content_out; ?>
		       </div>
			<div class="comment-meta">
		       <span class="commentauthor"><?php _e('Comment by'); ?> 
			   <?php if (is_null($comment->url) || strlen($comment->url) == 0) 
			   { ?>
               <?php echo $comment->name_out; ?></span>
               <?php } else { ?>
               <a href="<?php echo $comment->url; ?>" rel="nofollow"><?php echo $comment->name_out; ?></a></span>
               <?php } ?>
		       <span class="commentdate"> <?php _e('on'); ?> <a href="#comment-<?php echo $comment->id; ?>" title="<?php _e('Time of this comment'); ?>"><?php $comment->date->out('M j, Y h:ia'); ?></a></span><h5><?php if ( $comment->status == Comment::STATUS_UNAPPROVED ) : ?> <em><?php _e('In moderation'); ?></em><?php endif; ?></h5></div>
		      </li>
		<?php
			} ?>
         	<?php } ?>
          </ul>
         <?php } else {
         			_e('There are currently no comments.');
          } ?>
     <?php if (!$post->info->comments_disabled)
	 { ?>
    <div id="commentform">

		<br>
<?php $post->comment_form()->out(); ?>
	</div>
    <?php } else {
					_e('Sorry, This post is closed to new comments.');
	} ?>
</div> <!-- close comment div -->