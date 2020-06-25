 
<?php ob_start();
$id = $_GET['media'];
//$type = $_GET['genre'];
//$genre = $_GET['typeof'];

    $detail = Media::getDetail($id);
  /* $detailGenre = Media::getGenre($type);
  //  $detailType = Media::getDbTypeOf($genre);
   <span id="media_genre" class="row">Genre: <?= $detailGenre['name']?></span>
            <p class="row">Type de média: <?= $detailType['name']?></p>
*/
?>


<div class="row">
    <div class="col-md-4">
        <h2><?= $detail['title']; ?></h2>
    </div>
    <div class="col d-flex justify-content-end">
        <div>
            <a href="index.php" class="btn btn-dark">X</a>
        </div>

    </div>
</div>

<div class="col mt-5">
    <div class="row mt-4">
        <div class="col mt-2">
           
            <p class="row">Date de réalisation: <?= $detail['release_date']?></p>
            <p class="row">Durée: <?= $detail['durée']?></p>

        </div>
        <span><?= $detail['summary']?></span>
        <p></p>
    </div>
    <div class="row video mt-6">
   

<iframe width="560" height="315" src="<?=$detail['trailer_url']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


</div>


<?php $content = ob_get_clean(); ?>

<?php require( 'dashboard.php'); ?>

