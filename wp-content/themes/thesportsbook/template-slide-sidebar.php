<?php
/*
Template Name: Top Slider with Sidebar
*/
get_header(); ?>

<div id="main" class="container" role="main">

	<div class="wrap">
	
	<!-- Slider -->
	<?php
		$args = array('posts_per_page' => 5,'post_type'=>'slider','orderby'=> 'date','order' => 'desc'	);
		$myposts = get_posts( $args );

		if (count($myposts)>0) {

	?>
	<div class="top-slider">

	<div class="flexslider">
			<ul class="slides">
		<?php
		foreach ( $myposts as $post ) { setup_postdata( $post );
		?>
		<li>
		<div class="slide-item">
			<div class="slide-image">
				<a href="<?php echo get_post_meta($post->ID,"_slider_url",true);?>">
				<?php echo get_the_post_thumbnail($post->ID,'slideimg', array('class' => 'bannerimg'));?>
				</a>
			</div>
			<div class="slide-content">
				<h2><?php the_title();?></h2>
				<?php the_content();?>
				<a href="<?php echo get_post_meta($post->ID,"_slider_url",true);?>" class="visbutton lg cent"><?php echo get_post_meta($post->ID,"_button_text",true);?></a>
			</div>
		</div>
  		</li>

		<?php }  ?>

        	</ul>
      </div>
      </div>
  <?php } ?> <!-- slider close-->

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