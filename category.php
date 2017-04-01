<?php get_header();
get_template_part("post","public");?>
    <div class="containerSelf">
        <?php get_sidebar(); ?>
        <div id="main" class="col-md-9" style="margin-top: 20px;">
            <?php
            if ( have_posts()):
                while ( have_posts() ): the_post(); ?>
                    <div class="col-md-4">
                        <dl>
                            <dt>
                                <?php if(has_post_thumbnail()){
                                    $img = array('class' => 'kadima_img_responsive img-responsive');
                                    the_post_thumbnail('blog_2c_thumb',$img);
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
                                <p><span>Min. Order:</span><span> <?php if(!is_single()) {?><a href="<?php the_permalink(); ?>"><?php } ?><?php the_title(); ?></a></span></p>
                                <p><span>FOB Price:</span><span><?php the_tags( __(" "), '', '<br />'); ?></span></p>
                            </dd>
                        </dl>
                    </div>
                <?php endwhile;
            endif;
            kadima_navigation(); ?>
        </div>
    </div>

<?php get_footer(); ?>