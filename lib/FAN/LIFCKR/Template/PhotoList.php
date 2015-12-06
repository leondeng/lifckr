<div class="photolist">
<?php

  foreach ($obj->getPhotos() as $photo) {
  	$photo->render();
  }

?>
</div>
