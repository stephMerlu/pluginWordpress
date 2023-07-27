<?php
function teczilla_portfolio_sections_settings( $wp_customize ) {
    $wp_customize->remove_setting( 'teczilla_menubar_bg_color' );
     $wp_customize->remove_setting( 'teczilla_menu_item_color' );
      $wp_customize->remove_setting( 'teczilla_menu_item_hover_color' );
       $wp_customize->remove_setting( 'teczilla_menu_link_bg_color' );
       $wp_customize->remove_setting( 'teczilla_submnubg_scheme' );
        $wp_customize->remove_setting( 'teczilla_submnu_link' );
        $wp_customize->remove_section( 'teczilla_top_header' );
        $wp_customize->remove_control('blogdescription');

        
        $wp_customize->add_setting('teczilla_theme_color_scheme',array(
        'default' => esc_html__('#fd4a36','teczilla-portfolio'),
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,'teczilla_theme_color_scheme',array(
            'label' => esc_html__('Theme Color','teczilla-portfolio'),           
            'description' => esc_html__('Change Theme Color','teczilla-portfolio'),
            'section' => 'colors',
            'settings' => 'teczilla_theme_color_scheme'
        ))
    );


    $wp_customize->add_section('teczilla_main_top_header',array(
            'title' => esc_html__('Top Header','teczilla-portfolio'),
            'panel' => 'section_settings',
            'priority'       => 7,
            ));

$wp_customize->add_setting('teczilla_top_header_enable',
        array(
            'sanitize_callback' => 'teczilla_sanitize_checkbox',
            'default'           => 1,
        )
    );
    $wp_customize->add_control('teczilla_top_header_enable',
        array(
            'type'        => 'checkbox',
            'label'       => esc_html__('Enable Top Header Section?', 'teczilla-portfolio'),
            'section'     => 'teczilla_main_top_header',
            'description' => esc_html__('Check this box to Enable Top Header section.', 'teczilla-portfolio'),
        )
    );



    // Navigation Button
    $wp_customize->add_setting('teczilla_header_mail',   
        array(
            'sanitize_callback' => 'teczilla_sanitize_text',
            'default'           => '',
            ));

    $wp_customize->add_control('teczilla_header_mail',
        array(
            'label'       => esc_html__('Header Email', 'teczilla-portfolio'),
            'section'     => 'teczilla_main_top_header',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting('teczilla_header_address',   
        array(
            'sanitize_callback' => 'teczilla_sanitize_text',
            'default'           => '',
            ));

    $wp_customize->add_control('teczilla_header_address',
        array(
            'label'       => esc_html__('Header Address', 'teczilla-portfolio'),
            'section'     => 'teczilla_main_top_header',
            'type'        => 'text',
        )
    );


    $wp_customize->add_setting('teczilla_header_button_address',   
        array(
            'sanitize_callback' => 'teczilla_sanitize_text',
            'default'           => '',
            ));

    $wp_customize->add_control('teczilla_header_button_address',
        array(
            'label'       => esc_html__('Header Button', 'teczilla-portfolio'),
            'section'     => 'teczilla_main_top_header',
            'type'        => 'text',
        )
    );

        $wp_customize->add_setting('teczilla_header_button_url',   
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
            ));

    $wp_customize->add_control('teczilla_header_button_url',
        array(
            'label'       => esc_html__('Header Button Url', 'teczilla-portfolio'),
            'section'     => 'teczilla_main_top_header',
            'type'        => 'url',
        )
    );

}
add_action( 'customize_register', 'teczilla_portfolio_sections_settings', 30);