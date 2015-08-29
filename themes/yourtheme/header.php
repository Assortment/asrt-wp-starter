<?php

    /**
     * Use the Nav Walker extension
     */
    $wpst_nav_walker = new wpst_nav_walker;

    /**
     * Primary nav arguments
     */
    $wpst_nav_primary_args = array(
        'theme_location' => 'primary',
        'items_wrap' => '%3$s',
        'walker' => $wpst_nav_walker
    );

    /**
     * Primary nav arguments
     */
    $wpst_nav_secondary_args = array(
        'theme_location' => 'secondary',
        'items_wrap' => '%3$s',
        'walker' => $wpst_nav_walker
    );

?>

<!DOCTYPE html>
<!--[if IE]><html class="no-js ie lt-ie9 " lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js " lang="en"><!--<![endif]-->
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="cleartype" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Titles/Descriptions -->
    <title><?php wp_title( '', true, 'right' ); ?><?php echo ! is_front_page() ? '| ' . bloginfo( 'name' ) : ''; ?></title>
    <link rel="canonical" href="<?php echo get_bloginfo('url'); ?>" />

    <!-- Favicons -->
    <?php get_template_part('parts/favicons'); ?>

    <!-- Styles -->
    <!--[if IE 9]><!-->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/styles.css">
    <!--<![endif]-->

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/ie.css" media="screen">
    <![endif]-->

    <!-- @font-face declarations -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700' rel='stylesheet' type='text/css'>

    <!-- wp_head -->
    <?php wp_head(); ?>
</head>
<body class="debug">
<a href="#navigation" class="is-hidden">Skip to Navigation</a>

<header class="header">
    <div class="container">
        <a href="/" class="logo | header__logo">
            yourtheme
        </a>

        <?php $wpst_nav_walker = new wpst_nav_walker; ?>
        <nav class="nav-container | header__nav" id="navigation" role="navigation">
            <ul class="nav nav--primary">
                <?php wp_nav_menu( $wpst_nav_primary_args ); ?>
            </ul>

            <ul class="nav nav--secondary">
                <?php wp_nav_menu( $wpst_nav_secondary_args ); ?>
            </ul>
        </nav>
    </div>
</header>

<div class="main">
