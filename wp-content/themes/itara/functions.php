<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Overwrite parent theme background defaults and registers support for WordPress features.
add_action( 'after_setup_theme', 'lalita_background_setup' );
function lalita_background_setup() {
	add_theme_support( "custom-background",
		array(
			'default-color' 		 => 'ffffff',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'left',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	);
}

// Overwrite theme URL
function lalita_theme_uri_link() {
	return 'https://wpkoi.com/itara-wpkoi-wordpress-theme/';
}

// Overwrite parent theme's blog header function
add_action( 'lalita_after_header', 'lalita_blog_header_image', 11 );
function lalita_blog_header_image() {

	if ( ( is_front_page() && is_home() ) || ( is_home() ) ) { 
		$blog_header_image 			=  lalita_get_setting( 'blog_header_image' ); 
		$blog_header_title 			=  lalita_get_setting( 'blog_header_title' ); 
		$blog_header_text 			=  lalita_get_setting( 'blog_header_text' ); 
		$blog_header_button_text 	=  lalita_get_setting( 'blog_header_button_text' ); 
		$blog_header_button_url 	=  lalita_get_setting( 'blog_header_button_url' ); 
		if ( $blog_header_image != '' ) { ?>
		<div class="page-header-image grid-parent page-header-blog" style="background-image: url('<?php echo esc_url($blog_header_image); ?>') !important;">
        	<div class="page-header-noiseoverlay"></div>
        	<div class="page-header-blog-inner">
                <div class="page-header-blog-content-h grid-container">
                    <div class="page-header-blog-content">
                    <?php if ( $blog_header_title != '' ) { ?>
                        <div class="page-header-blog-text">
                            <?php if ( $blog_header_title != '' ) { ?>
                            <h2><?php echo wp_kses_post( $blog_header_title ); ?></h2>
                            <div class="clearfix"></div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="page-header-blog-content page-header-blog-content-b">
                	<?php if ( $blog_header_text != '' ) { ?>
                	<div class="page-header-blog-text">
						<?php if ( $blog_header_title != '' ) { ?>
                        <p><?php echo wp_kses_post( $blog_header_text ); ?></p>
                        <div class="clearfix"></div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <div class="page-header-blog-button">
                        <?php if ( $blog_header_button_text != '' ) { ?>
                        <a class="read-more button" href="<?php echo esc_url( $blog_header_button_url ); ?>"><?php echo esc_html( $blog_header_button_text ); ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
		</div>
		<?php
		}
	}
}

// Extra cutomizer functions
if ( ! function_exists( 'itara_customize_register' ) ) {
	add_action( 'customize_register', 'itara_customize_register' );
	function itara_customize_register( $wp_customize ) {
				
		// Add Itara customizer section
		$wp_customize->add_section(
			'itara_layout_effects',
			array(
				'title' => __( 'Itara Effects', 'itara' ),
				'priority' => 24,
			)
		);
		
		
		// Borders
		$wp_customize->add_setting(
			'itara_settings[borders]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'itara_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'itara_settings[borders]',
			array(
				'type' => 'select',
				'label' => __( 'Borders', 'itara' ),
				'choices' => array(
					'enable' => __( 'Enable', 'itara' ),
					'disable' => __( 'Disable', 'itara' )
				),
				'settings' => 'itara_settings[borders]',
				'section' => 'itara_layout_effects',
				'priority' => 1
			)
		);
		
		
		// Blog img border
		$wp_customize->add_setting(
			'itara_settings[blog_img_border]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'itara_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'itara_settings[blog_img_border]',
			array(
				'type' => 'select',
				'label' => __( 'Blog img border', 'itara' ),
				'choices' => array(
					'enable' => __( 'Enable', 'itara' ),
					'disable' => __( 'Disable', 'itara' )
				),
				'settings' => 'itara_settings[blog_img_border]',
				'section' => 'itara_layout_effects',
				'priority' => 2
			)
		);
		
		$wp_customize->add_setting(
			'itara_settings[itara_border_color]', array(
				'default' => '#000000',
				'type' => 'option',
				'sanitize_callback' => 'itara_sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'itara_settings[itara_border_color]',
				array(
					'label' => __( 'Border color', 'itara' ),
					'section' => 'itara_layout_effects',
					'settings' => 'itara_settings[itara_border_color]',
					'priority' => 3
				)
			)
		);
		
		// Unique scrollbar
		$wp_customize->add_setting(
			'itara_settings[unique_scrollbar]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'itara_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'itara_settings[unique_scrollbar]',
			array(
				'type' => 'select',
				'label' => __( 'Unique scrollbar', 'itara' ),
				'choices' => array(
					'enable' => __( 'Enable', 'itara' ),
					'disable' => __( 'Disable', 'itara' )
				),
				'settings' => 'itara_settings[unique_scrollbar]',
				'section' => 'itara_layout_effects',
				'priority' => 4
			)
		);
		
		// Cursor image
		$wp_customize->add_setting(
			'itara_settings[cursor_image]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'itara_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'itara_settings[cursor_image]',
			array(
				'type' => 'select',
				'label' => __( 'Cursor image', 'itara' ),
				'choices' => array(
					'enable' => __( 'Enable', 'itara' ),
					'disable' => __( 'Disable', 'itara' )
				),
				'settings' => 'itara_settings[cursor_image]',
				'section' => 'itara_layout_effects',
				'priority' => 9
			)
		);
		
		$wp_customize->add_setting(
			'itara_settings[def_cursor_image]',
			array(
				'default' => '',
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'itara_settings[def_cursor_image]',
				array(
					'label' => __( 'Default cursor image', 'itara' ),
					'section' => 'itara_layout_effects',
					'priority' => 10,
					'settings' => 'itara_settings[def_cursor_image]',
					'description' => __( 'Recommended size: 32*32px. Big image won`t work.', 'itara' )
				)
			)
		);
		
		$wp_customize->add_setting(
			'itara_settings[pointer_cursor_image]',
			array(
				'default' => '',
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'itara_settings[pointer_cursor_image]',
				array(
					'label' => __( 'Pointer cursor image', 'itara' ),
					'section' => 'itara_layout_effects',
					'priority' => 11,
					'settings' => 'itara_settings[pointer_cursor_image]',
					'description' => __( 'Recommended size: 32*32px. Big image won`t work.', 'itara' )
				)
			)
		);
		
	}
}

//Sanitize choices.
if ( ! function_exists( 'itara_sanitize_choices' ) ) {
	function itara_sanitize_choices( $input, $setting ) {
		// Ensure input is a slug
		$input = sanitize_key( $input );

		// Get list of choices from the control
		// associated with the setting
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it;
		// otherwise, return the default
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

// Sanitize colors. Allow blank value.
if ( ! function_exists( 'itara_sanitize_hex_color' ) ) {
	function itara_sanitize_hex_color( $color ) {
	    if ( '' === $color ) {
	        return '';
		}

	    // 3 or 6 hex digits, or the empty string.
	    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
	        return $color;
		}

	    return '';
	}
}

// Itara extra colors
if ( ! function_exists( 'itara_extra_colors_css' ) ) {
	function itara_extra_colors_css() {
		// Get Customizer settings
		$itara_settings = get_option( 'itara_settings' );
		
		$itara_border_color  	 = '#000000';
		$def_cursor_image  	  = '';
		$pointer_cursor_image = '';
		if ( isset( $itara_settings['itara_border_color'] ) ) {
			$itara_border_color = $itara_settings['itara_border_color'];
		}
		if ( isset( $itara_settings['def_cursor_image'] ) ) {
			$def_cursor_image = $itara_settings['def_cursor_image'];
		}
		if ( isset( $itara_settings['pointer_cursor_image'] ) ) {
			$pointer_cursor_image = $itara_settings['pointer_cursor_image'];
		}
		
		$itara_extracolors = '.itara-borders .lalita-side-padding-inside {border: 10px solid ' . esc_attr( $itara_border_color ) . ';}.itara-borders .site-footer{border-top: 10px solid ' . esc_attr( $itara_border_color ) . ';}.itara-borders .site-header {border-bottom: 10px solid ' . esc_attr( $itara_border_color ) . ';}.itara-borders .nav-float-right .is_stuck.main-navigation .nav-float-right .is_stuck.main-navigation{border-color: ' . esc_attr( $itara_border_color ) . '}.itara-blog-img .post-image img {border: 5px solid ' . esc_attr( $itara_border_color ) . ';}';
		
		if ( $def_cursor_image != '' ) {
			$itara_extracolors .= 'body.itara-cursor-image{cursor: url(' . esc_url( $def_cursor_image ) . '), auto; }';
		}
		if ( $pointer_cursor_image != '' ) {
			$itara_extracolors .= '.itara-cursor-image a, .itara-cursor-image input[type="submit"]:hover {cursor: url(' . esc_url( $pointer_cursor_image ) . '), auto; }';
		}

		return $itara_extracolors;
	}
}


// The dynamic styles of the parent theme added inline to the parent stylesheet.
// For the customizer functions it is better to enqueue after the child theme stylesheet.
if ( ! function_exists( 'itara_remove_parent_dynamic_css' ) ) {
	add_action( 'init', 'itara_remove_parent_dynamic_css' );
	function itara_remove_parent_dynamic_css() {
		remove_action( 'wp_enqueue_scripts', 'lalita_enqueue_dynamic_css', 50 );
	}
}

// Enqueue this CSS after the child stylesheet, not after the parent stylesheet.
if ( ! function_exists( 'itara_enqueue_parent_dynamic_css' ) ) {
	add_action( 'wp_enqueue_scripts', 'itara_enqueue_parent_dynamic_css', 50 );
	function itara_enqueue_parent_dynamic_css() {
		$css = lalita_base_css() . lalita_font_css() . lalita_advanced_css() . lalita_spacing_css() . lalita_no_cache_dynamic_css() .itara_extra_colors_css();

		// escaped secure before in parent theme
		wp_add_inline_style( 'lalita-child', $css );
	}
}

//Adds custom classes to the array of body classes.
if ( ! function_exists( 'itara_body_classes' ) ) {
	add_filter( 'body_class', 'itara_body_classes' );
	function itara_body_classes( $classes ) {
		// Get Customizer settings
		$itara_settings = get_option( 'itara_settings' );
		
		$borders 	     = 'enable';
		$blog_img_border = 'enable';
		$cursor_image	 = 'enable';
		$unique_scrollbar		 = 'enable';
		
		if ( isset( $itara_settings['borders'] ) ) {
			$borders = $itara_settings['borders'];
		}
		
		if ( isset( $itara_settings['blog_img_border'] ) ) {
			$blog_img_border = $itara_settings['blog_img_border'];
		}
		
		if ( isset( $itara_settings['cursor_image'] ) ) {
			$cursor_image = $itara_settings['cursor_image'];
		}
		
		
		if ( isset( $itara_settings['unique_scrollbar'] ) ) {
			$unique_scrollbar = $itara_settings['unique_scrollbar'];
		}
		
		// Borders
		if ( $borders != 'disable' ) {
			$classes[] = 'itara-borders';
		}
		
		// Blog img border
		if ( $blog_img_border != 'disable' ) {
			$classes[] = 'itara-blog-img';
		}
		
		// Cursor Image
		if ( $cursor_image != 'disable' ) {
			$classes[] = 'itara-cursor-image';
		}
		
		// Unique scrollbar
		if ( $unique_scrollbar != 'disable' ) {
			$classes[] = 'itara-unique-scrollbar';
		}
		
		return $classes;
	}
}

