<?php

require_once( 'model/user.php');


function profile() {
    
    $user = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

    if($user){
        require_once('view/profileView.php');
    }else{
        require_once('view/homeView.php');
    }
}