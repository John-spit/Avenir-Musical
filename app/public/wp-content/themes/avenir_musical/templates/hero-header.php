<div class="hero-header">
<?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'hero_img',
              'posts_per_page' => 1,
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); 
                    $background_hero = get_field('hero_image');
                ?>                
                <div class="hero-container" style="background-image: url('<?php echo esc_url($background_hero); ?>');" data-index="<?php echo $index; ?>">                                    
                    <h2 class="none">Avenir Musical</h2>
                </div>
              <?php endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucune photo trouvée.</p>';
          endif;
          ?>   
</div>