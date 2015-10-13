<?php

/**
 ***************************************************************************
 * Home Template
 ***************************************************************************
 *
 * This template is used to show the posts landing, assuming its not already
 * the Front Page of the site, in which case `front-page.php` would take
 * priority.
 *
 */



// Get the header
get_header();

// Define fields from static 'blog' page in WordPress based on page ID
$home_title   = get_the_title( 1 );
$home_excerpt = wpst_get_excerpt_by_id( 1 );

?>

<main class="section">
    <div class="container">
        <?php if ( $home_title ): ?>
            <h1 class="headline"><?php echo $home_title; ?></h1>
        <?php endif; ?>

        <?php if ( $home_excerpt ): ?>
            <p class="intro"><?php echo $excerpt; ?></p>
        <?php endif; ?>

        <?php if ( have_posts() ): ?>
            <?php while ( have_posts() ): ?>
                <?php the_post(); ?>

                <?php get_template_part('views/post/index'); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <?php get_template_part( 'views/errors/404-posts' ); ?>
        <?php endif; ?>

    </div>
    <!-- .container -->
</main>

<?php get_footer(); ?>
