<?php
/**
 * The template for displaying archive pages
 */
get_header();
?>

<div class="container">
    <div class="site-content">
        <header class="archive-header">
            <h1 class="archive-title">
                <?php
                if ( is_category() ) {
                    _e( 'Categoria:', 'campanha-eleitoral' );
                    single_cat_title();
                } elseif ( is_tag() ) {
                    _e( 'Tag:', 'campanha-eleitoral' );
                    single_tag_title();
                } elseif ( is_post_type_archive() ) {
                    post_type_archive_title();
                } elseif ( is_author() ) {
                    _e( 'Posts por:', 'campanha-eleitoral' );
                    the_author();
                } else {
                    _e( 'Arquivo', 'campanha-eleitoral' );
                }
                ?>
            </h1>
            <?php
            if ( is_category() || is_tag() ) {
                the_archive_description( '<div class="archive-description">', '</div>' );
            }
            ?>
        </header>

        <?php
        // Custom Post Type Archives
        if ( is_post_type_archive( 'candidato' ) ) {
            ?>
            <div class="posts-container">
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        $info = campanha_get_candidato_info( get_the_ID() );
                        ?>
                        <article class="post-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                    <?php the_post_thumbnail( 'campanha-card' ); ?>
                                </a>
                            <?php endif; ?>
                            <div class="post-content">
                                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php if ( $info['cargo'] ) : ?>
                                    <p class="post-meta"><strong><?php echo esc_html( $info['cargo'] ); ?></strong></p>
                                <?php endif; ?>
                                <?php if ( $info['partido'] ) : ?>
                                    <p class="post-meta"><?php _e( 'Partido:', 'campanha-eleitoral' ); ?> <?php echo esc_html( $info['partido'] ); ?></p>
                                <?php endif; ?>
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Conhecer', 'campanha-eleitoral' ); ?></a>
                            </div>
                        </article>
                        <?php
                    }
                } else {
                    echo '<p>' . __( 'Nenhum candidato encontrado.', 'campanha-eleitoral' ) . '</p>';
                }
                ?>
            </div>
            <?php
        } elseif ( is_post_type_archive( 'evento' ) ) {
            ?>
            <div class="posts-container">
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        $info = campanha_get_evento_info( get_the_ID() );
                        ?>
                        <article class="post-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                    <?php the_post_thumbnail( 'campanha-card' ); ?>
                                </a>
                            <?php endif; ?>
                            <div class="post-content">
                                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php if ( $info['data'] ) : ?>
                                    <p class="post-meta">
                                        <strong><?php echo date_i18n( 'd/m/Y', strtotime( $info['data'] ) ); ?></strong>
                                        <?php if ( $info['hora'] ) : ?>
                                            - <?php echo esc_html( $info['hora'] ); ?>
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>
                                <?php if ( $info['local'] ) : ?>
                                    <p class="post-meta"><?php _e( 'Local:', 'campanha-eleitoral' ); ?> <?php echo esc_html( $info['local'] ); ?></p>
                                <?php endif; ?>
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Detalhes', 'campanha-eleitoral' ); ?></a>
                            </div>
                        </article>
                        <?php
                    }
                } else {
                    echo '<p>' . __( 'Nenhum evento encontrado.', 'campanha-eleitoral' ) . '</p>';
                }
                ?>
            </div>
            <?php
        } elseif ( is_post_type_archive( 'proposta' ) ) {
            ?>
            <div class="posts-container">
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        ?>
                        <article class="post-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                    <?php the_post_thumbnail( 'campanha-card' ); ?>
                                </a>
                            <?php endif; ?>
                            <div class="post-content">
                                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Ler Mais', 'campanha-eleitoral' ); ?></a>
                            </div>
                        </article>
                        <?php
                    }
                } else {
                    echo '<p>' . __( 'Nenhuma proposta encontrada.', 'campanha-eleitoral' ) . '</p>';
                }
                ?>
            </div>
            <?php
        } else {
            // Regular posts archive
            ?>
            <div class="posts-container">
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        ?>
                        <article class="post-card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                    <?php the_post_thumbnail( 'campanha-card' ); ?>
                                </a>
                            <?php endif; ?>
                            <div class="post-content">
                                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="post-meta">
                                    <?php echo get_the_date( 'd/m/Y' ); ?> | <?php _e( 'Por', 'campanha-eleitoral' ); ?> <?php the_author(); ?>
                                </div>
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Ler Mais', 'campanha-eleitoral' ); ?></a>
                            </div>
                        </article>
                        <?php
                    }
                    echo '<div class="pagination">' . paginate_links() . '</div>';
                } else {
                    echo '<p>' . __( 'Nenhum post encontrado.', 'campanha-eleitoral' ) . '</p>';
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>

    <aside class="sidebar">
        <?php dynamic_sidebar( 'primary-sidebar' ); ?>
    </aside>
</div>

<?php get_footer();
