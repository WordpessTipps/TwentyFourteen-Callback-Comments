<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentyfourteen_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @dev McCouman
 */


	if ( post_password_required() )
		return;

	if ( is_user_logged_in() ) { 

?>
	<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _n( '(1) &ldquo;%2$s&rdquo;', '(%1$s) &ldquo;%2$s&rdquo;', get_comments_number(), 'twentyfourteen' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation clearfix">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyfourteen' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyfourteen' ) ); ?></div>
		</nav><!-- #comment-nav-above .site-navigation .comment-navigation -->
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use twentyfourteen_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define twentyfourteen_comment() and that will be used instead.
				 * See twentyfourteen_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'twentyfourteen_comment' ) );
			?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation clearfix">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyfourteen' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyfourteen' ) ); ?></div>
		</nav><!-- #comment-nav-below .site-navigation .comment-navigation -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p style="display:none;" class="nocomments"><?php _e( 'Comments are closed.', 'twentyfourteen' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</div><!-- #comments .comments-area -->
<?php 
} else { ?>
<div id="comments" class="comments-area">


<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _n( '(1) &ldquo;%2$s&rdquo;', '(%1$s) &ldquo;%2$s&rdquo;', get_comments_number(), 'twentyfourteen' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation clearfix">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyfourteen' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyfourteen' ) ); ?></div>
		</nav><!-- #comment-nav-above .site-navigation .comment-navigation -->
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use twentyfourteen_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define twentyfourteen_comment() and that will be used instead.
				 * See twentyfourteen_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'twentyfourteen_comment' ) );
			?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation clearfix">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyfourteen' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyfourteen' ) ); ?></div>
		</nav><!-- #comment-nav-below .site-navigation .comment-navigation -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>  
<script>
$(function() {
  $("#start").mousover(function() {
  var scripts = document.getElementsByTagName("script"); for (i=0; i<scripts.length; i++) { var url = scripts[i].getAttribute("src"); if(!url) continue; if(url.indexOf("callback")>=0) { scripts[i].parentNode.removeChild(scripts[i]); }  }
  var now = new Date(); url = "<?php bloginfo('template_directory'); ?>/ajax-comment.php?id=<?php the_ID(); ?>&time="+now.getTime()+"&callback=callback";
  var script = document.createElement("script"); script.setAttribute("src", url); script.setAttribute("type", "text/javascript"); document.getElementsByTagName("head")[0].appendChild(script); });
}); function callback(data) { document.getElementById("jsonp_antwort").innerHTML = data; }
</script>

<form action="<?php bloginfo('template_directory'); ?>/wp-comments-post.php" method="post" id="commentform" class="comment-form">

<div id="respond" class="comment-respond">
  <h3 id="reply-title" class="comment-reply-title">Hinterlasse eine Antwort <small><a rel="nofollow" id="cancel-comment-reply-link" href="/2013/10/podunion-laed-zur-plauderstunde-ein/#respond" style="display:none;">Antworten abbrechen</a></small></h3>

<div id="jsonp_antwort">
<div id="start">
<div id="commentform" class="comment-form">

<p class="comment-notes">Deine E-Mail-Adresse wird nicht veröffentlicht. Erforderliche Felder sind markiert <span class="required">*</span></p>

<p class="comment-form-author">
	<label for="author">Name <span class="required">*</span></label> 
	<div class="inputer" id="inputer"></div>
</p>

<p class="comment-form-email">
	<label for="email">E-Mail-Adresse <span class="required">*</span></label> 
	<div class="inputer" id="inputer"></div>
</p>

<p class="comment-form-url">
	<label for="url">Website</label>
	<div class="inputer" id="inputer"></div>
</p>

<p class="comment-form-comment">
	<label for="comment">Kommentar</label> 
	<div class="inputer" id="inputertext"></div>
</p>

<p class="form-allowed-tags">Du kannst folgende <abbr title="HyperText Markup Language">HTML</abbr>-Tags benutzen:  <code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </code></p>						

<p class="form-submit">
	<div id="callbutton" style="width: 159px;">Kommentar abschicken</div>
</p>
</div>
</div>
</div>
</form>
	</div>
</div><!-- #comments .comments-area -->
<?php } ?>
