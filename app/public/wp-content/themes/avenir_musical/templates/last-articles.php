<section class="last-articles-section">
    <h2>- Derniers Articles -</h2>
    <div class="last-articles-container">
      <?php
      // Arguments de la requête pour récupérer les 3 derniers articles
      $recent_args = array(
          'post_type'      => 'page_blog', // Type de post personnalisé
          'posts_per_page' => 3,          // Limité à 3 articles
          'orderby'        => 'date',     // Tri par date de publication
          'order'          => 'DESC'      // Plus récents en premier
      );

      // Nouvelle requête WP_Query
      $recent_query = new WP_Query($recent_args);

      // Vérification si des articles existent
      if ($recent_query->have_posts()) :
          while ($recent_query->have_posts()) : $recent_query->the_post();

              // Récupération de l'image et des champs
              $groupe = get_field('photos_de_larticle'); // Groupe ACF
              $image = $groupe['photo_a_la_une'];       // Image principale
      ?>
        <div class="last-article-item">
          <a href="<?php the_permalink(); ?>">
            <?php if ($image) : ?>
              <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            <?php endif; ?>
            <h3><?php the_title(); ?></h3>
            <p>
              <?php 
              // Extrait limité à 100 caractères
              $excerpt = get_field('texte_article1');
              echo mb_substr($excerpt, 0, 100) . '...'; 
              ?>
            </p>
          </a>
        </div>
      <?php
          endwhile;
          wp_reset_postdata();
      else :
      ?>
        <p>Aucun article récent à afficher.</p>
      <?php endif; ?>
    </div>  
      <div class="button-articles-container">
        <a class="button-articles" href="/blog">Voir tous les articles</a>
      </div>
    
</section>