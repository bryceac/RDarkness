<?php /*
Copyright (c) 2012 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/ ?>
<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); }
class rdarkness extends Theme
{
	// create options that will allow theme configuration
	var $defaults = array(
	'display_login' => true,
	'display_rcomments' => true,
	'display_pages' => true,
	'display_archive' => true,
	'display_tags' => true,
	'display_blogroll' => true,
	'display_about' => true,
	'display_fmess' => true,
	'display_mlinks' => true,
	'display_flinks' => true,
	);
	
	// set options upon activation
	public function action_theme_activated()
	{
		$opts = Options::get_group(__CLASS__);
		if (empty($opts))
		{
			Options::set_group(__CLASS__, $this->defaults);
		}
	}
	
	// allow theme configuration
	public function action_theme_ui( $theme )
	{
		$ui = new FormUI('RDarkness config');
		$login = $ui->append('checkbox', 'mod_login', 'display_login', _t('Display login'));
		$login->value = Options::get('display_login');
		$rcomments = $ui->append('checkbox', 'mod_rcomments', 'display_rcomments', _t('Display Recent Comments'));
		$rcomments->value = Options::get('display_rcomments');
		$pages = $ui->append('checkbox', 'mod_pages', 'display_pages', _t('Display Pages'));
		$pages->value = Options::get('display_pages');
		$archive = $ui->append('checkbox', 'mod_archives', 'display_archives', _t('Display Archives'));
		$archive->value = Options::get('display_archives');
		$dtags = $ui->append('checkbox', 'mod_tags', 'display_tags', _t('Display Tags'));
		$dtags->value = Options::get('display_tags');
		$blogroll = $ui->append('checkbox', 'mod_blogroll', 'display_blogroll', _t('Display Blogroll'));
		$blogroll->value = Options::get('display_blogroll');
		$mabout = $ui->append('checkbox', 'mod_mod_about', 'display_about', _t('Display About Message'));
		$mabout->value = Options::get('display_about');
		$fmess = $ui->append('checkbox', 'mod_fmess', 'display_fmess', _t('Display Footer Message'));
		$fmess->value = Options::get('display_fmess');
		$mlinks = $ui->append('checkbox', 'mod_mlinks', 'display_mlinks', _t('Display Misc. Links'));
		$mlinks->value = Options::get('display_mlinks');
		$flinks = $ui->append('checkbox', 'mod_flinks', 'display_flinks', _t('Display Feed Links'));
		$flinks->value = Options::get('display_flinks');
		$ui->append('submit', 'save', _t('Save'));
		$ui->set_option('success_message', _t('Configuration saved'));
		return $ui;
	}
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
		
		// add a recent comments variable, to remove need for plugin
		if (!$this->template_engine->assign( 'recent_comments' ) )
		{
			// this limits the list of recent comments to five items
			$this->assign( 'recent_comments', Comments::get( array('limit' => 5, 'status' => Comment::STATUS_APPROVED, 'type' => Comment::COMMENT, 'orderby' => 'date DESC' ) ) );
		}
		
		parent::add_template_vars();
	}
}
?>
