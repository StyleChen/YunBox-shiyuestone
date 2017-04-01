<?php get_header();?>
<div class="project-bg"></div>
    <div class="containerSelf">
        <h3 style="margin-left: 2rem;"><?php echo __("",'kadima');
            the_category(' > '); ?></p></h3>
        <hr>
            <?php
            if ( have_posts()):
                while ( have_posts() ): the_post(); ?>
                    <div class="col-md-4">
                    <?php if(!is_single()) {?>
                        <a href="<?php the_permalink(); ?>" class="project-a">
                            <dl>
                                <dt>
                                    <?php if(has_post_thumbnail()){
                                        $img = array('class' => 'kadima_img_responsive img-responsive');
                                        the_post_thumbnail('blog_2c_thumb',$img);
                                    } ?>
                                </dt>
                                <dd class="text-center">
                                    <?php the_title(); ?>
                                </dd>
                            </dl>
                        </a>
                    <?php } ?>
                    </div>

                <?php endwhile;
            endif;
            kadima_navigation(); ?>
    </div>


<?php get_footer(); ?>