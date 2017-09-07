<?php
/**
 ***************************************************************************
 * Category: Listing
 ***************************************************************************
 *
 * This template is the catch-all for a category archive
 *
 */

?>

<?php get_template_part('views/globals/breadcrumbs'); ?>

<main class="section">
    <div class="container">

        <div class="grid">
            <div class="grid__item grid__item--8-12-bp3">
                <?php
                    if ( have_posts() ):
                        while ( have_posts() ): the_post();
                            get_template_part('views/post/loop');
                        endwhile;
                    else:
                        get_template_part( 'views/errors/404-posts' );
                    endif;

                    get_template_part( 'views/globals/pagination' );
                ?>
            </div>
            <div class="grid__item grid__item--4-12-bp3">
                <?php //get_sidebar('news'); ?>
            </div>
        </div>

    </div><!-- .container -->
</main><!-- .section -->
