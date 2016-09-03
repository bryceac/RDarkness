<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<aside id="bar"> <!-- area to hold sidebar --> 
<nav>
<form method="get" action="<?php URL::out('display_search'); ?>" id="searchform">
<p id="search"><input type="text" name="criteria" value="" placeholder="Search..."></p>
<div class="hidden-submit"><input type="submit" tabindex="-1"></div>
</form>
<ul id="menu">  
<li onClick="return true">Pages <span class="arrow">&#709;</span><ul>  
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
 <li onClick="return true">Meta <span class="arrow">&#709;</span><ul>
 <li><a class="feedlink" href="<?php URL::out( 'atom_feed', array( 'index' => 1)); ?>"><?php _e('Entry feed'); ?></a></li> 
 <li><a class="feedlink" href="<?php URL::out( 'atom_feed_comments'); ?>"><?php _e('Comment feed'); ?></a></li> 
 <?php if ($loggedin) 
 { ?> 
 	<li><a href="<?php Site::out_url( 'admin' ); ?>" title="<?php _e('Admin Area'); ?>"><?php _e('Admin'); ?></a></li> 
 <?php } else { ?> 
 	<li><a href="<?php Site::out_url( 'login' ); ?>" title="<?php _e('Login'); ?>"><?php _e('Login'); ?></a></li> 
   <?php } ?>  
 </ul> 
 </li> 
</ul>
</nav>
<div id="other"> <!-- placeholder for other -->
<?php echo $theme->area( 'sidebar' ); ?>
</div>
</aside> <!-- close side bar area -->
