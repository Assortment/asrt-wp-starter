<?php

/**
 ***************************************************************************
 * Partial: Posts Show
 ***************************************************************************
 *
 * Display the Post's single.php information.
 *
 */



/**
 * Gain access to $post data
 */
global $post;

?>

<?php the_title(); ?>

<?php if ( $post->post_excerpt ): ?>
    <?php echo get_the_excerpt(); ?>
<?php endif; ?>

<?php the_content(); ?>
