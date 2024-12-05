<?php get_header(); ?>

<div id="main" class="container">

	<div class="wrap">

		<section id="content" class="main-content showsidebar">
	
	
<?php if (have_posts()) : ?>

	<h1><?php _e('Search Result For', 'thesportsbook'); ?> -  <?php  echo get_search_query(); ?></h1>

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

	<?php else : ?>

		<h1 class="center"><?php _e('No posts found. Try a different search?', 'thesportsbook'); ?></h1>
		<?php include (STYLESHEETPATH. '/searchform.php'); ?>

	<?php endif; ?>

</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>