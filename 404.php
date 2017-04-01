<?php get_header(); ?>
<div class="kadima_header_breadcrum_title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php _e('404 Error','kadima'); ?></h1>
				<ul class="breadcrumb">
					<li><a href="<?php echo home_url( '/' ); ?>"><?php _e('Home','kadima'); ?></a></li>
					<li><?php _e('404 Error','kadima'); ?></li>
				
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row kadima_blog_wrapper">
		<div class="col-md-12 hc_404_error_section">
			<div class="error_404">
				<h2><?php _e('404','kadima'); ?></h2>
				<h4><?php _e('Whoops... Page Not Found !!!','kadima'); ?></h4>
				<p><?php _e('We`re sorry, but the page you are looking for doesn`t exist.','kadima'); ?></p>
				<p><a href="<?php echo home_url( '/' ); ?>"><button class="kadima_send_button" type="submit"><?php _e('Go To Homepage','kadima'); ?></button></a></p>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
