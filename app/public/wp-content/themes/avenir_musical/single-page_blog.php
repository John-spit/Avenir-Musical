<?php
get_header();
?>

<section id="my-blog">
    <div class="blog-container">
        <?php
        $args = array(
            'post_type' => 'page_blog',
            'posts_per_page' => -1
        );
        // Création d'une nouvelle requête
        $query = new WP_Query($args);

        // Vérification si des publications existent
        if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); 

            // Récupération du groupe et des sous-champs
            $groupe = get_field('photos_de_larticle'); // Le groupe de champs ACF
            
            // Récupérer les sous-champs d'images
            $image1 = $groupe['photo_a_la_une']; // Sous-champ : Première image
            $image2 = $groupe['photo_2']; // Sous-champ : Deuxième image
            $image3 = $groupe['photo_3']; // Sous-champ : Troisième image
            $image4 = $groupe['photo_4'];
        ?>
        <div class="article">               
            <h3><?php the_field('titre_de_larticle') ?></h3>
            <p><?php the_field('texte_article1') ?></p>

            <!-- Carousel des images -->
            <div class="carousel-wrapper">
                <div class="carousel-track">
                    <?php if ($image1) : ?>
                        <div class="carousel-item" style="background-image: url('<?php echo esc_url($image1); ?>');">
                            <img src="<?php echo esc_url($image1); ?>" alt="Image 1">
                        </div>
                    <?php endif; ?>
                    <?php if ($image2) : ?>
                        <div class="carousel-item" style="background-image: url('<?php echo esc_url($image2); ?>');">
                            <img src="<?php echo esc_url($image2); ?>" alt="Image 2">
                        </div>
                    <?php endif; ?>
                    <?php if ($image3) : ?>
                        <div class="carousel-item" style="background-image: url('<?php echo esc_url($image3); ?>');">
                            <img src="<?php echo esc_url($image3); ?>" alt="Image 3">
                        </div>
                    <?php endif; ?>
                    <?php if ($image3) : ?>
                        <div class="carousel-item" style="background-image: url('<?php echo esc_url($image4); ?>');">
                            <img src="<?php echo esc_url($image4); ?>" alt="Image 4">
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Flèches -->
                <button class="carousel-arrow carousel-arrow-left">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/elements_graphiques/arrow_left.png" alt="Previous">
                </button>
                <button class="carousel-arrow carousel-arrow-right">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/elements_graphiques/arrow_right.png" alt="Next">
                </button>

                <!-- Bullets points -->
                <div class="carousel-dots">
                    <?php if ($image1) : ?><button class="dot"></button><?php endif; ?>
                    <?php if ($image2) : ?><button class="dot"></button><?php endif; ?>
                    <?php if ($image3) : ?><button class="dot"></button><?php endif; ?>
                    <?php if ($image4) : ?><button class="dot"></button><?php endif; ?>
                </div>
            </div>

            <p><?php the_field('texte_article2') ?></p>
            <p><?php the_field('texte_article3') ?></p>
            <p><?php the_field('texte_article4') ?></p>
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
</section>

<?php
get_footer();
?>