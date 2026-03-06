<?php
/**
 * Hero Section
 */

$hero_bg    = get_theme_mod( 'hero_bg_image', '' );
$hero_tag   = get_theme_mod( 'hero_tag', 'Campanha 2026' );
$hero_title = get_theme_mod( 'hero_title', 'Educação para o Futuro, <span class="text-gradient">Renovação e Compromisso</span>' );
$hero_sub   = get_theme_mod( 'hero_subtitle', 'Prof. Fátima Gavioli — uma líder preparada e conectada com as necessidades da nossa população.' );
$cta1_text  = get_theme_mod( 'hero_cta1_text', 'Conheça as Propostas' );
$cta2_text  = get_theme_mod( 'hero_cta2_text', 'Junte-se ao Time' );
?>

<section id="inicio" class="hero-section">
    <?php if ( $hero_bg ) : ?>
        <img
            src="<?php echo esc_url( $hero_bg ); ?>"
            alt="<?php esc_attr_e( 'Prof. Fátima Gavioli discursando para a comunidade', 'gavioli-campanha' ); ?>"
            class="hero-bg"
        >
    <?php else : ?>
        <div class="hero-bg" style="background: linear-gradient(135deg, hsl(215, 65%, 28%) 0%, hsl(215, 50%, 18%) 100%);"></div>
    <?php endif; ?>

    <div class="hero-overlay"></div>

    <div class="hero-content container reveal animate-fade-up">
        <p class="hero-tag"><?php echo esc_html( $hero_tag ); ?></p>
        <h1 class="hero-title"><?php echo wp_kses_post( $hero_title ); ?></h1>
        <p class="hero-subtitle"><?php echo esc_html( $hero_sub ); ?></p>

        <div class="hero-buttons">
            <a href="#propostas" class="btn-primary"><?php echo esc_html( $cta1_text ); ?></a>
            <a href="#contato" class="btn-outline"><?php echo esc_html( $cta2_text ); ?></a>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="scroll-indicator">
        <div class="dot"></div>
    </div>
</section>
