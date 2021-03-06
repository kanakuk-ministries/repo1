<?php
// Register menus
register_nav_menus(
    array(
        'main-nav' => __('The Main Menu', 'jointswp'), // Main nav in header
        'offcanvas-nav' => __('The Off-Canvas Menu', 'jointswp'), // Off-Canvas nav
        'footer-links' => __('Footer Links', 'jointswp'), // Secondary nav in footer
        'social-links' => __('Social Links', 'jointswp'), // Social media buttons in footer
    )
);

// The Top Menu
function joints_top_nav()
{
    wp_nav_menu(array(
        // 'container'            => false,                        // Remove nav container
        'menu_id' => 'main-nav', // Adding custom nav id
        'menu_class' => 'medium-horizontal menu', // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s white" data-responsive-menu="accordion medium-dropdown" data-click-open="true">%3$s</ul>',
        'theme_location' => 'main-nav', // Where it's located in the theme
        'depth' => 2, // Limit the depth of the nav
        'fallback_cb' => false, // Fallback function (see below)
        'walker' => new Topbar_Menu_Walker(),
    ));
}

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu\">\n";
    }
}

// The Off Canvas Menu
function joints_off_canvas_nav()
{
    wp_nav_menu(array(
        'container' => false, // Remove nav container
        'menu_id' => 'main-nav', // Adding custom nav id
        'menu_class' => 'vertical menu accordion-menu', // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu>%3$s</ul>',
        'theme_location' => 'main-nav', // Where it's located in the theme
        'depth' => 3, // Limit the depth of the nav
        'fallback_cb' => false, // Fallback function (see below)
        'walker' => new Off_Canvas_Menu_Walker(),
    ));
}

class Off_Canvas_Menu_Walker extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu\">\n";
    }
}

// The Footer Menu
function joints_footer_links()
{
    wp_nav_menu(array(
        'container' => false, // Remove nav container
        'menu_id' => 'footer-links', // Adding custom nav id
        'menu_class' => 'menu', // Adding custom nav class
        'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
        'theme_location' => 'footer-links', // Where it's located in the theme
        'depth' => 2, // Limit the depth of the nav
        'fallback_cb' => false, // Fallback function
        // 'walker'                => new Footer_Menu_Walker()
    ));
} /* End Footer Menu */

class Footer_Menu_Walker extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"menu\">\n";
    }
}

// The Social Menu
function joints_social_links()
{
    wp_nav_menu(array(
        'container' => false, // Remove nav container
        'menu_id' => 'social-links', // Adding custom nav id
        'menu_class' => 'small-12 medium-3 large-3 medium-offset-9 large-offset-9', // Adding custom nav class
        'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
        'theme_location' => 'social-links', // Where it's located in the theme
        'depth' => 1, // Limit the depth of the nav
        'fallback_cb' => false, // Fallback function
        'walker'                => new Social_Menu_Walker()
    ));
}

class Social_Menu_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $title = $item->title;
        $icon = array_values($item->classes)[0];
        $permalink = $item->url;
        $output .= "<a href=\"" . $permalink . "\">";
        $output .= "<i class=\"icon " . $icon . " white\">";
        $output .= "</i>";
        $output .= "</a>";
    }
}

/* End Social Menu */

// Header Fallback Menu
function joints_main_nav_fallback()
{
    wp_page_menu(array(
        'show_home' => true,
        'menu_class' => '', // Adding custom nav class
        'include' => '',
        'exclude' => '',
        'echo' => true,
        'link_before' => '', // Before each link
        'link_after' => '', // After each link
    ));
}

// Footer Fallback Menu
function joints_footer_links_fallback()
{
    /* You can put a default here if you like */
}

// Add Foundation active class to menu
function required_active_nav_class($classes, $item)
{
    if ($item->current == 1 || $item->current_item_ancestor == true) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'required_active_nav_class', 10, 2);