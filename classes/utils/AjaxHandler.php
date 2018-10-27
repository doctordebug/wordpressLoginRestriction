<?php
//TODO: please fix me
require( '../../../../../wp-load.php' );

//todo: fix me: make me more abstract / gerneric
switch($_POST['action']){
    case 'register':
        $result = UserService::registerUser($_POST); 
        if($result  === true){
            echo "success";
        }else{
            var_dump($result);
        }
    break;
    case 'login':
        $user = UserService::loginUser($_POST); 
        if ( is_wp_error( $user ) ) {
            echo $user->get_error_message();
        }
        else{
            echo "success";
        }
    
    break;
}
?>