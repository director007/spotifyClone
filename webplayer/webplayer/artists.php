<?php include_once("./layout/head.php") ?>

<?php include_once("./layout/left-sidebar.php") ?>

<?php


include_once("../backend/connection-pdo.php");


$sql = "SELECT * FROM artist_table";

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr=$query->fetchAll(PDO::FETCH_ASSOC);


?>

        <section id="section-main">
            <div class="filterNav">
                <a href="./" class="filterNav-link">Featured</a>
                <a href="./categories.php" class="filterNav-link">Categories</a>
                <a href="./genre.php" class="filterNav-link">Genre</a>
                <a href="./moods.php" class="filterNav-link">Mood</a>
                <a href="./artists.php" class="filterNav-link active">Artists</a>
                <a href="./favorites.php" class="filterNav-link">Favorites</a>
            </div>
            <div class="music">
                <div class="music-page">
                    <div class="music-head">
                        <div class="music-head-item">
                            <h1>All Popular Artists</h1>
                        </div>
<!--                         <div class="music-head-item">
                            <a href="#" class="viewMore">View More</a>
                        </div> -->
                    </div>
                    <div class="music-row">
                    <?php $count = 1; ?>
                    <?php foreach ($arr as $key) { ?>
                        <a href="./artist-songs.php?aid=<?php echo $key['id']; ?>" class="music-col">
                            <div class="music-img">
                                <img src="../images/home<?php echo $count; ?>.jpg" alt="night" class="img-fluid">
                                <button class="music-playBtn">
                                    <img src="../images/play.svg" alt="play">
                                </button>
                            </div>
                            <h3><?php echo $key['name']; ?></h3>
                        </a>
                    <?php $count++; ?>
                    <?php if ($count > 6) {
                    	$count = 1;
                    } ?>
                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </section>
    
<?php include_once("./layout/player.php") ?>

<?php include_once("./layout/bottom.php") ?>