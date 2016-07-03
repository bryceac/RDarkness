<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<aside id="bar"> <!-- area to hold sidebar -->
<?php if ($display_about) { ?> <!-- check if about should be displayed --> 
<?php $about = Options::get( 'about' ); if( !empty( $about ) ) { ?> 
 		<div class="sb-about"> 
 		<h2><?php _e('About'); ?></h2> 
 		<p><?php echo $about; ?></p> 
 		</div> 
<?php } ?> <!-- end nested if --> 
<?php } ?> <!-- end about if --> 
<nav>
<form method="get" id="searchform">
<p id="search"><input type="text" placeholder="Search..."></p>
</form>
<ul id="menu">
<?php if ($display_pages) { ?> <!-- check if pages should be displayed -->  
<li obClick="return true">Pages <span class="arrow">&#709;</span><ul>  
 <?php if ($request->display_home) 
 { ?> 
 	<li><span class="bold"><?php _e('Home'); ?></span></li> 
 <?php } else { ?> 
 	<li><a href="<?php Site::out_url( 'habari' ); ?>"><?php _e('Home'); ?></a></li> 
 <?php } ?> 
 <!-- list pages --> 
 <?php foreach ($pages as $page) 
 { ?> 
 	<?php if (isset($post) && $page->id == $post->id) 
 	{ ?> 
     	<li><span class="bold"><?php echo $page->title; ?></span></li> 
     <?php } else { ?> 
 		<li><a href="<?php echo $page->permalink; ?>" title="<?php echo $page->title; ?>"><?php echo $page->title; ?></a></li> 
     <?php } ?> 
 <?php } ?> <!-- end loop --> 
 </ul> 
 </li>
 <?php } ?> <!-- end pages if -->
 <?php if($display_flinks || $display_login) { ?> <!-- make sure div is present only when needed --> 
 <li onClick="return true">Meta<ul>
 <?php if($display_flinks) { ?> <!-- check if feed links should be displayed --> 
 <li><a class="feedlink" href="<?php URL::out( 'atom_feed', array( 'index' => 1)); ?>"><?php _e('Entry feed'); ?></a></li> 
 <li><a class="feedlink" href="<?php URL::out( 'atom_feed_comments'); ?>"><?php _e('Comment feed'); ?></a></li> 
 <?php } ?> <!-- end feeds if --> 
 <?php if($display_login) { ?> <!-- check if login should be displayed --> 
 <?php if ($loggedin) 
 { ?> 
 	<li><a href="<?php Site::out_url( 'admin' ); ?>" title="<?php _e('Admin Area'); ?>"><?php _e('Admin'); ?></a></li> 
 <?php } else { ?> 
 	<li><a href="<?php Site::out_url( 'login' ); ?>" title="<?php _e('Login'); ?>"><?php _e('Login'); ?></a></li> 
   <?php } ?> 
 <?php } ?> <!-- end main login if --> 
 </ul> 
 </li>
 <?php } else; ?> <!-- end if statement for meta div --> 
</ul>
</nav>
<?php echo $theme->area( 'sidebar' ); ?>
<div id="other"> <!-- placeholder for other -->
<?php if ($display_rcomments) { ?> <!-- check if recent comments should be displayed --> 
53 <div class="recent"> 
54 		<h2>Recent Comments</h2> 
55         <ul> 
56 		<?php foreach($recent_comments as $comment) { ?> 
57         <li> 
58         <?php if (is_null($comment->url) || strlen($comment->url) == 0) { ?> 
59         <?php echo $comment->name; ?> on <a href="<?php echo $comment->post->permalink; ?>"><?php echo $comment->post->title; ?></a> 
60         <?php } else { ?> 
61         <a href="<?php echo $comment->url; ?>" rel="nofollow"><?php echo $comment->name; ?></a> on <a href="<?php echo $comment->post->permalink; ?>"><?php echo $comment->post->title; ?></a> 
62         </li> 
63         <?php } // end else ?> 
64         <?php } // end loop ?> 
65         </ul> 
66 		</div> 
67         <?php } ?> <!-- end recent comments if --> 
</div>
</aside> <!-- close side bar area -->