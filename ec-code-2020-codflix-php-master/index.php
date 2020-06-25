<?php

require_once( 'controller/homeController.php' );
require_once( 'controller/loginController.php' );
require_once( 'controller/signupController.php' );
require_once( 'controller/mediaController.php' );
require_once( 'controller/contactController.php' );
require_once( 'controller/profileController.php');

/**************************
* ----- HANDLE ACTION -----
***************************/

$user= isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;


if ( isset( $_GET['action'] ) ):

  switch( $_GET['action']):

    case 'login':

      if ( !empty( $_POST ) ) login( $_POST );
      else loginPage();

    break;

    case 'signup':

      signupPage();

    break;
    case 'profile':
      if($user){
        profile();
      }else{
        signupPage();
      }

    break;
    case 'contact':

      contactPage();

    break;

    case 'logout':

      logout();

    break;
  endswitch;

else:

  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( $user_id ):
    mediaPage();

  else:
    homePage();
  endif;

endif;
