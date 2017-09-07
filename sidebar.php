<?php

/**
 ***************************************************************************
 * Sidebar - Default
 ***************************************************************************
 *
 * The sidebar is used to define any side-information to be presented
 * for a template. Think categories from a blog listing template and
 * related/children for pages.
 *
 */



// Get parent's post
$parent = get_post($post->post_parent);

// Define posts to exclude from sidebar, if any (Assumes ACF plugin)
$excludes = get_field('sidebar_exclusions', 'options') ?: array();

// Get pages of current $post's parent's children
$siblings = wpst_get_pages($parent, $excludes);

?>

<?php if( $siblings ): ?>
    <aside class="sidebar" role="complementary">
        <article class="sidebar__section">
            <h2 class="delta | sidebar__heading">In this section</h2>
            <nav class="list--arrows | sidebar__list">
                <?php foreach($siblings->posts as $i): ?>
                    <li class="<?php echo is_page($i->ID) ? 'is-current' : ''; ?>">
                        <a href="<?php echo get_permalink($i->ID); ?>"><?php echo get_the_title($i->ID); ?></a>
                    </li>
                <?php endforeach; ?>
            </nav>
        </article>
    </aside>
<?php endif; ?>
