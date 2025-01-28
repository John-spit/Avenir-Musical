<?php
get_header();
?>

<section id="my-blog">
    <h2>- Blog -</h2>
    <div class="blog-container">
        <?php
        // Arguments de la requête personnalisée
        $args = array(
            'post_type'      => 'page_blog', // Type de post personnalisé
            'posts_per_page' => 10,         // Nombre de publications par page
            'paged'          => get_query_var('paged') ? get_query_var('paged') : 1 // Gestion de la pagination
        );

        // Création d'une nouvelle requête
        $query = new WP_Query($args);

        // Vérification si des publications existent
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); 

                // Récupération du groupe et des sous-champs
                $groupe = get_field('photos_de_larticle'); // Le groupe de champs ACF
                $image = $groupe['photo_a_la_une']; // Sous-champ : URL de l'image
        ?>
        <div class="article">
            <a href="<?php the_permalink(); ?>">
                <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($titre); ?>">
                <?php endif; ?>
                <h3><?php the_field('titre_de_larticle') ?></h3>
                <p>
                <?php 
                  $presentation = get_field('texte_article1');
                  echo mb_substr($presentation, 0, 150) . '...'; // Limite à 150 caractères
                  ?>
                <?php the_field('texte_article1') ?>
                </p>
            </a>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <p>Aucun article disponible pour le moment.</p>
        <?php
        endif;
        ?>
    </div>
    <div class="pagination">
        <?php
        // Affichage des liens de pagination
        echo paginate_links(array(
            'total'        => $query->max_num_pages,
            'current'      => max(1, get_query_var('paged')), // Page actuelle
            'prev_text'    => __('&laquo; Précédent'),
            'next_text'    => __('Suivant &raquo;'),
            'type'         => 'list' // Utilise une liste HTML pour un meilleur rendu
        ));
        ?>
    </div>
</section>

<?php
get_footer();
?>