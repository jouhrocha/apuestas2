<?php
/**
 * Search form template
 *
 */
?>

<form method="get" class="searchform" id="searchform" action="<?php bloginfo('url'); ?>/">
	<input class="searchinput" value="" id="searchinput" type="text" name="s" placeholder="<?php _e('Search', 'thesportsbook'); ?>..."  />
	<input name="submit" type="submit" class="searchsubmit" value="" />
</form>
