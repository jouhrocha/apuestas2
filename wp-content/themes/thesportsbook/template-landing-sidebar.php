<?php
/*
Template Name: Landing Page with Sidebar
*/
get_header(); ?>

<div id="main" class="container" role="main">

	<div class="wrap">
	

	<div class="top-slider">

	<div class="flexslider">
			<ul class="slides">
		<li>
		<div class="slide-item">
			<div class="slide-image">
				<a href="<?php echo get_post_meta($post->ID,"_pagebutton_url",true);?>">
				<?php echo get_the_post_thumbnail($post->ID,'slideimg', array('class' => 'bannerimg'));?>
				</a>
			</div>
			<div class="slide-content">
				<h2><?php echo get_post_meta($post->ID,"_landing_title",true);?></h2>
				<?php echo get_post_meta($post->ID,"_landing_subtitle",true);?>
				<a href="<?php echo get_post_meta($post->ID,"_pagebutton_url",true);?>" class="visbutton lg cent"><?php echo get_post_meta($post->ID,"_pagebutton_text",true);?></a>
			</div>
		</div>
  		</li>

        	</ul>
      </div>
      </div>


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