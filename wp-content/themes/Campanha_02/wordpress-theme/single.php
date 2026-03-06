<?php
/**
 * Single post template
 */

get_header();
?>

<main class="section-padding" style="padding-top: 6rem;">
    <div class="container" style="max-width: 800px;">
        <?php
        while ( have_posts() ) :
            the_post();
        ?>
            <article>
                <div style="margin-bottom: 1rem;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>#noticias" class="news-read-more" style="color: var(--primary);">
                        <?php echo gavioli_svg_icon( 'arrow-right', 'rotate-180' ); ?>
                        <?php esc_html_e( 'Voltar às notícias', 'gavioli-campanha' ); ?>
                    </a>
                </div>

                <p class="section-tag">
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo esc_html( $categories[0]->name );
                    }
                    ?>
                </p>

                <h1 class="section-title"><?php the_title(); ?></h1>

                <div class="news-meta" style="margin-bottom: 2rem;">
                    <?php echo gavioli_svg_icon( 'calendar' ); ?>
                    <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>">
                        <?php echo esc_html( get_the_date( 'd M Y' ) ); ?>
                    </time>
                </div>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div style="border-radius: 1rem; overflow: hidden; margin-bottom: 2rem;">
                        <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: auto;' ) ); ?>
                    </div>
                <?php endif; ?>

                <div class="post-content" style="color: var(--muted-foreground); line-height: 1.85; font-size: 1.0625rem;">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();
