<?php

class UserLoginRestriction {

    private static $initiated = false;
	
	public static function init() {
        add_shortcode( 'ulr_logout_button', array( 'UserLoginRestriction', 'registerLogoutButton' ));
        if ( ! self::$initiated ) {
            self::init_hooks();
        }

    }
    
    private static function init_hooks() {
        self::$initiated = true;


        add_action( 'wp', array( 'UserLoginRestriction', 'checkPermissions' ));
        add_action( 'customize_register', array('LoginCustomizer' ,'init' ));
        //add_action( 'wp_head', array('LoginCustomizer' ,'header_output' ));
        add_action( 'customize_preview_init', array('LoginCustomizer' ,'live_preview' ));
    }
    



    /**
     * check if user has permision
     */
    public static function checkPermissions() {
        $user = wp_get_current_user();
        $restriction_strategy = esc_attr( get_option('restriction-level') );

        if (isset($_GET['showUlr'])) {
            $showUrl = $_GET['showUlr'];
            if($showUrl == 1){
                add_action( 'template_include', array( 'UserLoginRestriction', 'handlePermissionDenied' ));
                return false;
            }
        } 

        if ( $GLOBALS['pagenow'] === 'wp-login.php' ) {
            add_action( 'template_include', array( 'UserLoginRestriction', 'handlePermissionDenied' ));
            return false;
        }

        if($restriction_strategy === 'page'){
            if(!$user->exists()){
                add_action( 'template_include', array( 'UserLoginRestriction', 'handlePermissionDenied' ));
                return false;
            }
            // Get all the user roles as an array.
            $user_roles = $user->roles;
            // Check if the role you're interested in, is present in the array.
            if ( in_array( 'subscriber', $user_roles, true ) || in_array( 'administrator', $user_roles, true )) {
                self::handlePermissionGranted();
                return true;
            }
        }

        return false;
	}



    public static function registerLogoutButton(){
        return "<a href=" . wp_logout_url( get_permalink() ) . ">Logout</a><br/><a href=\"http://localhost/plugindev/?showUlr=1\">debug</a>";
    }
        
    public static function handlePermissionDenied(){
        return self::getView('login');

    }

    public static function handlePermissionGranted(){
                // loggedIn user
                show_admin_bar(false);
    }

    public static function getView( $name, array $args = array() ) {
		$file = ULR_PLUGIN_DIR . 'views/'. $name . '.php';
        return $file;
	}
}