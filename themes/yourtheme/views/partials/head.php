<?php

/**
 ***************************************************************************
 * Partial: Head
 ***************************************************************************
 *
 * This partial is used to define the markup for the site's global header
 * and navigation.
 *
 */



/**
 * Setup WP nav menus
 */

// Use the Nav Walker extension
$wpst_nav_walker = new wpst_nav_walker;

// Primary nav arguments
$wpst_nav_primary_args = array(
    'theme_location' => 'primary',
    'items_wrap'     => '%3$s',
    'walker'         => $wpst_nav_walker
);

// Secondary nav arguments
$wpst_nav_secondary_args = array(
    'theme_location' => 'secondary',
    'items_wrap'     => '%3$s',
    'walker'         => $wpst_nav_walker
);

?>

<a href="#navigation" class="is-hidden">Skip to Navigation</a>

<header class="header">
    <div class="container">
        <a href="/" class="logo | header__logo">
            yourtheme
        </a>

        <nav class="nav-container | header__nav" id="navigation" role="navigation">
            <ul class="nav nav--primary">
                <?php wp_nav_menu( $wpst_nav_primary_args ); ?>
            </ul>

            <ul class="nav nav--secondary">
                <?php wp_nav_menu( $wpst_nav_secondary_args ); ?>
            </ul>
        </nav>
    </div>
</header>

<div class="main">
