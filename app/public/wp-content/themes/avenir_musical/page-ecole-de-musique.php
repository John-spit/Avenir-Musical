<?php
get_header();
?>

<section class="ecole-who-section">
  <h2>- Ecole de musique -</h2>
  <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'ecole_musique',
              'posts_per_page' => 1,      
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                <p class="para">
                  <?php the_field('para_ecole1') ?>
                </p>
                <p class="para">
                  <?php the_field('para_ecole2') ?>
                </p>
                <p class="para">
                  <?php the_field('para_ecole3') ?>
                </p>                               
              <?php endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucun paragraphe trouvé.</p>';
          endif;
          ?>
</section>

<section class="ecole-info-section">
  <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'ecole_musique',
              'posts_per_page' => 1,      
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                <p class="para">
                  <?php the_field('nom_directeur_ecole') ?>
                </p>
                <p class="para">
                  <?php the_field('email_directeur_ecole') ?>
                </p>
                <p class="para">
                  <?php the_field('tel_directeur_ecole') ?>
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