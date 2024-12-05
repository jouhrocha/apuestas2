(function($){
$(function() {


	
$('#page_template').change(function() {
        $('#blog-meta').toggle($(this).val() == 'blog.php');
    }).change();

$('#page_template').change(function() {
        $('#landingpage-meta').toggle($(this).val() == 'template-landing.php' || $(this).val() == 'template-landing-sidebar.php');
    }).change();

	
});
})(jQuery);



