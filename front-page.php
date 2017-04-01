<?php
get_header();
$wl_theme_options = kadima_get_options();
$wl_theme_options['_frontpage'];
if ($wl_theme_options['_frontpage']=="1" && is_front_page())
{
	get_template_part('home','slideshow');
	if($wl_theme_options['service_home'] == "1") {
	get_template_part('home','services');
	}


	get_template_part('home','product');

	get_template_part('home','about');

	get_footer();
}
else
{
	if(is_page()){
		get_template_part('page');
	}else{
		get_template_part('index');
	}
}
?>
