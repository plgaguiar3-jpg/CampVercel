<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-inner">
            <div>
                <p class="footer-brand">
                    Fátima <span class="accent">Gavioli</span>
                </p>
                <p class="footer-tagline">
                    <?php echo esc_html( get_theme_mod( 'footer_tagline', 'Educação, Renovação e Compromisso.' ) ); ?>
                </p>
            </div>
            <p class="footer-copy">
                <?php esc_html_e( 'Feito pela equipe da campanha', 'gavioli-campanha' ); ?> · © <?php echo esc_html( date( 'Y' ) ); ?>
            </p>
        </div>
    </div>
</footer>

<!-- Toast container for JS notifications -->
<div class="toast-container" id="toast-container"></div>

<?php wp_footer(); ?>
</body>
</html>
