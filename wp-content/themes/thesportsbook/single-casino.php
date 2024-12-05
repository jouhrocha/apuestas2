<?php
/**
 * The template for displaying all single sportsbook reviews
 */

get_header(); ?>

<div id="main" class="container" role="main">

	<div class="wrap">

	<section id="content" class="main-content" itemscope itemtype="http://schema.org/Review">

	<?php if (have_posts()) : while (have_posts()) : the_post(); 
		// Get Terms and Conditions

		$_tc_enable = (get_post_meta($post->ID,"_tc_enable",true)) ?: '';
		
		$tc_textbox 	= (get_post_meta($post->ID,"_tc_textbox",true)) ?: '';

	?>

	<span itemprop="author" itemscope itemtype="http://schema.org/Person">
			<meta itemprop="name" content="<?php echo get_the_author(); ?>" />
	 </span>

	<meta itemprop="datePublished" content = "<?php the_time('c'); ?>">

	<?php $redirectkey=fly_redirect_slug(); ?>

	<div class="sb-review">
		<div class="col1">
				<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/"><?php the_post_thumbnail('full'); ?></a>
				<span class="sb-rating-area">
						    <span class="rate"><span class="ratetotal" style="width:<?php if(!empty(get_post_meta($post->ID,"_as_rating",true))){ echo get_post_meta($post->ID,"_as_rating",true)*20; }?>%"></span></span>
							<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="ratevalue">
							<span itemprop="ratingValue" class="ratevalue"><?php echo get_post_meta($post->ID,"_as_rating",true);?></span> / 5.0 
							<meta itemprop="bestRating" content="5" />
								<meta itemprop="worstRating" content="1" />
							</span>
								
						</span>
				<span class="bonus-text hilite"><?php echo get_post_meta($post->ID, '_as_bonustext', true);?></span>
				<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/"><a class="visbutton" <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/"><?php if (get_theme_option('betnow-text')) { echo get_theme_option('betnow-text'); } else { ?><?php _e('Bet Now', 'thesportsbook'); ?><?php } ?></a>
		</div>

		<div class="col2">
			<span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Organization">
			<h4><span itemprop="name"><?php the_title(); ?></span></span></h4>
		<p><?php echo get_post_meta($post->ID, '_as_quickheadline', true);?> </p>
			<ul>
				<?php
					$features=get_post_meta($post->ID, '_as_features', true);
					$feat = explode("|", $features);
					for($i = 0; $i < count($feat); $i++){
					echo '<li>'. $feat[$i] .'</li>';
					}
				?>
				</ul>
		</div>
		<div class="col3">
			<figure>
				<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/">
					<img src="<?php echo get_post_meta($post->ID, '_as_thumb1', true);?>" alt="<?php the_title(); ?>" /> 
				</a>
			</figure>
		</div>
	</div>
	
	<?php if ($_tc_enable == 'enabled') { ?>
		<div class="termsrow-review">* <?php echo $tc_textbox; ?></div>
	<?php } ?>

	<div class="entry-content" itemprop="description">
		<?php the_content();?>

	</div>

		<?php endwhile; endif; ?> 

	</section> <!--#content-->

  		
<?php get_footer(); ?>