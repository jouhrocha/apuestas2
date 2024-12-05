	<div class="clearboth"></div>
    </div><!--/wrap-->
</div><!--#Main-->

	<?php 

		//Check to See if top footer is hidden or not
		if (!get_theme_option('footer-toparea')) { 

	?>

	<footer id="footer" class="main-footer">
		<div class="wrap">
		
		<div class="widgetarea">

		<?php include(get_stylesheet_directory() . '/footerwidgets.php'); ?>
		
		</div><!--.widgetarea-->
		</div><!--.wrap-->

	</footer>	

	<?php } //top footer check?>


	<?php 

		//Check to See if bottom footer is hidden or not
		if (!get_theme_option('footer-bottomhide')) { 

		?>

	
	<footer id="footerbottom" class="bottom-footer">
		<div class="wrap">
	
		<div class="leftside">

		<?php 

		//Check to See if footer menu is hidden or not
		if (!get_theme_option('footer-menuarea')) { 

		?>

		<?php wp_nav_menu( array( 'container' => 'false', 'theme_location' => 'footermenu', 'menu_class' => 'navfooter','menu_id'=> 'navfooter','fallback_cb' => 'fly_default_menu') ); ?>


		<?php } //menu footer check?>

		<span>
		<?php if (get_theme_option('footer-text')) {  echo stripslashes(get_theme_option('footer-text')); ?>

  		<?php } else { ?>

  		 <?php _e('Copyright ', 'thesportsbook'); ?>&copy; <?php echo(date('Y')); ?> <a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a>, <?php _e('All Rights Reserved', 'thesportsbook'); ?>  <?php if (!get_theme_option('footer-credit')) { ?>| <a href="https://www.flytonic.com/product/sportsbook-theme/">Sports Betting Affiliate Theme</a> from Flytonic.
  		
  		<?php 
			} 

		} ?>
		
		</span>
		</div><!--.leftside-->

		<div class="rightside">

		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footerbottom-widgets') ) : else : ?>
		<?php endif; ?>

		</div><!--.rightside-->
		</div><!--.wrap-->
		
	</footer><!--.bottom-footer-->

	<?php } //bottom footer check ?>



</div><!--.outside -->


<?php wp_footer(); ?>

	<?php
 
	//Output any footer scripts from theme options panel
	echo trim(stripslashes(get_theme_option('footer-script'))); 

	?>

</body>
</html>