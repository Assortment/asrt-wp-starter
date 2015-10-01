<?php

/**
 ***************************************************************************
 * Sidebar - Default
 ***************************************************************************
 *
 * The sidebar is used to define any side-information to be presented
 * for a template. Think categories and tags from a blog listing
 * template.
 *
 */

/**
 * Only display sidebar if the current template has children or
 * isn't a child itself.
 */
if ( $post->post_parent > 0 || has_children() ): ?>
    <aside class="sidebar" role="complementary">
        <?php

        /**
         * Get page ID of post or posts parent depending of if this $post
         * is a child or parent
         */
        $page_id = ( $post->post_parent > 0 ) ? $post->post_parent : $post->ID;

        // Get pages
        $children = wpst_get_pages( $page_id );

        // Get view
        get_template_part('views/partials/list-children');

        ?>
    </aside>
<?php endif; ?>
