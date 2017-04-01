
<aside class="col-md-3 kadima-sidebar">

    <?php
    wp_nav_menu( array(
            'theme_location' => 'productDetail',
            'menu_class' => 'nav navbar-nav productDetail',
            'fallback_cb' => 'kadima_fallback_page_menu',
            'walker' => new kadima_nav_walker(),
        )
    );
    ?>
</aside>