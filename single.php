<?php get_header();  ?>
<div class="project-bg"></div>
<div class="containerSelf">
	<div class="row kadima_blog_wrapper">
	<div class="col-md-12">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h2 class="text-center"><?php if(!is_single()) {?><a href="<?php the_permalink(); ?>"><?php } ?><?php the_title(); ?></a></h2>
            <?php the_content( __( 'Read More' , 'kadima' ) );
            $defaults = array(
                'before'           => '<div class="kadima_blog_pagination"><div class="kadima_blog_pagi">' . __( 'Pages:','kadima'  ),
                'after'            => '</div></div>',
                'link_before'      => '',
                'link_after'       => '',
                'next_or_number'   => 'number',
                'separator'        => ' ',
                'nextpagelink'     => __( 'Next page'  ,'kadima' ),
                'previouspagelink' => __( 'Previous page' ,'kadima'),
                'pagelink'         => '%',
                'echo'             => 1
            );
            wp_link_pages( $defaults ); ?>
		<?php
		endwhile; 
		else : 
		get_template_part('nocontent');
		endif;
		kadima_navigation_posts(); ?>
	</div>
	</div> <!-- row div end here -->	
</div><!-- container div end here -->
<?php get_footer(); ?>


