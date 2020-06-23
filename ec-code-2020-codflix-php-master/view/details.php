 
<?php ob_start();   
$id = $_GET['media'];

    $detail = Media::getDetail($id);
    $detailGenre = Media::getGenre($id);

    echo $detailGenre['name'];
    echo $detail['name'];
    //var_dump($req[1]);
    // echo $req['title'];
    // echo $req['type'];
    // echo $req['status'];
    // echo $req['release_date'];
    // echo $req['summary'];
    // echo $req['trailer_url'];

?>

<div class="row">
    <div class="col-md-4">
        <h3><?= $detail['title']; ?></h3>
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
            <span id="media_genre" class="row">Genre :<?= $detailGenre['name']?> Type : <?= $detail['type']?></span>
            <p class="row">Date de réalisation: <?= $detail['release_date']?></p>
        </div>
        <span><?= $detail['summary']?></span>
        <p></p>
    </div>
    <div class="row video mt-4">
        <iframe allowfullscreen="true" frameborder="0" width="100%" 
            src="<?= $detail['trailer_url']; ?>" ></iframe>
    </div>

</div>


<?php $content = ob_get_clean(); ?>

<?php require( 'dashboard.php'); ?>