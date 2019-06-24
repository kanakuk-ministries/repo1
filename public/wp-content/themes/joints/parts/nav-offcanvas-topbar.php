<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */

console_log('SESSION DATA', $_SESSION);

?>

<div class="sticky top-bar-sticky-container" id="js-top-bar-sticky-container" data-sticky data-sticky-on="medium" data-stick-to="top" data-margin-top="0">
    <div class="top-bar" id="top-bar-menu">
        <div class="top-bar-left float-left">
            <ul class="menu">
                <li class="show-for-small-only mobile-nav-closed-icon" id="mobile-nav-closed-icon">
                    <a class="nav-icon-container" data-open="mobile-nav-modal" id="nav-icon-container">
                        <i class="white icon icon-menu"></i>
                    </a>
                </li>
                <li class="show-for-small-only mobile-nav-open-icon hide" id="mobile-nav-open-icon">
                    <a class="nav-icon-container" id="nav-open-icon-container">
                        <i class="white icon icon-menu"></i>
                    </a>
                </li>
                <li><a class="nav-logo-container" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kanakuk-white.png" /></a></li>

            </ul>
        </div>
        <div class="top-bar-right show-for-small-only float-right">
            <span class="warning badge" style="margin-right: 10px;" data-toggle="top-nav-badge-tooltip"><?php echo kan_get_registration_count(); ?></span>
            <i class="icon icon-account medium white" data-toggle="top-nav-button-tooltip-logged-out"></i>
            <!-- TODO: Use below if logged in and user has avatar -->
            <!-- <div class="avatar small" style="background-image: url(https://kanakuk-dev.s3.amazonaws.com/uploads/Rachel-Sparks.jpg)" data-toggle="top-nav-avatar-tooltip"></div> -->
        </div>
        <div class="top-bar-right show-for-medium">
            <?php joints_top_nav(); ?>
            <ul class="menu menu-items-secondary-custom" data-click-open="true">
                <?php if (kan_get_registration_count() > 0) : ?>
                <li class="menu-item menu-item-type-custom menu-item-type-object-custom" data-toggle="top-nav-badge-tooltip">
                    <span class="warning badge" style="margin-right: 10px;"><?php echo kan_get_registration_count(); ?></span>
                </li>
                <?php else: ?>
                <li class="menu-item menu-item-type-custom menu-item-type-object-custom">
                    <!-- Nothing if empty -->
                </li>
                <?php endif; ?>

                <?php if (kan_is_logged_in()) : ?>
                <li class="menu-item menu-item-type-custom menu-item-type-object-custom white">
                    <div class="flex-container align-center-middle">
                        <span class="padding-right">Hi, <strong><?php echo $_SESSION['circuitree']['auth']['first_name']; ?></strong></span>
                        <div class="avatar small" data-toggle="top-nav-avatar-tooltip"></div>
                    </div>
                </li>
                <?php endif; ?>

                <?php if (!kan_is_logged_in()) : ?>
                <li class="menu-item menu-item-type-custom menu-item-type-object-custom padding-right-0" data-toggle="top-nav-button-tooltip-logged-out">
                    <button class="tiny button white hollow my-kanakuk-button">My Kanakuk</button>
                </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="dropdown-pane top-nav-button-tooltip" id="top-nav-button-tooltip-logged-out" data-dropdown data-close-on-click="true" data-v-offset="20" data-v-offset="50"  data-position="bottom" data-alignment="right">
            <div class="tooltip-triangle"></div>
            <div class="grid-x align-center">
                <span>You haven't logged in yet</span>
            </div>
            <div class="grid-x align-center padding-top">
                <a href="/login" class="tiny button">Login Now</a>
                <a href="/logout?redirect=/login" class="tiny button hollow borderless">Use Another Account</a>
            </div>
        </div>

        <div class="dropdown-pane top-nav-avatar-tooltip" id="top-nav-avatar-tooltip" data-dropdown data-close-on-click="true" data-v-offset="20" data-h-offset="-70" data-position="bottom" data-alignment="right">
            <div class="tooltip-triangle"></div>
            <div class="flex-container align-center-middle flex-dir-column padding-top">
                <a href="/my-kanakuk" class="tiny button">My Kanakuk</a>
                <a href="/logout" class="tiny button hollow borderless">Logout</a>
            </div>
        </div>
        <div class="dropdown-pane top-nav-badge-tooltip" id="top-nav-badge-tooltip" data-dropdown data-close-on-click="true" data-h-offset="-46" data-v-offset="20" data-position="bottom" data-alignment="right">
            <div class="tooltip-triangle"></div>
            You've started <strong><?php echo kan_get_registration_count(); ?></strong> Kamp registrations. Would you like to finish?
            <div class="grid-x align-center padding-top">
                <a href="/search-results?tab=0" class="tiny button">Register Now</a>
                <a href="/" class="tiny button hollow borderless">Back to Search</a>
            </div>
        </div>
    </div>
</div>