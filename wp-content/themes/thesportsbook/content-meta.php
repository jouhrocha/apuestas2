<div class="bylines">

<?php //meta 

	if (!get_theme_option('bylines-hide-date')) { ?>
<time class="entry-date date updated" datetime="<?php the_time('o-m-d') ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>

<?php }

   if (!get_theme_option('bylines-hide-author')) { ?>

<span class="vcard author">	
 <span class="fn"><?php the_author_posts_link(); ?></span>
</span>

<?php } ?>   

<?php  if (!get_theme_option('bylines-hide-category')) { ?> <span class="bl-category">  <?php the_category(', ');?> </span><?php }  ?>   

<?php if (!get_theme_option('bylines-hide-comment')) { ?> <span class="bl-comments"> <a href="<?php the_permalink(); ?>#comments">   <?php comments_number(); ?></a> </span><?php } ?>

</div><!--.bylines-->