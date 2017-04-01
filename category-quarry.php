<?php get_header();
get_template_part("post","public");?>
    <div class="containerSelf">
        <h3 style="margin-left: 2rem;"><?php echo __("",'kadima');
            $titleCate = get_the_category();
            echo $titleCate[0]->cat_name; ?></p></h3>
        <hr>

        <section class="exhition">

            <?php
            if ( have_posts()):
                while ( have_posts() ): the_post(); ?>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?php if(has_post_thumbnail()){
                                $img = array('class' => 'kadima_img_responsive img-responsive');
                                the_post_thumbnail('blog_2c_thumb',$img);
                            } ?>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center"><?php the_title(); ?></h4>
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

                        </div>
                    </div>
                <?php endwhile;
            endif;
            kadima_navigation(); ?>
        </section>
    </div>
<?php get_footer(); ?>