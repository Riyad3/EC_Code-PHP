<?php

require_once( 'model/user.php');


function historyPage() {
    
    $user = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

    if($user){
        require_once('view/historyView.php');
    }else{
        require_once('view/homeView.php');
    }
}