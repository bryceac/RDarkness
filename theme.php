<?php /*
Copyright (c) 2012 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/ ?>
<?php 
namespace Habari;
if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); }
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
	
	// set stuff to show in header, so that child themes can be created easily
	public function action_template_header($theme)
	{
		Stack::add('template_stylesheet', $theme->get_url('/style.css'));
	}
	
	// set options upon activation
	public function action_theme_activated()
	{
		$opts = Options::get_group(__CLASS__);
		if (empty($opts))
		{
			Options::set_group(__CLASS__, $this->defaults);
		}
	}
	
	// required to allow theme configuration
	public function filter_theme_config($configurable)
	{
		$configurable = true;
		return $configurable;
	}
	
	// make configuration form
	public function action_theme_ui($theme)
	{
		$ui = new FormUI('RDarkness config');
		$dis_login = $ui->append(FormControlCheckbox::create('mod_login', __CLASS__.'__display_login')->label(_t('Display login')));
		$dis_login->value = Options::get(__CLASS__.'__display_login');
		$dis_rcomments = $ui->append(FormControlCheckbox::create('mod_rcomments', __CLASS__.'__display_rcomments')->label(_t('Display Recent Comments')));
		$dis_rcomments->value = Options::get(__CLASS__.'__display_rcomments');
		$dis_pages = $ui->append(FormControlCheckbox::create('mod_pages', __CLASS__.'__display_pages')->label(_t('Display Pages')));
		$dis_pages->value = Options::get(__CLASS__.'__display_pages');
		$dis_archives = $ui->append(FormControlCheckbox::create('mod_archives', __CLASS__.'__display_archive')->label(_t('Display Archives')));
		$dis_archives->value = Options::get(__CLASS__.'__display_archive');
		$dis_tags = $ui->append(FormControlCheckbox::create('mod_tags', __CLASS__.'__display_tags')->label(_t('Display Tags')));
		$dis_tags->value = Options::get(__CLASS__.'__display_tags');
		$dis_blogroll = $ui->append(FormControlCheckbox::create('mod_blogroll', __CLASS__.'__display_blogroll')->label(_t('Display Blogroll')));
		$dis_blogroll->value = Options::get(__CLASS__.'__display_blogroll');
		$dis_about = $ui->append(FormControlCheckbox::create('mod_about', __CLASS__.'__display_about')->label(_t('Display About Message')));
		$dis_about->value = Options::get(__CLASS__.'__display_about');
		$dis_fmess = $ui->append(FormControlCheckbox::create('mod_fmess', __CLASS__.'__display_fmess')->label(_t('Display Footer Message')));
		$dis_fmess->value = Options::get(__CLASS__.'__display_fmess');
		$dis_mlinks = $ui->append(FormControlCheckbox::create('mod_mlinks', __CLASS__.'__display_mlinks')->label(_t('Display Misc. Links')));
		$dis_mlinks->value = Options::get(__CLASS__.'__display_mlinks');
		$dis_flinks = $ui->append(FormControlCheckbox::create('mod_flinks', __CLASS__.'__display_flinks')->label(_t('Display Feed Links')));
		$dis_flinks->value = Options::get(__CLASS__.'__display_flinks');
		$ui->append(FormControlSubmit::create('save')->set_caption(_t('Save')));
		$ui->set_settings(array('success_message' => _t('Configuration saved')));
		// return $ui;
		$ui->out();
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
			$this->assign( 'recent_comments', Comments::get( array('limit' => 5, 'status' => Comment::status('approved'), 'type' => Comment::type('comment'), 'orderby' => 'date DESC' ) ) );
		}
		
		parent::add_template_vars();
		
		// assign variables to use with options
		$opts = Options::get_group(__CLASS__);
		
		$this->assign('display_login', $opts['display_login']);
		$this->assign('display_rcomments', $opts['display_rcomments']);
		$this->assign('display_pages', $opts['display_pages']);
		$this->assign('display_archives', $opts['display_archive']);
		$this->assign('display_tags', $opts['display_tags']);
		$this->assign('display_blogroll', $opts['display_blogroll']);
		$this->assign('display_about', $opts['display_about']);
		$this->assign('display_fmess', $opts['display_fmess']);
		$this->assign('display_mlinks', $opts['display_mlinks']);
		$this->assign('display_flinks', $opts['display_flinks']);
		
	}
}
?>
