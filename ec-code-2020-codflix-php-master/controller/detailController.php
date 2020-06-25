<?php

require_once( 'model/media.php' );

if(isset($data->saison) && isset($data->episode)){
    validateForm();
}


function validateForm( $post ){
    $data = new stdClass();

    $data->saison = $post['saison'];
    $data->episode = $post['episode'];
    $data->title = $post['title'];
    $data->id = Media::getMediaWithSaisonAndEpisode($title,$saison,$episode);

    

    if(isset($data->saison) && isset($data->episode)){
        
       $detail = Media::getMediaWithSaisonAndEpisode( $data->title,$data->saison,$data->episode);

       return "view/index.php?media='<?= $data->id ;";


    }
}

?>