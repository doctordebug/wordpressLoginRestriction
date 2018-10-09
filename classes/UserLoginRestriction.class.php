<?php

class UserLoginRestriction {

    private static $initiated = false;
	
	public static function init() {
		if ( ! self::$initiated ) {
            self::init_hooks();
		}
    }
    
    private static function init_hooks() {
		self::$initiated = true;
		add_action( 'wp', array( 'UserLoginRestriction', 'checkPermissions' ));
        //register frontend scripts
        //wp_register_script( $handle, $src, $deps, $ver, $in_footer );
        //
       
    }
    
    /**
     * check if user has permision
     */
    public static function checkPermissions() {
        $user = wp_get_current_user();
        $restriction_strategy = esc_attr( get_option('restriction-level') );

        if($restriction_strategy === 'page'){
            if(!$user->exists()){
                self::handlePermissionDenied();
                return false;
            }
            // Get all the user roles as an array.
            $user_roles = $user->roles;
            // Check if the role you're interested in, is present in the array.
            if ( in_array( 'subscriber', $user_roles, true ) || in_array( 'administrator', $user_roles, true )) {
                // loggedIn user
                self::handlePermissionGranted();
                return true;
            }
        }
        return false;
	}

    public static function handlePermissionDenied(){
        self::view('login');
        
        exit();
    }

    public static function handlePermissionGranted(){

    }

    public static function view( $name, array $args = array() ) {
		$file = ULR_PLUGIN_DIR . 'views/'. $name . '.php';
		include( $file );
	}
}