<?php /*
Copyright (c) 2012 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/ ?>
<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<?php $theme->display( 'searchform' ); ?>
<?php if ($display_about) { ?> <!-- check if about should be displayed -->
<?php $about = Options::get( 'about' ); if( !empty( $about ) ) { ?>
		<div class="sb-about">
		<h2><?php _e('About'); ?></h2>
		<p><?php echo $about; ?></p>
		</div>
<?php } ?> <!-- end nested if -->
<?php } ?> <!-- end about if -->
<?php if ($display_pages) { ?> <!-- check if pages should be displayed -->
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
<?php } ?> <!-- end pages if -->
<?php echo $theme->area( 'sidebar' ); ?>

<?php if ($display_archives) { ?> <!-- check if monthly archive should be displayed -->
<div class="archive">
		<h2>Monthly Archive</h2>
		<?php echo $theme->monthly_archives(); ?>
		</div>
<?php } ?> <!-- end monthly archives if -->
<?php if ($display_rcomments) { ?> <!-- check if recent comments should be displayed -->
<div class="recent">
		<h2>Recent Comments</h2>
        <ul>
		<?php foreach($recent_comments as $comment) { ?>
        <li>
        <?php if (is_null($comment->url) || strlen($comment->url) == 0) { ?>
        <?php echo $comment->name; ?> on <a href="<?php echo $comment->post->permalink; ?>"><?php echo $comment->post->title; ?></a>
        <?php } else { ?>
        <a href="<?php echo $comment->url; ?>" rel="nofollow"><?php echo $comment->name; ?></a> on <a href="<?php echo $comment->post->permalink; ?>"><?php echo $comment->post->title; ?></a>
        </li>
        <?php } // end else ?>
        <?php } // end loop ?>
        </ul>
		</div>
        <?php } ?> <!-- end recent comments if -->
        
        <?php if ($display_tags) { ?> <!-- check if tags should be displayed -->
		<div class="tags">
		<h2>Tags</h2>
		<?php echo $theme->tag_cloud(); ?>
		</div>
        <?php } ?> <!-- end tags if -->
        <?php if($display_blogroll) { ?> <!-- check if blogroll should be displayed -->
		<div class="blogroll">
<?php echo $theme->show_blogroll(); ?>
		</div>
        <?php } ?> <!-- end blogroll if -->
<?php if($display_flinks || $display_mlinks || $display_login) { ?> <!-- make sure div is present only when needed -->
<div id="meta">
<h2>Meta</h2>
<ul class="noBullet">
<?php if($display_flinks) { ?> <!-- check if feed links should be displayed -->
<li><a class="feedlink" href="<?php URL::out( 'atom_feed', array( 'index' => 1)); ?>"><?php _e('Entry feed'); ?></a></li>
<li><a class="feedlink" href="<?php URL::out( 'atom_feed_comments'); ?>"><?php _e('Comment feed'); ?></a></li>
<?php } ?> <!-- end feeds if -->
<?php if($display_mlinks) { ?> <!-- check if misc links should be displayed -->
<li><a href="">Subscribe via Amazon</a></li>
<li><a href="">Subscribe via Google Currents</a></li>
<?php } ?> <!-- end misc if -->
<?php if($display_login) { ?> <!-- check if login should be displayed -->
<?php if ($loggedin)
{ ?>
	<li><a href="<?php Site::out_url( 'admin' ); ?>" title="<?php _e('Admin Area'); ?>"><?php _e('Admin'); ?></a></li>
<?php } else { ?>
	<li><a href="<?php Site::out_url( 'login' ); ?>" title="<?php _e('Login'); ?>"><?php _e('Login'); ?></a></li>
  <?php } ?>
<?php } ?> <!-- end main login if -->
</ul>
</div>
<?php } else; ?> <!-- end if statement for meta div -->