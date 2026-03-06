<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header();
?>

<div class="container">
    <div class="site-content">
        <article id="post-0" class="post error404 not-found">
            <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'Página Não Encontrada', 'campanha-eleitoral' ); ?></h1>
            </header>

            <div class="entry-content">
                <p><?php _e( 'Desculpe, a página que você procura não existe.', 'campanha-eleitoral' ); ?></p>

                <h3><?php _e( 'Você pode tentar:', 'campanha-eleitoral' ); ?></h3>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Voltar à Página Inicial', 'campanha-eleitoral' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/candidatos' ) ); ?>"><?php _e( 'Ver Candidatos', 'campanha-eleitoral' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/eventos' ) ); ?>"><?php _e( 'Ver Eventos', 'campanha-eleitoral' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/propostas' ) ); ?>"><?php _e( 'Ver Propostas', 'campanha-eleitoral' ); ?></a></li>
                </ul>

                <h3><?php _e( 'Buscar', 'campanha-eleitoral' ); ?></h3>
                <?php get_search_form(); ?>
            </div>
        </article>
    </div>

    <aside class="sidebar">
        <?php dynamic_sidebar( 'primary-sidebar' ); ?>
    </aside>
</div>

<?php get_footer();
