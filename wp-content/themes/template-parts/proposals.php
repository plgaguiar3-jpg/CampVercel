<?php
/**
 * Proposals Section
 */

$proposals = array(
    array(
        'icon'  => 'book-open',
        'title' => 'Educação de Qualidade',
        'desc'  => 'Valorização dos professores, escolas em tempo integral e tecnologia na sala de aula para preparar nossas crianças para o futuro.',
    ),
    array(
        'icon'  => 'stethoscope',
        'title' => 'Saúde Acessível',
        'desc'  => 'Postos de saúde modernos, atendimento humanizado e redução das filas com gestão eficiente e transparente.',
    ),
    array(
        'icon'  => 'trending-up',
        'title' => 'Economia Local',
        'desc'  => 'Incentivo ao empreendedorismo, geração de empregos e programas de capacitação profissional para jovens e adultos.',
    ),
    array(
        'icon'  => 'shield',
        'title' => 'Segurança Comunitária',
        'desc'  => 'Iluminação pública, integração com forças de segurança e programas sociais de prevenção à violência.',
    ),
    array(
        'icon'  => 'leaf',
        'title' => 'Meio Ambiente',
        'desc'  => 'Preservação de áreas verdes, coleta seletiva ampliada e educação ambiental nas escolas e comunidades.',
    ),
    array(
        'icon'  => 'home',
        'title' => 'Infraestrutura',
        'desc'  => 'Ruas pavimentadas, saneamento básico para todos e espaços públicos de lazer bem cuidados.',
    ),
);
?>

<section id="propostas" class="section-padding section-alt">
    <div class="container">
        <div class="section-header reveal animate-fade-up">
            <p class="section-tag"><?php esc_html_e( 'Plano de Governo', 'gavioli-campanha' ); ?></p>
            <h2 class="section-title"><?php esc_html_e( 'Propostas para Transformar', 'gavioli-campanha' ); ?></h2>
            <p class="desc"><?php esc_html_e( 'Conheça os pilares do nosso plano: ações concretas focadas no que realmente importa para a nossa comunidade.', 'gavioli-campanha' ); ?></p>
        </div>

        <div class="proposals-grid">
            <?php foreach ( $proposals as $i => $p ) : ?>
                <div class="proposal-card reveal animate-fade-up delay-<?php echo esc_attr( $i + 1 ); ?>">
                    <div class="proposal-icon">
                        <?php echo gavioli_svg_icon( $p['icon'] ); ?>
                    </div>
                    <h3><?php echo esc_html( $p['title'] ); ?></h3>
                    <p><?php echo esc_html( $p['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
