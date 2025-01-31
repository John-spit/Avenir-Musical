<?php
get_header();
?>

<section class="majo-who-section">
  <h2>- Majorettes -</h2>
  <div class="majo-who-container">
  <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'majo_rettes',
              'posts_per_page' => 1,      
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                <p class="para">
                  <?php the_field('para_majo1') ?>
                </p>
                <p class="para">
                  <?php the_field('para_majo2') ?>
                </p>
                <p class="para">
                  <?php the_field('para_majo3') ?>
                </p>
                <img class="photo-majo" src="<?php the_field('photo_majo'); ?>" alt="<?php the_title(); ?>">                               
              <?php endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucun paragraphe trouvé.</p>';
          endif;
          ?>
  </div>        
</section>

<section class="majo-info-section">
  <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'majo_rettes',
              'posts_per_page' => 1,      
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                <h3>Direction</h3>
                <p class="para">
                  <?php the_field('nom_directeur_majo') ?>
                </p>
                <p class="para">
                  <?php the_field('email_directeur_majo') ?>
                </p>
                <p class="para">
                  <?php the_field('tel_directeur_majo') ?>
                </p>                             
              <?php endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucune donnée trouvée.</p>';
          endif;
          ?>
</section>

<?php
get_footer();
?>