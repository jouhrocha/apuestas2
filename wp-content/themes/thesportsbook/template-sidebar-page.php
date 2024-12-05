<?php
/*
Template Name: Sidebar Page
*/
?>
<?php get_header(); ?>

<div id="main" class="container" role="main">

	<div class="wrap">

	<section id="content" class="main-content showsidebar">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry">		
				<?php the_content(); ?>
			</div>
			</article><!-- #post -->
			
		<?php endwhile; endif; ?>

		<?php kriesi_pagination();?> 	
		
	</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>