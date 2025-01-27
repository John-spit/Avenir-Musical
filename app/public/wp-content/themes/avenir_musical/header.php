<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <title>Avenir Musical</title>   
</head>
<body <?php body_class(); ?>>
  <header id="header">
    <div class="header-container">
      <div class="header-logo-container">
        <h1 class="none">Avenir Musical</h1>        
          <a class="logo-container" href="<?php echo home_url(); ?>">
            <img class="logo-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logos/logo_rond_sans_fond.png" alt="">
          </a>       
      </div>
      <div class="nav-container">
        <div class="nav" id="navMenu">
            <?php
              wp_nav_menu(array(
                'menu' => 'Principal',
                'menu_class' => 'nav-menu1',
                ));
            ?>            
        </div>
        <div class="nav2" id="navMenu">
            <?php
              wp_nav_menu(array(
                'menu' => 'Secondaire',
                'menu_class' => 'nav-menu2',
                ));
            ?>            
        </div>
      </div>
      <!-- Menu burger -->
      <button id="burgerMenu" class="burger">
        <span class="burger-line"></span>
        <span class="burger-line"></span>
        <span class="burger-line"></span>
      </button>       
    </div>  
  </header>