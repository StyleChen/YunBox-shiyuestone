<!-- service section -->
<?php $wl_theme_options = kadima_get_options(); ?>
<div class="kadima_service">
<?php if($wl_theme_options['home_service_heading'] !='') { ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="kadima_heading_title">
				<h3><?php echo esc_attr($wl_theme_options['home_service_heading']); ?></h3>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<div class="container">
		<div class="row isotope" id="isotope-service-container">
			<?php for($i=1; $i<4; $i++ ) { ?>
			<div class=" col-md-4 service">
				<div class="kadima_service_area appear-animation bounceIn appear-animation-visible">
					<?php if($wl_theme_options['service_icons_'.$i] !='') { ?><div class="kadima_service_iocn pull-left"><i class="<?php echo esc_attr($wl_theme_options['service_icons_'.$i]); ?>"></i></div><?php } ?>
					<div class="kadima_service_detail media-body">
						<?php if($wl_theme_options['service_title_'.$i] !='') { ?><h3><a href="<?php echo esc_url($wl_theme_options['service_link_'.$i]); ?>"><?php echo esc_attr($wl_theme_options['service_title_'.$i]); ?></a></h3><?php } ?>
						<?php if($wl_theme_options['service_text_'.$i] !='') { ?><p><?php echo apply_filters('the_content', $wl_theme_options['service_text_'.$i], true); ?></p><?php } ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- /Service section -->