<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {

  $search = isset( $_GET['title'] ) ? $_GET['title'] : null; 
  $medias = Media::filter($search);
 
 /* Mettre une condition qui verifie $media['typeof']
 if($media['typeof'] == 1){

  faire en sorte que la redirection soit vers details
  Mettre un sous-onglet film ? 
 } else
 faire en sorte que la redirection soit vers detailsSerie avec une format different

 */


  require('view/mediaListView.php');
}


function listOne(){
  require('view/details.php');
}