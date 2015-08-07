<?php

/**
 ***************************************************************************
 * 404 Template
 ***************************************************************************
 *
 * This template is used to show a HTTP 404 error.
 *
 */

/**
 * Get the header
 */
get_header();

/**
 * More logic to go underneath
 */

?>

<main class="section">
    <div class="container">
        <?php get_template_part('parts/not-found'); ?>
    </div>
    <!-- .container -->
</main>

<?php get_footer(); ?>
