<?php
/**
 * About Section
 */

$about_img  = get_theme_mod( 'about_image', '' );
$about_name = get_theme_mod( 'about_name', 'Prof. Fátima Gavioli' );
$about_p1   = get_theme_mod( 'about_text_1', 'Professora, mãe e líder comunitária, Fátima Gavioli dedicou mais de 25 anos à educação pública, formando gerações de cidadãos comprometidos. Sua trajetória política é marcada pelo diálogo, transparência e pela busca incansável de melhorias reais para a população.' );
$about_p2   = get_theme_mod( 'about_text_2', 'Com raízes profundas na comunidade, ela acredita que a transformação começa pela educação de qualidade, pela saúde acessível e pelo respeito às pessoas. Sua candidatura representa a renovação com experiência.' );

$milestones = array(
    array( 'icon' => 'graduation-cap', 'label' => '25+ anos',     'desc' => 'em Educação' ),
    array( 'icon' => 'users',          'label' => '3 mandatos',   'desc' => 'de atuação pública' ),
    array( 'icon' => 'heart',          'label' => 'Comunidade',   'desc' => 'sempre em primeiro lugar' ),
    array( 'icon' => 'award',          'label' => 'Reconhecida',  'desc' => 'por excelência profissional' ),
);
?>

<section id="sobre" class="section-padding">
    <div class="container">
        <div class="about-grid">
            <!-- Image -->
            <div class="about-image-wrap reveal animate-fade-left">
                <?php if ( $about_img ) : ?>
                    <img
                        src="<?php echo esc_url( $about_img ); ?>"
                        alt="<?php echo esc_attr( $about_name ); ?> — professora e líder comunitária"
                    >
                <?php else : ?>
                    <div style="background: var(--muted); width: 100%; aspect-ratio: 3/4; border-radius: 1rem;"></div>
                <?php endif; ?>
                <div class="about-decor-1"></div>
                <div class="about-decor-2"></div>
            </div>

            <!-- Text -->
            <div class="reveal animate-fade-right delay-2">
                <p class="section-tag"><?php esc_html_e( 'Sobre a Candidata', 'gavioli-campanha' ); ?></p>
                <h2 class="section-title"><?php echo esc_html( $about_name ); ?></h2>
                <p class="about-text"><?php echo esc_html( $about_p1 ); ?></p>
                <p class="about-text" style="margin-bottom: 2rem;"><?php echo esc_html( $about_p2 ); ?></p>

                <!-- Milestones -->
                <div class="milestones-grid">
                    <?php foreach ( $milestones as $m ) : ?>
                        <div class="milestone-card">
                            <div class="milestone-icon">
                                <?php echo gavioli_svg_icon( $m['icon'] ); ?>
                            </div>
                            <div>
                                <p class="milestone-label"><?php echo esc_html( $m['label'] ); ?></p>
                                <p class="milestone-desc"><?php echo esc_html( $m['desc'] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
