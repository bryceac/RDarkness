<?php /*
Copyright (c) 2012 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/ ?>
<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); }
class rdarkness extends Theme
{
	public function action_init_theme()
	{
		// get tags working
		Format::apply( 'tag_and_list', 'post_tags_out' );
		
		// limit content shown
		Format::apply_with_hook_params( 'more', 'post_content_out', _t("\r\nmore"), 100, 1 );
	}
	
	public function add_template_vars()
	{
		// get pages variable to work
		if ( !$this->template_engine->assigned( 'pages' ) ) {
			$this->assign( 'pages', Posts::get( 'page_list' ) );
		}
		
		parent::add_template_vars();
	}
}
?>
