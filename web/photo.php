<?php

require_once(dirname(__FILE__).'/../config/AppConfiguration.php');

session_start();
$pl = unserialize($_SESSION['pl']);

$id = 0;
$photo = false;

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $photos = $pl->getPhotos();
  if (isset($photos[$id])) {
    $photo = $photos[$id];
  }
}

if ($photo) {
?>
  <img src="<?php echo $photo->getUrl(); ?>"></img>
  <br>
  <div class="desc"><?php echo $photo->getDesc(); ?></div>
<?php
}
?>

<style>
.desc {
  margin-top: 30px;
  font-weight: 600;
  font-size: 22px;
  color: white;
}
body{
  background-color: black;
  text-align: center;
  padding-top: 30px;
}
</style>
