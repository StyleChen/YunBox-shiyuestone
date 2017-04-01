<?php get_header();
get_template_part("post","public");?>

<div class="container" style="margin-top: 2rem;">
	<div class="row kadima_blog_wrapper">
        <?php get_sidebar(); ?>
        <div class="col-md-9">
            <?php woocommerce_content(); ?>
        </div>

	</div>
</div>	
<?php get_footer(); ?>