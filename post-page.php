<?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>
<div class="kadima_blog_full">
<?php  if(has_post_thumbnail()): 
		$defalt_arg = array('class' => "kadima_img_responsive"); 
		?>
		<div class="kadima_blog_thumb_wrapper_showcase">						
			<div class="kadima_blog-img">
			<?php the_post_thumbnail('wl_page_thumb',$defalt_arg); ?>
			</div>						
		</div>
		<?php endif; ?>
		<div class="kadima_blog_post_content">
			<?php the_content( __( 'Read More' , 'kadima' ) ); ?>
		</div>
</div>	
<div class="push-right">
	<hr class="blog-sep header-sep">
</div>
<?php comments_template( '', true ); ?>
<?php
endwhile;
endif; ?>