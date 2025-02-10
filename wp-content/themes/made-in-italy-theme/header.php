<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <nav>
            <ul class="main-menu">
                <li><a href="/made-in-italy/nos-restaurants/#delivery" class="nav-button">Commander</a></li>
                <li><a href="/made-in-italy/nos-restaurants/#menu" class="nav-button">Notre menu</a></li>
                <!-- Logo -->
                <li class="logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/header-logo.svg" alt="Logo">
                    </a>
                </li>
                <li><a href="/made-in-italy/nos-restaurants" class="nav-button">Nos restaurants</a></li>
                <li><a href="/made-in-italy/contact" class="nav-button">Contact</a></li>
            </ul>
        </nav>
    </header>