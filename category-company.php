<?php get_header();
get_template_part("post","public");?>
    <div class="containerSelf">
        <h3 style="margin-left: 2rem;"><?php echo __("",'kadima');
            the_category(' > '); ?></p></h3>
        <hr>


            <?php
            if ( have_posts()):
                while ( have_posts() ): the_post(); ?>
                    <dl class="col-md-4 certificate">
                        <dt>
                            <?php if(has_post_thumbnail()){
                                $img = array('class' => 'kadima_img_responsive img-responsive');
                                the_post_thumbnail('more',$img);
                            } ?>
                        </dt>
                        <dd>
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
                        </dd>
                    </dl>
                <?php endwhile;
            endif;
            kadima_navigation(); ?>

    </div>
    <div class="big"><img class="img-responsive" src="images/G654%20SGS%20Verification%20of%20conformity.jpg" alt=""></div>
<?php get_footer(); ?>