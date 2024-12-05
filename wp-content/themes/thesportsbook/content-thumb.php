<?php if ( has_post_thumbnail() ) { ?>
<figure>
		<a href="<?php the_permalink(); ?>">      
        	<?php the_post_thumbnail('article-thumb-lg', array('class' => 'articleimg')); ?>
       </a>
</figure>
<?php } ?>