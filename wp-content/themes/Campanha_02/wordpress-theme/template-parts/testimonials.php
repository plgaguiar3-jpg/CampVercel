<?php
/**
 * Testimonials Section
 */

$testimonials = array(
    array(
        'quote' => 'A Fátima é a pessoa mais preparada que conheço para transformar nossa cidade. Sua dedicação à educação é inspiradora.',
        'name'  => 'Maria Santos',
        'role'  => 'Professora aposentada',
    ),
    array(
        'quote' => 'Ela realmente ouve a comunidade. No meu bairro, foi a única que veio conversar e ouvir nossas demandas de verdade.',
        'name'  => 'Carlos Oliveira',
        'role'  => 'Líder comunitário',
    ),
    array(
        'quote' => 'Como mãe, confio na Fátima para cuidar do futuro dos nossos filhos. Ela sabe o que é educação na prática.',
        'name'  => 'Ana Paula Ferreira',
        'role'  => 'Mãe e empreendedora',
    ),
);
?>

<section id="depoimentos" class="section-padding">
    <div class="container">
        <div class="section-header reveal animate-fade-up">
            <p class="section-tag"><?php esc_html_e( 'Apoios', 'gavioli-campanha' ); ?></p>
            <h2 class="section-title"><?php esc_html_e( 'O Que Dizem Sobre Fátima', 'gavioli-campanha' ); ?></h2>
        </div>

        <div class="testimonials-grid">
            <?php foreach ( $testimonials as $i => $t ) : ?>
                <div class="testimonial-card reveal animate-fade-up delay-<?php echo esc_attr( $i + 1 ); ?>">
                    <span class="testimonial-quote-icon">
                        <?php echo gavioli_svg_icon( 'quote' ); ?>
                    </span>
                    <p class="testimonial-text">"<?php echo esc_html( $t['quote'] ); ?>"</p>
                    <div>
                        <p class="testimonial-author"><?php echo esc_html( $t['name'] ); ?></p>
                        <p class="testimonial-role"><?php echo esc_html( $t['role'] ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
