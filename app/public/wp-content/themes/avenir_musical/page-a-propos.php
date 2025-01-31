<?php
get_header();
?>

<section class="who-section">
  <div class="who-container">
    <h2>- Qui Sommes Nous ? -</h2>
    <?php
            // Arguments de la requête personnalisée
            $args = array(
                'post_type' => 'qui_sommes_nous',
                'posts_per_page' => 1,      
            );

            // Créer une nouvelle requête
            $query = new WP_Query($args);

            // Vérifier si des publications existent
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                  <p class="para">
                    <?php the_field('paragraphe_1') ?>
                  </p>
                  <p class="para">
                    <?php the_field('paragraphe_2') ?>
                  </p>
                  <p class="para">
                    <?php the_field('paragraphe_3') ?>
                  </p>                               
                <?php endwhile;
                wp_reset_postdata(); // Réinitialiser les données globales de publication
            else :
                echo '<p>Aucun paragraphe trouvé.</p>';
            endif;
            ?>
    </div>
</section>

<section class="contact-section">
  <div class="contact-container">
    <h2>- Contact Et Accès -</h2>
    <div class="contact-content">
      <div class="maps-container">
        <?php
                  // Arguments de la requête personnalisée
                  $args = array(
                      'post_type' => 'contact_acces',
                      'posts_per_page' => 1,   
                  );

                  // Créer une nouvelle requête
                  $query = new WP_Query($args);

                  // Vérifier si des publications existent
                  if ($query->have_posts()) :
                      while ($query->have_posts()) : $query->the_post(); ?>                        
                        <iframe class="google-maps"<?php the_field('google_maps'); ?> title="Google maps"></iframe>                                                                          
                      <?php endwhile;
                      wp_reset_postdata();
                  else :
                      echo '<p>Aucun plan trouvé.</p>';
                  endif;
              ?>
      </div>
      <div class="separator"></div>
      <div class="contact-info-container">
        <?php
                // Arguments de la requête personnalisée
                $args = array(
                    'post_type' => 'contact_acces',
                    'posts_per_page' => 1,
                    
                );

                // Créer une nouvelle requête
                $query = new WP_Query($args);

                // Vérifier si des publications existent
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                      <p class="adress">
                        <?php the_field('adresse_1') ?>
                      </p>
                      <p class="adress">
                        <?php the_field('adresse_2') ?>
                      </p>
                      <p class="adress">
                        <?php the_field('adresse_3') ?>
                      </p>
                      <p class="adress">
                        <?php the_field('adresse_4') ?>
                      </p>
                      <p class="para">
                        <?php the_field('nom_du_president') ?>
                      </p>
                      <p class="para">
                        <?php the_field('email') ?>
                      </p>
                      <p class="para">+33 
                        <?php the_field('telephone') ?>
                      </p>                                
                    <?php endwhile;
                    wp_reset_postdata(); // Réinitialiser les données globales de publication
                else :
                    echo '<p>Aucune données trouvées.</p>';
                endif;
                ?>
      </div>
    </div>
  </div>
</section>
<section class="history-section">
  <div class="history-container">
    <h2>- Historique -</h2>     
      <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'historique',
              'posts_per_page' => -1,
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              $index = 0; // Compteur pour alterner les styles
              while ($query->have_posts()) : $query->the_post(); 
                  $row_class = ($index % 2 === 0) ? 'row' : 'row-reverse'; // Alterne entre row et row-reverse
              ?>
                <div class="history-content <?php echo $row_class; ?>">
                  <p class="para">
                    <?php the_field('paragraphe') ?>
                  </p>
                  <img class="photos-history" src="<?php the_field('photo_historique'); ?>" alt="<?php the_title(); ?>">
                </div>
              <?php 
                  $index++; // Incrémente le compteur
              endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucune vignette trouvée.</p>';
          endif;
        ?>     
  </div>
</section>

<?php
get_footer();
?>