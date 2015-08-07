<?php if ( is_home() || is_archive() || is_category() || is_page_template('tpl-listing.php') ): ?>
    <article>
        <h2>No posts found</h2>
        <div class="content">
            <p>If you believe this is an error, please <a href="/contact">Contact us</a> and we'll look into the issue.</p>
        </div>
    </article>
<?php else: ?>
    <article>
        <h1>Sorry, that page could not be found</h1>
        <div class="content">
            <p>This may be because the page has moved, the page no longer exists or there is a typing error in the URL. The following links should get you back on track:</p>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/contact">Contact us</a></li>
            </ul>
        </div>
    </article>
<?php endif; ?>
