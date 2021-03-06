<?php /*
Copyright (c) 2016 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/ ?>
<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); }
class rdarkness extends Theme
{
	// create options that will allow theme configuration
	/* var $defaults = array(
	'display_login' => true,
	'display_rcomments' => true,
	'display_pages' => true,
	'display_about' => true,
	'display_flinks' => true,
	); */
	
	// set stuff to show in header, so that child themes can be created easily
	public function action_template_header($theme)
	{
		Stack::add('template_stylesheet', $theme->get_url('/style.css'));
		Stack::add('template_stylesheet', $theme->get_url('/common.css'));
	}
	
	//set stuff to show in footer, so that child themes can be created easily
	public function action_template_footer($theme)
	{
		if (!Stack::has('template_header_javascript', 'jquery') && !Stack::has('template_footer_javascript', 'jquery'))
		{
			Stack::add('template_footer_javascript', Site::get_url('scripts') . '/jquery.js', 'jquery');
		} else;
		Stack::add('template_footer_javascript', $theme->get_url('/fontscale.js'), 'fontscale', 'jquery');
	}
	
	// set options upon activation
	public function action_theme_activated()
	{
	/*	$opts = Options::get_group(__CLASS__);
		if (empty($opts))
		{
			Options::set_group(__CLASS__, $this->defaults);
		} */
	}
	
	// required to allow theme configuration
	/* public function filter_theme_config($configurable)
	{
		$configurable = true;
		return $configurable;
	} */
	
	// make configuration form
	/* public function action_theme_ui($theme)
	{
		$ui = new FormUI('RDarkness config');
		$ui->append('checkbox', 'mod_login', __CLASS__.'__display_login', _t('Display login'));
		$ui->mod_login->value = Options::get(__CLASS__.'__display_login');
		$ui->append('checkbox', 'mod_rcomments', __CLASS__.'__display_rcomments', _t('Display Recent Comments'));
		$ui->mod_rcomments->value = Options::get(__CLASS__.'__display_rcomments');
		$ui->append('checkbox', 'mod_pages', __CLASS__.'__display_pages', _t('Display Pages'));
		$ui->mod_pages->value = Options::get(__CLASS__.'__display_pages');
		$ui->append('checkbox', 'mod_about', __CLASS__.'__display_about', _t('Display About Message'));
		$ui->mod_about->value = Options::get(__CLASS__.'__display_about');
		$ui->append('checkbox', 'mod_flinks', __CLASS__.'__display_flinks', _t('Display Feed Links'));
		$ui->mod_flinks->value = Options::get(__CLASS__.'__display_flinks');
		$ui->append('submit', 'save', _t('Save'));
		$ui->set_option('success_message', _t('Configuration saved'));
		// return $ui;
		$ui->out();
	} */
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
		
		// assign variables to use with options
		
	}
}
?>
