<?php
add_action( 'customize_register', 'kadima_customizer' );
function kadima_customizer( $wp_customize ) {
	$wl_theme_options = kadima_get_options();
    $count12 = array('One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'TEN', 'ELEVEN', 'TWELVE');
	$wp_customize->add_panel(
		'kadima_theme_option',
		array(
	        'title' 	=> __( '主题设置','kadima' ),
	        'priority' 	=> 1, // Mixed with top-level-section hierarchy.
	    )
	);
    $wp_customize->add_section(
        'general_sec',
        array(
            'title' 		=> __( '主题通用设置','kadima' ),
            'description' 	=> '',
			'panel'			=> 'kadima_theme_option',
			'capability'	=> 'edit_theme_options',
            'priority' 		=> 35,
        )
    );
	$wp_customize->add_setting(
		'kadima_options[_frontpage]',
		array(
			'type'    			=> 'option',
			'default'			=> $wl_theme_options['_frontpage'],
			'sanitize_callback'	=> 'kadima_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
		'kadima_front_page',
		array(
			'label'      => __( '显示首页', 'kadima' ),
			'type'		 => 'checkbox',
			'section'    => 'general_sec',
			'settings'   => 'kadima_options[_frontpage]',
		)
	);
    /* Logo */
	$wp_customize->add_setting(
		'kadima_options[upload_image_logo]',
		array(
			'type'    			=> 'option',
			'default'			=> $wl_theme_options['upload_image_logo'],
			'sanitize_callback'	=> 'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'kadima_options[height]',
		array(
			'type'    			=> 'option',
			'default'			=> $wl_theme_options['height'],
			'sanitize_callback'	=> 'kadima_sanitize_integer',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'kadima_options[width]',
		array(
			'type'    			=> 'option',
			'default'			=> $wl_theme_options['width'],
			'sanitize_callback'	=> 'kadima_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'kadima_upload_image_logo',
			array(
				'label'      => __( '网站LOGO', 'kadima' ),
				'section'    => 'general_sec',
				'settings'   => 'kadima_options[upload_image_logo]',
			)
		)
	);
	$wp_customize->add_control(
		'kadima_logo_height',
		array(
			'label'     => __( 'Logo高度', 'kadima' ),
			'type'		=> 'number',
			'section'   => 'general_sec',
			'settings'  => 'kadima_options[height]',
		)
	);
	$wp_customize->add_control(
		'kadima_logo_width',
		array(
			'label'     => __( 'Logo宽度', 'kadima' ),
			'type'		=> 'number',
			'section'   => 'general_sec',
			'settings'  => 'kadima_options[width]',
		)
	);
	$wp_customize->add_setting(
		'kadima_options[upload_image_favicon]',
		array(
			'type'    			=> 'option',
			'default'			=> $wl_theme_options['upload_image_favicon'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback'	=> 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'kadima_upload_image_favicon',
			array(
				'label'      => __( '自定义favicon', 'kadima' ),
				'section'    => 'general_sec',
				'settings'   => 'kadima_options[upload_image_favicon]',
			)
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[custom_css]',
		array(
			'default'			=> esc_attr($wl_theme_options['custom_css']),
			'type'				=> 'option',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'custom_css',
		array(
			'label'     => __( '自定义CSS', 'kadima' ),
			'type'		=> 'textarea',
			'section'   => 'general_sec',
			'settings'  => 'kadima_options[custom_css]'
		)
	);
	/* Slider options */
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' 			=>  __( 'Banner滚屏设置','kadima' ),
			'panel'				=> 'kadima_theme_option',
            'description'		=> '',
			'capability'		=> 'edit_theme_options',
            'priority' 			=> 35,
        )
    );
    for( $i=1; $i<=12; $i++ ) {
        $wp_customize->add_setting(
            'kadima_options[slide_image_'.$i.']',
            array(
                'type' 				=> 'option',
                'default' 			=> $wl_theme_options['slide_image_'.$i],
                'capability' 		=> 'edit_theme_options',
                'sanitize_callback' => 'esc_url_raw',
            )
        );
        $wp_customize->add_setting(
    		'kadima_options[slide_title_'.$i.']',
    		array(
    			'type' 				=> 'option',
    			'default'			=> $wl_theme_options['slide_title_'.$i],
    			'capability' 		=> 'edit_theme_options',
    			'sanitize_callback' => 'kadima_sanitize_text',
    		)
    	);
    	$wp_customize->add_setting(
    		'kadima_options[slide_desc_'.$i.']',
    		array(
    			'type'    => 'option',
    			'default' => $wl_theme_options['slide_desc_'.$i],
    			'capability' => 'edit_theme_options',
    			'sanitize_callback' => 'kadima_sanitize_text',
    		)
    	);
    	$wp_customize->add_setting(
    		'kadima_options[slide_btn_text_'.$i.']',
    		array(
    			'type'    			=> 'option',
    			'default'			=> $wl_theme_options['slide_btn_text_'.$i],
    			'capability' 		=> 'edit_theme_options',
    			'sanitize_callback' => 'kadima_sanitize_text',
    		)
    	);
    	$wp_customize->add_setting(
    		'kadima_options[slide_btn_link_'.$i.']',
    		array(
    			'type'    			=> 'option',
    			'default'			=> $wl_theme_options['slide_btn_link_'.$i],
    			'capability' 		=> 'edit_theme_options',
    			'sanitize_callback' => 'esc_url_raw',
    		)
    	);
        $wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'kadima_slider_image_'.$i,
				array(
		    		'label'      => __( '图片 '.$count12[$i-1], 'kadima' ),
		    		'section'    => 'slider_section',
		    		'settings'   => 'kadima_options[slide_image_'.$i.']'
		    	)
			)
		);
    	$wp_customize->add_control(
			'slide_title_'.$i,
			array(
	    		'label'      => __( '标题 '.$count12[$i-1], 'kadima' ),
	    		'type'       => 'text',
	    		'section'    => 'slider_section',
	    		'settings'   => 'kadima_options[slide_title_'.$i.']'
	    	)
		);
        $wp_customize->add_control(
			'slide_desc_'.$i,
			array(
	    		'label'      => __( '描述 '.$count12[$i-1], 'kadima' ),
	    		'type'       => 'text',
	    		'section'    => 'slider_section',
	    		'settings'   => 'kadima_options[slide_desc_'.$i.']'
	    	)
		);
        $wp_customize->add_control(
			'slide_btn_'.$i,
			array(
	    		'label'      => __( '按钮文字 '.$count12[$i-1], 'kadima' ),
	    		'type'       => 'text',
	    		'section'    => 'slider_section',
	    		'settings'   => 'kadima_options[slide_btn_text_'.$i.']'
	    	)
		);
        $wp_customize->add_control(
			'slide_btnlink_'.$i,
			array(
	    		'label'      => __( '按钮链接 '.$count12[$i-1], 'kadima' ),
	    		'type'       => 'url',
	    		'section'    => 'slider_section',
	    		'settings'   => 'kadima_options[slide_btn_link_'.$i.']'
	    	)
		);
    }
	/* Service Options */
	$wp_customize->add_section(
		'service_section',
		array(
	    	'title'				=> __('服务介绍模块','kadima'),
	    	'panel'				=> 'kadima_theme_option',
    		'capability'		=> 'edit_theme_options',
	        'priority' 			=> 35,
	    	'active_callback' 	=> 'is_front_page',
		)
	);
	$wp_customize->add_setting(
		'kadima_options[service_home]',
		array(
			'type'    			=> 'option',
			'default'			=> $wl_theme_options['service_home'],
			'sanitize_callback'	=> 'kadima_sanitize_checkbox',
			'capability' 		=> 'edit_theme_options'
		)
	);
    $wp_customize->add_control(
        'kadima_show_service',
        array(
    		'label'     => __( '首页启用服务介绍模块', 'kadima' ),
    		'type'		=> 'checkbox',
    		'section'   => 'service_section',
    		'settings'  => 'kadima_options[service_home]'
    	)
    );
	$wp_customize->add_setting(
	   'kadima_options[service_heading]',
		array(
    		'default'			=> esc_attr($wl_theme_options['service_heading']),
    		'type'				=> 'option',
    		'capability'		=> 'edit_theme_options',
    		'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'service_heading',
		array(
			'label'     => __( '服务介绍模块标题', 'kadima' ),
			'type'		=> 'text',
			'section'   => 'service_section',
			'settings'  => 'kadima_options[service_heading]'
		)
	);
    for( $i=1; $i<=12; $i++ ) {
    	$wp_customize->add_setting(
    	   'kadima_options[service_icons_'.$i.']',
    		array(
        		'default'			=> esc_attr($wl_theme_options['service_icons_'.$i]),
        		'type'				=> 'option',
        		'capability'		=> 'edit_theme_options',
        		'sanitize_callback'	=> 'kadima_sanitize_text',
    		)
    	);
        $wp_customize->add_setting(
    	   'kadima_options[service_img_'.$i.']',
    		array(
        		'default'			=> esc_attr($wl_theme_options['service_img_'.$i]),
        		'type'				=> 'option',
        		'capability'		=> 'edit_theme_options',
        		'sanitize_callback'	=> 'kadima_sanitize_text',
    		)
    	);
        $wp_customize->add_setting(
    	   'kadima_options[service_title_'.$i.']',
    		array(
        		'default'			=> esc_attr($wl_theme_options['service_title_'.$i]),
        		'type'				=> 'option',
        		'capability'		=> 'edit_theme_options',
        		'sanitize_callback'	=> 'kadima_sanitize_text',
    		)
    	);
        $wp_customize->add_setting(
    	   'kadima_options[service_text_'.$i.']',
    		array(
        		'default'=>esc_attr($wl_theme_options['service_text_'.$i]),
        		'type'=>'option',
        		'sanitize_callback'=>'kadima_sanitize_text',
        		'capability'=>'edit_theme_options',
    		)
    	);
        $wp_customize->add_setting(
    	   'kadima_options[service_link_'.$i.']',
    		array(
        		'default'			=> esc_attr($wl_theme_options['service_link_'.$i]),
        		'type'				=> 'option',
        		'capability'		=> 'edit_theme_options',
        		'sanitize_callback'	=> 'esc_url_raw',
    		)
        );
        $wp_customize->add_control(
            new kadima_Customize_Misc_Control(
                $wp_customize,
                'service_options'.$i.'-line',
                array(
                    'section'  => 'service_section',
                    'type'     => 'line'
                )
            )
        );
        $wp_customize->add_control(
			'service_title_'.$i,
			array(
	    		'label'     => __( '服务 '.$count12[$i-1].' 标题', 'kadima' ),
	    		'type'		=> 'text',
	    		'section'   => 'service_section',
	    		'settings'  => 'kadima_options[service_title_'.$i.']'
	    	)
		);
    	$wp_customize->add_control(
			'kadima_options[service_icons_'.$i.']',
            array(
        		'label'        	=> __( '服务 '.$count12[$i-1].' 小图标', 'kadima' ),
        		'description'	=> __('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','kadima'),
                'section'  		=> 'service_section',
        		'type'			=> 'text',
        		'settings'  	=> 'kadima_options[service_icons_'.$i.']'
            )
        );
        $wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'kadima_service_img_'.$i,
				array(
		            'label'      => __( '服务 '.$count12[$i-1].' 主图', 'kadima' ),
		            'section'    => 'service_section',
		            'settings'   => 'kadima_options[service_img_'.$i.']'
		        )
			)
		);
    	$wp_customize->add_control(
			'service_text_'.$i,
			array(
	    		'label'     => __( '服务 '.$count12[$i-1].' 标题', 'kadima' ),
	    		'type'		=> 'text',
	    		'section'   => 'service_section',
	    		'settings'  => 'kadima_options[service_text_'.$i.']'
	    	)
		);
    	$wp_customize->add_control(
			'service_link_'.$i,
				array(
	    		'label'     => __( '服务 '.$count12[$i-1].' 连接', 'kadima' ),
	    		'type'		=> 'url',
	    		'section'   => 'service_section',
	    		'settings'  => 'kadima_options[service_link_'.$i.']'
	    	)
		);
    }
	/* Custom Options */
	for( $ci=1; $ci<=5; $ci++ ) {
		$wp_customize->add_section(
			'custom_section_'.$ci,
			array(
				'title'				=> __('自定义模块设置 '.$count12[$ci-1], 'kadima'),
				'panel'				=> 'kadima_theme_option',
				'capability'		=> 'edit_theme_options',
				'priority' 			=> 35,
			)
		);
		$wp_customize->add_setting(
			'kadima_options[custom_home_'.$ci.']',
			array(
				'type'    			=> 'option',
				'default'			=> $wl_theme_options['custom_home_'.$ci],
				'sanitize_callback'	=> 'kadima_sanitize_checkbox',
				'capability' 		=> 'edit_theme_options'
			)
		);
		$wp_customize->add_control(
			'kadima_show_custom_'.$ci,
			array(
				'label'		=> __( '首页启用本自定义模块', 'kadima' ),
				'type'		=> 'checkbox',
				'section'	=> 'custom_section_'.$ci,
				'settings'	=> 'kadima_options[custom_home_'.$ci.']'
			)
		);
		$wp_customize->add_setting(
		   'kadima_options[custom_title_'.$ci.']',
			array(
				'default'			=> esc_attr($wl_theme_options['custom_title_'.$ci]),
				'type'				=> 'option',
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'kadima_sanitize_text',
			)
		);
		$wp_customize->add_control(
			'custom_title_'.$ci,
			array(
				'label'     => __( '自定义模块 '.$ci.' 名称', 'kadima' ),
				'type'		=> 'text',
				'section'   => 'custom_section_'.$ci,
				'settings'  => 'kadima_options[custom_title_'.$ci.']'
			)
		);
		$wp_customize->add_setting(
		   'kadima_options[custom_desciption_'.$ci.']',
			array(
				'default'			=> esc_attr($wl_theme_options['custom_desciption_'.$ci]),
				'type'				=> 'option',
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'kadima_sanitize_text',
			)
		);
		$wp_customize->add_control(
			'custom_desciption_'.$ci,
			array(
				'label'     => __( '自定义模块 '.$ci.' 描述', 'kadima' ),
				'type'		=> 'text',
				'section'   => 'custom_section_'.$ci,
				'settings'  => 'kadima_options[custom_desciption_'.$ci.']'
			)
		);
		for( $i=1; $i<=12; $i++ ) {
			$wp_customize->add_setting(
			   'kadima_options[custom_icons_'.$ci.'_'.$i.']',
				array(
					'default'			=> esc_attr($wl_theme_options['custom_icons_'.$ci.'_'.$i]),
					'type'				=> 'option',
					'capability'		=> 'edit_theme_options',
					'sanitize_callback'	=> 'kadima_sanitize_text',
				)
			);
			$wp_customize->add_setting(
			   'kadima_options[custom_img_'.$ci.'_'.$i.']',
				array(
					'default'			=>esc_attr($wl_theme_options['custom_img_'.$ci.'_'.$i]),
					'type'				=>'option',
					'capability'		=>'edit_theme_options',
					'sanitize_callback'	=>'kadima_sanitize_text',
				)
			);
			$wp_customize->add_setting(
			   'kadima_options[custom_title_'.$ci.'_'.$i.']',
				array(
					'default'			=> esc_attr($wl_theme_options['custom_title_'.$ci.'_'.$i]),
					'type'				=> 'option',
					'capability'		=> 'edit_theme_options',
					'sanitize_callback'	=> 'kadima_sanitize_text',
				)
			);
			$wp_customize->add_setting(
			   'kadima_options[custom_text_'.$ci.'_'.$i.']',
				array(
					'default'			=> esc_attr($wl_theme_options['custom_text_'.$ci.'_'.$i]),
					'type'				=> 'option',
					'sanitize_callback'	=> 'kadima_sanitize_text',
					'capability'		=> 'edit_theme_options',
				)
			);
			$wp_customize->add_setting(
			   'kadima_options[custom_link_'.$ci.'_'.$i.']',
				array(
					'default'			=> esc_attr($wl_theme_options['custom_link_'.$ci.'_'.$i]),
					'type'				=> 'option',
					'capability'		=> 'edit_theme_options',
					'sanitize_callback'	=> 'esc_url_raw',
				)
			);
			$wp_customize->add_control(
				new kadima_Customize_Misc_Control(
					$wp_customize,
					'custom_options_'.$ci.'_'.$i.'-line',
					array(
						'section'  => 'custom_section_'.$ci,
						'type'     => 'line'
					)
				)
			);
			$wp_customize->add_control(
				'custom_title_'.$ci.'_'.$i,
				array(
					'label'     => __( '自定义模块 '.$count12[$ci-1].' 标题 '.$count12[$i-1], 'kadima' ),
					'type'		=> 'text',
					'section'   => 'custom_section_'.$ci,
					'settings'  => 'kadima_options[custom_title_'.$ci.'_'.$i.']'
				)
			);
			$wp_customize->add_control(
				'kadima_options[custom_icons_'.$ci.'_'.$i.']',
				array(
					'label'        	=> __( '自定义模块 '.$count12[$ci-1].' 图标 '.$count12[$i-1], 'kadima' ),
					'description'	=> __('','kadima'),
					'section'  		=> 'custom_section_'.$ci,
					'type'			=> 'text',
					'settings'   	=> 'kadima_options[custom_icons_'.$ci.'_'.$i.']'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'kadima_custom_img_'.$ci.'_'.$i,
					array(
						'label'      => __( '自定义模块 '.$count12[$ci-1].' 图片 '.$count12[$i-1], 'kadima' ),
						'section'    => 'custom_section_'.$ci,
						'settings'   => 'kadima_options[custom_img_'.$ci.'_'.$i.']'
					)
				)
			);
			$wp_customize->add_control(
				'custom_text_'.$ci.'_'.$i,
				array(
					'label'     => __( '自定义模块 '.$count12[$ci-1].' 文字 '.$count12[$i-1], 'kadima' ),
					'type'		=> 'text',
					'section'   => 'custom_section_'.$ci,
					'settings'  => 'kadima_options[custom_text_'.$ci.'_'.$i.']'
				)
			);
			$wp_customize->add_control(
				'custom_link_'.$ci.'_'.$i,
					array(
					'label'     => __( '自定义模块 '.$count12[$ci-1].' 链接 '.$count12[$i-1], 'kadima' ),
					'type'		=> 'url',
					'section'   => 'custom_section_'.$ci,
					'settings'  => 'kadima_options[custom_link_'.$ci.'_'.$i.']'
				)
			);
		}
	}
	/* Portfolio Section */
	$wp_customize->add_section(
        'portfolio_section',
        array(
            'title' 		=> __('产品模块','kadima'),
            'description' 	=> __('','kadima'),
			'panel'			=> 'kadima_theme_option',
			'capability'	=> 'edit_theme_options',
            'priority' 		=> 35,
        )
    );
	$wp_customize->add_setting(
		'kadima_options[portfolio_home]',
		array(
			'type'    			=> 'option',
			'default'			=> $wl_theme_options['portfolio_home'],
			'sanitize_callback'	=> 'kadima_sanitize_checkbox',
			'capability' 		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'kadima_options[port_heading]',
		array(
			'type'    			=> 'option',
			'default'			=> $wl_theme_options['port_heading'],
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
	$wp_customize->add_setting(
		'kadima_options[port_description]',
		array(
			'type'    			=> 'option',
			'default'			=> $wl_theme_options['port_description'],
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
    $wp_customize->add_control(
		'show_portfolio',
		array(
	        'label'     => __( '首页启用产品模块', 'kadima' ),
	        'type'		=> 'checkbox',
	        'section'   => 'portfolio_section',
	        'settings'  => 'kadima_options[portfolio_home]'
	    )
	);
    $wp_customize->add_control(
		'portfolio_title',
		array(
	        'label'     => __( '产品模块标题', 'kadima' ),
	        'type'		=> 'text',
	        'section'   => 'portfolio_section',
	        'settings'  => 'kadima_options[port_heading]'
	    )
	);
    $wp_customize->add_control(
		'portfolio_description',
		array(
	        'label'     => __( '产品模块描述', 'kadima' ),
	        'type'		=> 'textarea',
	        'section'   => 'portfolio_section',
	        'settings'  => 'kadima_options[port_description]'
	    )
	);
    for( $i=1; $i<=12; $i++ ) {
		$wp_customize->add_setting(
			'kadima_options[port_img_'.$i.']',
			array(
				'type'    			=> 'option',
				'default' 			=> $wl_theme_options['port_img_'.$i],
				'capability' 		=> 'edit_theme_options',
				'sanitize_callback'	=> 'esc_url_raw',
			)
		);
		$wp_customize->add_setting(
			'kadima_options[port_title_'.$i.']',
			array(
				'type'    			=> 'option',
				'default'			=> $wl_theme_options['port_title_'.$i],
				'capability' 		=> 'edit_theme_options',
				'sanitize_callback'	=> 'kadima_sanitize_text',
			)
		);
		$wp_customize->add_setting(
			'kadima_options[port_description_'.$i.']',
			array(
				'type'    			=> 'option',
				'default'			=> $wl_theme_options['port_description_'.$i],
				'capability' 		=> 'edit_theme_options',
				'sanitize_callback'	=> 'kadima_sanitize_text',
			)
		);
		$wp_customize->add_setting(
			'kadima_options[port_link_'.$i.']',
			array(
				'type'    			=> 'option',
				'default'			=> $wl_theme_options['port_link_'.$i],
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'kadima_portfolio_img_'.$i,
				array(
		    		'label'      => __( '产品图片 '.$count12[$i-1], 'kadima' ),
		    		'section'    => 'portfolio_section',
		    		'settings'   => 'kadima_options[port_img_'.$i.']'
		    	)
			)
		);
    	$wp_customize->add_control(
			'kadima_portfolio_title_'.$i,
			array(
	    		'label'      => __( '产品标题 '.$count12[$i-1], 'kadima'),
	    		'type'       => 'text',
	    		'section'    => 'portfolio_section',
	    		'settings'   => 'kadima_options[port_title_'.$i.']'
	    	)
		);
		$wp_customize->add_control(
			'kadima_portfolio_description_'.$i,
			array(
	    		'label'      => __( '产品描述 '.$count12[$i-1], 'kadima'),
	    		'type'       => 'textarea',
	    		'section'    => 'portfolio_section',
	    		'settings'   => 'kadima_options[port_description_'.$i.']'
	    	)
		);
    	$wp_customize->add_control(
			'kadima_portfolio_link_'.$i,
			array(
	    		'label'      => __( '产品链接 '.$count12[$i-1], 'kadima' ),
	    		'type'       => 'url',
	    		'section'    => 'portfolio_section',
	    		'settings'   => 'kadima_options[port_link_'.$i.']'
	    	)
		);
	}
	/* Blog Option */
	$wp_customize->add_section(
		'blog_section',
		array(
	    	'title'		=> __('新闻模块','kadima'),
	    	'panel'		=> 'kadima_theme_option',
	    	'capability'=> 'edit_theme_options',
	        'priority' 	=> 35
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[show_blog]',
		array(
			'default'			=> esc_attr($wl_theme_options['show_blog']),
			'type'				=> 'option',
			'sanitize_callback'	=> 'kadima_sanitize_checkbox',
			'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'show_blog',
        array(
    		'label'     => __( '首页启用新闻模块', 'kadima' ),
    		'type'		=> 'checkbox',
    		'section'   => 'blog_section',
    		'settings'  => 'kadima_options[show_blog]'
    	)
    );
	$wp_customize->add_setting(
		'kadima_options[blog_title]',
		array(
			'type'    			=> 'option',
			'default'			=> $wl_theme_options['blog_title'],
			'sanitize_callback'	=> 'kadima_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
		'blog_title',
        array(
    		'label'      => __( '新闻模块标题', 'kadima' ),
    		'type'       => 'text',
    		'section'    => 'blog_section',
    		'settings'   => 'kadima_options[blog_title]',
    	)
    );
	/* About Option */
	$wp_customize->add_section(
		'about_section',
		array(
	    	'title'		=> __('关于我们模块','kadima'),
	    	'panel'		=> 'kadima_theme_option',
	    	'capability'=> 'edit_theme_options',
	        'priority' 	=> 35
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[show_about]',
		array(
			'default'			=> esc_attr($wl_theme_options['show_about']),
			'type'				=> 'option',
			'sanitize_callback'	=> 'kadima_sanitize_checkbox',
			'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'show_about',
        array(
    		'label'     => __( '首页启用关于我们模块', 'kadima' ),
    		'type'		=> 'checkbox',
    		'section'   => 'about_section',
    		'settings'  => 'kadima_options[show_about]'
    	)
    );
	$wp_customize->add_setting(
		'kadima_options[about_title]',
		array(
			'type'    			=> 'option',
			'default'			=> $wl_theme_options['about_title'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'about_title',
        array(
    		'label'     => __( '关于我们模块标题', 'kadima' ),
    		'type'		=> 'text',
    		'section'   => 'about_section',
    		'settings'  => 'kadima_options[about_title]',
    	)
    );
	$wp_customize->add_setting(
		'kadima_options[about_description]',
		array(
			'type'    			=> 'option',
			'default'			=> $wl_theme_options['about_description'],
			'sanitize_callback'	=> 'kadima_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
		'about_description',
		array(
			'label'     => __( '关于我们模块描述', 'kadima' ),
			'type'		=> 'textarea',
			'section'   => 'about_section',
			'settings'  => 'kadima_options[about_description]'
		)
	);
    for( $i=1; $i<=12; $i++ ) {
        $wp_customize->add_setting(
			'kadima_options[about_slide_img_'.$i.']',
			array(
				'type'    			=> 'option',
				'default'			=> $wl_theme_options['about_slide_img_'.$i],
				'capability' 		=> 'edit_theme_options',
				'sanitize_callback'	=> 'esc_url_raw',
			)
		);
		$wp_customize->add_setting(
			'kadima_options[about_slide_title_'.$i.']',
			array(
				'type'    			=> 'option',
				'default'			=> $wl_theme_options['about_slide_title_'.$i],
				'capability' 		=> 'edit_theme_options',
				'sanitize_callback'	=> 'kadima_sanitize_text',
			)
		);
		$wp_customize->add_setting(
			'kadima_options[about_slide_desc_'.$i.']',
			array(
				'type'    			=> 'option',
				'default'			=> $wl_theme_options['about_slide_desc_'.$i],
				'capability' 		=> 'edit_theme_options',
				'sanitize_callback'	=> 'kadima_sanitize_text',
			)
		);
		$wp_customize->add_setting(
			'kadima_options[about_slide_link_'.$i.']',
			array(
				'type'    			=> 'option',
				'default'			=> $wl_theme_options['about_slide_link_'.$i],
				'capability' 		=> 'edit_theme_options',
				'sanitize_callback'	=> 'esc_url_raw',
			)
		);
    	$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'about_slide_img_'.$i,
				array(
		    		'label'      => __( '模块滚屏图片 '.$count12[$i-1], 'kadima' ),
		    		'section'    => 'about_section',
		    		'settings'   => 'kadima_options[about_slide_'.$i.'_img]'
	    		)
			)
		);
    	$wp_customize->add_control(
			'about_slide_title_'.$i,
			array(
	    		'label'      => __( '模块滚屏标题 '.$count12[$i-1], 'kadima'),
	    		'type'       =>	'text',
	    		'section'    => 'about_section',
	    		'settings'   => 'kadima_options[about_slide_'.$i.'_title]'
	    	)
		);
		$wp_customize->add_control(
			'about_slide_description_'.$i,
			array(
	    		'label'      => __( '模块滚屏描述 '.$count12[$i-1], 'kadima'),
	    		'type'       => 'textarea',
	    		'section'    => 'about_section',
	    		'settings'   => 'kadima_options[about_slide_'.$i.'_description]'
	    	)
		);
    	$wp_customize->add_control(
			'about_slide_link_'.$i,
			array(
	    		'label'      => __( '模块滚屏链接 '.$count12[$i-1], 'kadima' ),
	    		'type'       => 'url',
	    		'section'    => 'about_section',
	    		'settings'   => 'kadima_options[about_slide_'.$i.'_link]'
	    	)
		);
	}
	/* Social options */
	$wp_customize->add_section(
		'social_section',
		array(
	    	'title'		=> __('社媒模块','kadima'),
	    	'panel'		=> 'kadima_theme_option',
	    	'capability'=> 'edit_theme_options',
	        'priority' 	=> 35
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[header_social_media_in_enabled]',
		array(
			'default'			=> esc_attr($wl_theme_options['header_social_media_in_enabled']),
			'type'				=> 'option',
			'sanitize_callback'	=> 'kadima_sanitize_checkbox',
			'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'header_social_media_in_enabled',
        array(
    		'label'     => __( '启用顶部社媒图标', 'kadima' ),
    		'type'		=> 'checkbox',
    		'section'   => 'social_section',
    		'settings'  => 'kadima_options[header_social_media_in_enabled]'
    	)
    );
	$wp_customize->add_setting(
	   'kadima_options[footer_section_social_media_enbled]',
		array(
    		'default'			=> esc_attr($wl_theme_options['footer_section_social_media_enbled']),
    		'type'				=> 'option',
    		'sanitize_callback'	=> 'kadima_sanitize_checkbox',
    		'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'footer_section_social_media_enbled',
        array(
    		'label'     => __( '启用底部社媒图标', 'kadima' ),
    		'type'		=> 'checkbox',
    		'section'   => 'social_section',
    		'settings'  => 'kadima_options[footer_section_social_media_enbled]'
    	)
    );
	$wp_customize->add_setting(
	   'kadima_options[email_id]',
		array(
    		'default'			=> esc_attr($wl_theme_options['email_id']),
    		'type'				=> 'option',
    		'sanitize_callback'	=> 'sanitize_email',
    		'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'email_id',
		array(
			'label'     =>  __('Email账户', 'kadima' ),
			'type'		=> 'email',
			'section'   => 'social_section',
			'settings'  => 'kadima_options[email_id]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[phone_no]',
		array(
    		'default'			=> esc_attr($wl_theme_options['phone_no']),
    		'type'				=> 'option',
    		'sanitize_callback'	=> 'kadima_sanitize_text',
    		'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'phone_no',
		array(
			'label'     =>  __('联系号码', 'kadima' ),
			'type'		=> 'text',
			'section'   => 'social_section',
			'settings'  => 'kadima_options[phone_no]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[twitter_link]',
		array(
    		'default'			=> esc_attr($wl_theme_options['twitter_link']),
    		'type'				=> 'option',
    		'sanitize_callback'	=> 'esc_url_raw',
    		'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'twitter_link',
		array(
			'label'     =>  __('Twitter', 'kadima' ),
			'type'		=> 'url',
			'section'   => 'social_section',
			'settings'  => 'kadima_options[twitter_link]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[fb_link]',
		array(
    		'default'			=> esc_attr($wl_theme_options['fb_link']),
    		'type'				=> 'option',
    		'sanitize_callback'	=> 'esc_url_raw',
    		'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'fb_link',
		array(
			'label'     => __( 'Facebook', 'kadima' ),
			'type'		=> 'url',
			'section'   => 'social_section',
			'settings'  => 'kadima_options[fb_link]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[linkedin_link]',
		array(
    		'default'			=> esc_attr($wl_theme_options['linkedin_link']),
    		'type'				=> 'option',
    		'sanitize_callback'	=> 'esc_url_raw',
    		'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'linkedin_link',
		array(
			'label'     => __( 'LinkedIn', 'kadima' ),
			'type'		=> 'url',
			'section'   => 'social_section',
			'settings'  => 'kadima_options[linkedin_link]'
		)
	);
	$wp_customize->add_setting(
        'kadima_options[gplus]',
		array(
    		'default'			=> esc_attr($wl_theme_options['gplus']),
    		'type'				=> 'option',
    		'sanitize_callback'	=> 'esc_url_raw',
    		'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'gplus',
		array(
			'label'     => __( 'Goole+', 'kadima' ),
			'type'		=> 'url',
			'section'   => 'social_section',
			'settings'  => 'kadima_options[gplus]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[youtube_link]',
		array(
			'default'			=> esc_attr($wl_theme_options['youtube_link']),
			'type'				=> 'option',
			'sanitize_callback'	=> 'esc_url_raw',
			'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'youtube_link',
		array(
			'label'     => __( 'Youtube', 'kadima' ),
			'type'		=> 'url',
			'section'   => 'social_section',
			'settings'  => 'kadima_options[youtube_link]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[instagram]',
		array(
    		'default'			=> esc_attr($wl_theme_options['instagram']),
    		'type'				=> 'option',
    		'sanitize_callback'	=> 'esc_url_raw',
    		'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'instagram',
		array(
			'label'     => __( 'Instagram', 'kadima' ),
			'type'		=> 'url',
			'section'   => 'social_section',
			'settings'  => 'kadima_options[instagram]'
		)
	);
	/* Footer callout */
	$wp_customize->add_section(
		'callout_section',
		array(
	    	'title'		=> __('底部插图模块','kadima'),
	    	'panel'		=> 'kadima_theme_option',
	    	'capability'=> 'edit_theme_options',
	        'priority' 	=> 35
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[fc_home]',
		array(
    		'default'			=> esc_attr($wl_theme_options['fc_home']),
    		'type'				=> 'option',
    		'capability'		=> 'edit_theme_options',
    		'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'fc_home',
		array(
			'label'     => __( '首页启用底部插图模块', 'kadima' ),
			'type'		=> 'checkbox',
			'section'   => 'callout_section',
			'settings'  => 'kadima_options[fc_home]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[fc_title]',
		array(
        	'default'			=> esc_attr($wl_theme_options['fc_title']),
        	'type'				=> 'option',
        	'capability'		=> 'edit_theme_options',
        	'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'fc_title',
		array(
			'label'     => __( '模块标题', 'kadima' ),
			'type'		=> 'text',
			'section'   => 'callout_section',
			'settings'  => 'kadima_options[fc_title]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[fc_btn_txt]',
		array(
    		'default'			=> esc_attr($wl_theme_options['fc_btn_txt']),
    		'type'				=> 'option',
    		'capability'		=> 'edit_theme_options',
    		'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'fc_btn_txt',
		array(
			'label'     => __( '按钮文字', 'kadima' ),
			'type'		=> 'text',
			'section'   => 'callout_section',
			'settings'  => 'kadima_options[fc_btn_txt]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[fc_btn_link]',
		array(
    		'default'			=> esc_attr($wl_theme_options['fc_btn_link']),
    		'type'				=> 'option',
    		'capability'		=> 'edit_theme_options',
    		'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'fc_btn_link',
		array(
			'label'     => __( '按钮链接', 'kadima' ),
			'type'		=> 'text',
			'section'   => 'callout_section',
			'settings'  => 'kadima_options[fc_btn_link]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[fc_icon]',
		array(
    		'default'			=> esc_attr($wl_theme_options['fc_icon']),
    		'type'				=> 'option',
    		'capability'		=> 'edit_theme_options',
    		'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'fc_icon',
		array(
			'label'     => __( '图标', 'kadima' ),
			'type'		=> 'text',
			'section'   => 'callout_section',
			'settings'  => 'kadima_options[fc_icon]'
		)
	);
	/* Footer Options */
	$wp_customize->add_section(
		'footer_section',
		array(
	    	'title'		=> __('页脚模块','kadima'),
	    	'panel'		=> 'kadima_theme_option',
	    	'capability'=> 'edit_theme_options',
	        'priority' 	=> 35
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[footer_customizations]',
		array(
    		'default'			=> esc_attr($wl_theme_options['footer_customizations']),
    		'type'				=> 'option',
    		'sanitize_callback'	=> 'kadima_sanitize_text',
    		'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'footer_customizations',
		array(
			'label'     => __( '自定义文字', 'kadima' ),
			'type'		=> 'text',
			'section'   => 'footer_section',
			'settings'  => 'kadima_options[footer_customizations]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[info_copyright]',
		array(
    		'default'			=> esc_attr($wl_theme_options['info_copyright']),
    		'type'				=> 'option',
    		'sanitize_callback'	=> 'kadima_sanitize_text',
    		'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'info_copyright',
		array(
			'label'     => __( '版权所有', 'kadima' ),
			'type'		=> 'text',
			'section'   => 'footer_section',
			'settings'  => 'kadima_options[info_copyright]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[info_tel]',
		array(
    		'default'			=> esc_attr($wl_theme_options['info_tel']),
    		'type'				=> 'option',
    		'sanitize_callback'	=> 'kadima_sanitize_text',
    		'capability'		=> 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'info_tel',
		array(
			'label'     => __( '电话', 'kadima' ),
			'type'		=> 'text',
			'section'   => 'footer_section',
			'settings'  => 'kadima_options[info_tel]'
		)
	);
	$wp_customize->add_setting(
	   'kadima_options[info_fax]',
		array(
    		'default'			=> esc_attr($wl_theme_options['info_fax']),
    		'type'				=> 'option',
    		'capability'		=> 'edit_theme_options',
    		'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'info_fax',
		array(
			'label'     => __( '传真', 'kadima' ),
			'type'		=> 'url',
			'section'   => 'footer_section',
			'settings'  => 'kadima_options[info_fax]'
		)
	);
    $wp_customize->add_setting(
	   'kadima_options[info_mail]',
		array(
    		'default'			=> esc_attr($wl_theme_options['info_mail']),
    		'type'				=> 'option',
    		'capability'		=> 'edit_theme_options',
    		'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'info_mail',
		array(
			'label'     => __( '邮箱', 'kadima' ),
			'type'		=> 'url',
			'section'   => 'footer_section',
			'settings'  => 'kadima_options[info_mail]'
		)
	);
    $wp_customize->add_setting(
	   'kadima_options[info_support]',
		array(
    		'default'			=> esc_attr($wl_theme_options['info_support']),
    		'type'				=> 'option',
    		'capability'		=> 'edit_theme_options',
    		'sanitize_callback'	=> 'kadima_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'info_support',
		array(
			'label'     => __( '技术支持', 'kadima' ),
			'type'		=> 'url',
			'section'   => 'footer_section',
			'settings'  => 'kadima_options[info_support]'
		)
	);
}
function kadima_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function kadima_sanitize_checkbox( $input ) {
    return $input;
}
function kadima_sanitize_integer( $input ) {
    return (int)($input);
}
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'kadima_Customize_Misc_Control' ) ) :
	class kadima_Customize_Misc_Control extends WP_Customize_Control {
	    public $settings = 'blogname';
	    public $description = '';
	    public function render_content() {
	        switch ( $this->type ) {
	            default:

	            case 'heading':
	                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
	                break;
	            case 'line' :
	                echo '<hr />';
	                break;
	        }
	    }
	}
endif;
?>
