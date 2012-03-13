/*
Copyright (c) 2012 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<?php $theme->display( 'searchform' ); ?>
<div id="pages"> <!-- placeholder for pages -->
<h2>Pages</h2>
<ul class="noBullet">
<li><a href="<?php Site::out_url( 'habari' ); ?>"><?php _e('Home'); ?></a></li>
<!-- list pages -->
<?php foreach ($pages as $page)
{ ?>
	<li><a href="<?php echo $page->permalink; ?>" title="<?php echo $page->title; ?>"><?php echo $page->title; ?></a></li>
<?php } ?> <!-- end loop -->
</ul>
</div>
<div id="meta">
<h2>Meta</h2>
<ul class="noBullet">
<li><a class="feedlink" href="<?php URL::out( 'atom_feed', array( 'index' => 1)); ?>"><?php _e('Entry feed'); ?></a></li>
<li><a class="feedlink" href="<?php URL::out( 'atom_feed_comments'); ?>"><?php _e('Comment feed'); ?></a></li>
<?php if ($loggedin)
{ ?>
	<li><a href="<?php Site::out_url( 'admin' ); ?>" title="<?php _e('Admin Area'); ?>"><?php _e('Admin'); ?></a></li>
<?php } else { ?>
	<li><a href="<?php Site::out_url( 'login' ); ?>" title="<?php _e('Login'); ?>"><?php _e('Login'); ?></a></li>
  <?php } ?>
</ul>
</div>
