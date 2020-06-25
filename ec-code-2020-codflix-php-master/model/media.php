<?php

require_once( 'database.php' );

class Media {

  protected $id;
  protected $genre_id;
  protected $title;
  protected $type;
  protected $status;
  protected $release_date;
  protected $summary;
  protected $trailer_url;
  protected $duree;
  protected $typeof;
  protected $saison;
  protected $episode;

  public function __construct( $media ) {

    $this->setId( isset( $media->id ) ? $media->id : null );
    $this->setGenreId( $media->genre_id );
    $this->setTitle( $media->title );
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setGenreId( $genre_id ) {
    $this->genre_id = $genre_id;
  }

  public function setTitle( $title ) {
    $this->title = $title;
  }

  public function setType( $type ) {
    $this->type = $type;
  }

  public function setStatus( $status ) {
    $this->status = $status;
  }

  public function setReleaseDate( $release_date ) {
    $this->release_date = $release_date;
  }
  public function setTypeOf( $typeof ){
    $this->typeof = $typeof;
  }
  public function setSaison( $saison ){
    $this->saison = $saison;
  }
  public function setEpisode( $episode ){
    $this->episode = $episode;
  }


  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getGenreId() {
    return $this->genre_id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getType() {
    return $this->type;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getReleaseDate() {
    return $this->release_date;
  }

  public function getSummary() {
    return $this->summary;
  }

  public function getTrailerUrl() {
    return $this->trailer_url;
  }
  public function getTypeOf(){
    return $this->typeof;
    }
  public function getSaison(){
    return $this->saison;
    }
  public function getEpisode(){
    return $this->episode;
    
  }

  /***************************
  * -------- GET LIST --------
  ***************************/
  public static function  filter($search){
    $db = init_db();

    if(empty($search)){
      $req = $db->prepare( "SELECT * FROM media" );
    $req->execute();
    // Close databse connection
    $db = null;

    return $req->fetchALL();
    }
    else{
    $req = $db->prepare( 'SELECT * FROM media WHERE title LIKE "%'.$search.'%"');
    $req->execute();

    // Close databse connection
    $db = null;

    return $req->fetchALL();
    }
  }

  public static function getDetail($id){
    $db = init_db();
    
    $req = $db->prepare( 'SELECT * FROM media WHERE id = ?');
    $req->execute(array($id));

    return $req->fetch();
  }
  public static function getGenre($id){

    $db = init_db();
  
    $req = $db->prepare( "SELECT * FROM genre WHERE id = " . $id );
    $req->execute();

    $db = null;
    return $req->fetch();
  }
  public static function getDbTypeOf($id){

    $db = init_db();
  
    $req = $db->prepare( "SELECT * FROM `typeof` WHERE id = " . $id );
    $req->execute();

    $db = null;
    return $req->fetch();
  }

  public static function getMediaWithSaisonAndEpisode($title,$saison,$episode){
    $db = init_db();
  
  $req = $db->prepare( "SELECT id FROM media WHERE title = '$title' && saison = $saison && episode = $episode ");    
   $req->execute();
    $db = null;
    return $req->fetch();

  }
  public static function getSaisonById( $id ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT DISTINCT saison FROM serie WHERE id_serie = ?" );
    $req->execute( array( $id ));

    // Close databse connection
    $db   = null;

    return $req->fetchAll();
  }

  public static function getEpisodeById( $id, $saison ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT episode FROM serie WHERE id_serie = $id && saison = $saison" );
    $req->execute( array(
      'id_serie' => $id,
      'saison' => $saison
    ));

    // Close databse connection
    $db   = null;

    return $req->fetchAll();
  }

  public static function getEpisodeDetails( $id, $saison,$episode){
  $db   = init_db();

  $req  = $db->prepare( "SELECT * FROM serie WHERE id_serie = $id  && saison = $saison&& episode = $episode" );
  $req->execute( array(
    'id_serie' => $id,
    'saison' => $saison,
    'episode' => $episode
  ));

  // Close databse connection
  $db   = null;

  return $req->fetch();
}
public static function getAllFavorites($user_id){
  // Open database connection
  $db   = init_db();

  $req = $db->prepare("SELECT * FROM favorites WHERE user_id = ? ORDER BY id DESC");
  $req->execute( array($user_id ));

  // Close databse connection
  $db   = null;

  return $req->fetchAll();
}

public static function getFavoriteByMedia($user_id, $media_id){
  // Open database connection
  $db   = init_db();

  $req = $db->prepare("SELECT * FROM favorites WHERE user_id = :user_id AND media_id = :media_id");
  $req->execute( array( 
    'user_id' => $user_id,
    'media_id' => $media_id
  ));

  // Close databse connection
  $db   = null;

  return $req->fetch();
}

public static function addMediaToFavorites($user_id, $media_id){
  // Open database connection
  $db   = init_db();

  // $req = getFavoriteByMedia($user_id, $media_id);

  $req = $db->prepare("SELECT * FROM favorites WHERE user_id = :user_id AND media_id = :media_id");
  $req->execute( array( 
    'user_id' => $user_id,
    'media_id' => $media_id
  ));

  // If the user has not this media in favorite yet, add it to the list.
  if( $req->rowCount() <= 0 )
  {
    $req = $db->prepare("INSERT INTO favorites (user_id, media_id) VALUES (:user_id, :media_id)");
    $req->execute( array( 
      'user_id' => $user_id,
      'media_id' => $media_id
    ));
  }
  else // Else, delete this media from the favorite list.
  {
    $req = $db->prepare("DELETE FROM favorites WHERE user_id = :user_id AND media_id = :media_id");
    $req->execute( array( 
      'user_id' => $user_id,
      'media_id' => $media_id
    ));
  }

  // Close databse connection
  $db   = null;
}

public static function deleteFavorite($user_id){
  // Open database connection
  $db   = init_db();

  $req = $db->prepare("DELETE FROM favorites WHERE user_id = ?");
  $req->execute( array( $user_id ));

  // Close databse connection
  $db   = null;
}

}
