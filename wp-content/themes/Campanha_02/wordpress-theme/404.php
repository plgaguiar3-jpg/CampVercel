<?php
/**
 * 404 template
 */

get_header();
?>

<div class="page-404">
    <div>
        <h1>404</h1>
        <p><?php esc_html_e( 'Página não encontrada. Volte para a página inicial.', 'gavioli-campanha' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary">
            <?php esc_html_e( 'Voltar ao Início', 'gavioli-campanha' ); ?>
        </a>
    </div>
</div>

<?php
get_footer();
