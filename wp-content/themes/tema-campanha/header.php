<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#primary"><?php _e( 'Ir para o conteúdo', 'campanha-eleitoral' ); ?></a>

    <header class="site-header">
        <div class="site-branding">
            <div>
                <div class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        if ( $custom_logo_id ) {
                            echo wp_get_attachment_image( $custom_logo_id, 'medium', false, array( 'alt' => get_bloginfo( 'name' ) ) );
                        } else {
                            bloginfo( 'name' );
                        }
                        ?>
                    </a>
                </div>
                <p class="tagline"><?php bloginfo( 'description' ); ?></p>
            </div>

            <nav class="site-navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'site-nav',
                    'fallback_cb'    => 'wp_page_menu',
                    'depth'          => 2,
                ) );
                ?>
            </nav>
        </div>
    </header>

    <main id="primary" class="site-main">
