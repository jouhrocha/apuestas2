<?php
/**
 * The template for displaying archive pages.
 *
 */
get_header(); ?>

<div id="main" class="container">

	<div class="wrap">

	<section id="content" class="main-content showsidebar">

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

					<?php if (is_category()) { ?>
						  <h1><?php echo single_cat_title(); ?></h1>

					<?php } elseif( is_tag() ) { ?>
							<h1><?php _e('Posts Tagged:', 'thesportsbook'); ?> <?php single_tag_title(); ?></h1>

					<?php } elseif (is_day()) { ?>
						   <h1><?php _e('Archive for', 'thesportsbook'); ?> <?php echo get_the_date(); ?></h1>

					<?php } elseif (is_month()) { ?>
							<h1><?php _e('Archive for', 'thesportsbook'); ?> <?php echo get_the_date( _x( 'F Y', 'monthly archives date format', 'thesportsbook' ) ) ?></h1>

					<?php } elseif (is_year()) { ?>
							<h1><?php _e('Archive for', 'thesportsbook'); ?> <?php echo get_the_date( _x( 'Y', 'yearly archives date format', 'thesportsbook' ) ) ?></h1>

					<?php } elseif (is_search()) { ?>
						  <h1><?php _e('Search Results', 'thesportsbook'); ?></h1>

					<?php } elseif ( is_author() ) { ?>
							<h1><?php _e('Author Archive', 'thesportsbook'); ?></h1>

					<?php } elseif ( isset($_GET['paged'] ) && !empty( $_GET['paged']) ) { ?>
							<h1><?php _e('Blog Archives', 'thesportsbook'); ?></h1>

					<?php } ?>

	<div class="newslist horizontal">  
	
	<?php while (have_posts()) : the_post();?>
			<article class="news" id="post-<?php the_ID(); ?>">
	             <?php get_template_part( 'content', 'thumb' ); ?>
				<h4><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
				<?php if (!get_theme_option('bylines-hide-all')) {  get_template_part( 'content', 'meta' );  } ?>		
				<?php the_excerpt();?>
            </article><!-- /news  -->  
	
       <?php endwhile; ?> 
	 </div>

	<?php kriesi_pagination();?> 
				
	</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>