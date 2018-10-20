<?php
//TODO: please fix me
require( '../../../../../wp-load.php' );

//todo: fix me
switch($_POST['action']){
    case 'register':
        $result = UserService::registerUser($_POST); 
        if($result  === true){
            echo "success";
        }else{
            var_dump($result);
        }

    return;
    
}
?>