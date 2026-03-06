<?php
/**
 * The template for displaying pages
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
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'page' ); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="entry-image">
                            <?php the_post_thumbnail( 'campanha-hero' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Páginas:', 'campanha-eleitoral' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>
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
