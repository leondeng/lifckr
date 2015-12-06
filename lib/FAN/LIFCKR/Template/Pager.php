<div class="pager" style="clear:both">
  <ul>
  <?php
    if ($obj->getPage() > 1) {
  ?>
    <li><a href="<?php echo $obj->getFirstPageUrl(); ?>" title="First">&laquo;</a></li>
    <li><a href="<?php echo $obj->getPrevPageUrl(); ?>" title="Prev">&lsaquo;</a></li>
  <?php
    } else {
  ?>
    <li>&laquo;</li>
    <li>&lsaquo;</li>
  <?php
   }

    foreach ($obj->getPageItems() as $n => $url) {

      if ($n == $obj->getPage()) {
    ?>
        <li><?php echo $n; ?></li>
    <?php
      } else {
    ?>
        <li><a href="<?php echo $url; ?>"><?php echo $n; ?></a></li>
    <?php
      }
    }

    if ($obj->getPage() < $obj->getPages()) {
    ?>
      <li><a href="<?php echo $obj->getNextPageUrl(); ?>" title="Next">&rsaquo;</a></li>
      <li><a href="<?php echo $obj->getLastPageUrl(); ?>" title="Last">&raquo;</a></li>
    <?php
      } else {
    ?>
      <li>&rsaquo;</li>
      <li>&raquo;</li>
    <?php
      }
    ?>
  </ul>
</div>
