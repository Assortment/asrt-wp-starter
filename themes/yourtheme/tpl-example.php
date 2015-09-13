<?php

/**
 ***************************************************************************
 * Example Custom Template
 ***************************************************************************
 *
 * All custom templates should be prefixed with `tpl-` for navigation
 * purposes. To associate this template with WordPress, write the
 * Template Name underneath like so.
 *
 *
 * Template Name: Example
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
        <?php if ( have_posts() ): ?>
            <?php while ( have_posts() ): ?>
                <?php the_post(); ?>

                <article>
                    <?php the_title(); ?>

                    <?php if ( $post->post_excerpt ): ?>
                        <?php echo get_the_excerpt(); ?>
                    <?php endif; ?>

                    <?php the_content(); ?>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <?php get_template_part( 'partials/not-found' ); ?>
        <?php endif; ?>
    </div>
    <!-- .container -->
</main>

<?php get_footer(); ?>
