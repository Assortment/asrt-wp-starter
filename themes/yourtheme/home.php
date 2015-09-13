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

/**
 * Get the header
 */
get_header();

/**
 * Get variables from 'blog' page in CMS by its ID
 */
$home_title   = get_the_title( 1 );
$home_excerpt = get_excerpt_by_id( 1 );

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

                <article>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                    <?php if ( $post->post_excerpt ): ?>
                        <?php echo get_the_excerpt(); ?>
                    <?php endif; ?>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <?php get_template_part( 'partials/not-found' ); ?>
        <?php endif; ?>

    </div>
    <!-- .container -->
</main>

<?php get_footer(); ?>
