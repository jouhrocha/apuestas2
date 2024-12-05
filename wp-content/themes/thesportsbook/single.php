<?php
/**
 * The template for displaying all single posts.
 *
 */
get_header(); ?>

<div id="main" class="container">

	<div class="wrap">

	<section id="content" class="main-content showsidebar">

		<?php while (have_posts()) : the_post(); ?>	
			
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="entry-content">

						<?php the_content();?>

					<p class="tagging"><?php the_tags(''.__('Tagged With', 'thesportsbook').'   : ',' &bull; ','<br />'); ?></p>  

					<?php if (!get_theme_option('bylines-hide-all')) { get_template_part( 'content', 'meta' ); } ?>
					
					<?php comments_template(); // Get comments template ?>

				</div><!--.entry-content-->

			</article>

			<?php endwhile; ?>
				
	</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>