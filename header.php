<?php /*
Copyright (c) 2012 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/ ?>
<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>">
<title>
<?php if ($request->display_entry || $request->display_page && isset($post)) { echo "$post->title - "; } ?> <!-- conditional statement that adds post or page title to what the browser recognizes as page title -->
<?php if ($request->display_entries_by_tag && isset( $tag )) { echo(ucwords(Tags::get_by_slug($tag)->term_display) . ' - '); } ?> <!-- conditional statement that adds tag name to the page title -->
<?php if ($request->display_search) { echo("'" . htmlspecialchars( $criteria ) . "' Search Results - "); } ?> <!-- conditional statement based on hmallow_mobile Habari theme -->
<?php Options::out( 'title' ); ?>
</title>
<?php $theme->header(); ?>
<link rel="alternate" href="<?php URL::out( 'atom_feed', array( 'index' => 1)); ?>" title="Entry Feed" type="application/atom+xml">
<link rel="alternate" href="<?php URL::out( 'atom_feed_comments'); ?>" title="Comments feed" type="application/atom+xml">
<link href="<?php Site::out_url( 'theme'); ?>/style.css" rel="stylesheet" type="text/css">
<?php echo $theme->header(); ?>
</head>

<body>
<div id="wrapper"> <!-- wrapping div -->
<!-- place to hold header -->
<div id="top"> <!-- placeholder for logos and such -->
<h1><a href="<?php Site::out_url( 'habari' ); ?>" title="<?php Options::out( 'title' ); ?>"><?php Options::out( 'title' ); ?></a></h1>
<!-- place to hold tagline -->
<p class="tagline"> <?php Options::out( 'tagline' ); ?></p>
</div> <!-- close logo placeholder -->
<div id="header"> <!-- open header div -->
&#160;
</div> <!-- close header -->
