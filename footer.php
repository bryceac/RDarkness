<?php /*
Copyright (c) 2012 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/ ?>
<?php 
if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<div id="footer"> <!-- open footer div -->
&#160;
</div> <!-- close footer -->
<div id="notice"> <!-- place to hold footer message -->
<?php if ($display_fmess) { ?> <!-- check if footer message should be displayed -->
<p><?php Options::out( 'title' ); ?> is powered by <a href="http://habariproject.org">Habari</a>. Theme created by Bryce.</p>
</div> <!-- place to hold footer message -->
<?php } ?> <!-- end footer message if -->
<?php echo $theme->footer(); ?>
</div><!-- close wrapper -->
</body>
</html>
