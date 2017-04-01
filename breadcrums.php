<div class="kadima_header_breadcrum_title">	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php if(is_home()){echo "";}else{the_title();} ?></h1>
				<!-- BreadCrumb -->
                <?php if (function_exists('kadima_breadcrumbs')) kadima_breadcrumbs(); ?>
                <!-- BreadCrumb -->
			</div>
		</div>
	</div>	
</div>