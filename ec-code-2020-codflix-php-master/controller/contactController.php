<?php

require_once( 'model/user.php' );

if (isset($_POST['send'])) {
    sendEmail($_POST['send']);
    echo $_POST['send'];
}

function contactPage() {

    require('view/auth/contactView.php');

}

function sendMail( $mess) {

     $to      = 'riri@gmail.com';
     $message = $post['message'];
     $headers = 'From ' . $mess['email'] . "\r\n" . $mess['name'];

     mail($to, $message, $headers);
}

?>
