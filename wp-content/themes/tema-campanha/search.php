<?php
/**
 * The template for displaying search results pages
 */
get_header();
?>

<div class="container">
    <div class="site-content">
        <header class="archive-header">
            <h1 class="archive-title">
                <?php
                printf(
                    esc_html__( 'Resultados para: %s', 'campanha-eleitoral' ),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
            <p class="results-count">
                <?php
                printf(
                    esc_html__( 'Encontrados %d resultados', 'campanha-eleitoral' ),
                    $wp_query->found_posts
                );
                ?>
            </p>
        </header>

        <div class="posts-container">
            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    $post_type = get_post_type();
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
                                <span class="post-type"><?php echo esc_html( get_post_type_object( $post_type )->labels->singular_name ); ?></span>
                                <span class="post-date"><?php echo get_the_date( 'd/m/Y' ); ?></span>
                            </div>
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Leia Mais', 'campanha-eleitoral' ); ?></a>
                        </div>
                    </article>
                    <?php
                }
                echo '<div class="pagination">' . paginate_links() . '</div>';
            } else {
                ?>
                <div class="no-results">
                    <p><?php _e( 'Nenhum resultado encontrado para sua busca.', 'campanha-eleitoral' ); ?></p>
                    <h3><?php _e( 'Tente novamente com outras palavras:', 'campanha-eleitoral' ); ?></h3>
                    <?php get_search_form(); ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <aside class="sidebar">
        <?php dynamic_sidebar( 'primary-sidebar' ); ?>
    </aside>
</div>

<?php get_footer();
