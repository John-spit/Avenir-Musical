<?php
get_header();
?>

<section class="my-blog-solo" id="my-blog">
    <div class="blog-container">
        <?php
        // Vérifie si WordPress a des données à afficher pour cet article
        if (have_posts()) :
            while (have_posts()) : the_post(); 

                // Récupération du groupe et des sous-champs
                $groupe = get_field('photos_de_larticle'); // Le groupe de champs ACF
                
                // Récupérer les sous-champs d'images
                $image1 = $groupe['photo_a_la_une']; // Sous-champ : Première image
                $image2 = $groupe['photo_2']; // Sous-champ : Deuxième image
                $image3 = $groupe['photo_3']; // Sous-champ : Troisième image
                $image4 = $groupe['photo_4'];
                $image5 = $groupe['photo_5'];
                $image6 = $groupe['photo_6'];
                $image7 = $groupe['photo_7'];
                $image8 = $groupe['photo_8'];
                $image9 = $groupe['photo_9'];
                $image10 = $groupe['photo_10'];
        ?>
        <div class="article">               
            <h3><?php the_field('titre_de_larticle') ?></h3>
            <p><?php the_field('texte_article1') ?></p>

            <!-- Carousel des images -->
            <div class="carousel-wrapper">
            <div class="carousel-track">
        <?php if ($image1) : ?>
            <div class="carousel-item">
                <img src="<?php echo esc_url($image1); ?>" alt="Image 1">
            </div>
        <?php endif; ?>
        <?php if ($image2) : ?>
            <div class="carousel-item">
                <img src="<?php echo esc_url($image2); ?>" alt="Image 2">
            </div>
        <?php endif; ?>
        <?php if ($image3) : ?>
            <div class="carousel-item">
                <img src="<?php echo esc_url($image3); ?>" alt="Image 3">
            </div>
        <?php endif; ?>
        <?php if ($image4) : ?>
            <div class="carousel-item">
                <img src="<?php echo esc_url($image4); ?>" alt="Image 4">
            </div>
        <?php endif; ?>
        <?php if ($image5) : ?>
            <div class="carousel-item">
                <img src="<?php echo esc_url($image5); ?>" alt="Image 5">
            </div>
        <?php endif; ?>
        <?php if ($image6) : ?>
            <div class="carousel-item">
                <img src="<?php echo esc_url($image6); ?>" alt="Image 6">
            </div>
        <?php endif; ?>
        <?php if ($image7) : ?>
            <div class="carousel-item">
                <img src="<?php echo esc_url($image7); ?>" alt="Image 7">
            </div>
        <?php endif; ?>
        <?php if ($image8) : ?>
            <div class="carousel-item">
                <img src="<?php echo esc_url($image8); ?>" alt="Image 8">
            </div>
        <?php endif; ?>
        <?php if ($image9) : ?>
            <div class="carousel-item">
                <img src="<?php echo esc_url($image9); ?>" alt="Image 9">
            </div>
        <?php endif; ?>
        <?php if ($image10) : ?>
            <div class="carousel-item">
                <img src="<?php echo esc_url($image10); ?>" alt="Image 10">
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
                    <?php if ($image5) : ?><button class="dot"></button><?php endif; ?>
                    <?php if ($image6) : ?><button class="dot"></button><?php endif; ?>
                    <?php if ($image7) : ?><button class="dot"></button><?php endif; ?>
                    <?php if ($image8) : ?><button class="dot"></button><?php endif; ?>
                    <?php if ($image9) : ?><button class="dot"></button><?php endif; ?>
                    <?php if ($image10) : ?><button class="dot"></button><?php endif; ?>
                </div>
            </div>

            <p><?php the_field('texte_article2') ?></p>
            <p><?php the_field('texte_article3') ?></p>
            <p><?php the_field('texte_article4') ?></p>
        </div>
        <?php
            endwhile;
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