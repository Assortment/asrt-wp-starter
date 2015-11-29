<?php

/**
 ***************************************************************************
 * 404 Template
 ***************************************************************************
 *
 * This template is used to show a HTTP 404 error repsonse.
 *
 */



// Get the header
get_header();

?>

<main class="section">
    <div class="container">

        <?php get_template_part('views/errors/404-page'); ?>

    </div> <!-- .container -->
</main>

<?php get_footer(); ?>
