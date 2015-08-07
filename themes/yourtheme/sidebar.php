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
 * Excluded page ID's
 *
 * @var array|int
 */
$excluded = array();

/**
 * Only display sidebar if the current template has children
 * or isn't a child itself.
 */
if( $post->post_parent > 0 || has_children() ): ?>
    <aside class="sidebar" role="complementary">
        <?php

        /**
         * Get page ID of post or posts parent depending of if this $post
         * is a child or parent
         *
         * @var int
         */
        $page_id = ($post->post_parent > 0) ? $post->post_parent : $post->ID;

        /**
         * Get all pages that match arguments below
         *
         * @var object $post
         */
        $list_args = array(
            'parent'       => $page_id,
            'post_type'    => 'page',
            'exclude'      => $excluded,
            'sort_order'   => 'ASC',
            'sort_column'  => 'menu_order',
        );
        $list_pages = get_pages($list_args);

        /**
         * If pages exist
         */
        if($list_pages) { ?>
            <article class="sidebar__section">
                In this section:
                <nav>
                    <?php

                    /**
                     * Loop through pages
                     */
                    foreach($list_pages as $post): setup_postdata($post); ?>
                        <?php $page_url = get_permalink($page->ID); ?>
                        <li class="<?php if(is_page($page->ID)) { ?>is-current<?php } ?>">
                            <a href="<?php echo $page_url; ?>">
                                <?php echo $page->post_title; ?>
                            </a>
                        </li>
                    <?php endforeach; wp_reset_postdata(); ?>
                </nav>
            </article>
        <?php } ?>
    </aside>
<?php endif; ?>
