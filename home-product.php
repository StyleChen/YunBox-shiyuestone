<!-- portfolio section -->
<?php $wl_theme_options = kadima_get_options(); ?>
<section class="sectionFirst">
    <div class="container">
        <div class="col-md-12 text-center">
            <img class="img-responsive secImg animated fadeInDown" src="wp-content/themes/YunBox-core-masters/images/section-title.png" alt="">
        </div>
        <div class="col-md-12">
            <?php for( $i=1; $i<=12; $i++ ) {
                if(!empty($wl_theme_options["custom_img_1_".$i])) {    ?>

            <div class="secItem">
                <div class="col-md-4 animated">
                    <div class="secColImg1">
                        <img class="img-responsive" src="<?php echo esc_url($wl_theme_options["custom_img_1_".$i]) ?>" alt="">
                    </div>
                    <div class="secItemD">
                        <?php for( $j=1; $j<=12; $j++ ) {
                        if(!empty($wl_theme_options["custom_img_1_".$j])){ ?>
                            <span></span>
                        <?php } } ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <h5 class="secH5 animated"><?php echo esc_attr($wl_theme_options["custom_title_1"]) ?></h5>
                    <ul class="secUl">
                        <li class="animated">
                            <h6 class="left">Origin:</h6>
                            <p class="left"><?php echo esc_attr($wl_theme_options["custom_title_1_".$i]) ?></p>
                        </li>
                        <li class="animated">
                            <h6 class="left">Surface finished:</h6>
                            <p class="left"><?php echo esc_attr($wl_theme_options["custom_text_1_".$i]) ?></p>
                        </li>
                    </ul>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
    <div class="controller-pre">
        <<
    </div>
    <div class="controller-next">
        >>
    </div>
</section>
<!-- /portfolio section -->
<section class="sectionSecond">
    <div class="container">

        <div class="col-md-12 text-center">
            <img class="img-responsive secImg animated fadeInDown" src="wp-content/themes/YunBox-core-masters/images/section-title.png" alt="">
        </div>
        <div class="col-md-12">
            <?php for( $r=1; $r<=12; $r++ ) {
            if(!empty($wl_theme_options["custom_img_2_".$r])) { ?>
            <div class="secItem2">
                <div class="col-md-8">
                    <h5 class="secH5 animated"><?php echo esc_attr($wl_theme_options["custom_title_2"]) ?></h5>
                    <ul class="secUl">
                        <li class="animated">
                            <h6 class="right">Origin:</h6>
                            <p class="right text-right"><?php echo esc_attr($wl_theme_options["custom_title_2_".$r]) ?></p>
                        </li>
                        <li class="animated">
                            <h6 class="right">Surface finished:</h6>
                            <p class="right text-right"><?php echo esc_attr($wl_theme_options["custom_text_2_".$r]) ?></p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 animated">
                    <div class="">
                        <img class="img-responsive" src="<?php echo esc_url($wl_theme_options["custom_img_2_".$r]) ?>" alt="">
                    </div>
                    <div class="secItemD">
                        <?php for( $t=1; $t<=12; $t++ ) {
                        if(!empty($wl_theme_options["custom_img_2_".$t])) { ?>
                        <span></span>
                        <?php } } ?>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>

    </div>
    <div class="controller-pre">
        <<
    </div>
    <div class="controller-next">
        >>
    </div>
</section>