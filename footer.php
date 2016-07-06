<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<div class="divider">&#160;</div> <!-- add divider -->
<footer>
<p><?php Options::out( 'title' ); ?> is powered by <a href="http://habariproject.org">Habari</a>. Theme created by <a href="http://brycecampbell.me">Bryce</a>.</p>
</footer>
</div> <!-- close wrapper -->
<?php echo $theme->footer(); ?>
</body>
</html>