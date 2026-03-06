<?php
/**
 * The template for displaying single posts
 */
get_header();
?>

<div class="container">
    <div class="site-content">
        <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <div class="entry-meta">
                            <span class="posted-on"><?php echo get_the_date( 'd/m/Y H:i' ); ?></span>
                            <span class="byline"> | <?php _e( 'Por', 'campanha-eleitoral' ); ?> <?php the_author_posts_link(); ?></span>
                            <?php
                            if ( has_category() ) {
                                echo '<span class="categories"> | ' . __( 'Categorias:', 'campanha-eleitoral' ) . ' ';
                                the_category( ', ' );
                                echo '</span>';
                            }
                            ?>
                        </div>
                    </header>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="entry-image">
                            <?php the_post_thumbnail( 'campanha-hero' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content( sprintf(
                            wp_kses_post( __( 'Continuar lendo <span class="meta-nav">&rarr;</span>', 'campanha-eleitoral' ) )
                        ) );

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Páginas:', 'campanha-eleitoral' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>

                    <?php if ( get_post_type() === 'candidato' ) : ?>
                        <div class="candidato-info">
                            <?php
                            $info = campanha_get_candidato_info( get_the_ID() );
                            ?>
                            <h3><?php _e( 'Informações do Candidato', 'campanha-eleitoral' ); ?></h3>
                            <ul>
                                <?php if ( $info['cargo'] ) : ?>
                                    <li><strong><?php _e( 'Cargo:', 'campanha-eleitoral' ); ?></strong> <?php echo esc_html( $info['cargo'] ); ?></li>
                                <?php endif; ?>
                                <?php if ( $info['partido'] ) : ?>
                                    <li><strong><?php _e( 'Partido:', 'campanha-eleitoral' ); ?></strong> <?php echo esc_html( $info['partido'] ); ?></li>
                                <?php endif; ?>
                                <?php if ( $info['numero'] ) : ?>
                                    <li><strong><?php _e( 'Número:', 'campanha-eleitoral' ); ?></strong> <?php echo esc_html( $info['numero'] ); ?></li>
                                <?php endif; ?>
                                <?php if ( $info['email'] ) : ?>
                                    <li><strong><?php _e( 'E-mail:', 'campanha-eleitoral' ); ?></strong> <a href="mailto:<?php echo esc_attr( $info['email'] ); ?>"><?php echo esc_html( $info['email'] ); ?></a></li>
                                <?php endif; ?>
                                <?php if ( $info['telefone'] ) : ?>
                                    <li><strong><?php _e( 'Telefone:', 'campanha-eleitoral' ); ?></strong> <a href="tel:<?php echo esc_attr( $info['telefone'] ); ?>"><?php echo esc_html( $info['telefone'] ); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if ( get_post_type() === 'evento' ) : ?>
                        <div class="evento-info">
                            <?php
                            $info = campanha_get_evento_info( get_the_ID() );
                            ?>
                            <h3><?php _e( 'Detalhes do Evento', 'campanha-eleitoral' ); ?></h3>
                            <ul>
                                <?php if ( $info['data'] ) : ?>
                                    <li><strong><?php _e( 'Data:', 'campanha-eleitoral' ); ?></strong> <?php echo date_i18n( 'd/m/Y', strtotime( $info['data'] ) ); ?></li>
                                <?php endif; ?>
                                <?php if ( $info['hora'] ) : ?>
                                    <li><strong><?php _e( 'Hora:', 'campanha-eleitoral' ); ?></strong> <?php echo esc_html( $info['hora'] ); ?></li>
                                <?php endif; ?>
                                <?php if ( $info['local'] ) : ?>
                                    <li><strong><?php _e( 'Local:', 'campanha-eleitoral' ); ?></strong> <?php echo esc_html( $info['local'] ); ?></li>
                                <?php endif; ?>
                                <?php if ( $info['endereco'] ) : ?>
                                    <li><strong><?php _e( 'Endereço:', 'campanha-eleitoral' ); ?></strong> <?php echo nl2br( esc_html( $info['endereco'] ) ); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <footer class="entry-footer">
                        <?php the_tags( '<div class="tags">' . __( 'Tags:', 'campanha-eleitoral' ) . ' ', ', ', '</div>' ); ?>
                    </footer>
                </article>

                <?php
                // Comments
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            }
        }
        ?>
    </div>

    <aside class="sidebar">
        <?php dynamic_sidebar( 'primary-sidebar' ); ?>
    </aside>
</div>

<?php get_footer();
