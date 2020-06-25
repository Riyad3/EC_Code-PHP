 
<?php ob_start();


$detail = Media::getDetail($id);
$id = $_GET['media'];
$saison = $detail['saison'];
$episode = $detail['episode'];
$title= $detail['title'];
//$detailGenre = Media::getGenre($type);
  
//$detailType = Media::getDbTypeOf($genre);

/*
faire une requete sur le nom des series qui affiche une video differente en fonction de ce qu'on l'on aura selectionné 
attribuer nom explicite au serie " saison 1 episode 1 etc " 
action="http://localhost:8888/EC_Code-PHP/ec-code-2020-codflix-php-master/index.php?media='<?=$idDetail;?>&typeof=2&genre='3'&saison='<?= $saison;?>'&episode=<?= $episode;?>"
    <span id="media_genre" class="row">Genre: <?= $detail['name']?></span>
            <p class="row">Type de média: <?= $detail['name']?></p>         

*/
?>

<div class="row">
    <div class="col-md-6">
        <h2><?= $detail['title'];?>  saison  <?= $details['saison'];?> episode <?= $details['episode'];?></h2>
        <form method="get" class="custom-form">
            <input type="hidden" name="media" value="<?= $detail['id'] ?>"/>
            <input type="hidden" name="typeof" value="2"/>


            <div class="mt-3">
                <label for="saison">Saison :</label>
                <select name="saison" id="saison">
                    <?php foreach( $saisons as $saison ): ?>
                        <option value="<?= $saison['saison']; ?>"> <?= $saison['saison']; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="episode">Episode :</label>
                <select name="episode" id="episode">
                    <?php foreach( $episodes as $episode ): ?>
                        <option value="<?= $episode['episode']; ?>"> <?= $episode['episode']; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="submit" class="btn btn-block bg-red" />
        </form>


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
            <p class="row">Date de réalisation: <?= $details['date_sortie']?></p>
            <p class="row">Durée: <?= $detail['durée']?></p>

        </div>
        <span><?= $details['summary']?></span>
        <p></p>
    </div>
    <div class="row video mt-6">
   

<iframe width="560" height="315" src="<?=$vid; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


</div>


<?php $content = ob_get_clean(); ?>

<?php require( 'dashboard.php'); ?>


