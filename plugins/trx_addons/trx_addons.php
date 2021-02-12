<?php
/* ThemeREX Addons support functions
------------------------------------------------------------------------------- */

// Add theme-specific functions
require_once JUSTITIA_THEME_DIR . 'theme-specific/trx_addons-setup.php';

// Theme init priorities:
// 1 - register filters, that add/remove lists items for the Theme Options
if ( ! function_exists( 'justitia_trx_addons_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'justitia_trx_addons_theme_setup1', 1 );
	function justitia_trx_addons_theme_setup1() {
		if ( justitia_exists_trx_addons() ) {
			add_filter( 'justitia_filter_list_posts_types', 'justitia_trx_addons_list_post_types' );
			add_filter( 'justitia_filter_list_header_footer_types', 'justitia_trx_addons_list_header_footer_types' );
			add_filter( 'justitia_filter_list_header_styles', 'justitia_trx_addons_list_header_styles' );
			add_filter( 'justitia_filter_list_footer_styles', 'justitia_trx_addons_list_footer_styles' );
			add_filter( 'justitia_filter_list_blog_styles', 'justitia_trx_addons_list_blog_styles', 10, 2 );
			add_action( 'justitia_action_load_options', 'justitia_trx_addons_add_link_edit_layout' );
			add_filter( 'trx_addons_filter_default_layouts', 'justitia_trx_addons_default_layouts' );
			add_filter( 'trx_addons_filter_load_options', 'justitia_trx_addons_default_components' );
			add_filter( 'trx_addons_cpt_list_options', 'justitia_trx_addons_cpt_list_options', 10, 2 );
			add_filter( 'trx_addons_filter_sass_import', 'justitia_trx_addons_sass_import', 10, 2 );
			add_filter( 'trx_addons_filter_override_options', 'justitia_trx_addons_override_options' );
			add_filter( 'trx_addons_filter_post_meta', 'justitia_trx_addons_post_meta', 10, 2 );
			add_filter( 'trx_addons_filter_post_meta_args',	'justitia_trx_addons_post_meta_args', 10, 2);
			add_filter( 'justitia_filter_post_meta_args', 'justitia_trx_addons_post_meta_args', 10, 3 );
			add_filter( 'justitia_filter_list_counters', 'justitia_trx_addons_list_counters' );
			add_filter( 'trx_addons_filter_get_list_counters', 'justitia_trx_addons_get_list_counters' );
			add_filter( 'trx_addons_filter_get_list_meta_parts', 'justitia_trx_addons_get_list_meta_parts' );
		}
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'justitia_trx_addons_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'justitia_trx_addons_theme_setup9', 9 );
	function justitia_trx_addons_theme_setup9() {
		if ( justitia_exists_trx_addons() ) {
			add_filter( 'trx_addons_filter_add_thumb_sizes', 'justitia_trx_addons_add_thumb_sizes' );
			add_filter( 'trx_addons_filter_get_thumb_size', 'justitia_trx_addons_get_thumb_size' );
			add_filter( 'trx_addons_filter_featured_image', 'justitia_trx_addons_featured_image', 10, 2 );
			add_filter( 'trx_addons_filter_no_image', 'justitia_trx_addons_no_image' );
			add_filter( 'trx_addons_filter_sc_blogger_template', 'justitia_trx_addons_sc_blogger_template', 10, 2 );
			add_filter( 'trx_addons_filter_get_list_icons_classes', 'justitia_trx_addons_get_list_icons_classes', 10, 2 );
			add_filter( 'trx_addons_filter_clear_icon_name', 'justitia_trx_addons_clear_icon_name' );
			add_action( 'wp_enqueue_scripts', 'justitia_trx_addons_frontend_scripts', 1100 );
			add_filter( 'justitia_filter_query_sort_order', 'justitia_trx_addons_query_sort_order', 10, 3 );
			add_filter( 'justitia_filter_merge_scripts', 'justitia_trx_addons_merge_scripts' );
			add_filter( 'justitia_filter_prepare_css', 'justitia_trx_addons_prepare_css', 10, 2 );
			add_filter( 'justitia_filter_prepare_js', 'justitia_trx_addons_prepare_js', 10, 2 );
			add_filter( 'justitia_filter_localize_script', 'justitia_trx_addons_localize_script' );
			add_filter( 'justitia_filter_get_post_categories', 'justitia_trx_addons_get_post_categories' );
			add_filter( 'justitia_filter_get_post_date', 'justitia_trx_addons_get_post_date' );
			add_filter( 'trx_addons_filter_get_post_date', 'justitia_trx_addons_get_post_date_wrap' );
			add_filter( 'justitia_filter_post_type_taxonomy', 'justitia_trx_addons_post_type_taxonomy', 10, 2 );
			add_filter( 'justitia_filter_term_name', 'justitia_trx_addons_term_name', 10, 2 );
			add_filter( 'trx_addons_filter_theme_logo', 'justitia_trx_addons_theme_logo' );
			add_filter( 'trx_addons_filter_show_site_name_as_logo', 'justitia_trx_addons_show_site_name_as_logo' );
			add_filter( 'trx_addons_filters_get_theme_info', 'justitia_trx_addons_get_theme_info', 9 );
			add_filter( 'justitia_filter_sidebar_present', 'justitia_trx_addons_sidebar_present' );
			add_filter( 'trx_addons_filter_get_theme_file_dir', 'justitia_trx_addons_get_theme_file_dir', 10, 3 );
			add_filter( 'trx_addons_filter_get_theme_folder_dir', 'justitia_trx_addons_get_theme_folder_dir', 10, 3 );
			add_filter( 'trx_addons_filter_privacy_text', 'justitia_trx_addons_privacy_text' );
			add_action( 'justitia_action_show_layout', 'justitia_trx_addons_action_show_layout', 10, 1 );
			if ( is_admin() ) {
				add_filter( 'justitia_filter_allow_override_options', 'justitia_trx_addons_allow_override_options', 10, 2 );
				add_filter( 'justitia_filter_allow_theme_icons', 'justitia_trx_addons_allow_theme_icons', 10, 2 );
				add_filter( 'trx_addons_filter_export_options', 'justitia_trx_addons_export_options' );
			} else {
				add_filter( 'trx_addons_filter_inc_views', 'justitia_trx_addons_inc_views' );
				add_filter( 'justitia_filter_related_thumb_size', 'justitia_trx_addons_related_thumb_size' );
				add_filter( 'justitia_filter_show_related_posts', 'justitia_trx_addons_show_related_posts' );
				add_filter( 'trx_addons_filter_show_related_posts_after_article', 'justitia_trx_addons_show_related_posts_after_article' );
				add_filter( 'trx_addons_filter_args_related', 'justitia_trx_addons_args_related' );
				add_filter( 'trx_addons_filter_seo_snippets', 'justitia_trx_addons_seo_snippets' );
				add_action( 'trx_addons_action_article_start', 'justitia_trx_addons_article_start', 10, 1 );
				add_filter( 'justitia_filter_get_mobile_menu', 'justitia_trx_addons_get_mobile_menu' );
				add_filter( 'justitia_filter_detect_blog_mode', 'justitia_trx_addons_detect_blog_mode' );
				add_filter( 'justitia_filter_get_blog_title', 'justitia_trx_addons_get_blog_title' );
				add_action( 'justitia_action_login', 'justitia_trx_addons_action_login' );
				add_action( 'justitia_action_cart', 'justitia_trx_addons_action_cart' );
				add_action( 'justitia_action_breadcrumbs', 'justitia_trx_addons_action_breadcrumbs' );
				add_filter( 'justitia_filter_get_translated_layout', 'justitia_trx_addons_filter_get_translated_layout', 10, 1 );
				add_filter( 'trx_addons_filter_sc_layout_content', 'justitia_trx_addons_replace_current_year', 20, 2 );
				add_action( 'justitia_action_user_meta', 'justitia_trx_addons_action_user_meta' );
				add_action( 'justitia_action_before_post_meta', 'justitia_trx_addons_action_before_post_meta' );
				add_filter( 'trx_addons_filter_featured_image_override', 'justitia_trx_addons_featured_image_override' );
				add_filter( 'trx_addons_filter_get_current_mode_image', 'justitia_trx_addons_get_current_mode_image' );
				add_filter( 'justitia_filter_get_post_iframe', 'justitia_trx_addons_get_post_iframe', 10, 1 );
			}
		}

		// Add this filter any time: if plugin exists - load plugin's styles, if not exists - load layouts.scss instead plugin's styles
		add_action( 'wp_enqueue_scripts', 'justitia_trx_addons_layouts_styles' );
		add_filter( 'justitia_filter_merge_styles', 'justitia_trx_addons_merge_styles' );
		add_filter( 'justitia_filter_merge_styles_responsive', 'justitia_trx_addons_merge_styles_responsive' );

		if ( is_admin() ) {
			add_filter( 'justitia_filter_tgmpa_required_plugins', 'justitia_trx_addons_tgmpa_required_plugins' );
			add_filter( 'justitia_filter_tgmpa_required_plugins', 'justitia_trx_addons_tgmpa_required_plugins_all', 999 );
		} else {
			add_action( 'justitia_action_search', 'justitia_trx_addons_action_search', 10, 3 );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'justitia_trx_addons_tgmpa_required_plugins' ) ) {
		function justitia_trx_addons_tgmpa_required_plugins( $list = array() ) {
		if ( justitia_storage_isset( 'required_plugins', 'trx_addons' ) ) {
			$path = justitia_get_plugin_source_path( 'plugins/trx_addons/trx_addons.zip' );
			if ( ! empty( $path ) || justitia_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => justitia_storage_get_array( 'required_plugins', 'trx_addons' ),
					'slug'     => 'trx_addons',
					'version'  => '1.6.51.2',
					'source'   => ! empty( $path ) ? $path : 'upload://trx_addons.zip',
					'required' => true,
				);
			}
		}
		return $list;
	}
}


/* Add options in the Theme Options Customizer
------------------------------------------------------------------------------- */

if ( ! function_exists( 'justitia_trx_addons_cpt_list_options' ) ) {
		function justitia_trx_addons_cpt_list_options( $options, $cpt ) {
		if ( 'layouts' == $cpt && JUSTITIA_THEME_FREE ) {
			$options = array();
		} elseif ( is_array( $options ) ) {
			foreach ( $options as $k => $v ) {
				// Store this option in the external (not theme's) storage
				$options[ $k ]['options_storage'] = 'trx_addons_options';
				// Hide this option from plugin's options (only for overriden options)
				if ( in_array( $cpt, array( 'cars', 'cars_agents', 'certificates', 'courses', 'dishes', 'portfolio', 'properties', 'agents', 'resume', 'services', 'sport', 'team', 'testimonials' ) ) ) {
					$options[ $k ]['hidden'] = true;
				}
			}
		}
		return $options;
	}
}

// Return plugin's specific options for CPT
if ( ! function_exists( 'justitia_trx_addons_get_list_cpt_options' ) ) {
	function justitia_trx_addons_get_list_cpt_options( $cpt ) {
		$options = array();
		if ( 'cars' == $cpt ) {
			$options = array_merge(
				trx_addons_cpt_cars_get_list_options(),
				trx_addons_cpt_cars_agents_get_list_options()
			);
		} elseif ( 'certificates' == $cpt ) {
			$options = trx_addons_cpt_certificates_get_list_options();
		} elseif ( 'courses' == $cpt ) {
			$options = trx_addons_cpt_courses_get_list_options();
		} elseif ( 'dishes' == $cpt ) {
			$options = trx_addons_cpt_dishes_get_list_options();
		} elseif ( 'portfolio' == $cpt ) {
			$options = trx_addons_cpt_portfolio_get_list_options();
		} elseif ( 'resume' == $cpt ) {
			$options = trx_addons_cpt_resume_get_list_options();
		} elseif ( 'services' == $cpt ) {
			$options = trx_addons_cpt_services_get_list_options();
		} elseif ( 'properties' == $cpt ) {
			$options = array_merge(
				trx_addons_cpt_properties_get_list_options(),
				trx_addons_cpt_agents_get_list_options()
			);
		} elseif ( 'sport' == $cpt ) {
			$options = trx_addons_cpt_sport_get_list_options();
		} elseif ( 'team' == $cpt ) {
			$options = trx_addons_cpt_team_get_list_options();
		} elseif ( 'testimonials' == $cpt ) {
			$options = trx_addons_cpt_testimonials_get_list_options();
		}

		foreach ( $options as $k => $v ) {
			// Disable refresh the preview area on change any plugin's option
			$options[ $k ]['refresh'] = false;
			// Remove parameter 'hidden'
			if ( ! empty( $v['hidden'] ) ) {
				unset( $options[ $k ]['hidden'] );
			}
			// Add description
			if ( 'info' == $v['type'] ) {
				$options[ $k ]['desc'] = wp_kses_data( __( 'In order to see changes made by settings of this section, click "Save" and refresh the page', 'justitia' ) );
			}
		}
		return $options;
	}
}

// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'justitia_trx_addons_setup3' ) ) {
	add_action( 'after_setup_theme', 'justitia_trx_addons_setup3', 3 );
	function justitia_trx_addons_setup3() {

		// Section 'Cars' - settings to show 'Cars' blog archive and single posts
		if ( justitia_exists_cars() ) {
			justitia_storage_merge_array(
				'options', '', array_merge(
					array(
						'cars' => array(
							'title' => esc_html__( 'Cars', 'justitia' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the cars pages.', 'justitia' ) ),
							'type'  => 'section',
						),
					),
					justitia_trx_addons_get_list_cpt_options( 'cars' ),
					justitia_options_get_list_cpt_options( 'cars' ),
					array(
						'single_info_cars'        => array(
							'title' => esc_html__( 'Single car', 'justitia' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'show_related_posts_cars' => array(
							'title' => esc_html__( 'Show related posts', 'justitia' ),
							'desc'  => wp_kses_data( __( "Show section 'Related cars' on the single car page", 'justitia' ) ),
							'std'   => 1,
							'type'  => 'checkbox',
						),
						'related_posts_cars'      => array(
							'title'      => esc_html__( 'Related cars', 'justitia' ),
							'desc'       => wp_kses_data( __( 'How many related cars should be displayed on the single car page?', 'justitia' ) ),
							'dependency' => array(
								'show_related_posts_cars' => array( 1 ),
							),
							'std'        => 3,
							'options'    => justitia_get_list_range( 1, 9 ),
							'type'       => 'select',
						),
						'related_columns_cars'    => array(
							'title'      => esc_html__( 'Related columns', 'justitia' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related cars on the single car page?', 'justitia' ) ),
							'dependency' => array(
								'show_related_posts_cars' => array( 1 ),
							),
							'std'        => 3,
							'options'    => justitia_get_list_range( 1, 4 ),
							'type'       => 'select',
						),
					)
				)
			);
		}

		// Section 'Certificates'
		if ( justitia_exists_certificates() ) {
			justitia_storage_merge_array(
				'options', '', array_merge(
					array(
						'certificates' => array(
							'title' => esc_html__( 'Certificates', 'justitia' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display "Certificates"', 'justitia' ) ),
							'type'  => 'section',
						),
					),
					justitia_trx_addons_get_list_cpt_options( 'certificates' )
				)
			);
		}

		// Section 'Courses' - settings to show 'Courses' blog archive and single posts
		if ( justitia_exists_courses() ) {

			justitia_storage_merge_array(
				'options', '', array_merge(
					array(
						'courses' => array(
							'title' => esc_html__( 'Courses', 'justitia' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the courses pages', 'justitia' ) ),
							'type'  => 'section',
						),
					),
					justitia_trx_addons_get_list_cpt_options( 'courses' ),
					justitia_options_get_list_cpt_options( 'courses' ),
					array(
						'single_info_courses'        => array(
							'title' => esc_html__( 'Single course', 'justitia' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'show_related_posts_courses' => array(
							'title' => esc_html__( 'Show related posts', 'justitia' ),
							'desc'  => wp_kses_data( __( "Show section 'Related courses' on the single course page", 'justitia' ) ),
							'std'   => 1,
							'type'  => 'checkbox',
						),
						'related_posts_courses'      => array(
							'title'      => esc_html__( 'Related courses', 'justitia' ),
							'desc'       => wp_kses_data( __( 'How many related courses should be displayed on the single course page?', 'justitia' ) ),
							'dependency' => array(
								'show_related_posts_courses' => array( 1 ),
							),
							'std'        => 3,
							'options'    => justitia_get_list_range( 1, 9 ),
							'type'       => 'select',
						),
						'related_columns_courses'    => array(
							'title'      => esc_html__( 'Related columns', 'justitia' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related courses on the single course page?', 'justitia' ) ),
							'dependency' => array(
								'show_related_posts_courses' => array( 1 ),
							),
							'std'        => 3,
							'options'    => justitia_get_list_range( 1, 4 ),
							'type'       => 'select',
						),
					)
				)
			);
		}

		// Section 'Dishes' - settings to show 'Dishes' blog archive and single posts
		if ( justitia_exists_dishes() ) {

			justitia_storage_merge_array(
				'options', '', array_merge(
					array(
						'dishes' => array(
							'title' => esc_html__( 'Dishes', 'justitia' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the dishes pages', 'justitia' ) ),
							'type'  => 'section',
						),
					),
					justitia_trx_addons_get_list_cpt_options( 'dishes' ),
					justitia_options_get_list_cpt_options( 'dishes' ),
					array(
						'single_info_dishes'        => array(
							'title' => esc_html__( 'Single dish', 'justitia' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'show_related_posts_dishes' => array(
							'title' => esc_html__( 'Show related posts', 'justitia' ),
							'desc'  => wp_kses_data( __( "Show section 'Related dishes' on the single dish page", 'justitia' ) ),
							'std'   => 1,
							'type'  => 'checkbox',
						),
						'related_posts_dishes'      => array(
							'title'      => esc_html__( 'Related dishes', 'justitia' ),
							'desc'       => wp_kses_data( __( 'How many related dishes should be displayed on the single dish page?', 'justitia' ) ),
							'dependency' => array(
								'show_related_posts_dishes' => array( 1 ),
							),
							'std'        => 3,
							'options'    => justitia_get_list_range( 1, 9 ),
							'type'       => 'select',
						),
						'related_columns_dishes'    => array(
							'title'      => esc_html__( 'Related columns', 'justitia' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related dishes on the single dish page?', 'justitia' ) ),
							'dependency' => array(
								'show_related_posts_dishes' => array( 1 ),
							),
							'std'        => 3,
							'options'    => justitia_get_list_range( 1, 4 ),
							'type'       => 'select',
						),
					)
				)
			);
		}

		// Section 'Portfolio' - settings to show 'Portfolio' blog archive and single posts
		if ( justitia_exists_portfolio() ) {
			justitia_storage_merge_array(
				'options', '', array_merge(
					array(
						'portfolio' => array(
							'title' => esc_html__( 'Portfolio', 'justitia' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the portfolio pages', 'justitia' ) ),
							'type'  => 'section',
						),
					),
					justitia_trx_addons_get_list_cpt_options( 'portfolio' ),
					justitia_options_get_list_cpt_options( 'portfolio' ),
					array(
						'single_info_portfolio'        => array(
							'title' => esc_html__( 'Single portfolio item', 'justitia' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'show_related_posts_portfolio' => array(
							'title' => esc_html__( 'Show related posts', 'justitia' ),
							'desc'  => wp_kses_data( __( "Show section 'Related portfolio items' on the single portfolio page", 'justitia' ) ),
							'std'   => 1,
							'type'  => 'checkbox',
						),
						'related_posts_portfolio'      => array(
							'title'      => esc_html__( 'Related portfolio items', 'justitia' ),
							'desc'       => wp_kses_data( __( 'How many related portfolio items should be displayed on the single portfolio page?', 'justitia' ) ),
							'dependency' => array(
								'show_related_posts_portfolio' => array( 1 ),
							),
							'std'        => 3,
							'options'    => justitia_get_list_range( 1, 9 ),
							'type'       => 'select',
						),
						'related_columns_portfolio'    => array(
							'title'      => esc_html__( 'Related columns', 'justitia' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related portfolio on the single portfolio page?', 'justitia' ) ),
							'dependency' => array(
								'show_related_posts_portfolio' => array( 1 ),
							),
							'std'        => 3,
							'options'    => justitia_get_list_range( 1, 4 ),
							'type'       => 'select',
						),
					)
				)
			);
		}

		// Section 'Properties' - settings to show 'Properties' blog archive and single posts
		if ( justitia_exists_properties() ) {

			justitia_storage_merge_array(
				'options', '', array_merge(
					array(
						'properties' => array(
							'title' => esc_html__( 'Properties', 'justitia' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the properties pages', 'justitia' ) ),
							'type'  => 'section',
						),
					),
					justitia_trx_addons_get_list_cpt_options( 'properties' ),
					justitia_options_get_list_cpt_options( 'properties' ),
					array(
						'single_info_properties'        => array(
							'title' => esc_html__( 'Single property', 'justitia' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'show_related_posts_properties' => array(
							'title' => esc_html__( 'Show related posts', 'justitia' ),
							'desc'  => wp_kses_data( __( "Show section 'Related properties' on the single property page", 'justitia' ) ),
							'std'   => 1,
							'type'  => 'checkbox',
						),
						'related_posts_properties'      => array(
							'title'      => esc_html__( 'Related properties', 'justitia' ),
							'desc'       => wp_kses_data( __( 'How many related properties should be displayed on the single property page?', 'justitia' ) ),
							'dependency' => array(
								'show_related_posts_properties' => array( 1 ),
							),
							'std'        => 3,
							'options'    => justitia_get_list_range( 1, 9 ),
							'type'       => 'select',
						),
						'related_columns_properties'    => array(
							'title'      => esc_html__( 'Related columns', 'justitia' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related properties on the single property page?', 'justitia' ) ),
							'dependency' => array(
								'show_related_posts_properties' => array( 1 ),
							),
							'std'        => 3,
							'options'    => justitia_get_list_range( 1, 4 ),
							'type'       => 'select',
						),
					)
				)
			);
		}

		// Section 'Resume'
		if ( justitia_exists_resume() ) {
			justitia_storage_merge_array(
				'options', '', array_merge(
					array(
						'resume' => array(
							'title' => esc_html__( 'Resume', 'justitia' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display "Resume"', 'justitia' ) ),
							'type'  => 'section',
						),
					),
					justitia_trx_addons_get_list_cpt_options( 'resume' )
				)
			);
		}

		// Section 'Services' - settings to show 'Services' blog archive and single posts
		if ( justitia_exists_services() ) {

			justitia_storage_merge_array(
				'options', '', array_merge(
					array(
						'services' => array(
							'title' => esc_html__( 'Services', 'justitia' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the services pages', 'justitia' ) ),
							'type'  => 'section',
						),
					),
					justitia_trx_addons_get_list_cpt_options( 'services' ),
					justitia_options_get_list_cpt_options( 'services' ),
					array(
						'single_info_services'        => array(
							'title' => esc_html__( 'Single service item', 'justitia' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'show_related_posts_services' => array(
							'title' => esc_html__( 'Show related posts', 'justitia' ),
							'desc'  => wp_kses_data( __( "Show section 'Related services' on the single service page", 'justitia' ) ),
							'std'   => 0,
							'type'  => 'checkbox',
						),
						'related_posts_services'      => array(
							'title'      => esc_html__( 'Related services', 'justitia' ),
							'desc'       => wp_kses_data( __( 'How many related services should be displayed on the single service page?', 'justitia' ) ),
							'dependency' => array(
								'show_related_posts_services' => array( 1 ),
							),
							'std'        => 3,
							'options'    => justitia_get_list_range( 1, 9 ),
							'type'       => 'select',
						),
						'related_columns_services'    => array(
							'title'      => esc_html__( 'Related columns', 'justitia' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related services on the single service page?', 'justitia' ) ),
							'dependency' => array(
								'show_related_posts_services' => array( 1 ),
							),
							'std'        => 3,
							'options'    => justitia_get_list_range( 1, 4 ),
							'type'       => 'select',
						),
					)
				)
			);
		}

		// Section 'Sport' - settings to show 'Sport' blog archive and single posts
		if ( justitia_exists_sport() ) {
			justitia_storage_merge_array(
				'options', '', array_merge(
					array(
						'sport' => array(
							'title' => esc_html__( 'Sport', 'justitia' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the sport pages', 'justitia' ) ),
							'type'  => 'section',
						),
					),
					justitia_trx_addons_get_list_cpt_options( 'sport' ),
					justitia_options_get_list_cpt_options( 'sport' )
				)
			);
		}

		// Section 'Team' - settings to show 'Team' blog archive and single posts
		if ( justitia_exists_team() ) {
			justitia_storage_merge_array(
				'options', '', array_merge(
					array(
						'team' => array(
							'title' => esc_html__( 'Team', 'justitia' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the team members pages.', 'justitia' ) ),
							'type'  => 'section',
						),
					),
					justitia_trx_addons_get_list_cpt_options( 'team' ),
					justitia_options_get_list_cpt_options( 'team' )
				)
			);
		}

		// Section 'Testimonials'
		if ( justitia_exists_resume() ) {
			justitia_storage_merge_array(
				'options', '', array_merge(
					array(
						'testimonials' => array(
							'title' => esc_html__( 'Testimonials', 'justitia' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display "Testimonials"', 'justitia' ) ),
							'type'  => 'section',
						),
					),
					justitia_trx_addons_get_list_cpt_options( 'testimonials' )
				)
			);
		}
	}
}

// Add 'layout edit' link to the 'description' in the 'header_style' and 'footer_style' parameters
if ( ! function_exists( 'justitia_trx_addons_add_link_edit_layout' ) ) {
		function justitia_trx_addons_add_link_edit_layout() {
		static $added = false;
		if ( $added ) {
			return;
		}
		$added   = true;
		$options = justitia_storage_get( 'options' );
		foreach ( $options as $k => $v ) {
			if ( ! isset( $v['std'] ) ) {
				continue;
			}
			$k1 = substr( $k, 0, 12 );
			if ( 'header_style' == $k1 || 'footer_style' == $k1 ) {
				$layout = justitia_get_theme_option( $k );
				if ( justitia_is_inherit( $layout ) ) {
					$layout = justitia_get_theme_option( $k1 );
				}
				if ( ! empty( $layout ) ) {
					$layout = explode( '-', $layout );
					$layout = $layout[ count( $layout ) - 1 ];
					if ( $layout > 0 ) {
						justitia_storage_set_array2(
							'options', $k, 'desc', $v['desc']
												. '<br>'
												. sprintf(
													'<a href="%1$s" class="justitia_post_editor' . ( intval( $layout ) == 0 ? ' justitia_hidden' : '' ) . '" target="_blank">%2$s</a>',
													admin_url( apply_filters( 'justitia_filter_post_edit_link', sprintf( 'post.php?post=%d&amp;action=edit', $layout ), $layout ) ),
													__( 'Open selected layout in a new tab to edit', 'justitia' )
												)
						);
					}
				}
			}
		}
	}
}


// Setup internal plugin's parameters
if ( ! function_exists( 'justitia_trx_addons_init_settings' ) ) {
	add_filter( 'trx_addons_init_settings', 'justitia_trx_addons_init_settings' );
	function justitia_trx_addons_init_settings( $settings ) {
		$settings['socials_type']           = justitia_get_theme_setting( 'socials_type' );
		$settings['icons_type']             = justitia_get_theme_setting( 'icons_type' );
		$settings['icons_selector']         = justitia_get_theme_setting( 'icons_selector' );
		$settings['gutenberg_safe_mode']    = justitia_get_theme_setting( 'gutenberg_safe_mode' );
		$settings['allow_gutenberg_blocks'] = justitia_get_theme_setting( 'allow_gutenberg_blocks' );
		$settings['subtitle_above_title']   = justitia_get_theme_setting( 'subtitle_above_title' );
		$settings['add_hide_on_xxx']        = justitia_get_theme_setting( 'add_hide_on_xxx' );
		return $settings;
	}
}


// Return theme-specific data to the dashboard widget
// Attention:
// 1) To show the item in the Dashboard Widget you need specify 'link' and 'link_text'
// 2) To show the item in the Theme Dashboard you need specify 'link', 'image', 'icon' (optional), 'title', 'description' and 'button'
if ( ! function_exists( 'justitia_trx_addons_get_theme_info' ) ) {
		function justitia_trx_addons_get_theme_info( $theme_info ) {
		$theme_info['theme_activated']  = (int) get_option( 'justitia_theme_activated' );
		$theme_info['theme_pro_key']    = justitia_storage_get( 'theme_pro_key' );
		$theme_info['theme_plugins']    = justitia_storage_get( 'theme_plugins' );
		$theme_info['theme_categories'] = explode( ',', justitia_storage_get( 'theme_categories' ) );
		$theme_info['theme_actions']    = array(
			'demo'    => array(
				'link'        => justitia_storage_get( 'theme_demo_url' ),
				'link_text'   => esc_html__( 'Demo', 'justitia' ),
			),
			'doc'     => array(
				'link'        => justitia_storage_get( 'theme_doc_url' ),
				'link_text'   => esc_html__( 'Docs', 'justitia' ),
				'image'       => justitia_get_file_url( 'theme-specific/theme-about/images/theme-panel-doc.png' ),
				'title'       => esc_html__( 'Documentation', 'justitia' ),
				'description' => esc_html__( "Having any questions regarding theme features or installation? Find out how to use and set up your theme in the documentation.", 'justitia' ),
				'button'      => esc_html__( 'Read Documentation', 'justitia' ),
			),
			'support' => array(
				'link'        => justitia_storage_get( 'theme_support_url' ),
				'link_text'   => esc_html__( 'Support', 'justitia' ),
				'image'       => justitia_get_file_url( 'theme-specific/theme-about/images/theme-panel-support.png' ),
				'title'       => esc_html__( 'Support', 'justitia' ),
				'description' => esc_html__( "Are you stuck and need help? Don't worry, you can always submit a support ticket, and our team will help you out.", 'justitia' ),
				'button'      => esc_html__( 'Read Policy & Submit Ticket', 'justitia' ),
			),
			'options'         => array(
				'link'        => admin_url() . 'customize.php',
				'image'       => justitia_get_file_url( 'theme-specific/theme-about/images/theme-panel-options.png' ),
				'title'       => esc_html__( 'Theme Options', 'justitia' ),
				'description' => esc_html__( "That's where you can customize the appearance of your theme and disable/enable specific theme features.", 'justitia' ),
				'button'      => esc_html__( 'Go to Customizer', 'justitia' ),
			),
		);
		if ( JUSTITIA_THEME_FREE ) {
			$theme_info['theme_name']          .= ' ' . esc_html__( 'Free', 'justitia' );
			$theme_info['theme_free']           = true;
			$theme_info['theme_actions']['pro'] = array(
				'link'        => justitia_storage_get( 'theme_download_url' ),
				'link_text'   => esc_html__( 'Go PRO', 'justitia' ),
				'image'       => justitia_get_file_url( 'theme-specific/theme-about/images/theme-panel-pro.png' ),
				'title'       => esc_html__( 'Go Pro', 'justitia' ),
				'description' => esc_html__( 'Get Pro version to increase power of this theme in many times!', 'justitia' ),
				'button'      => esc_html__( 'Get PRO Version', 'justitia' ),
			);
		}
		return $theme_info;
	}
}

if ( ! function_exists( 'justitia_trx_addons_tgmpa_required_plugins_all' ) ) {
		function justitia_trx_addons_tgmpa_required_plugins_all( $list = array() ) {
		$theme_plugins = array();
		if ( is_array( $list ) ) {
			foreach( $list as $item ) {
				$theme_plugins[ $item['slug'] ] = $item;
			}
		}
		justitia_storage_set( 'theme_plugins', $theme_plugins );
		return $list;
	}
}


// Hide sidebar on the news feed pages
if ( ! function_exists( 'justitia_trx_addons_sidebar_present' ) ) {
		function justitia_trx_addons_sidebar_present( $present ) {
		return get_post_type() != 'trx_feed' && $present;
	}
}

// Return text for the "I agree ..." checkbox
if ( ! function_exists( 'justitia_trx_addons_privacy_text' ) ) {
		function justitia_trx_addons_privacy_text( $text='' ) {
		return justitia_get_privacy_text();
	}
}



/* Plugin's support utilities
------------------------------------------------------------------------------- */

// Check if plugin installed and activated
if ( ! function_exists( 'justitia_exists_trx_addons' ) ) {
	function justitia_exists_trx_addons() {
		return defined( 'TRX_ADDONS_VERSION' );
	}
}

// Return true if cars is supported
if ( ! function_exists( 'justitia_exists_cars' ) ) {
	function justitia_exists_cars() {
		return defined( 'TRX_ADDONS_CPT_CARS_PT' );
	}
}

// Return true if certificates is supported
if ( ! function_exists( 'justitia_exists_certificates' ) ) {
	function justitia_exists_certificates() {
		return defined( 'TRX_ADDONS_CPT_CERTIFICATES_PT' );
	}
}

// Return true if courses is supported
if ( ! function_exists( 'justitia_exists_courses' ) ) {
	function justitia_exists_courses() {
		return defined( 'TRX_ADDONS_CPT_COURSES_PT' );
	}
}

// Return true if dishes is supported
if ( ! function_exists( 'justitia_exists_dishes' ) ) {
	function justitia_exists_dishes() {
		return defined( 'TRX_ADDONS_CPT_DISHES_PT' );
	}
}

// Return true if layouts is supported
if ( ! function_exists( 'justitia_exists_layouts' ) ) {
	function justitia_exists_layouts() {
		return defined( 'TRX_ADDONS_CPT_LAYOUTS_PT' );
	}
}

// Return true if portfolio is supported
if ( ! function_exists( 'justitia_exists_portfolio' ) ) {
	function justitia_exists_portfolio() {
		return defined( 'TRX_ADDONS_CPT_PORTFOLIO_PT' );
	}
}

// Return true if properties is supported
if ( ! function_exists( 'justitia_exists_properties' ) ) {
	function justitia_exists_properties() {
		return defined( 'TRX_ADDONS_CPT_PROPERTIES_PT' );
	}
}

// Return true if resume is supported
if ( ! function_exists( 'justitia_exists_resume' ) ) {
	function justitia_exists_resume() {
		return defined( 'TRX_ADDONS_CPT_RESUME_PT' );
	}
}

// Return true if services is supported
if ( ! function_exists( 'justitia_exists_services' ) ) {
	function justitia_exists_services() {
		return defined( 'TRX_ADDONS_CPT_SERVICES_PT' );
	}
}

// Return true if sport is supported
if ( ! function_exists( 'justitia_exists_sport' ) ) {
	function justitia_exists_sport() {
		return defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' );
	}
}

// Return true if team is supported
if ( ! function_exists( 'justitia_exists_team' ) ) {
	function justitia_exists_team() {
		return defined( 'TRX_ADDONS_CPT_TEAM_PT' );
	}
}

// Return true if testimonials is supported
if ( ! function_exists( 'justitia_exists_testimonials' ) ) {
	function justitia_exists_testimonials() {
		return defined( 'TRX_ADDONS_CPT_TESTIMONIALS_PT' );
	}
}

// Return true if rating (reviews) is supported
if ( ! function_exists( 'justitia_exists_reviews' ) ) {
	function justitia_exists_reviews() {
		return function_exists( 'trx_addons_reviews_enable' ) && trx_addons_reviews_enable();
	}
}


// Return true if it's cars page
if ( ! function_exists( 'justitia_is_cars_page' ) ) {
	function justitia_is_cars_page() {
		return function_exists( 'trx_addons_is_cars_page' ) && trx_addons_is_cars_page();
	}
}

// Return true if it's courses page
if ( ! function_exists( 'justitia_is_courses_page' ) ) {
	function justitia_is_courses_page() {
		return function_exists( 'trx_addons_is_courses_page' ) && trx_addons_is_courses_page();
	}
}

// Return true if it's dishes page
if ( ! function_exists( 'justitia_is_dishes_page' ) ) {
	function justitia_is_dishes_page() {
		return function_exists( 'trx_addons_is_dishes_page' ) && trx_addons_is_dishes_page();
	}
}

// Return true if it's properties page
if ( ! function_exists( 'justitia_is_properties_page' ) ) {
	function justitia_is_properties_page() {
		return function_exists( 'trx_addons_is_properties_page' ) && trx_addons_is_properties_page();
	}
}

// Return true if it's portfolio page
if ( ! function_exists( 'justitia_is_portfolio_page' ) ) {
	function justitia_is_portfolio_page() {
		return function_exists( 'trx_addons_is_portfolio_page' ) && trx_addons_is_portfolio_page();
	}
}

// Return true if it's services page
if ( ! function_exists( 'justitia_is_services_page' ) ) {
	function justitia_is_services_page() {
		return function_exists( 'trx_addons_is_services_page' ) && trx_addons_is_services_page();
	}
}

// Return true if it's team page
if ( ! function_exists( 'justitia_is_team_page' ) ) {
	function justitia_is_team_page() {
		return function_exists( 'trx_addons_is_team_page' ) && trx_addons_is_team_page();
	}
}

// Return true if it's sport page
if ( ! function_exists( 'justitia_is_sport_page' ) ) {
	function justitia_is_sport_page() {
		return function_exists( 'trx_addons_is_sport_page' ) && trx_addons_is_sport_page();
	}
}

// Return true if custom layouts are available
if ( ! function_exists( 'justitia_is_layouts_available' ) ) {
	function justitia_is_layouts_available() {
		return justitia_exists_trx_addons()
										&& (
											function_exists( 'justitia_exists_sop' ) && justitia_exists_sop()
											||
											function_exists( 'justitia_exists_elementor' ) && justitia_exists_elementor()
											||
											function_exists( 'justitia_exists_vc' ) && justitia_exists_vc()
											);
	}
}

// Return true if theme is activated in the Theme Panel
if ( ! function_exists( 'justitia_is_theme_activated' ) ) {
	function justitia_is_theme_activated() {
		return function_exists( 'trx_addons_is_theme_activated' ) && trx_addons_is_theme_activated();
	}
}

// Return theme activation code
if ( ! function_exists( 'justitia_get_theme_activation_code' ) ) {
	function justitia_get_theme_activation_code() {
		return function_exists( 'trx_addons_get_theme_activation_code' ) ? trx_addons_get_theme_activation_code() : '';
	}
}

// Detect current blog mode
if ( ! function_exists( 'justitia_trx_addons_detect_blog_mode' ) ) {
		function justitia_trx_addons_detect_blog_mode( $mode = '' ) {
		if ( justitia_is_cars_page() ) {
			$mode = 'cars';
		} elseif ( justitia_is_courses_page() ) {
			$mode = 'courses';
		} elseif ( justitia_is_dishes_page() ) {
			$mode = 'dishes';
		} elseif ( justitia_is_properties_page() ) {
			$mode = 'properties';
		} elseif ( justitia_is_portfolio_page() ) {
			$mode = 'portfolio';
		} elseif ( justitia_is_services_page() ) {
			$mode = 'services';
		} elseif ( justitia_is_sport_page() ) {
			$mode = 'sport';
		} elseif ( justitia_is_team_page() ) {
			$mode = 'team';
		}
		return $mode;
	}
}

// Disallow increment views counter on the blog archive
if ( ! function_exists( 'justitia_trx_addons_inc_views' ) ) {
		function justitia_trx_addons_inc_views( $allow = false ) {
		return $allow && is_page() && justitia_storage_isset( 'blog_archive' ) ? false : $allow;
	}
}

// Add team, courses, etc. to the supported posts list
if ( ! function_exists( 'justitia_trx_addons_list_post_types' ) ) {
		function justitia_trx_addons_list_post_types( $list = array() ) {
		if ( function_exists( 'trx_addons_get_cpt_list' ) ) {
			$cpt_list = trx_addons_get_cpt_list();
			foreach ( $cpt_list as $cpt => $title ) {
				if (
					( defined( 'TRX_ADDONS_CPT_CARS_PT' ) && TRX_ADDONS_CPT_CARS_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_COURSES_PT' ) && TRX_ADDONS_CPT_COURSES_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_DISHES_PT' ) && TRX_ADDONS_CPT_DISHES_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_PORTFOLIO_PT' ) && TRX_ADDONS_CPT_PORTFOLIO_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_PROPERTIES_PT' ) && TRX_ADDONS_CPT_PROPERTIES_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_SERVICES_PT' ) && TRX_ADDONS_CPT_SERVICES_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' ) && TRX_ADDONS_CPT_COMPETITIONS_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_TEAM_PT' ) && TRX_ADDONS_CPT_TEAM_PT == $cpt )
					) {
					$list[ $cpt ] = $title;
				}
			}
		}
		return $list;
	}
}

// Return taxonomy for current post type
if ( ! function_exists( 'justitia_trx_addons_post_type_taxonomy' ) ) {
		function justitia_trx_addons_post_type_taxonomy( $tax = '', $post_type = '' ) {
		if ( defined( 'TRX_ADDONS_CPT_CARS_PT' ) && TRX_ADDONS_CPT_CARS_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_CARS_TAXONOMY_MAKER;
		} elseif ( defined( 'TRX_ADDONS_CPT_COURSES_PT' ) && TRX_ADDONS_CPT_COURSES_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_COURSES_TAXONOMY;
		} elseif ( defined( 'TRX_ADDONS_CPT_DISHES_PT' ) && TRX_ADDONS_CPT_DISHES_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_DISHES_TAXONOMY;
		} elseif ( defined( 'TRX_ADDONS_CPT_PORTFOLIO_PT' ) && TRX_ADDONS_CPT_PORTFOLIO_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_PORTFOLIO_TAXONOMY;
		} elseif ( defined( 'TRX_ADDONS_CPT_PROPERTIES_PT' ) && TRX_ADDONS_CPT_PROPERTIES_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_PROPERTIES_TAXONOMY_TYPE;
		} elseif ( defined( 'TRX_ADDONS_CPT_SERVICES_PT' ) && TRX_ADDONS_CPT_SERVICES_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_SERVICES_TAXONOMY;
		} elseif ( defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' ) && TRX_ADDONS_CPT_COMPETITIONS_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_COMPETITIONS_TAXONOMY;
		} elseif ( defined( 'TRX_ADDONS_CPT_TEAM_PT' ) && TRX_ADDONS_CPT_TEAM_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_TEAM_TAXONOMY;
		}
		return $tax;
	}
}

// Show categories of the team, courses, etc.
if ( ! function_exists( 'justitia_trx_addons_get_post_categories' ) ) {
		function justitia_trx_addons_get_post_categories( $cats = '' ) {

		if ( defined( 'TRX_ADDONS_CPT_CARS_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_CARS_PT ) {
				$cats = justitia_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_CARS_TAXONOMY_TYPE );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_COURSES_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_COURSES_PT ) {
				$cats = justitia_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_COURSES_TAXONOMY );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_DISHES_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_DISHES_PT ) {
				$cats = justitia_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_DISHES_TAXONOMY );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_PORTFOLIO_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_PORTFOLIO_PT ) {
				$cats = justitia_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_PORTFOLIO_TAXONOMY );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_PROPERTIES_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_PROPERTIES_PT ) {
				$cats = justitia_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_PROPERTIES_TAXONOMY_TYPE );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_SERVICES_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_SERVICES_PT ) {
				$cats = justitia_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_SERVICES_TAXONOMY );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_COMPETITIONS_PT ) {
				$cats = justitia_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_COMPETITIONS_TAXONOMY );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_TEAM_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_TEAM_PT ) {
				$cats = justitia_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_TEAM_TAXONOMY );
			}
		}
		return $cats;
	}
}

// Show post's date with the theme-specific format
if ( ! function_exists( 'justitia_trx_addons_get_post_date_wrap' ) ) {
		function justitia_trx_addons_get_post_date_wrap( $dt = '' ) {
		return apply_filters( 'justitia_filter_get_post_date', $dt );
	}
}

// Show date of the courses
if ( ! function_exists( 'justitia_trx_addons_get_post_date' ) ) {
		function justitia_trx_addons_get_post_date( $dt = '' ) {

		if ( defined( 'TRX_ADDONS_CPT_COURSES_PT' ) && get_post_type() == TRX_ADDONS_CPT_COURSES_PT ) {
			$meta = get_post_meta( get_the_ID(), 'trx_addons_options', true );
			$dt   = $meta['date'];
			$dt   = sprintf(
				// Translators: Add formatted date to the output
				$dt < date( 'Y-m-d' ) ? esc_html__( 'Started on %s', 'justitia' ) : esc_html__( 'Starting %s', 'justitia' ),
				date_i18n( get_option( 'date_format' ), strtotime( $dt ) )
			);

		} elseif ( defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' ) && in_array( get_post_type(), array( TRX_ADDONS_CPT_COMPETITIONS_PT, TRX_ADDONS_CPT_ROUNDS_PT, TRX_ADDONS_CPT_MATCHES_PT ) ) ) {
			$meta = get_post_meta( get_the_ID(), 'trx_addons_options', true );
			$dt   = $meta['date_start'];
			$dt   = sprintf(
				// Translators: Add formatted date to the output
				$dt < date( 'Y-m-d' ) . ( ! empty( $meta['time_start'] ) ? ' H:i' : '' ) ? esc_html__( 'Started on %s', 'justitia' ) : esc_html__( 'Starting %s', 'justitia' ),
				date_i18n( get_option( 'date_format' ) . ( ! empty( $meta['time_start'] ) ? ' ' . get_option( 'time_format' ) : '' ), strtotime( $dt . ( ! empty( $meta['time_start'] ) ? ' ' . trim( $meta['time_start'] ) : '' ) ) )
			);

		} elseif ( defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' ) && get_post_type() == TRX_ADDONS_CPT_PLAYERS_PT ) {
			// Uncomment (remove) next line if you want to show player's birthday in the page title block
			if ( false ) {
				$meta = get_post_meta( get_the_ID(), 'trx_addons_options', true );
				// Translators: Add formatted date to the output
				$dt = ! empty( $meta['birthday'] ) ? sprintf( esc_html__( 'Birthday: %s', 'justitia' ), date_i18n( get_option( 'date_format' ), strtotime( $meta['birthday'] ) ) ) : '';
			} else {
				$dt = '';
			}
		}
		return $dt;
	}
}

// Check if override options is allowed
if ( ! function_exists( 'justitia_trx_addons_allow_override_options' ) ) {
		function justitia_trx_addons_allow_override_options( $allow, $post_type ) {
		return $allow
					|| ( function_exists( 'trx_addons_get_list_extended_taxonomy_pt_list' ) && in_array( $post_type, trx_addons_get_list_extended_taxonomy_pt_list() ) )
					|| ( defined( 'TRX_ADDONS_CPT_CARS_PT' ) && in_array(
						$post_type, array(
							TRX_ADDONS_CPT_CARS_PT,
							TRX_ADDONS_CPT_CARS_AGENTS_PT,
						)
					) )
					|| ( defined( 'TRX_ADDONS_CPT_COURSES_PT' ) && TRX_ADDONS_CPT_COURSES_PT == $post_type )
					|| ( defined( 'TRX_ADDONS_CPT_DISHES_PT' ) && TRX_ADDONS_CPT_DISHES_PT == $post_type )
					|| ( defined( 'TRX_ADDONS_CPT_PORTFOLIO_PT' ) && TRX_ADDONS_CPT_PORTFOLIO_PT == $post_type )
					|| ( defined( 'TRX_ADDONS_CPT_PROPERTIES_PT' ) && in_array(
						$post_type, array(
							TRX_ADDONS_CPT_PROPERTIES_PT,
							TRX_ADDONS_CPT_AGENTS_PT,
						)
					) )
					|| ( defined( 'TRX_ADDONS_CPT_RESUME_PT' ) && TRX_ADDONS_CPT_RESUME_PT == $post_type )
					|| ( defined( 'TRX_ADDONS_CPT_SERVICES_PT' ) && TRX_ADDONS_CPT_SERVICES_PT == $post_type )
					|| ( defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' ) && in_array(
						$post_type, array(
							TRX_ADDONS_CPT_COMPETITIONS_PT,
							TRX_ADDONS_CPT_ROUNDS_PT,
							TRX_ADDONS_CPT_MATCHES_PT,
						)
					) )
					|| ( defined( 'TRX_ADDONS_CPT_TEAM_PT' ) && TRX_ADDONS_CPT_TEAM_PT == $post_type );
	}
}

// Check if theme icons is allowed
if ( ! function_exists( 'justitia_trx_addons_allow_theme_icons' ) ) {
		function justitia_trx_addons_allow_theme_icons( $allow, $post_type ) {
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : false;
		return $allow
					|| ( defined( 'TRX_ADDONS_CPT_LAYOUTS_PT' ) && TRX_ADDONS_CPT_LAYOUTS_PT == $post_type )
					|| ( ! empty( $screen->id ) 
						&& ( false !== strpos($screen->id, '_page_trx_addons_options')
							|| in_array( $screen->id, array(
									'profile',
									'widgets',
									)
								)
							)
						);
	}
}

// Disable theme-specific fields in the exported options
if ( ! function_exists( 'justitia_trx_addons_export_options' ) ) {
		function justitia_trx_addons_export_options( $options ) {
		// ThemeREX Addons
		if ( ! empty( $options['trx_addons_options'] ) ) {
			$options['trx_addons_options']['debug_mode']             = 0;
			$options['trx_addons_options']['api_google']             = '';
			$options['trx_addons_options']['api_google_analitics']   = '';
			$options['trx_addons_options']['api_google_remarketing'] = '';
			$options['trx_addons_options']['demo_enable']            = 0;
			$options['trx_addons_options']['demo_referer']           = '';
			$options['trx_addons_options']['demo_default_url']       = '';
			$options['trx_addons_options']['demo_logo']              = '';
			$options['trx_addons_options']['demo_post_type']         = '';
			$options['trx_addons_options']['demo_taxonomy']          = '';
			$options['trx_addons_options']['demo_logo']              = '';
			$options['trx_addons_options']['demo_logo']              = '';
			unset( $options['trx_addons_options']['themes_market_referals'] );
		}
		// ThemeREX Donations
		if ( ! empty( $options['trx_donations_options'] ) ) {
			$options['trx_donations_options']['pp_account'] = '';
		}
		return $options;
	}
}

// Set related posts and columns for the plugin's output
if ( ! function_exists( 'justitia_trx_addons_args_related' ) ) {
		function justitia_trx_addons_args_related( $args ) {
		if ( ! empty( $args['template_args_name'] )
			&& in_array(
				$args['template_args_name'],
				array(
					'trx_addons_args_sc_cars',
					'trx_addons_args_sc_courses',
					'trx_addons_args_sc_dishes',
					'trx_addons_args_sc_portfolio',
					'trx_addons_args_sc_properties',
					'trx_addons_args_sc_services',
				)
			) ) {
			$args['posts_per_page']    = (int) justitia_get_theme_option( 'show_related_posts' )
												? justitia_get_theme_option( 'related_posts' )
												: 0;
			$args['columns']           = justitia_get_theme_option( 'related_columns' );
			$args['slider']            = (int) justitia_get_theme_option( 'related_slider' );
			$args['slides_space']      = justitia_get_theme_option( 'related_slider_space' );
			$args['slider_controls']   = justitia_get_theme_option( 'related_slider_controls' );
			$args['slider_pagination'] = justitia_get_theme_option( 'related_slider_pagination' );
		}
		return $args;
	}
}

// Redirect filter to the plugin
if ( ! function_exists( 'justitia_trx_addons_show_related_posts' ) ) {
		function justitia_trx_addons_show_related_posts( $show ) {
		return apply_filters( 'trx_addons_filter_show_related_posts', $show );
	}
}

// Return false if related posts must be showed below page
if ( ! function_exists( 'justitia_trx_addons_show_related_posts_after_article' ) ) {
		function justitia_trx_addons_show_related_posts_after_article( $show ) {
		return $show && justitia_get_theme_option( 'related_position' ) == 'below_content';
	}
}

// Add 'custom' to the headers types list
if ( ! function_exists( 'justitia_trx_addons_list_header_footer_types' ) ) {
		function justitia_trx_addons_list_header_footer_types( $list = array() ) {
		if ( justitia_exists_layouts() ) {
			$list['custom'] = esc_html__( 'Custom', 'justitia' );
		}
		return $list;
	}
}

// Add layouts to the headers list
if ( ! function_exists( 'justitia_trx_addons_list_header_styles' ) ) {
		function justitia_trx_addons_list_header_styles( $list = array() ) {
		if ( justitia_exists_layouts() ) {
			$layouts  = justitia_get_list_posts(
				false, array(
					'post_type'    => TRX_ADDONS_CPT_LAYOUTS_PT,
					'meta_key'     => 'trx_addons_layout_type',
					'meta_value'   => 'header',
					'orderby'      => 'ID',
					'order'        => 'asc',
					'not_selected' => false,
				)
			);
			$new_list = array();
			foreach ( $layouts as $id => $title ) {
				if ( 'none' != $id ) {
					$new_list[ 'header-custom-' . intval( $id ) ] = $title;
				}
			}
			$list = justitia_array_merge( $new_list, $list );
		}
		return $list;
	}
}

// Add layouts to the footers list
if ( ! function_exists( 'justitia_trx_addons_list_footer_styles' ) ) {
		function justitia_trx_addons_list_footer_styles( $list = array() ) {
		if ( justitia_exists_layouts() ) {
			$layouts  = justitia_get_list_posts(
				false, array(
					'post_type'    => TRX_ADDONS_CPT_LAYOUTS_PT,
					'meta_key'     => 'trx_addons_layout_type',
					'meta_value'   => 'footer',
					'orderby'      => 'ID',
					'order'        => 'asc',
					'not_selected' => false,
				)
			);
			$new_list = array();
			foreach ( $layouts as $id => $title ) {
				if ( 'none' != $id ) {
					$new_list[ 'footer-custom-' . intval( $id ) ] = $title;
				}
			}
			$list = justitia_array_merge( $new_list, $list );
		}
		return $list;
	}
}

// Add layouts to the blog styles list
if ( ! function_exists( 'justitia_trx_addons_list_blog_styles' ) ) {
		function justitia_trx_addons_list_blog_styles( $list, $filter ) {
		static $new_list = array();
		if ( justitia_exists_layouts() ) {
			if ( empty( $new_list[ $filter ] ) ) {
				$new_list[ $filter ] = array();
				$custom_blog_use_id = false;	// Use post ID or sanitized post title as part XXX of the layout key 'blog-custom-XXX_columns'
				$layouts  = justitia_get_list_posts(
					false, array(
						'post_type'    => TRX_ADDONS_CPT_LAYOUTS_PT,
						'meta_key'     => 'trx_addons_layout_type',
						'meta_value'   => 'blog',
						'orderby'      => 'title',
						'order'        => 'asc',
						'not_selected' => false,
					)
				);
				foreach ( $layouts as $id => $title ) {
					if ( $filter == 'arh' ) {
						$from = 1;
						$to = 1;
						$meta = get_post_meta( $id, 'trx_addons_options', true );
						if ( ! empty( $meta['columns_allowed'] ) ) {
							$parts = explode( ',', $meta['columns_allowed'] );
							if ( count($parts) == 1) {
								$to = min( 6, max( $from, (int) $parts[0] ) );
							} else {
								$from = min( 6, max( 1, (int) $parts[0] ) );
								$to = min( 6, max( $from, (int) $parts[1] ) );
							}
						}
						for ( $i = $from; $i <= $to; $i++ ) {
							$new_list[ $filter ][ 'blog-custom-'
										. ( $custom_blog_use_id ? (int) $id : sanitize_title( $title ) ) 
										. ( $from < $to ? "_{$i}" : '')
									] = $from < $to
										// Translators: Make blog style title: "Layout name /X columns/"
										? sprintf( ' ' . _n( '%1$s /%2$d column/', '%1$s /%2$d columns/', $i, 'justitia'), $title, $i )
										: $title;
						}
					} else {
						$new_list[ $filter ][ 'blog-custom-'
										. ( $custom_blog_use_id ? (int) $id : sanitize_title( $title ) ) 
									] = $title;
					}
				}
			}
			if ( ! empty( $new_list[ $filter ] ) && count( $new_list[ $filter ] ) > 0 ) {
				$list = justitia_array_merge( $list, $new_list[ $filter ] );
			}
		}
		return $list;
	}
}


// Return id of the custom header or footer for current mode
if ( ! function_exists( 'justitia_get_custom_layout_id' ) ) {
	function justitia_get_custom_layout_id( $type, $layout_style = '' ) {
		$layout_id = 0;
		if ( empty( $layout_style ) ) {
			$layout_style = justitia_get_theme_option( "{$type}_style" );
		}
		if ( strpos( $layout_style, "{$type}-custom-" ) !== false ) {
			$layout_id = str_replace( "{$type}-custom-", '', $layout_style );
			if ( strpos( $layout_id, '_' ) !== false ) {
				$parts = explode( '_', $layout_id );
				$layout_id = $parts[0];
			}
			if ( 0 == (int) $layout_id ) {
				$layout_id = justitia_get_post_id(
					array(
						'name'      => $layout_id,
						'post_type' => defined( 'TRX_ADDONS_CPT_LAYOUTS_PT' ) ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts',
					)
				);
			} else {
				$layout_id = apply_filters( 'justitia_filter_get_translated_layout', $layout_id );
			}
		}
		return $layout_id;
	}
}

if ( ! function_exists( 'justitia_get_custom_header_id' ) ) {
	function justitia_get_custom_header_id() {
		static $layout_id = -1;
		if ( -1 == $layout_id && justitia_get_theme_option( 'header_type' ) == 'custom') {
			$layout_id = justitia_get_custom_layout_id('header');
		}
		return $layout_id;
	}
}

if ( ! function_exists( 'justitia_get_custom_footer_id' ) ) {
	function justitia_get_custom_footer_id() {
		static $layout_id = -1;
		if ( -1 == $layout_id && justitia_get_theme_option( 'footer_type' ) == 'custom' ) {
			$layout_id = justitia_get_custom_layout_id('footer');
		}
		return $layout_id;
	}
}

if ( ! function_exists( 'justitia_get_custom_blog_id' ) ) {
	function justitia_get_custom_blog_id( $style ) {
		static $layout_id = array();
		if ( empty( $layout_id[ $style ] ) ) {
			$layout_id[ $style ] = justitia_get_custom_layout_id( 'blog', $style );
		}
		return $layout_id[ $style ];
	}
}

// Return meta data from custom layout
if ( ! function_exists( 'justitia_get_custom_layout_meta' ) ) {
	function justitia_get_custom_layout_meta( $id ) {
		static $meta = array();
		if ( empty( $meta[ $id ] ) ) {
			$meta[ $id ] = get_post_meta( $id, 'trx_addons_options', true );
		}
		return $meta[ $id ];
	}
}


// Replace {{Y}} or {Y} with the current year in the layouts
if ( ! function_exists( 'justitia_trx_addons_replace_current_year' ) ) {
		function justitia_trx_addons_replace_current_year( $content, $post_id = 0 ) {
		return str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $content );
	}
}


// Add theme-specific layouts to the list
if ( ! function_exists( 'justitia_trx_addons_default_layouts' ) ) {
		function justitia_trx_addons_default_layouts( $default_layouts = array() ) {
		if ( justitia_storage_isset( 'trx_addons_default_layouts' ) ) {
			$layouts = justitia_storage_get( 'trx_addons_default_layouts' );
		} else {
            include_once justitia_get_file_dir( 'theme-specific/trx_addons-layouts.php');
			if ( ! isset( $layouts ) || ! is_array( $layouts ) ) {
				$layouts = array();
			} else {
				// Replace demo-site urls with current site url
				$old_url = justitia_storage_get( 'theme_demo_url' );
				if ( substr( $old_url, -1 ) == '/' ) {
					$old_url = substr( $old_url, 0, strlen( $old_url ) - 1 );
				}
				$site_url = get_home_url();
				if ( substr( $site_url, -1 ) == '/' ) {
					$site_url = substr( $site_url, 0, strlen( $site_url ) - 1 );
				}
				$layouts = justitia_str_replace(
					array(
						$old_url,
						justitia_remove_protocol_from_url( $old_url, false ),
						justitia_remove_protocol_from_url( $old_url, true ),
					),
					array(
						$site_url,
						justitia_remove_protocol_from_url( $site_url, false ),
						justitia_remove_protocol_from_url( $site_url, true ),
					),
					$layouts
				);
			}
			justitia_storage_set( 'trx_addons_default_layouts', $layouts );
		}
		if ( count( $layouts ) > 0 ) {
			$default_layouts = array_merge( $default_layouts, $layouts );
		}
		return $default_layouts;
	}
}


// Add theme-specific components to the plugin's options
if ( ! function_exists( 'justitia_trx_addons_default_components' ) ) {
		function justitia_trx_addons_default_components( $options = array() ) {
		if ( empty( $options['components_present'] ) ) {
			if ( justitia_storage_isset( 'trx_addons_default_components' ) ) {
				$components = justitia_storage_get( 'trx_addons_default_components' );
			} else {
                include_once justitia_get_file_dir( 'theme-specific/trx_addons-components.php');
				if ( ! isset( $components ) || ! is_array( $components ) ) {
					$components = array();
				}
				justitia_storage_set( 'trx_addons_default_components', $components );
			}
			$options = is_array( $options ) && count( $components ) > 0
									? array_merge( $options, $components )
									: $components;
		}
		// Turn on API of the theme required plugins
		$plugins = justitia_storage_get( 'required_plugins' );
		foreach ( $plugins as $p => $v ) {
			//Disable check, because some components can be added after the plugin's options are saved
			if ( true || isset( $options[ "components_api_{$p}" ] ) ) {
				$options[ "components_api_{$p}" ] = 1;
			}
		}
		return $options;
	}
}


// Add theme-specific options to the post's options
if ( ! function_exists( 'justitia_trx_addons_override_options' ) ) {
		function justitia_trx_addons_override_options( $options = array() ) {
		return apply_filters( 'justitia_filter_override_options', $options );
	}
}

// Enqueue custom styles
if ( ! function_exists( 'justitia_trx_addons_layouts_styles' ) ) {
		function justitia_trx_addons_layouts_styles() {
		if ( ! justitia_exists_trx_addons() ) {
			$justitia_url = justitia_get_file_url( 'plugins/trx_addons/layouts/layouts.css' );
			if ( '' != $justitia_url ) {
				wp_enqueue_style( 'justitia-trx-addons-layouts', $justitia_url, array(), null );
			}
			$justitia_url = justitia_get_file_url( 'plugins/trx_addons/layouts/layouts.responsive.css' );
			if ( '' != $justitia_url ) {
				wp_enqueue_style( 'justitia-trx-addons-layouts-responsive', $justitia_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'justitia_trx_addons_merge_styles' ) ) {
		function justitia_trx_addons_merge_styles( $list ) {
		$list[] = 'plugins/trx_addons/_trx_addons.scss';
		return $list;
	}
}

// Merge responsive styles
if ( ! function_exists( 'justitia_trx_addons_merge_styles_responsive' ) ) {
		function justitia_trx_addons_merge_styles_responsive( $list ) {
		$list[] = 'plugins/trx_addons/_trx_addons-responsive.scss';
		return $list;
	}
}

// Add theme-specific vars to the list of responsive files of ThemeREX Addons
if ( ! function_exists( 'justitia_trx_addons_sass_import' ) ) {
		function justitia_trx_addons_sass_import( $output = '', $file = '' ) {
		if ( strpos( $file, 'vars.scss' ) !== false ) {
			$output .= "\n" . justitia_fgc( justitia_get_file_dir( 'css/_theme-vars.scss' ) ) . "\n";
		}
		return $output;
	}
}

// Enqueue custom scripts
if ( ! function_exists( 'justitia_trx_addons_frontend_scripts' ) ) {
		function justitia_trx_addons_frontend_scripts() {
		if ( justitia_exists_trx_addons() ) {
			if ( justitia_is_on( justitia_get_theme_option( 'debug_mode' ) ) ) {
				$justitia_url = justitia_get_file_url( 'plugins/trx_addons/trx_addons.js' );
				if ( '' != $justitia_url ) {
					wp_enqueue_script( 'justitia-trx-addons', $justitia_url, array( 'jquery' ), null, true );
				}
			}
		}
	}
}

// Merge custom scripts
if ( ! function_exists( 'justitia_trx_addons_merge_scripts' ) ) {
		function justitia_trx_addons_merge_scripts( $list ) {
		$list[] = 'plugins/trx_addons/trx_addons.js';
		return $list;
	}
}



// Plugin API - theme-specific wrappers for plugin functions
//------------------------------------------------------------------------

// Debug functions wrappers
if ( ! function_exists( 'ddo' ) ) {
	function ddo( $obj, $level = -1 ) {
		return var_dump( $obj ); }
}
if ( ! function_exists( 'dcl' ) ) {
	function dcl( $msg, $level = -1 ) {
		echo '<br><pre>' . esc_html( $msg ) . '</pre><br>'; }
}
if ( ! function_exists( 'dco' ) ) {
	function dco( $obj, $level = -1 ) {
		dcl( ddo( $obj, $level ), $level ); }
}
if ( ! function_exists( 'dcs' ) ) {
	function dcs( $level = -1 ) {
		$s = debug_backtrace();
		array_shift( $s );
		dco( $s, $level ); }
}
if ( ! function_exists( 'dfo' ) ) {
	function dfo( $obj, $level = -1 ) {}
}
if ( ! function_exists( 'dfl' ) ) {
	function dfl( $msg, $level = -1 ) {}
}

// Check if URL contain specified string
if ( ! function_exists( 'justitia_check_url' ) ) {
	function justitia_check_url( $val = '', $defa = false ) {
		return function_exists( 'trx_addons_check_url' )
					? trx_addons_check_url( $val )
					: $defa;
	}
}

// Check if layouts components are showed or set new state
if ( ! function_exists( 'justitia_sc_layouts_showed' ) ) {
	function justitia_sc_layouts_showed( $name, $val = null ) {
		if ( function_exists( 'trx_addons_sc_layouts_showed' ) ) {
			if ( null !== $val ) {
				trx_addons_sc_layouts_showed( $name, $val );
			} else {
				return trx_addons_sc_layouts_showed( $name );
			}
		} else {
			if ( null !== $val ) {
				return justitia_storage_set_array( 'sc_layouts_components', $name, $val );
			} else {
				return justitia_storage_get_array( 'sc_layouts_components', $name );
			}
		}
	}
}

// Return image size multiplier
if ( ! function_exists( 'justitia_get_retina_multiplier' ) ) {
	function justitia_get_retina_multiplier( $force_retina = 0 ) {
		$mult = function_exists( 'trx_addons_get_retina_multiplier' ) ? trx_addons_get_retina_multiplier( $force_retina ) : 1;
		return max( 1, $mult );
	}
}

// Return slider layout
if ( ! function_exists( 'justitia_get_slider_layout' ) ) {
	function justitia_get_slider_layout( $args ) {
		return function_exists( 'trx_addons_get_slider_layout' )
					? trx_addons_get_slider_layout( $args )
					: '';
	}
}

// Return slider wrapper first part
if ( ! function_exists( 'justitia_get_slider_wrap_start' ) ) {
	function justitia_get_slider_wrap_start( $sc, $args ) {
		if ( function_exists( 'trx_addons_sc_show_slider_wrap_start' ) ) {
			trx_addons_sc_show_slider_wrap_start( $sc, $args );
		}
	}
}

// Return slider wrapper last part
if ( ! function_exists( 'justitia_get_slider_wrap_end' ) ) {
	function justitia_get_slider_wrap_end( $sc, $args ) {
		if ( function_exists( 'trx_addons_sc_show_slider_wrap_end' ) ) {
			trx_addons_sc_show_slider_wrap_end( $sc, $args );
		}
	}
}

// Return video player layout
if ( ! function_exists( 'justitia_get_video_layout' ) ) {
	function justitia_get_video_layout( $args ) {
		return function_exists( 'trx_addons_get_video_layout' )
					? trx_addons_get_video_layout( $args )
					: '';
	}
}

// Include theme-specific blog style content
if ( ! function_exists( 'justitia_trx_addons_sc_blogger_template' ) ) {
		function justitia_trx_addons_sc_blogger_template( $result, $args ) {
		if ( ! $result ) {
			$tpl = justitia_blog_item_get_template( $args['type'] );
			if ( '' != $tpl ) {
				$tpl = justitia_get_file_dir( $tpl . '.php' );
				if ( '' != $tpl ) {
					set_query_var( 'justitia_template_args', $args );
					include $tpl;
					$result = true;
				}
			}
		}
		return $result;
	}
}

// Return theme specific layout of the featured image block
if ( ! function_exists( 'justitia_trx_addons_featured_image' ) ) {
		function justitia_trx_addons_featured_image( $processed = false, $args = array() ) {
		$args['show_no_image'] = true;
		$args['singular']      = false;
		$args['hover']         = isset( $args['hover'] ) && '' == $args['hover'] 
									? '' 
									: ( isset( $args['hover'] ) && '!' == $args['hover'][0]
										? substr( $args['hover'], 1 )
										: justitia_get_theme_option( 'image_hover' ) 
									);
		justitia_show_post_featured( $args );
		return true;
	}
}

// Remove some thumb-sizes from the ThemeREX Addons list
if ( ! function_exists( 'justitia_trx_addons_add_thumb_sizes' ) ) {
		function justitia_trx_addons_add_thumb_sizes( $list = array() ) {
		if ( is_array( $list ) ) {
			$thumb_sizes = justitia_storage_get( 'theme_thumbs' );
			foreach ( $thumb_sizes as $v ) {
				if ( ! empty( $v['subst'] ) && isset( $list[ $v['subst'] ] ) ) {
					unset( $list[ $v['subst'] ] );
				}
			}
		}
		return $list;
	}
}

// and replace removed styles with theme-specific thumb size
if ( ! function_exists( 'justitia_trx_addons_get_thumb_size' ) ) {
		function justitia_trx_addons_get_thumb_size( $thumb_size = '' ) {
		$thumb_sizes = justitia_storage_get( 'theme_thumbs' );
		foreach ( $thumb_sizes as $k => $v ) {
			if ( strpos( $thumb_size, $v['subst'] ) !== false ) {
				$thumb_size = str_replace( $thumb_size, $v['subst'], $k );
				break;
			}
		}
		return $thumb_size;
	}
}

// Return theme specific 'no-image' picture
if ( ! function_exists( 'justitia_trx_addons_no_image' ) ) {
		function justitia_trx_addons_no_image( $no_image = '' ) {
		return justitia_get_no_image( $no_image );
	}
}

// Return theme-specific icons
if ( ! function_exists( 'justitia_trx_addons_get_list_icons_classes' ) ) {
		function justitia_trx_addons_get_list_icons_classes( $list, $prepend_inherit ) {
		return justitia_get_list_icons_classes( $prepend_inherit );
	}
}

// Remove 'icon-' from the name
if ( ! function_exists( 'justitia_trx_addons_clear_icon_name' ) ) {
		function justitia_trx_addons_clear_icon_name( $icon ) {
		return substr( $icon, 0, 5 ) == 'icon-' ? substr( $icon, 5 ) : $icon;
	}
}


// Return links to the social profiles
if ( ! function_exists( 'justitia_get_socials_links' ) ) {
	function justitia_get_socials_links( $style = 'icons', $show='icons' ) {
		return function_exists( 'trx_addons_get_socials_links' )
					? trx_addons_get_socials_links( $style, $show )
					: '';
	}
}

// Return links to share post
if ( ! function_exists( 'justitia_get_share_links' ) ) {
	function justitia_get_share_links( $args = array() ) {
		return function_exists( 'trx_addons_get_share_links' )
					? trx_addons_get_share_links( $args )
					: '';
	}
}

// Display links to share post
if ( ! function_exists( 'justitia_show_share_links' ) ) {
	function justitia_show_share_links( $args = array() ) {
		if ( function_exists( 'trx_addons_get_share_links' ) ) {
			$args['echo'] = true;
			trx_addons_get_share_links( $args );
		}
	}
}

// Return post icon
if ( ! function_exists( 'justitia_get_post_icon' ) ) {
	function justitia_get_post_icon( $post_id = 0 ) {
		return function_exists( 'trx_addons_get_post_icon' )
					? trx_addons_get_post_icon( $post_id )
					: '';
	}
}

// Show reactions in the single posts
if ( ! function_exists( 'justitia_trx_addons_action_before_post_meta' ) ) {
		function justitia_trx_addons_action_before_post_meta() {
		if ( trx_addons_is_on( trx_addons_get_option( 'emotions_allowed' ) ) && is_single() && ! is_attachment() ) {
			trx_addons_get_post_reactions( true );
		}
	}
}


// Return image from the category
if ( ! function_exists( 'justitia_get_category_image' ) ) {
	function justitia_get_category_image( $term_id = 0 ) {
		return function_exists( 'trx_addons_get_category_image' )
					? trx_addons_get_category_image( $term_id )
					: '';
	}
}

// Return small image (icon) from the category
if ( ! function_exists( 'justitia_get_category_icon' ) ) {
	function justitia_get_category_icon( $term_id = 0 ) {
		return function_exists( 'trx_addons_get_category_icon' )
					? trx_addons_get_category_icon( $term_id )
					: '';
	}
}

// Return string with counters items
if ( ! function_exists( 'justitia_get_post_counters' ) ) {
	function justitia_get_post_counters( $counters = 'views' ) {
		return function_exists( 'trx_addons_get_post_counters' )
					? str_replace( 'post_counters_item', 'post_meta_item post_counters_item', trx_addons_get_post_counters( $counters ) )
					: '';
	}
}

// Display custom counter
if ( ! function_exists( 'justitia_show_post_counter' ) ) {
	add_action( 'justitia_action_show_post_counter', 'justitia_show_post_counter', 10, 2 );
	function justitia_show_post_counter( $counter, $post_id ) {
		justitia_show_layout( apply_filters( 'trx_addons_filter_show_post_counter', '', $counter, $post_id ) );
	}
}


// Return list with animation effects
if ( ! function_exists( 'justitia_get_list_animations_in' ) ) {
	function justitia_get_list_animations_in() {
		return function_exists( 'trx_addons_get_list_animations_in' )
					? trx_addons_get_list_animations_in()
					: array();
	}
}

// Return classes list for the specified animation
if ( ! function_exists( 'justitia_get_animation_classes' ) ) {
	function justitia_get_animation_classes( $animation, $speed = 'normal', $loop = 'none' ) {
		return function_exists( 'trx_addons_get_animation_classes' )
					? trx_addons_get_animation_classes( $animation, $speed, $loop )
					: '';
	}
}

// Return string with the likes counter for the specified comment
if ( ! function_exists( 'justitia_get_comment_counters' ) ) {
	function justitia_get_comment_counters( $counters = 'likes' ) {
		return function_exists( 'trx_addons_get_comment_counters' )
					? trx_addons_get_comment_counters( $counters )
					: '';
	}
}

// Display likes counter for the specified comment
if ( ! function_exists( 'justitia_show_comment_counters' ) ) {
	function justitia_show_comment_counters( $counters = 'likes' ) {
		if ( function_exists( 'trx_addons_get_comment_counters' ) ) {
			trx_addons_get_comment_counters( $counters, true );
		}
	}
}

// Add query params to sort posts by views or likes
if ( ! function_exists( 'justitia_trx_addons_query_sort_order' ) ) {
		function justitia_trx_addons_query_sort_order( $q = array(), $orderby = 'date', $order = 'desc' ) {
		if ( 'views' == $orderby ) {
			$q['orderby']  = 'meta_value_num';
			$q['meta_key'] = 'trx_addons_post_views_count';
		} elseif ( 'likes' == $orderby ) {
			$q['orderby']  = 'meta_value_num';
			$q['meta_key'] = 'trx_addons_post_likes_count';
		}
		return $q;
	}
}

// Return theme-specific logo to the plugin
if ( ! function_exists( 'justitia_trx_addons_theme_logo' ) ) {
		function justitia_trx_addons_theme_logo( $logo ) {
		return justitia_get_logo_image();
	}
}

// Return true, if theme allow use site name as logo
if ( ! function_exists( 'justitia_trx_addons_show_site_name_as_logo' ) ) {
		function justitia_trx_addons_show_site_name_as_logo( $allow = true ) {
		return $allow && justitia_is_on( justitia_get_theme_option( 'logo_text' ) );
	}
}

// Return theme-specific post meta to the plugin
if ( ! function_exists( 'justitia_trx_addons_post_meta' ) ) {
		function justitia_trx_addons_post_meta( $meta, $args = array() ) {
		return justitia_show_post_meta( apply_filters( 'justitia_filter_post_meta_args', $args, 'trx_addons', 1 ) );
	}
}

// Return theme-specific post meta args
if ( ! function_exists( 'justitia_trx_addons_post_meta_args' ) ) {
			function justitia_trx_addons_post_meta_args( $args = array(), $from = '', $columns = 1 ) {
		$theme_specific = ! isset( $args['theme_specific'] ) || $args['theme_specific'];
		if ( ( is_single() && 'trx_addons' == $from && $theme_specific ) || empty( $args ) ) {
			$args['components'] = justitia_array_get_keys_by_value( justitia_get_theme_option( 'meta_parts' ) );
			$args['counters']   = justitia_array_get_keys_by_value( justitia_get_theme_option( 'counters' ) );
			$args['seo']        = justitia_is_on( justitia_get_theme_option( 'seo_snippets' ) );
		}
		return $args;
	}
}

// Add Rating to the meta parts list
if ( ! function_exists( 'justitia_trx_addons_list_counters' ) ) {
		function justitia_trx_addons_list_counters( $list ) {
		if ( justitia_exists_reviews() ) {
			$list['rating'] = esc_html__( 'Rating', 'justitia' );
		}
		return $list;
	}
}

// Return list of the counters
if ( ! function_exists( 'justitia_trx_addons_get_list_counters' ) ) {
		function justitia_trx_addons_get_list_counters( $list ) {
		return justitia_get_list_counters();
	}
}

// Return list of the meta parts
if ( ! function_exists( 'justitia_trx_addons_get_list_meta_parts' ) ) {
		function justitia_trx_addons_get_list_meta_parts( $list ) {
		return justitia_get_list_meta_parts();
	}
}

// Check if featured image override is allowed
if ( ! function_exists( 'justitia_trx_addons_featured_image_override' ) ) {
		function justitia_trx_addons_featured_image_override( $flag = false ) {
		if ( $flag ) {
			$flag = justitia_is_on( justitia_get_theme_option( 'header_image_override' ) )
					&& apply_filters( 'justitia_filter_allow_override_header_image', true );
		}		
		return $flag;
	}
}

// Return featured image for current mode (post/page/category/blog template ...)
if ( ! function_exists( 'justitia_trx_addons_get_current_mode_image' ) ) {
		function justitia_trx_addons_get_current_mode_image( $img = '' ) {
		return justitia_get_current_mode_image( $img );
	}
}

// Return featured image size for related posts
if ( ! function_exists( 'justitia_trx_addons_related_thumb_size' ) ) {
		function justitia_trx_addons_related_thumb_size( $size = '' ) {
		if ( defined( 'TRX_ADDONS_CPT_CERTIFICATES_PT' ) && get_post_type() == TRX_ADDONS_CPT_CERTIFICATES_PT ) {
			$size = justitia_get_thumb_size( 'masonry-big' );
		}
		return $size;
	}
}

// Redirect action 'get_mobile_menu' to the plugin
// Return stored items as mobile menu
if ( ! function_exists( 'justitia_trx_addons_get_mobile_menu' ) ) {
		function justitia_trx_addons_get_mobile_menu( $menu ) {
		return apply_filters( 'trx_addons_filter_get_mobile_menu', $menu );
	}
}

// Redirect action 'login' to the plugin
if ( ! function_exists( 'justitia_trx_addons_action_login' ) ) {
		function justitia_trx_addons_action_login( $args = array() ) {
		do_action( 'trx_addons_action_login', $args );
	}
}

// Redirect action 'cart' to the plugin
if ( ! function_exists( 'justitia_trx_addons_action_cart' ) ) {
		function justitia_trx_addons_action_cart( $args = array() ) {
		do_action( 'trx_addons_action_cart', $args );
	}
}

// Redirect action 'search' to the plugin
if ( ! function_exists( 'justitia_trx_addons_action_search' ) ) {
		function justitia_trx_addons_action_search( $style, $class, $ajax ) {
		if ( justitia_exists_trx_addons() ) {
			do_action( 'trx_addons_action_search', $style, $class, $ajax );
		} else {
			set_query_var( 'justitia_search_args', compact( 'style', 'class', 'ajax' ) );
			get_template_part( apply_filters( 'justitia_filter_get_template_part', 'templates/search-form' ) );
			set_query_var( 'justitia_search_args', array() );
		}
	}
}

// Redirect action 'breadcrumbs' to the plugin
if ( ! function_exists( 'justitia_trx_addons_action_breadcrumbs' ) ) {
		function justitia_trx_addons_action_breadcrumbs() {
		do_action( 'trx_addons_action_breadcrumbs' );
	}
}

// Redirect action 'show_layout' to the plugin
if ( ! function_exists( 'justitia_trx_addons_action_show_layout' ) ) {
		function justitia_trx_addons_action_show_layout( $layout_id = '' ) {
		do_action( 'trx_addons_action_show_layout', $layout_id );
	}
}

// Redirect filter 'get_translated_layout' to the plugin
if ( ! function_exists( 'justitia_trx_addons_filter_get_translated_layout' ) ) {
		function justitia_trx_addons_filter_get_translated_layout( $layout_id = '' ) {
		return apply_filters( 'trx_addons_filter_get_translated_layout', $layout_id );
	}
}

// Show user meta (socials)
if ( ! function_exists( 'justitia_trx_addons_action_user_meta' ) ) {
		function justitia_trx_addons_action_user_meta() {
		do_action( 'trx_addons_action_user_meta' );
	}
}

// Redirect filter 'get_blog_title' to the plugin
if ( ! function_exists( 'justitia_trx_addons_get_blog_title' ) ) {
		function justitia_trx_addons_get_blog_title( $title = '' ) {
		return apply_filters( 'trx_addons_filter_get_blog_title', $title );
	}
}

// Redirect filter 'term_name' to the plugin
if ( ! function_exists( 'justitia_trx_addons_term_name' ) ) {
		function justitia_trx_addons_term_name( $term_name, $taxonomy ) {
		return apply_filters( 'trx_addons_filter_term_name', $term_name, $taxonomy );
	}
}

// Redirect filter 'get_post_iframe' to the plugin
if ( ! function_exists( 'justitia_trx_addons_get_post_iframe' ) ) {
		function justitia_trx_addons_get_post_iframe( $html = '' ) {
		return apply_filters( 'trx_addons_filter_get_post_iframe', $html );
	}
}

// Return true, if theme need a SEO snippets
if ( ! function_exists( 'justitia_trx_addons_seo_snippets' ) ) {
		function justitia_trx_addons_seo_snippets( $enable = false ) {
		return justitia_is_on( justitia_get_theme_option( 'seo_snippets' ) );
	}
}

// Show user meta (socials)
if ( ! function_exists( 'justitia_trx_addons_article_start' ) ) {
		function justitia_trx_addons_article_start( $page = '' ) {
		if ( justitia_is_on( justitia_get_theme_option( 'seo_snippets' ) ) ) {
			get_template_part( apply_filters( 'justitia_filter_get_template_part', 'templates/seo' ) );
		}
	}
}

// Redirect filter 'prepare_css' to the plugin
if ( ! function_exists( 'justitia_trx_addons_prepare_css' ) ) {
		function justitia_trx_addons_prepare_css( $css = '', $remove_spaces = true ) {
		return apply_filters( 'trx_addons_filter_prepare_css', $css, $remove_spaces );
	}
}

// Redirect filter 'prepare_js' to the plugin
if ( ! function_exists( 'justitia_trx_addons_prepare_js' ) ) {
		function justitia_trx_addons_prepare_js( $js = '', $remove_spaces = true ) {
		return apply_filters( 'trx_addons_filter_prepare_js', $js, $remove_spaces );
	}
}

// Add plugin's specific variables to the scripts
if ( ! function_exists( 'justitia_trx_addons_localize_script' ) ) {
		function justitia_trx_addons_localize_script( $arr ) {
		$arr['trx_addons_exists'] = justitia_exists_trx_addons();
		return $arr;
	}
}

// Redirect filter 'trx_addons_filter_get_theme_file_dir' to the theme
if ( ! function_exists( 'justitia_trx_addons_get_theme_file_dir' ) ) {
		function justitia_trx_addons_get_theme_file_dir( $dir, $file, $return_url ) {
		return apply_filters( 'justitia_filter_get_theme_file_dir', $dir, $file, $return_url );
	}
}

// Redirect filter 'trx_addons_filter_get_theme_folder_dir' to the theme
if ( ! function_exists( 'justitia_trx_addons_get_theme_folder_dir' ) ) {
		function justitia_trx_addons_get_theme_folder_dir( $dir, $folder, $return_url ) {
		return apply_filters( 'justitia_filter_get_theme_file_dir', $dir, $folder, $return_url );
	}
}

// Add plugin-specific colors and fonts to the custom CSS
if ( justitia_exists_trx_addons() ) {
	require_once JUSTITIA_THEME_DIR . 'plugins/trx_addons/trx_addons-styles.php'; }

