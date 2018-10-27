<?php

//todo: create strategy pattern
class UserService {

    public static function registerUser(array $data){
        switch($data['strategy']){
            case "wordpress":
                var_dump($data);
                return self::registerWpUser($data['username'], $data['email'], $data['password1'] );
            default:
            //Todo: please make me my own class
            throw new Exception("Userstrategy not found");
        }
    }

    private static function registerWpUser($user_name, $user_email,$user_pw){
        $user_id = username_exists( $user_name );
        if ( !$user_id && email_exists($user_email) == false ) {
            $user_id = wp_create_user( $user_name, $user_pw, $user_email );
            wp_set_current_user($user_id, $user_name);
            wp_set_auth_cookie($user_id);
            do_action('wp_login', $user_name);

            return array("success" => true);
        } else {
            return array("success"=> false, "error" => "User already exists");
        }
    }
    
    public static function loginUser(array $data){
        switch($data['strategy']){
            case "wordpress":
                return self::loginWpUser($data);
            default:
            //Todo: please make me my own class
            throw new Exception("Loginstrategy not found");
        }
    }
    
    private static function loginWpUser($credentials = array()){
        //return wp_authenticate($credentials['log'], $credentials['pwd']);
        return wp_signon( $credentials );
    }
}