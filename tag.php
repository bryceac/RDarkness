<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<?php $theme->display( 'header' ); ?>
<?php $theme->display( 'sidebar' ); ?>
<main>
 <!-- create loop to get posts --> 
 <?php foreach ($posts as $post) 
 { ?> 
 <article> <!-- container for posts -->
 <header>
 <h2><a href="<?php echo $post->permalink; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title_out; ?></a></h2> 
 <p class="date"><?php echo $post->pubdate->out('F j, Y'); ?></p>
 </header> 
 <div class="entry"><?php echo $post->content_out; ?></div> 
 <footer> <!-- content meta -->
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
 </article> <!-- close post container --> 
 <?php } ?> <!-- end loop -->

<nav id="pagenav"> 
 <?php echo $theme->prev_page_link(); ?> <?php echo $theme->page_selector(null, array( 'leftSide' => 2, 'rightSide' => 2)); ?> <?php echo $theme->next_page_link(); ?> 
</nav> <!-- end pagination area --> 
</main>
<?php $theme->display( 'footer' ); ?>