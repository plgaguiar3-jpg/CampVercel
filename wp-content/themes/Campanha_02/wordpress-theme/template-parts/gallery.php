<?php
/**
 * Gallery Section
 *
 * Priority:
 * 1) Block widget area configured in admin.
 * 2) Bundled images from /Fotos folder.
 * 3) Media fallback from attachments flagged with _gavioli_gallery=1.
 * 4) Placeholder cards.
 */

$gallery_images      = array();
$has_gallery_sidebar = is_active_sidebar( 'campaign-gallery-block' );

if ( ! $has_gallery_sidebar ) {
    $bundled_gallery = array(
        'IMG_0617-scaled.jpg'                           => 'Fátima em evento',
        'SecretarianaAlego2copiar-0bb-1200x600-c-default.png' => 'Fátima em reunião institucional',
        'SecretarianaAlego2copiar-0bb.png'              => 'Fátima em evento público',
        '2.jpg'                                         => 'Encontro com lideranças',
        'FATIMA.jpg'                                    => 'Retrato da candidata',
        '33.jpg'                                        => 'Entrevista com Fátima',
        'image.jpg'                                     => 'Fátima em reunião',
        'maxresdefault.jpg'                             => 'Participação em programa de TV',
        'professora-fatima-gavioli-40789.jpg'           => 'Fátima em retrato oficial',
        'arton39522.png'                                => 'Fátima em evento institucional',
        'images.webp'                                   => 'Fátima em conversa com equipe',
    );

    $fotos_dir = trailingslashit( ABSPATH ) . 'Fotos' . DIRECTORY_SEPARATOR;
    foreach ( $bundled_gallery as $file => $alt ) {
        if ( file_exists( $fotos_dir . $file ) ) {
            $gallery_images[] = array(
                'src' => home_url( '/Fotos/' . rawurlencode( $file ) ),
                'alt' => $alt,
            );
        }
    }

    if ( empty( $gallery_images ) ) {
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
    }

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
}
?>

<section id="galeria" class="section-padding section-alt">
    <div class="container">
        <div class="section-header reveal animate-fade-up">
            <p class="section-tag"><?php esc_html_e( 'Galeria', 'gavioli-campanha' ); ?></p>
            <h2 class="section-title"><?php esc_html_e( 'Momentos da Campanha', 'gavioli-campanha' ); ?></h2>
            <p class="desc"><?php esc_html_e( 'Registros de encontros, ações e momentos marcantes junto à comunidade.', 'gavioli-campanha' ); ?></p>
        </div>

        <?php if ( $has_gallery_sidebar ) : ?>
            <div class="gallery-block-area reveal animate-fade-up delay-1">
                <?php dynamic_sidebar( 'campaign-gallery-block' ); ?>
            </div>
        <?php else : ?>
            <div class="gallery-grid">
                <?php foreach ( $gallery_images as $i => $img ) : ?>
                    <div class="gallery-item reveal animate-scale-in delay-<?php echo esc_attr( min( $i + 1, 6 ) ); ?>">
                        <?php if ( ! empty( $img['src'] ) ) : ?>
                            <a href="<?php echo esc_url( $img['src'] ); ?>" class="gallery-link" data-gallery-lightbox="1">
                                <img
                                    src="<?php echo esc_url( $img['src'] ); ?>"
                                    alt="<?php echo esc_attr( $img['alt'] ); ?>"
                                    loading="lazy"
                                >
                            </a>
                        <?php else : ?>
                            <div style="width: 100%; height: 100%; background: var(--muted); display: flex; align-items: center; justify-content: center; color: var(--muted-foreground); font-size: 0.75rem; padding: 1rem; text-align: center;">
                                <?php echo esc_html( $img['alt'] ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
