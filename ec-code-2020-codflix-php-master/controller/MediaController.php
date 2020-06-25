<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {
  $search = isset( $_GET['title'] ) ? $_GET['title'] : null; 
  $medias = Media::filter($search);
  $genre = isset( $_GET['name'] ) ? $_GET['name'] : null;
  $type = Media::getGenre($genre);
  $a= 0;
  if(isset($_GET['typeof'])){
    $a = $_GET['typeof'];
  }
  if(isset($_GET['media'])){
    if($a == 1){
      listFilm($_GET['media']);
    }elseif ($a == 2) {
      listSerie($_GET['media']);
    }
  }else{
    require('view/mediaListView.php');

  }
}
function listFilm($id){
  require('view/details.php');
}

function listSerie($id){
  $medias = Media::getDetail($_GET['media']);
  $vid = $medias['trailer_url'];
  $details = false;


  $saisons = Media::getSaisonbyId($medias['id']);
  $episodes = Media::getEpisodebyId($medias['id'] , 1);
  if ( isset($_GET['saison']) && isset($_GET['episode'])){

    $details = Media::getEpisodeDetails($_GET['media'], $_GET['saison'],$_GET['episode']);
    if ($details){
      $vid = $details['url'];
    }
  }
  require('view/detailSerie.php');

}
