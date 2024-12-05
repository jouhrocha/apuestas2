<?php
/**
 * The template for displaying 404 pages (not found).
 *
 */

get_header(); ?>

<div id="main" class="container">

	<div class="wrap">

	<section id="content" class="main-content showsidebar">
			
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h1 class="entry-title"><?php _e('Page Not Found', 'thesportsbook'); ?></h1>

				<div class="entry-content">

				<p><?php _e('Page not found or has been removed.  Please browse one of our other pages. Search our site below', 'thesportsbook') ; ?></p>
				<?php get_search_form(); ?>

				</div><!--.entry-content-->

			</article>
				
	</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>