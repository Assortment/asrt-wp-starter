<?php

/**
 ***************************************************************************
 * Partial: Posts Index
 ***************************************************************************
 *
 * Display the information within the Posts listing template.
 *
 */



/**
 * Gain access to $post data
 */
global $post;

?>

<article>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

    <?php if ( $post->post_excerpt ): ?>
        <?php echo get_the_excerpt(); ?>
    <?php endif; ?>
</article>
