<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
?>

<!--
 * Copyright (c) 2015 Nick Hayward
 * All rights reserved
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/jpg" href="../img/CBLogo_Icon.png" />
	<title>CB Editing - The Editor's Folio</title>
	<meta name="description" content="Carly Bornstein blogs about editing, writing, and the book world in The Editor's Folio">
	<meta name="keywords" content="Freelance, editor, blog, writing, publishing, folio">
	<meta name="author" content="Carly Bornstein">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- Analytics -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-59609404-1', 'auto');
		ga('send', 'pageview');
	</script>
	<!-- Sendloop Subscription Widget - Start -->
	<script type="text/javascript" charset="utf-8">
		window.sendloopSubscribeSettings = {
			selector: ".sendloop-subscribe",
			key: "0yU/g78/b019b0ea",
			account: "c9a8229-0e6814",
			showSubscriberCount: false
		};
	</script>
	<script type="text/javascript" charset="utf-8">(function() {var w = window;var d = document;function l() {var s = d.createElement('script');s.type = 'text/javascript';s.async = true;s.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'sendloop.com/media/button/subscribeme.js';var x = d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);}if (w.attachEvent) {w.attachEvent('onload', l);} else {w.addEventListener('load', l, false);}})();</script>
	<!-- Sendloop Subscription Widget - End -->
	<!-- Twitter -->
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	<!-- Share This -->
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "b38dfe2a-fe6b-4451-9c5a-9f7702744a91", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>
</head>

<body>
	<div id="wrapper">
		<div id="header"></div>
		<div id="nav">
			<a class="nav-links" href="../">Home</a>
			<a class="nav-links" href="../services/">Services</a>
			<a class="nav-links" href="../about/">About</a>
			<div class="active">Blog</div>
			<a class="nav-links" href="../recommendations/">Recommendations</a>
			<a class="nav-links" href="../contact/">Contact</a>
		</div>
		<div id="content" align="center">
			<div class="folio">
				<img src="../img/Editors_Folio_CB_Editing.png" />
			</div><br />
			<?php
			$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			if (strpos($url,'?p=') !== false) {
				$param = explode("=", $url);
				$postId = explode("#", $param[1]);
				$post_object = get_post( $postId[0] );
				setup_postdata( $post_object ); ?>
				<div class="allPosts">
					<a href="../blog">Back to all posts</a>
				</div>
				<br />
				<div id="blog">
					<div id="posts">
						<div class="post">
							<h3><?php the_title(); ?></h3>
							<div class="published">Published on <?php the_time('F j, Y'); ?>, by <b>Carly Bornstein</b></div><br />
							<!-- to add the time -> <?php the_time('g:i a'); ?> -->
							<?php the_content(); ?>
							<br />
							<div class="shareDesc">
								<b>Share this post:</b>
							</div>
							<br />
							<div class="share">
								<a href="https://twitter.com/share" class="twitter-share-button" data-text="CB Editing - The Editor's Folio" data-via="FromCarly" data-size="large" data-count="none">Tweet</a>
								<span class='st_facebook_large' displayText='Facebook'></span>
								<span class='st_googleplus_large' displayText='Google +'></span>
								<span class='st_linkedin_large' displayText='LinkedIn'></span>
								<span class='st_pinterest_large' displayText='Pinterest'></span>
							</div>
							<div class="subscribe-posts">
								<a href="#" class="sendloop-subscribe sendloop-as-button">Subscribe to my blog</a>
							</div>
							<br /><br /><br />
							<?php
							global $comment;
							$mycomments = get_comments(array('post_id' => get_the_ID()));
							?>
							<div class="comNum">
								<i><?php comments_number() ?></i>
							</div><br />
							<?php foreach ( $mycomments as $comment ): ?>
								<div class="comment">
									On <?php comment_date('F j, Y'); ?> at <?php comment_time('g:i a'); ?>, <b><?php comment_author(); ?></b> said:
									<?php comment_text(); ?>
								</div>
							<?php endforeach;
							$comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
					            'author' => '' .
					                        '<label for="author">' . __( 'Your Name:' ) . '</label> ' .
					                        '<span class="required"> * </span>' .
					                        '<input id="author" name="author" type="text" value="' .
					                        esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
					                        '<!-- #form-section-author .form-section -->' .
					                        '<br /><br />',
					            'email'  => '' .
					                        '<label for="email">' . __( 'Your Email:' ) . '</label> ' .
					                        '<span class="required"> * </span>' .
					                        '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' .
					                		'<!-- #form-section-email .form-section -->' . 
					                		'<br /><br />',
					            'url'    => '' ) ),
					            'comment_field' => '' .
					                        '<label for="comment">' . __( 'Comment:' ) . '</label>' .
					                        '<span class="required"> *</span>' .
					                        '<br />' .
					                        '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .
					                        '<!-- #form-section-comment .form-section -->',
					            			'comment_notes_after' => '',
					        ); ?>
					        <div class="comment-form">
					        	<?php comment_form($comment_args); ?>
					        </div>
				    	</div>
				    </div>
				    <div id="side-panel">
				    	<b>Share this post:</b><br /><br />
				    	<div class="share-side">
							<a href="https://twitter.com/share" class="twitter-share-button" data-text="CB Editing - The Editor's Folio" data-via="FromCarly" data-size="large" data-count="none">Tweet</a>
							<span class='st_facebook_large' displayText='Facebook'></span>
							<span class='st_googleplus_large' displayText='Google +'></span><br />
							<span class='st_linkedin_large' displayText='LinkedIn'></span>
							<span class='st_pinterest_large' displayText='Pinterest'></span>
						</div><br />
						<div class="subscribe-blog">
							<a href="#" class="sendloop-subscribe sendloop-as-button">Subscribe to my blog</a>
						</div><br />
						<div id="twitter">
							<a class="twitter-timeline" href="https://twitter.com/FromCarly" data-widget-id="588140442736267265">Tweets by @FromCarly</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div id="blog">
					<div id="posts">
					    <?php $args = array();
						query_posts( $args );
						if ( have_posts() ) : while (have_posts()) : the_post(); ?>
							<div class="post">
								<h3><?php the_title(); ?></h3>
								<div class="published">Published on <?php the_time('F j, Y'); ?>, by <b>Carly Bornstein</b></div><br />
								<!-- to add the time -> <?php the_time('g:i a'); ?> -->
								<?php the_excerpt(); ?>
								<br />
								<div class="more">
									<a href="<?php the_permalink(); ?>">Read More</a>
								</div>
					    	</div>
						<?php endwhile; ?>
						<?php else : ?>
							No posts found
						<?php endif; ?>
					</div>
					<div id="side-panel">
						<div class="subscribe-blog">
							<a href="#" class="sendloop-subscribe sendloop-as-button">Subscribe to my blog</a>
						</div><br />
						<div id="twitter">
							<a class="twitter-timeline" href="https://twitter.com/FromCarly" data-widget-id="588140442736267265">Tweets by @FromCarly</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
		<hr />
		<div id="footer" align="center">
			<div id="social-media">
				<a href="https://plus.google.com/+Carlybornsteinediting/about" target="_blank"><img src="../img/googleplus_icon.png" /></a>
				<a href="https://www.linkedin.com/pub/carly-bornstein/66/b48/b98" target="_blank"><img src="../img/LinkedIn_icon.png" /></a>
				<a href="https://twitter.com/fromcarly" target="_blank"><img src="../img/Twitter_icon.png" /></a>
				<a href="https://www.facebook.com/cbbookediting" target="_blank"><img src="../img/facebook_icon.png" /></a>
			</div>
			<img id="heart-book" src="../img/BookTattooImage.png">
			<p>Site created by Nicholas W. Hayward</p>
			<p>Content copyright 2015. Carly T. Bornstein. All rights reserved.</p>
		</div>
	</div>
</body>

</html>