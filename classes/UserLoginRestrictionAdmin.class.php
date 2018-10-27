<?php

class UserLoginRestrictionAdmin {

    private static $initiated = false;
    private static $login_page_id = '9b159d05-43f6-4263-a3e6-8389b44b9001';
    
	public static function init() {
		if ( ! self::$initiated ) {
            self::init_hooks();
            //self::init_login_page();
		}
    }
    
    private static function init_login_page() {
        var_dump(self::getIDfromGUID(self::$login_page_guid));
        $definition = array(
            'post_type' => 'page',
            'post_title' => 'Login',
            'post_status' => 'publish',
            'post_content' => '[ulr_login_form]',
            'ID' => self::$login_page_id
        );
        // wp_insert_post($definition);
    }

    private static function init_hooks() {
        self::$initiated = true;
        add_action( 'admin_menu', array( 'UserLoginRestrictionAdmin', 'admin_menu' ) );
        add_action( 'admin_init',  array('UserLoginRestrictionAdmin' , 'register_options' ) ) ;        
        add_action('admin_init', array('UserLoginRestrictionAdmin' ,'disable_dashboard'));

    }


    public static function disable_dashboard() {
        if (current_user_can('subscriber') && is_admin()) {
            wp_redirect(home_url());
            exit;
        }
    }
    
    public static function admin_menu() {
        $hook = add_menu_page( 'UserLoginRestriction', 'User Login Restriction', 'manage_options', 'ulrOptions',array( 'UserLoginRestrictionAdmin', 'display_page' ) );
    }
    
    
    function register_options() {
        //register our settings
        register_setting( 'ulr-settings-group', 'restriction-level' );
    }

    public static function display_page(  ) {
        self::view('options');
    }

    public static function view( $name, array $args = array() ) {
		$file = ULR_PLUGIN_DIR . 'views/'. $name . '.php';
		include( $file );
	}

    public static function getIDfromGUID( $guid ){
        global $wpdb;
        return $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid=%s", $guid ) );
    
    }
}
