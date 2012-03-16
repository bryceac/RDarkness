<?php /*
Copyright (c) 2012 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/ ?>
<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
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
	<ul id="commentlist">

		<?php
		if ( $post->comments->moderated->count ) {
			foreach ( $post->comments->comments->moderated as $comment ) {
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
			<div class="comment-meta">#<a href="#comment-<?php echo $comment->id; ?>" class="counter" title="<?php _e('Permanent Link to this Comment'); ?>"><?php echo $comment->id; ?></a> |
		       <span class="commentauthor"><?php _e('Comment by'); ?> <?php $theme->comment_author_link($comment); ?></span>
		       <span class="commentdate"> <?php _e('on'); ?> <a href="#comment-<?php echo $comment->id; ?>" title="<?php _e('Time of this comment'); ?>"><?php $comment->date->out('M j, Y h:ia'); ?></a></span><h5><?php if ( $comment->status == Comment::STATUS_UNAPPROVED ) : ?> <em><?php _e('In moderation'); ?></em><?php endif; ?></h5></div>
		      </li>




		<?php
			}
		}
		else {
			_e('There are currently no comments.');
		}
		?>
	</ul>
    <div id="commentform">

		<br>
<?php $post->comment_form()->out(); ?>
	</div>
</div> <!-- close comment div -->
