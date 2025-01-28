<?php
get_header();
?>

<section class="harmonie-who-section">
  <h2>- Harmonie Marching Band -</h2>
  <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'harmonie_marching',
              'posts_per_page' => 1,      
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                <p class="para">
                  <?php the_field('para_harmonie1') ?>
                </p>
                <p class="para">
                  <?php the_field('para_harmonie2') ?>
                </p>
                <p class="para">
                  <?php the_field('para_harmonie3') ?>
                </p>                               
              <?php endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucun paragraphe trouvé.</p>';
          endif;
          ?>
</section>

<section class="harmonie-info-section">
  <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'harmonie_marching',
              'posts_per_page' => 1,      
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                <p class="para">
                  <?php the_field('directeur_harmonie') ?>
                </p>
                <p class="para">
                  <?php the_field('email_directeur_harmonie') ?>
                </p>
                <p class="para">
                  <?php the_field('tel_directeur_harmonie') ?>
                </p>
                <p class="para">
                  <?php the_field('nom_booking') ?>
                </p>
                <p class="para">
                  <?php the_field('email_booking') ?>
                </p>
                <p class="para">
                  <?php the_field('tel_booking') ?>
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