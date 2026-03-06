<?php
/**
 * The footer for our theme
 */
?>
    </main>

    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3><?php _e( 'Sobre a Campanha', 'campanha-eleitoral' ); ?></h3>
                <?php dynamic_sidebar( 'footer-sidebar' ); ?>
            </div>

            <div class="footer-section">
                <h3><?php _e( 'Menu Rápido', 'campanha-eleitoral' ); ?></h3>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-nav',
                    'depth'          => 1,
                    'fallback_cb'    => function() {
                        echo '<ul>';
                        wp_list_pages( array( 'title_li' => '' ) );
                        echo '</ul>';
                    }
                ) );
                ?>
            </div>

            <div class="footer-section">
                <h3><?php _e( 'Siga-nos!', 'campanha-eleitoral' ); ?></h3>
                <div class="social-links">
                    <?php
                    $social_networks = array(
                        'facebook' => 'https://facebook.com',
                        'twitter' => 'https://twitter.com',
                        'instagram' => 'https://instagram.com',
                        'youtube' => 'https://youtube.com',
                        'whatsapp' => 'https://wa.me/' . preg_replace( '/[^0-9]/', '', get_option( 'campanha_whatsapp', '' ) ),
                    );
                    
                    foreach ( $social_networks as $network => $url ) {
                        $social_url = get_option( 'campanha_social_' . $network, $url );
                        if ( $social_url && $network !== 'whatsapp' ) {
                            echo sprintf(
                                '<a href="%s" target="_blank" rel="noopener noreferrer" title="%s">%s</a>',
                                esc_url( $social_url ),
                                ucfirst( $network ),
                                ucfirst( $network )
                            );
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="footer-section">
                <h3><?php _e( 'Contato', 'campanha-eleitoral' ); ?></h3>
                <ul>
                    <li>
                        <strong><?php _e( 'E-mail:', 'campanha-eleitoral' ); ?></strong><br>
                        <a href="mailto:<?php echo antispambot( get_option( 'admin_email' ) ); ?>">
                            <?php echo antispambot( get_option( 'admin_email' ) ); ?>
                        </a>
                    </li>
                    <li>
                        <strong><?php _e( 'Telefone:', 'campanha-eleitoral' ); ?></strong><br>
                        <a href="tel:<?php echo str_replace( array( ' ', '-', '(' , ')' ), '', get_option( 'campanha_telefone', '' ) ); ?>">
                            <?php echo get_option( 'campanha_telefone', '(XX) XXXX-XXXX' ); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date( 'Y' ); ?> <strong><?php bloginfo( 'name' ); ?></strong>. <?php _e( 'Todos os direitos reservados.', 'campanha-eleitoral' ); ?></p>
            <p><?php _e( 'Desenvolvido com', 'campanha-eleitoral' ); ?> ❤️ <?php _e( 'WordPress', 'campanha-eleitoral' ); ?></p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
