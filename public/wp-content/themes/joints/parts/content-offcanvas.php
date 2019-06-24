<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="tiny mobile-nav reveal" id="mobile-nav-modal" data-reveal data-close-on-click="true">
    <?php joints_off_canvas_nav(); ?>

    <?php if ( is_active_sidebar( 'offcanvas' ) ) : ?>

    <?php dynamic_sidebar( 'offcanvas' ); ?>

    <?php endif; ?>

</div>