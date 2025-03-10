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
                <li><a href="/nos-restaurants/#delivery" class="nav-button">Commander</a></li>
                <li><a href="/nos-restaurants/#menu" class="nav-button">Notre menu</a></li>
                <!-- Logo -->
                <li class="logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/header-logo.svg" alt="Logo">
                    </a>
                </li>
                <li><a href="/nos-restaurants/" class="nav-button">Nos restaurants</a></li>
                <li><a href="/contact/" class="nav-button">Contact</a></li>
            </ul>
            <div class="mobile-header-container">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/white-logo.svg" class="mobile-header-logo-top" alt="Logo">
            </a>
                <div class="hamburger-menu" id="hamburger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>

    <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu-header">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/white-logo.svg" class="mobile-header-logo" alt="Logo">
            </a>
            <div class="close-menu" id="close-menu">
                <span></span>
                <span></span>
            </div>
        </div>
        <ul class="mobile-menu-list">
            <li><a href="/nos-restaurants/#delivery" class="nav-button">Commander</a></li>
            <li><a href="/nos-restaurants/#menu" class="nav-button">Notre menu</a></li>
            <li><a href="/nos-restaurants/" class="nav-button">Nos restaurants</a></li>
            <li><a href="/contact/" class="nav-button">Contact</a></li>
            <div class="mobile-icon-list">
                <div class="mobile-icon"><img  class="footer-icon-img" src="<?php echo get_template_directory_uri(); ?>/images/instagram.svg" alt="Instagram Decoration">  </div>
                <div class="mobile-icon"><img  class="footer-icon-img" src="<?php echo get_template_directory_uri(); ?>/images/facebook.svg" alt="Instagram Decoration">  </div>
                <div class="mobile-icon"><img  class="footer-icon-img" src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="Instagram Decoration">     </div>
            </div>
        </ul>
    </div>

    <?php wp_footer(); ?>
    <script>
        document.getElementById('hamburger-menu').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('open');
            document.querySelector('.main-menu').classList.toggle('hidden');
        });

        document.getElementById('close-menu').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.remove('open');
            document.querySelector('.main-menu').classList.remove('hidden');
        });

        document.querySelectorAll('.mobile-menu-list a').forEach(function(link) {
            link.addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.remove('open');
                document.querySelector('.main-menu').classList.remove('hidden');
            });
        });
    </script>
</body>
</html>