<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>
<?php if ($request->display_entry || $request->display_page && isset($post)) { echo "$post->title - "; } // conditional statement that adds post or page title to what the browser recognizes as page title ?> 
<?php if ($request->display_entries_by_tag && isset( $tag )) { echo(ucwords(Tags::get_by_slug($tag)->term_display) . ' - '); } // conditional statement that adds tag name to the page title ?> 
<?php if ($request->display_search) { echo("'" . htmlspecialchars( $criteria ) . "' Search Results - "); } // conditional statement based on hmallow mobile Habari theme ?> 
<?php Options::out( 'title' ); ?>

<?php echo $theme->header(); ?> 
<link rel="alternate" href="<?php URL::out( 'atom_feed', array( 'index' => 1)); ?>" title="Entry Feed" type="application/atom+xml"> 
<link rel="alternate" href="<?php URL::out( 'atom_feed_comments'); ?>" title="Comments feed" type="application/atom+xml"> 
</title>
</head>

<body>
<div id="wrapper"> <!-- wrapping div -->
<header id="banner"> <!-- banner area -->
<h1>Test</h1>
<p>Test layout made in HTML 5</p>
</header> <!-- close banner area -->
<div class="divider">&#160;</div> <!-- create divider div -->