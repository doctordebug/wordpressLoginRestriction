<?php

class LoginCustomizer {

    public static function init ( $wp_customize ) {

        $wp_customize->add_section( 'ulr_section' , array(
            'title'    => 'Login',
            'priority' => 30
        ) );   
    
        $wp_customize->add_setting( 'ulr_section_bg' , array(
            'default'   => '#FFFFFF',
            'transport' => 'postMessage',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ulr_section_bg_chooser', array(
            'label'    => 'bgcolor',
            'section'  => 'ulr_section',
            'settings' => 'ulr_section_bg',
        ) ) );

        $wp_customize->add_setting( 'ulr_section_bg2' , array(
            'default'   => '#FFFFFF',
            'transport' => 'postMessage',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ulr_section_bg2_chooser', array(
            'label'    => 'bgcolor2',
            'section'  => 'ulr_section',
            'settings' => 'ulr_section_bg2'
        ) ) );

        $wp_customize->add_setting( 'ulr_section_width', array(
            'transport' => 'postMessage',
            'default' => 370,
          ) );
          
          $wp_customize->add_control( 'ulr_section_width_chooser', array(
            'type' => 'number',
            'section' => 'ulr_section', 
            'label' => __( 'Width' ),
            'settings' => 'ulr_section_width'
          ) );
          
        $wp_customize->add_setting( 'ulr_section_bg_img' , array(
            'default'   => 'none',
            'transport' => 'postMessage',
        ) );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'ulr_section_bg_img',
                array(
                    'label'      => __( 'Upload a logo', 'theme_name' ),
                    'section'    => 'ulr_section',
                    'settings'   => 'ulr_section_bg_img',
                    'description' => 'Select the image to be used for Background.'
                )
            )
        );

     
        
    
    }
  
     public static function header_output() {
        ?>
        <!--Customizer CSS--> 
        <style type="text/css">
             <?php self::generate_css('#site-title a', 'color', 'header_textcolor', '#'); ?> 
             <?php self::generate_css('body', 'background-color', 'background_color', '#'); ?> 
             <?php self::generate_css('a', 'color', 'link_textcolor'); ?>
        </style> 
        <!--/Customizer CSS-->
        <?php
     }

     public static function live_preview() {
        wp_enqueue_script( 
             'ulr-themecustomizer',
             ULR_PLUGIN_URL. '/js/theme-customizer.js', 
             array(  'jquery', 'customize-preview' ),
             '', 
             true 
        );
     }

      public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if ( ! empty( $mod ) ) {
           $return = sprintf('%s { %s:%s; }',
              $selector,
              $style,
              $prefix.$mod.$postfix
           );
           if ( $echo ) {
              echo $return;
           }
        }
        return $return;
      }
  }
  



