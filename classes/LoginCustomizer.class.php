<?php

class LoginCustomizer {

    public static function init ( $wp_customize ) {

        $wp_customize->add_section( 'ulr_section' , array(
            'title'    => 'Login',
            'priority' => 30
        ) );   
    
        $wp_customize->add_setting( 'ulr_section_bg' , array(
            'default'   => '#000000',
            'transport' => 'postMessage',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ulr_section_bg_chooser', array(
            'label'    => 'bgcolor',
            'section'  => 'ulr_section',
            'settings' => 'ulr_section_bg',
        ) ) );

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
  



