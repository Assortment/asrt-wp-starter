<?php

/**
 ***************************************************************************
 * Partial: Header
 ***************************************************************************
 *
 * This partial is used to define the markup for the site's global header
 * and navigation.
 *
 */



?>

<a href="#navigation" class="is-hidden">Skip to Navigation</a>

<header class="header">
    <div class="container">
        <a href="/" class="logo | header__logo">
            <?php bloginfo( 'name' ); ?>
        </a>

        <nav class="nav-container | header__nav" id="navigation" role="navigation">
            <ul class="nav nav--primary">
                <?php wp_nav_menu( array('theme_location' => 'primary', 'items_wrap' => '%3$s') ); ?>
            </ul>

            <ul class="nav nav--secondary">
                <?php wp_nav_menu( array('theme_location' => 'secondary', 'items_wrap' => '%3$s') ); ?>
            </ul>
        </nav>
    </div>
</header>
