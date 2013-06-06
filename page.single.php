<?php /*
Copyright (c) 2012 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/ ?>
<?php 
namespace Habari;
if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<?php $theme->display( 'header' ); ?>
<div id="content"> <!-- content div -->
<div class="post"> <!-- container for posts -->
<h2><a href="<?php echo $post->permalink; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title_out; ?></a></h2>
<div class="entry"><?php echo $post->content_out; ?></div>
<div class="meta">
<?php if (count($post->tags))
{ ?>
	<div class="tags">
	<?php _e('Tagged:'); ?> <?php echo $post->tags_out; ?>
    </div>
<?php } ?>

<div class="commentcount"><?php echo $theme->comments_link($post, '%d Comments', '%d Comment', '%d Comments' ); ?></div>
<!-- display edit link, if logged in -->
<div class="edit"><?php if($loggedin) 
{ ?>
	<a href="<?php $post->editlink; ?>" title="<?php _e('Edit Post'); ?>"><?php _e('Edit'); ?></a>
<?php } ?>
</div> <!-- close edit post space -->
</div> <!-- close meta space -->
</div> <!-- close post container -->
<?php include("comments.php"); ?>
</div> <!-- close content div -->
<div id="sidebar"> <!-- create area for side bar -->
<?php $theme->display( 'sidebar' ); ?>
</div> <!-- close sidebar area -->
<?php $theme->display( 'footer' ); ?>
