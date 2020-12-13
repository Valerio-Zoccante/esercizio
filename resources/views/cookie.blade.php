<?php
  foreach ($arrayCookies as $cookie) {
  ?>
  <div class="card">
    <div class="row"><?php echo $cookie->name ?></div>
    <div class="row"><?php echo $cookie->weight ?></div>
    <div class="row"><?php echo $cookie->calories ?></div>
  </div>
<?php } ?>
