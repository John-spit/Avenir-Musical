<section class="next-events-section">
  <div class="next-events-container">
      <h2>- Prochains événements -</h2>
      <?php
              // Arguments de la requête personnalisée
              $args = array(
                  'post_type' => 'feuille_presta',
                  'posts_per_page' => -1,      
              );

              // Créer une nouvelle requête
              $query = new WP_Query($args);

              // Vérifier si des publications existent
              if ($query->have_posts()) :
                  while ($query->have_posts()) : $query->the_post(); ?>
                  <div class="presta-content">
                    <p class="para-date-presta">
                      <?php the_field('date_presta') ?>
                    </p>
                    <p class="para-type-presta">
                      <?php the_field('type_presta') ?>
                    </p>
                    <p class="para-lieu-presta">
                      <?php the_field('lieu_presta') ?>
                    </p>
                  </div>
                  <?php endwhile;
                  wp_reset_postdata(); // Réinitialiser les données globales de publication
              else :
                  echo '<p>Aucune donnée trouvée.</p>';
              endif;
              ?>
  </div>
</section>