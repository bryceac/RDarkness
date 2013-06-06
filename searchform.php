<?php /*
Copyright (c) 2012 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/ ?>
<?php 
namespace Habari;
if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<form method="get" action="<?php URL::out('display_search'); ?>">
<p><input type="text" id="search" name="criteria" value="<?php if (isset($citeria)) { echo htmlentities($criteria, ENT_COMPAT, 'UTF-8'); } else { _e('Search'); } ?>"> <input type="submit" id="searchsubmit" value="<?php _e('Go!'); ?>"></p>
</form>
