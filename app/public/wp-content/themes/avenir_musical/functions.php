<?php

function avenirmusical_enqueue_scripts() {
    $main_css_version = filemtime(get_stylesheet_directory() . '/assets/css/main.css');
    $script_js_version = filemtime(get_stylesheet_directory() . '/assets/js/script.js');
    wp_enqueue_style('parent', get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child', 
        get_stylesheet_directory_uri() . '/assets/css/main.css', 
        array('parent'), 
        $main_css_version, 
        'all'
    );
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lilita+One&family=Tangerine:wght@400;700&display=swap', array(), null);
    wp_enqueue_script('jquery');
    wp_enqueue_script(
        'script', 
        get_stylesheet_directory_uri() . '/assets/js/script.js', 
        array('jquery'), 
        $script_js_version, 
        true
    );

}
add_action('wp_enqueue_scripts', 'avenirmusical_enqueue_scripts');

// Ajout du menu dans le back-office
function avenirmusical_add_menus() {
    // Déclare le support des menus
    add_theme_support('menus');

    // Enregistre des emplacements de menu
    register_nav_menus(array(
        'menu-principal' => __('Menu Principal', 'avenirmusical'),
        'footer-menu'    => __('Menu Pied de page', 'avenirmusical'),
    ));
}
add_action('after_setup_theme', 'avenirmusical_add_menus');

// Ajout d'un id sur un element créé du menu
function add_menu_link_class($atts, $item, $args) {
    if ($item->title == 'Contact') {
        $atts['class'] = 'contactBtn';
        
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 10, 3);

function allow_iframes_in_acf() {
    global $allowedposttags;
    $allowedposttags['iframe'] = array(
        'src'             => true,
        'width'           => true,
        'height'          => true,
        'frameborder'     => true,
        'allowfullscreen' => true,
        'style'           => true,
        'loading'         => true,
        'referrerpolicy'  => true,
    );
}
add_action('init', 'allow_iframes_in_acf');


?>