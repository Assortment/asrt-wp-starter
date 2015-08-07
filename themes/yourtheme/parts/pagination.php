<?php

/**
 * Gain access to variables from main file
 */
global $practices, $org, $postcode_dir, $range, $pageno;

/**
 * Get pagination information
 * 
 * @var array
 */
$pagination = $practices['feed']['link'];

/**
 * Get the 'last' item which shows the last page to be
 * displayed
 * 
 * @var array
 */
$pagination_last = end($pagination);

/**
 * Cut off the pagination number from the URL
 * 
 * @var string
 */
$pagination_total = substr($pagination_last['href'], -1);
?>

<ul class="pagination">
    <?php
    /**
     * If current page isn't the first page, activate the 'next' link
     */
    if( $pageno > 1 ): ?>
        <li class="pagination__item">
            <a href="?org=<?php echo $org; ?>&postcode=<?php echo $postcode_dir; ?>&range=<?php echo $range; ?>&pageno=<?php echo $pageno-1; ?>" class="pagination__link">
                &larr; <span class="is-hidden">Previous Page</span>
            </a>
        </li>
    <?php else: ?>
        <li class="pagination__item">
            <span class="pagination__link is-disabled">
                &larr; <span class="is-hidden">Previous Page</span>
            </span>
        </li>
    <?php endif; ?>

    <?php
    /**
     * Loop until enough page numbers have been displayed as needed
     */
    for( $i = 1; $i <= $pagination_total; $i++ ): ?>
        <?php
        /**
         * Update classes if current item's key is the same as the current page number
         */
        $link_classes = ($i == $pageno) ? 'pagination__link is-current' : 'pagination__link'; ?>

        <li class="pagination__item">
            <a href="?org=<?php echo $org; ?>&postcode=<?php echo $postcode_dir; ?>&range=<?php echo $range; ?>&pageno=<?php echo $i; ?>" class="<?php echo $link_classes; ?>">
                <?php echo $i; ?>
            </a>
        </li>
    <?php endfor; ?>

    <?php
    /**
     * If current page isn't the last page, activate the 'next' link
     */
    if( $pageno < $pagination_total ): ?>
        <li class="pagination__item">
            <a href="?org=<?php echo $org; ?>&postcode=<?php echo $postcode_dir; ?>&range=<?php echo $range; ?>&pageno=<?php echo $pageno+1; ?>" class="pagination__link">
                <span class="is-hidden">Next Page</span> &rarr;
            </a>
        </li>
    <?php else: ?>
        <li class="pagination__item">
            <span class="pagination__link is-disabled">
                <span class="is-hidden">Next Page</span> &rarr;
            </span>
        </li>
    <?php endif; ?>
</ul>
