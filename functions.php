<?php /* Theme Name	: Kadima */
	define('WL_TEMPLATE_DIR_URI', get_template_directory_uri());
	define('WL_TEMPLATE_DIR', get_template_directory());
	define('WL_TEMPLATE_DIR_CORE' , WL_TEMPLATE_DIR . '/core');
	require( WL_TEMPLATE_DIR_CORE . '/menu/menu_nav_walker.php' );
	function kadima_scripts() {
        wp_enqueue_style('bootstrap', '//statics.yunclever.com/bootstrap/3.3.7/css/bootstrap.min.css');
        wp_enqueue_style('animations', '//statics.yunclever.com/animate/3.5.1/animate.css');
        //wp_enqueue_style('theme-animtae', get_template_directory_uri() . '/css/theme-animtae.css');
        wp_enqueue_style('font-awesome', '//statics.yunclever.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('video-js-css', '//statics.yunclever.com/videojs/5.17.0/video-js.min.css');
        wp_enqueue_style('font-family', get_template_directory_uri() . '/css/font-family.css');
        wp_enqueue_style('default', get_template_directory_uri() . '/css/default.css');
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
        wp_enqueue_script('bootstrap-js', '//statics.yunclever.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'));
        wp_enqueue_script('video-js', '//statics.yunclever.com/videojs/5.17.0/video.min.js', array('jquery'));
        wp_enqueue_script('logjs', '//statics.yunclever.com/log/0.3.0/log.min.js', array('jquery'));
        wp_enqueue_script('kadima-theme-script', get_template_directory_uri() .'/js/kadima_theme_script.js', array('jquery'));
        wp_enqueue_script('backstretch', get_template_directory_uri() .'/js/backstretch.js', array('jquery'));
        wp_enqueue_script('shiyue', get_template_directory_uri() .'/js/shiyue.js', array('jquery'));
        if(is_front_page()){
            wp_enqueue_script('jquery.carouFredSel', '//cdn.bootcss.com/jquery.caroufredsel/6.2.1/jquery.carouFredSel.packed.js');
            wp_enqueue_script('photobox-js', '//cdn.bootcss.com/photobox/1.9.9/photobox/jquery.photobox.min.js');
            wp_enqueue_style('photobox', '//cdn.bootcss.com/photobox/1.9.9/photobox/photobox.min.css');
            wp_enqueue_script('waypoints', '//cdn.bootcss.com/waypoints/4.0.1/jquery.waypoints.min.js','','',true);
            wp_enqueue_script('kadima-footer-script', get_template_directory_uri() .'/js/kadima-footer-script.js','','',true);
        }
    }
	add_action('wp_enqueue_scripts', 'kadima_scripts');
	//require( WL_TEMPLATE_DIR_CORE . '/comment-function.php' );
	require(dirname(__FILE__).'/customizer.php');
	function get_client_language(){ // 获取访问用户的语言
		if(isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])){
			preg_match("/([^,;]*)/", $_SERVER["HTTP_ACCEPT_LANGUAGE"], $array_languages);
			return str_replace( "_", "-", strtolower( $array_languages[0] ) );
		}
		return 'xx';
	}
	function kadima_default_settings() {
	    $count12 = array('One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'TEN', 'ELEVEN', 'TWELVE');
    	$Image_silde =  esc_url(get_template_directory_uri() .'/images/placeholder.jpg');
    	$Image_portfolio = esc_url(get_template_directory_uri() .'/images/placeholder.jpg');
        $wl_theme_options = array(
			'upload_image_logo'=>'',
			'height'=>'55',
			'width'=>'55',
			'_frontpage' => '1',
			'blog_count'=>'3',
			'upload_image_favicon'=>'',
			'custom_css'=>'',
			'fc_home'=>'1',
			'fc_title' => __('', 'kadima' ),
			'fc_btn_txt' => __('', 'kadima' ),
			'fc_btn_link' =>'',
			'fc_icon' => 'fa fa-thumbs-up',
			'header_social_media_in_enabled'=>'1',
			'footer_section_social_media_enbled'=>'1',
			'twitter_link' =>"",
			'fb_link' =>"",
			'linkedin_link' =>"",
			'youtube_link' =>"",
			'instagram' =>"",
			'gplus' =>"",
			'email_id' => '',
			'phone_no' => '',
			'footer_customizations' => __('', 'kadima' ),
			'info_copyright' => __('', 'kadima' ),
			'info_tel' => __('', 'kadima' ),
			'info_fax' => __('', 'kadima' ),
			'info_mail'=> __('', 'kadima' ),
			'info_support'=> __('<a href="https://www.yunclever.com" target="_blank">YunClever</a>', 'kadima' ),
			'service_home'=>'1',
			'home_service_heading' => __('', 'kadima' ),
			'portfolio_home'=>'0',
			'port_heading' => __('', 'kadima' ),
			'show_blog' => '0',
			'show_about' => '0',
			'about_title' => __('', 'kadima' ),
			'blog_title' => __('', 'kadima' ),
		);
		return apply_filters( 'kadima_options', $wl_theme_options );
    }
	function kadima_get_options() { // Options API
        return wp_parse_args(
            get_option( 'kadima_options', array() ),
            kadima_default_settings()
        );
	}
	add_action( 'after_setup_theme', 'kadima_head_setup' );
	function kadima_head_setup() {
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 550; //px
		add_image_size('home_post_thumb',340,210,true);
		add_image_size('wl_page_thumb',730,350,true);
		add_image_size('blog_2c_thumb',570,350,true);
		add_theme_support( 'title-tag' );
		load_theme_textdomain( 'kadima', WL_TEMPLATE_DIR_CORE . '/lang' );
		add_theme_support( 'post-thumbnails' );
		//set_post_thumbnail_size( 160 );
		register_nav_menu( 'primary', __( 'Primary Menu', 'kadima' ) );
		register_nav_menu( 'productDetail', __( 'productDetail', 'kadima' ) );
		$args = array('default-color' => '000000',);
		add_theme_support( 'custom-background', $args);
		add_theme_support( 'automatic-feed-links');
		add_theme_support( 'woocommerce' );
		add_editor_style('css/moren.css');
		require( WL_TEMPLATE_DIR . '/options-reset.php'); //Reset Theme Options Here
		if (!isset($_COOKIE['yc_visit_cookie'])) {
			setcookie('yc_visit_cookie', 1, time()+1209600, COOKIEPATH, COOKIE_DOMAIN, false);
		}
	}
	// Read more tag to formatting in blog page
	function kadima_content_more($more) {
	   return '<div class="blog-post-details-item"><a class="kadima_blog_read_btn" href="'.get_permalink().'"><i class="fa fa-plus-circle"></i>"'.__('Read More', 'kadima' ).'"</a></div>';
	}
	add_filter( 'the_content_more_link', 'kadima_content_more' );
	function kadima_excerpt_more($more) { // Replaces the excerpt "more" text by a link
       return '';
	}
	add_filter('excerpt_more', 'kadima_excerpt_more');
	add_action( 'widgets_init', 'kadima_widgets_init'); // widget area
	function kadima_widgets_init() {
    	/*sidebar*/
		register_sidebar( array(
			'name' => __( 'Sidebar', 'kadima' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'kadima' ),
			'before_widget' => '<div class="kadima_sidebar_widget">',
			'after_widget' => '</div>',
			'before_title' => '<div class="kadima_sidebar_widget_title"><h2>',
			'after_title' => '</h2></div>'
		) );
    	register_sidebar( array(
    		'name' => __( 'Footer Widget Area', 'kadima' ),
    		'id' => 'footer-widget-area',
    		'description' => __( 'footer widget area', 'kadima' ),
    		'before_widget' => '<div class="col-md-4 col-sm-12 kadima_footer_widget_column">',
    		'after_widget' => '</div>',
    		'before_title' => '<h3>',
    		'after_title' => '</h3>',
    	) );
	}
	function kadima_breadcrumbs() { // 面包屑导航
        $delimiter = '';
        $home = __('Home', 'kadima' ); // text for the 'Home' link
        $before = '<li>'; // tag before the current crumb
        $after = '</li>'; // tag after the current crumb
        echo '<ul class="breadcrumb">';
        global $post;
        $homeLink = home_url();
        echo '<li><a href="' . $homeLink . '">' . $home . '</a></li>' . $delimiter . ' ';
        if (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0)
                echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $before . ' _e("Archive by category","kadima") "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_day()) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
            echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $before . get_the_title() . $after;
            }

        } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) {
            echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb)
                echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif (is_search()) {
            echo $before . _e("Search results for","kadima")  . get_search_query() . '"' . $after;

        } elseif (is_tag()) {
    		echo $before . _e('Tag','kadima') . single_tag_title('', false) . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . _e("Articles posted by","kadima") . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . _e("Error 404","kadima") . $after;
        }
        echo '</ul>';
	}
	function kadima_pagination($pages = '', $range = 2) { //分页
        $showitems = ($range * 2)+1;
        global $paged;
        if(empty($paged)) $paged = 1;
        if($pages == '')
        {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if(!$pages)
            {
                $pages = 1;
            }
        }
        if(1 != $pages)
        {
            echo "<div class='kadima_blog_pagination'><div class='kadima_blog_pagi'>";
            if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
            if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
            for ($i=1; $i <= $pages; $i++)
            {
                if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                {
                    echo ($paged == $i)? "<a class='active'>".$i."</a>":"<a href='".get_pagenum_link($i)."'>".$i."</a>";
                }
            }
            if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
            if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
            echo "</div></div>";
        }
    }
	function kadima_author_profile( $contactmethods ) { // Add Author Links
    	$contactmethods['youtube_profile'] = __('Youtube Profile URL','kadima');
    	$contactmethods['twitter_profile'] = __('Twitter Profile URL','kadima');
    	$contactmethods['facebook_profile'] = __('Facebook Profile URL','kadima');
    	$contactmethods['linkedin_profile'] = __('Linkedin Profile URL','kadima');
    	return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'kadima_author_profile', 10, 1);
	add_filter('get_avatar','kadima_gravatar_class'); // Add Class Gravtar
	function kadima_gravatar_class($class) {
        $class = str_replace("class='avatar", "class='author_detail_img", $class);
        return $class;
	}
	/* Navigation for Author, Category , Tag , Archive */
	function kadima_navigation() { ?>
        <div class="kadima_blog_pagination">
            <div class="kadima_blog_pagi">
                <?php posts_nav_link(); ?>
            </div>
	    </div>
	<?php
    }
	/* Navigation for Single */
	function kadima_navigation_posts() { ?>
    	<div class="navigation_en">
        	<nav id="wblizar_nav">
            	<span class="nav-previous">
            	       <?php previous_post_link('&laquo; %link'); ?>
            	</span>
            	<span class="nav-next">
            	       <?php next_post_link('%link &raquo;'); ?>
            	</span>
        	</nav>
    	</div>
    <?php
	}
    // Custom WP
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    function customWp_admin_bar() {
        global $wp_admin_bar;
		$wp_admin_bar->remove_node( 'wp-logo' );
		$wp_admin_bar->remove_node( 'view-site' );
		$wp_admin_bar->remove_node( 'view-store' );
        $wp_admin_bar->remove_menu( 'site-name' );
        $wp_admin_bar->remove_menu( 'wp-logo' );
		$wp_admin_bar->remove_menu( 'wporg' );
		$wp_admin_bar->remove_menu( 'updates' );
		$wp_admin_bar->remove_menu( 'comments' );
		$wp_admin_bar->remove_menu( 'user-info' );
		$wp_admin_bar->add_menu( array(
			'id'    => 'menu-trans',
			'title' => '<div>&nbsp;&nbsp;翻译工具&nbsp;&nbsp;</div>',
		) );
		$wp_admin_bar->add_menu( array(
			'parent' => 'menu-trans',
			'id'     => 'menu-trans-baidu',
			'title'  => __( '百度翻译', 'kadima' ),
			'href'   => 'http://fanyi.baidu.com/',
			'meta'   => array( 'target' => '_blank' ),
		) );
		$wp_admin_bar->add_menu( array(
			'parent' => 'menu-trans',
			'id'     => 'menu-trans-youdao',
			'title'  => __( '有道翻译', 'kadima' ),
			'href'   => 'http://fanyi.youdao.com/',
			'meta'   => array( 'target' => '_blank' ),
		) );
		$wp_admin_bar->add_menu( array(
			'parent' => 'menu-trans',
			'id'     => 'menu-trans-iciba',
			'title'  => __( '金山词霸', 'kadima' ),
			'href'   => 'http://fy.iciba.com/',
			'meta'   => array( 'target' => '_blank' ),
		) );
		$wp_admin_bar->add_menu( array(
			'parent' => 'menu-trans',
			'id'     => 'menu-trans-bing',
			'title'  => __( '必应在线翻译', 'kadima' ),
			'href'   => 'http://www.bing.com/translator/',
			'meta'   => array( 'target' => '_blank' ),
		) );
		$wp_admin_bar->add_menu( array(
			'parent' => 'menu-trans',
			'id'     => 'menu-trans-google',
			'title'  => __( '谷歌翻译', 'kadima' ),
			'href'   => 'https://translate.google.com/',
			'meta'   => array( 'target' => '_blank' ),
		) );
		$wp_admin_bar->add_menu( array(
			'id'     => 'page-edit',
			'title'  => __( '可视化编辑', 'kadima' ),
			'href'   => admin_url( '/customize.php?return=%2Fwp-admin%2Findex.php' ),
		) );
		$wp_admin_bar->add_menu( array(
			'id'     => 'page-overview',
			'title'  => __( '预览前台', 'kadima' ),
			'href'   => home_url(),
			'meta'   => array( 'target' => '_blank' ),
		) );
		$wp_admin_bar->add_menu( array(
			'id'     => 'menu-helpdocs',
			'parent' => 'top-secondary',
			'title'  => __( '帮助与文档', 'kadima' ),
			'href'   => 'http://dc.yunclever.com/docs/?g=Doc&m=Index&a=index&tree=1',
			'meta'   => array( 'target' => '_blank' ),
		) );
    }
	function customWp_admin_bar_add_logo() {
        global $wp_admin_bar;
		$wp_admin_bar->add_menu( array(
			'id'    => 'yc-logo',
			'title' => '<img src="'.esc_url(get_template_directory_uri().'/images/logo-white.png').'" style="height: 100%"/>',
		) );
	}
    function customWp_footer_admin_change () {return '';}
	function customWp_right_admin_footer_text($text) {
		$text = 'Power by 云聪智能全网营销平台 - Version : 1.0.7 Build 170221';
		return $text;
	}
    function customWp_screen_options_remove(){ return false;}
    function customWp_screen_help_remove($old_help, $screen_id, $screen){
        $screen->remove_help_tabs();
        return $old_help;
    }
	function customWp_remove_admin_stuff( $translated_text, $untranslated_text, $domain ) {
		$custom_field_text = 'Ver %s.';
		if (!current_user_can( 'update_core') && is_admin() && $untranslated_text === $custom_field_text) {
			return '';
		}
		return $translated_text;
	}
	function customWp_admin_title($admin_title, $title){
	    return $title.' &lsaquo; '.get_bloginfo('name');
	}
	function customWp_remove_menuandmetaboxes() {
		remove_meta_box('revisionsdiv','post','normal'); 						// 修订版本模块
		remove_meta_box('slugdiv','post','normal'); 							// 别名模块
		remove_meta_box('trackbacksdiv','post','normal'); 						// 引用模块
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');	// 近期评论
	    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal');		// 近期草稿
	    remove_meta_box('dashboard_primary', 'dashboard', 'core');				// wordpress博客
	    remove_meta_box('dashboard_secondary', 'dashboard', 'core');			// wordpress其它新闻
	    remove_meta_box('dashboard_right_now', 'dashboard', 'core');			// wordpress概况
	    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');		// wordresss链入链接
	    remove_meta_box('dashboard_plugins', 'dashboard', 'core');				// wordpress链入插件
	    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');			// wordpress快速发布
	    remove_meta_box('dashboard_activity', 'dashboard', 'core');				// 活动
		remove_meta_box('postcustom' , 'post' , 'normal'); 						// 在文章编辑界面移除自定义字段模块
		remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'core');		//
		remove_menu_page('index.php');											// Remove Dashboard
		remove_menu_page('separator1');											// Remove Dashboard Separator
	}
	function customWp_redirect_dashboard() {
		global $parent_file;
		if ( 'index.php' == $parent_file ) {
			if ( headers_sent() ) {
				//echo '<meta http-equiv="refresh" content="0;url=' . admin_url( 'admin.php?page=yc-plugin-dashboard/yc-plugin-dashboard.php' ) . '">';
				//echo '<script type="text/javascript">document.location.href="' . admin_url( 'admin.php?page=yc-plugin-dashboard/Fyc-plugin-dashboard.php' ) . '"</script>';
			} else {
				if ( wp_redirect( admin_url( 'admin.php?page=yc-plugin-dashboard/yc-plugin-dashboard.php' ) ) ) {
					exit();
				}
			}
		}
	}
	function customWp_rename_dashboard_widgets() {
		global $wp_meta_boxes;
		if(array_key_exists('woocommerce_dashboard_status', $wp_meta_boxes['dashboard']['normal']['core'])){
			$wp_meta_boxes['dashboard']['normal']['core']['woocommerce_dashboard_status']['title'] = '电商数据统计';
		}
		if(array_key_exists('woocommerce_dashboard_recent_reviews', $wp_meta_boxes['dashboard']['normal']['core'])){
			$wp_meta_boxes['dashboard']['normal']['core']['woocommerce_dashboard_recent_reviews']['title'] = '最新产品评论';
		}
	}
	function customWp_login() {
		$str = file_get_contents('https://cn.bing.com/HPImageArchive.aspx?idx=0&n=1');
		if( preg_match("/<url>(.+?)<\/url>/ies",$str,$matches) ) {
			$imgurl='https://cn.bing.com'.$matches[1];
			echo'<style type="text/css">body{background: url('.$imgurl.');width:100%;height:100%;background-image:url('.$imgurl.');-moz-background-size: 100% 100%;-o-background-size: 100% 100%;-webkit-background-size: 100% 100%;background-size: 100% 100%;-moz-border-image: url('.$imgurl.') 0;background-repeat:no-repeat\9;background-image:none\9;}</style>';
        }
		echo '<link rel="stylesheet" tyssspe="text/css" href="' . WL_TEMPLATE_DIR_URI. '/custom_login/custom_login.css" />';
    }
	function customWp_login_title() {
        return 'YunBox - 云聪智能全网营销平台';
	}
	function customWp_email_from_name($email){
	    $wp_from_name = get_option('blogname');
	    return $wp_from_name;
	}
	function customWp_email_from_email($email) {
	    $wp_from_email = get_option('admin_email');
	    return $wp_from_email;
	}
	function customWp_remove_cssjs_ver( $src ) { //移除 WordPress 加载的JS和CSS链接中的版本号
		$parts = explode( '?ver', $src );
		return $parts[0];
		//return remove_query_arg( 'ver', $src );
	}
	function customWp_modify_post_mime_types( $post_mime_types ) { //媒体库过滤不同类型的文件
		$post_mime_types['image'] = array( __( '图片' ), __( '图片' ), _n_noop( '图片 <span class="count">(%s)</span>', '图片 <span class="count">(%s)</span>' ) );
		$post_mime_types['video'] = array( __( '视频' ), __( '视频' ), _n_noop( '视频 <span class="count">(%s)</span>', '视频 <span class="count">(%s)</span>' ) );
		$post_mime_types['text'] = array( __( '文本' ), __( '文本' ), _n_noop( '文本 <span class="count">(%s)</span>', '文本 <span class="count">(%s)</span>' ) );
		$post_mime_types['audio'] = array( __( '音频' ), __( '音频' ), _n_noop( '音频 <span class="count">(%s)</span>', '音频 <span class="count">(%s)</span>' ) );
		$post_mime_types['application'] = array( __( '应用文件' ), __( '管理应用文件' ), _n_noop( '应用文件 <span class="count">(%s)</span>', '应用文件 <span class="count">(%s)</span>' ) );
		$post_mime_types['application/pdf'] = array( __( 'PDF' ), __( '管理PDF文件' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDF <span class="count">(%s)</span>' ) );
		return $post_mime_types;
	}
	function customWp_media_row_actions( $actions, $object ) { //后台媒体库显示文件的链接地址
		$actions['url'] = '<a href="'.wp_get_attachment_url( $object->ID ).'" target="_blank">URL</a>';
		return $actions;
	}
	function customWp_change_graphic_lib($array) { //修复阿里云WP_Image_Editor_GD漏洞提示
		return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
	}
	function customWp_init() {
		// Open Sans
		wp_deregister_style('open-sans');
		wp_register_style( 'open-sans', WL_TEMPLATE_DIR_URI.'/css/font-family.css');
		if(is_admin()) wp_enqueue_style( 'open-sans');
		// emoji's
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'customWp_disable_emojis_tinymce' );
		// Embed
		if (!is_admin()) {
			wp_deregister_script('wp-embed');
		}
	}
	/**
	 * Filter function used to remove the tinymce emoji plugin.
	 *
	 * @param    array  $plugins
	 * @return   array             Difference betwen the two arrays
	 */
	function customWp_disable_emojis_tinymce( $plugins ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	}
	function show_product_order($columns){
	   $columns['share'] = __( '分享');
	   return $columns;
	}
	function customWp_product_column( $column, $postid ) {
		if ( $column == 'share' ) {
			echo do_shortcode("[addtoany]");
		}
	}
	function customWp_admin_style_scripts() {
		wp_enqueue_style( 'font-awesome-css', '//cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css');
		wp_enqueue_style('font-family', get_template_directory_uri() . '/css/font-family.css');
		wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/css/admin.css');
		//wp_enqueue_script('webim', get_template_directory_uri() .'/web-im/webim.config.js', array('jquery'));
		//wp_enqueue_script('strophe', get_template_directory_uri() .'/web-im/strophe-1.2.8.min.js', array('jquery'));
		//wp_enqueue_script('websdk', get_template_directory_uri() .'/web-im/websdk-1.4.5.js', array('jquery'));
		if ( $_GET['page'] == 'yc-plugin-dashboard/yc-plugin-dashboard.php') {
			wp_enqueue_style('materialize-css', '//cdn.bootcss.com/materialize/0.97.8/css/materialize.min.css');
			wp_enqueue_style('woocommerce-dashboard',  get_template_directory_uri() . '/../../plugins/woocommerce/assets/css/dashboard.css');
			wp_enqueue_style('animate-css', '//cdn.bootcss.com/animate.css/3.5.2/animate.min.css');
			wp_enqueue_script('jquery2', '//cdn.bootcss.com/jquery/2.2.4/jquery.min.js');
	        wp_enqueue_script('materialize-js', '//cdn.bootcss.com/materialize/0.97.8/js/materialize.min.js', array('jquery2'));
	        wp_enqueue_script('echarts-js', '//cdn.bootcss.com/echarts/3.3.1/echarts.min.js', array('jquery2'));
			wp_enqueue_style( 'layim-style', '//cdn.yunclever.com/static/layui/css/layui.css' );
			wp_enqueue_script('layim', '//cdn.yunclever.com/static/layui/layui.js', array('jquery2'));
			wp_enqueue_script('onlinesupport', get_template_directory_uri() .'/js/onlinesupport.js', array('jquery2'));
		}
		if ( $_GET['page'] == 'yc-plugin-dashboard/yc-setting.php') {
			wp_enqueue_style('layui-css', '//cdn.yunclever.com/static/layui/css/layui.css');
			wp_enqueue_script('jquery2', '//cdn.bootcss.com/jquery/2.2.4/jquery.min.js');
	        wp_enqueue_script('layui-js', '//cdn.yunclever.com/static/layui/layui.js', array('jquery2'));
		}
	}
	function customWp_plugin_check_missing() {
		$plugins = array(
			array('type' => 'function', 'name' => 'A2A_SHARE_SAVE_init', 'desc' => 'AddToAny Share Buttons'),
			array('type' => 'class', 'name' => 'woocommerce', 'desc' => 'WooCommerce'),
			//array('type' => 'define', 'name' => 'ALM_VERSION', 'desc' => 'Ajax Load More'),
			array('type' => 'define', 'name' => 'WPCF7_VERSION', 'desc' => 'Contact From 7'),
			array('type' => 'define', 'name' => 'DLM_VERSION', 'desc' => 'Download Monitor'),
			array('type' => 'class', 'name' => 'LazyLoad_Images', 'desc' => 'Lazy Load'),
			array('type' => 'class', 'name' => 'Members_Plugin', 'desc' => 'Members'),
			array('type' => 'class', 'name' => 'Tinymce_Advanced', 'desc' => 'TinyMCE Advanced'),
			array('type' => 'define', 'name' => 'WPSEO_VERSION', 'desc' => 'Yoast SEO'),
		);
		for ($i = 0; $i < sizeof($plugins); $i++) {
			$have = false;
			if ($plugins[$i]['type'] == 'class' && class_exists($plugins[$i]['name'])) {
				$have = true;
			}
			if ($plugins[$i]['type'] == 'define' && defined($plugins[$i]['name'])) {
				$have = true;
			}
			if ($plugins[$i]['type'] == 'function' && function_exists($plugins[$i]['name'])) {
				$have = true;
			}
			if (!$have) {
				?>
				<div class="message error"><p><?php printf(__("请先启用'%s'插件！"), $plugins[$i]['desc']); ?></p></div>
				<?php
			}
		}
	}
	function customWp_canonical( $paged = true ) {
	        $link = false;
	        if ( is_front_page() ) {
	                $link = home_url( '/' );
	        } else if ( is_home() && "page" == get_option('show_on_front') ) {
	                $link = get_permalink( get_option( 'page_for_posts' ) );
	        } else if ( is_tax() || is_tag() || is_category() ) {
	                $term = get_queried_object();
	                $link = get_term_link( $term, $term->taxonomy );
	        } else if ( is_post_type_archive() ) {
	                $link = get_post_type_archive_link( get_post_type() );
	        } else if ( is_author() ) {
	                $link = get_author_posts_url( get_query_var('author'), get_query_var('author_name') );
	        } else if ( is_single() ) {
	                //$link = get_permalink( $id );
	        } else if ( is_archive() ) {
	                if ( is_date() ) {
	                        if ( is_day() ) {
	                                $link = get_day_link( get_query_var('year'), get_query_var('monthnum'), get_query_var('day') );
	                        } else if ( is_month() ) {
	                                $link = get_month_link( get_query_var('year'), get_query_var('monthnum') );
	                        } else if ( is_year() ) {
	                                $link = get_year_link( get_query_var('year') );
	                        }
	                }
	        }
	        if ( $paged && $link && get_query_var('paged') > 1 ) {
	                global $wp_rewrite;
	                if ( !$wp_rewrite->using_permalinks() ) {
	                        $link = add_query_arg( 'paged', get_query_var('paged'), $link );
	                } else {
	                        $link = user_trailingslashit( trailingslashit( $link ) . trailingslashit( $wp_rewrite->pagination_base ) . get_query_var('paged'), 'archive' );
	                }
	        }
	        echo '<link rel="canonical" href="'.$link.'"/>';
	}
	function customWp_autoset_featured() {
		global $post;
		$already_has_thumb = has_post_thumbnail($post->ID);
		if (!$already_has_thumb)  {
			$attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
			if ($attached_image) {
				foreach ($attached_image as $attachment_id => $attachment) {
					set_post_thumbnail($post->ID, $attachment_id);
				}
			}
		}
	}
	//remove_action('admin_init', '_maybe_update_core');
	//remove_action('admin_init', '_maybe_update_plugins');
	//remove_action('admin_init', '_maybe_update_themes');
	//remove_action('admin_notices', 'update_nag', 3);
	//remove_action('load-plugins.php', 'wp_update_plugins');
	//remove_action('load-themes.php', 'wp_update_themes');
	//remove_action('load-update.php', 'wp_update_plugins');
	//remove_action('load-update.php', 'wp_update_themes');
	//remove_action('load-update-core.php', 'wp_update_plugins');
	//remove_action('load-update-core.php', 'wp_update_themes');
	remove_action('welcome_panel', 'wp_welcome_panel');
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0 );//移除相邻文章的url
	remove_action('wp_head', 'feed_links_extra', 3); 			//去除评论feed
	remove_action('wp_head', 'feed_links', 2);					//去除文章feed
	remove_action('wp_head', 'index_rel_link');					//移除当前页面的索引
	remove_action('wp_head', 'parent_post_rel_link', 10, 0 );	//移除后面文章的url
	remove_action('wp_head', 'rsd_link');						//针对Blog的远程离线编辑器接口
	remove_action('wp_head', 'start_post_rel_link', 10, 0);		//移除最开始文章的url
	remove_action('wp_head', 'wlwmanifest_link');				//Windows Live Writer接口
	remove_action('wp_head', 'wp_generator');					// 移除版本号
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );	//自动生成的短链接
	//remove_action('init', 'wp_schedule_update_checks');	// 关闭更新检查定时作业
	//wp_clear_scheduled_hook('wp_version_check');		// 移除已有的版本检查定时作业
	//wp_clear_scheduled_hook('wp_update_plugins');		// 移除已有的插件更新定时作业
	//wp_clear_scheduled_hook('wp_update_themes');		// 移除已有的主题更新定时作业
	//wp_clear_scheduled_hook('wp_maybe_auto_update');	// 移除已有的自动更新定时作业
	if ( is_admin() ) {
		//add_action('admin_notices', 'customWp_plugin_check_missing');
		add_action('admin_enqueue_scripts', 'customWp_admin_style_scripts');
		add_action('admin_bar_menu', 'customWp_admin_bar_add_logo', 1); //最后一个参数是菜单的位置
		add_action('admin_menu','customWp_remove_menuandmetaboxes');
		add_action('admin_head', 'customWp_redirect_dashboard');
		add_filter('admin_footer_text', 'customWp_footer_admin_change', 9999);
		add_filter('admin_title', 'customWp_admin_title', 10, 2);
	}
	add_action('init', 'customWp_init');
	add_action('login_head', 'customWp_login');
	add_action('manage_product_posts_custom_column', 'customWp_product_column', 10, 2 );
	add_action('wp_dashboard_setup', 'customWp_rename_dashboard_widgets', 999);
	add_action('wp_head', 'customWp_canonical');
	add_action('wp_before_admin_bar_render', 'customWp_admin_bar', 0);
	//add_action('the_post', 'customWp_autoset_featured');
	//add_action('save_post', 'customWp_autoset_featured');
	//add_action('draft_to_publish', 'customWp_autoset_featured');
	//add_action('new_to_publish', 'customWp_autoset_featured');
	//add_action('pending_to_publish', 'customWp_autoset_featured');
	//add_action('future_to_publish', 'customWp_autoset_featured');
	//add_filter('automatic_updater_disabled', '__return_true');	// 彻底关闭自动更新
	add_filter('contextual_help', 'customWp_screen_help_remove', 999, 3 );
	add_filter('emoji_svg_url', '__return_false');
	add_filter('gettext', 'customWp_remove_admin_stuff', 20, 3);
	add_filter('login_headertitle', 'customWp_login_title');
	add_filter('media_row_actions', 'customWp_media_row_actions', 10, 2 );
	add_filter('manage_edit-product_columns', 'show_product_order',15 );
	add_filter('post_mime_types', 'customWp_modify_post_mime_types' );
	//add_filter('pre_site_transient_update_core', '__return_null');
	//add_filter('pre_site_transient_update_plugins', '__return_null');
	//add_filter('pre_site_transient_update_themes', '__return_null');
	add_filter('style_loader_src', 'customWp_remove_cssjs_ver', 15, 1 );
	add_filter('screen_options_show_screen', 'customWp_screen_options_remove');
	add_filter('script_loader_src', 'customWp_remove_cssjs_ver', 15, 1 );
	add_filter('update_footer', 'customWp_right_admin_footer_text', 11);
	add_filter('wp_mail_from', 'customWp_email_from_email');
	add_filter('wp_mail_from_name', 'customWp_email_from_name');
	add_filter('wp_image_editors', 'customWp_change_graphic_lib' );
	add_filter('xmlrpc_enabled', '__return_false');
	function smilies_reset() {
		global $wpsmiliestrans, $wp_smiliessearch;
		// don't bother setting up smilies if they are disabled
		if ( !get_option( 'use_smilies' ) )
		    return;
		$wpsmiliestrans = array(
		    ':mrgreen:' => 'icon_mrgreen.gif',
		    ':neutral:' => 'icon_neutral.gif',
		    ':twisted:' => 'icon_twisted.gif',
		      ':arrow:' => 'icon_arrow.gif',
		      ':shock:' => 'icon_eek.gif',
		      ':smile:' => 'icon_smile.gif',
		        ':???:' => 'icon_confused.gif',
		       ':cool:' => 'icon_cool.gif',
		       ':evil:' => 'icon_evil.gif',
		       ':grin:' => 'icon_biggrin.gif',
		       ':idea:' => 'icon_idea.gif',
		       ':oops:' => 'icon_redface.gif',
		       ':razz:' => 'icon_razz.gif',
		       ':roll:' => 'icon_rolleyes.gif',
		       ':wink:' => 'icon_wink.gif',
		        ':cry:' => 'icon_cry.gif',
		        ':eek:' => 'icon_surprised.gif',
		        ':lol:' => 'icon_lol.gif',
		        ':mad:' => 'icon_mad.gif',
		        ':sad:' => 'icon_sad.gif',
		          '8-)' => 'icon_cool.gif',
		          '8-O' => 'icon_eek.gif',
		          ':-(' => 'icon_sad.gif',
		          ':-)' => 'icon_smile.gif',
		          ':-?' => 'icon_confused.gif',
		          ':-D' => 'icon_biggrin.gif',
		          ':-P' => 'icon_razz.gif',
		          ':-o' => 'icon_surprised.gif',
		          ':-x' => 'icon_mad.gif',
		          ':-|' => 'icon_neutral.gif',
		          ';-)' => 'icon_wink.gif',
		    // This one transformation breaks regular text with frequency.
		    //     '8)' => 'icon_cool.gif',
		           '8O' => 'icon_eek.gif',
		           ':(' => 'icon_sad.gif',
		           ':)' => 'icon_smile.gif',
		           ':?' => 'icon_confused.gif',
		           ':D' => 'icon_biggrin.gif',
		           ':P' => 'icon_razz.gif',
		           ':o' => 'icon_surprised.gif',
		           ':x' => 'icon_mad.gif',
		           ':|' => 'icon_neutral.gif',
		           ';)' => 'icon_wink.gif',
		          ':!:' => 'icon_exclaim.gif',
		          ':?:' => 'icon_question.gif',
	    );
	}
	//smilies_reset();
?>
