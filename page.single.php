<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<?php $theme->display( 'header' ); ?>
<?php $theme->display( 'sidebar' ); ?>
<main>
 <article> <!-- container for posts -->
 <header>
 <h2><a href="<?php echo $post->permalink; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title_out; ?></a></h2> 
 </header> 
 <div class="entry"><?php echo $post->content_out; ?></div> 
 <footer class="meta"> <!-- content meta -->
 <?php if (count($post->tags)) 
 { ?> 
 	<div class="tags"> 
 	<?php _e('Tagged:'); ?> <?php echo $post->tags_out; ?> 
     </div> 
 <?php } ?>  
 
 <div class="commentcount"><?php echo $theme->comments_link($post, '%d Comments', '%d Comment', '%d Comments' ); ?></div> 
 <!-- display edit link, if logged in -->
 <?php if($loggedin)   
 { ?> 
 <div class="edit">
 <a href="<?php $post->editlink; ?>" title="<?php _e('Edit Post'); ?>"><?php _e('Edit'); ?></a>
 </div> <!-- close edit post space --> 
 <?php } ?> 
 </footer> <!-- close meta space -->
 <?php include("comments.php"); ?>
 </article> <!-- close post container --> 
</main>
<?php $theme->display( 'footer' ); ?>