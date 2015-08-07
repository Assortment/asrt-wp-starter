<?php

/**
 ***************************************************************************
 * Default Template
 ***************************************************************************
 *
 * This template is used to show a generic page. More info here:
 * http://codex.wordpress.org/Theme_Development#Index_.28index.php.29
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
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <article>
                    <?php the_title(); ?>

                    <?php if($post->post_excerpt): ?>
                        <?php echo get_the_excerpt(); ?>
                    <?php endif; ?>

                    <?php the_content(); ?>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <?php // page/post not found ?>
        <?php endif; ?>
    </div>
    <!-- .container -->
</main>

<?php get_footer(); ?>
