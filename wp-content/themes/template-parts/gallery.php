<?php
/**
 * Gallery Section
 *
 * Uses the 6 most recent media library images tagged with "galeria" category,
 * or falls back to placeholder images.
 */

$gallery_images = array();

// Try to get images from a gallery page or custom field
// Alternatively, use recent media tagged to the campaign
$gallery_query = new WP_Query( array(
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'post_status'    => 'inherit',
    'posts_per_page' => 6,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'meta_query'     => array(
        array(
            'key'     => '_gavioli_gallery',
            'value'   => '1',
            'compare' => '=',
        ),
    ),
) );

if ( $gallery_query->have_posts() ) {
    while ( $gallery_query->have_posts() ) {
        $gallery_query->the_post();
        $gallery_images[] = array(
            'src' => wp_get_attachment_image_url( get_the_ID(), 'gallery-thumb' ),
            'alt' => get_the_title(),
        );
    }
    wp_reset_postdata();
}

// Fallback placeholder images
if ( empty( $gallery_images ) ) {
    $default_alts = array(
        'Fátima discursando em evento comunitário',
        'Fátima na sala de aula',
        'Encontro com eleitores',
        'Reunião com professores',
        'Mutirão de saúde',
        'Fátima em entrevista',
    );
    foreach ( $default_alts as $alt ) {
        $gallery_images[] = array(
            'src' => '',
            'alt' => $alt,
        );
    }
}
?>

<section id="galeria" class="section-padding section-alt">
    <div class="container">
        <div class="section-header reveal animate-fade-up">
            <p class="section-tag"><?php esc_html_e( 'Galeria', 'gavioli-campanha' ); ?></p>
            <h2 class="section-title"><?php esc_html_e( 'Momentos da Campanha', 'gavioli-campanha' ); ?></h2>
            <p class="desc"><?php esc_html_e( 'Registros de encontros, ações e momentos marcantes junto à comunidade.', 'gavioli-campanha' ); ?></p>
        </div>

        <div class="gallery-grid">
            <?php foreach ( $gallery_images as $i => $img ) : ?>
                <div class="gallery-item reveal animate-scale-in delay-<?php echo esc_attr( min( $i + 1, 6 ) ); ?>">
                    <?php if ( ! empty( $img['src'] ) ) : ?>
                        <img
                            src="<?php echo esc_url( $img['src'] ); ?>"
                            alt="<?php echo esc_attr( $img['alt'] ); ?>"
                            loading="lazy"
                        >
                    <?php else : ?>
                        <div style="width: 100%; height: 100%; background: var(--muted); display: flex; align-items: center; justify-content: center; color: var(--muted-foreground); font-size: 0.75rem; padding: 1rem; text-align: center;">
                            <?php echo esc_html( $img['alt'] ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
