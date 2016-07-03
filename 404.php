<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<?php $theme->display( 'header' ); ?>
<?php $theme->display( 'sidebar' ); ?>
<main>
<p><?php _e('Content can not be found.'); ?></p> 
<p><?php _e('Perhaps a search can help.'); ?></p> 
</main>
<?php $theme->display( 'footer' ); ?>