<?php

get_header();
?>

<div class="page-container">

  <?php
  get_template_part( 'templates/hero', 'header' );
  ?>

<?php
  get_template_part( 'templates/last', 'articles' );
  ?>

</div>

<?php
  get_template_part( 'templates/next', 'events' );
  ?>

</div>

<?php

get_footer();
?>