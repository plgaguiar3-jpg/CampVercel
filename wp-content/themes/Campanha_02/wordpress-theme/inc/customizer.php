<?php
/**
 * Customizer settings for the campaign theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function gavioli_customize_register( $wp_customize ) {

    /* ======================
       HERO SECTION
       ====================== */
    $wp_customize->add_section( 'gavioli_hero', array(
        'title'    => __( 'Hero / Banner Principal', 'gavioli-campanha' ),
        'priority' => 30,
    ) );

    // Hero background image
    $wp_customize->add_setting( 'hero_bg_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_bg_image', array(
        'label'   => __( 'Imagem de Fundo do Hero', 'gavioli-campanha' ),
        'section' => 'gavioli_hero',
    ) ) );

    // Hero tag
    $wp_customize->add_setting( 'hero_tag', array(
        'default'           => 'Campanha 2026',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_tag', array(
        'label'   => __( 'Etiqueta do Hero', 'gavioli-campanha' ),
        'section' => 'gavioli_hero',
        'type'    => 'text',
    ) );

    // Hero title
    $wp_customize->add_setting( 'hero_title', array(
        'default'           => 'Educação para o Futuro, <span class="text-gradient">Renovação e Compromisso</span>',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'hero_title', array(
        'label'       => __( 'Título do Hero', 'gavioli-campanha' ),
        'description' => __( 'Aceita HTML para gradient text. Use &lt;span class="text-gradient"&gt;...&lt;/span&gt;', 'gavioli-campanha' ),
        'section'     => 'gavioli_hero',
        'type'        => 'textarea',
    ) );

    // Hero subtitle
    $wp_customize->add_setting( 'hero_subtitle', array(
        'default'           => 'Prof. Fátima Gavioli — uma líder preparada e conectada com as necessidades da nossa população.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_subtitle', array(
        'label'   => __( 'Subtítulo do Hero', 'gavioli-campanha' ),
        'section' => 'gavioli_hero',
        'type'    => 'textarea',
    ) );

    // Hero CTA 1 text
    $wp_customize->add_setting( 'hero_cta1_text', array(
        'default'           => 'Conheça as Propostas',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_cta1_text', array(
        'label'   => __( 'Texto Botão Primário', 'gavioli-campanha' ),
        'section' => 'gavioli_hero',
        'type'    => 'text',
    ) );

    // Hero CTA 2 text
    $wp_customize->add_setting( 'hero_cta2_text', array(
        'default'           => 'Junte-se ao Time',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_cta2_text', array(
        'label'   => __( 'Texto Botão Secundário', 'gavioli-campanha' ),
        'section' => 'gavioli_hero',
        'type'    => 'text',
    ) );

    /* ======================
       ABOUT SECTION
       ====================== */
    $wp_customize->add_section( 'gavioli_about', array(
        'title'    => __( 'Seção Sobre', 'gavioli-campanha' ),
        'priority' => 31,
    ) );

    $wp_customize->add_setting( 'about_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_image', array(
        'label'   => __( 'Foto da Candidata', 'gavioli-campanha' ),
        'section' => 'gavioli_about',
    ) ) );

    $wp_customize->add_setting( 'about_name', array(
        'default'           => 'Prof. Fátima Gavioli',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'about_name', array(
        'label'   => __( 'Nome Exibido', 'gavioli-campanha' ),
        'section' => 'gavioli_about',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'about_text_1', array(
        'default'           => 'Professora, mãe e líder comunitária, Fátima Gavioli dedicou mais de 25 anos à educação pública, formando gerações de cidadãos comprometidos. Sua trajetória política é marcada pelo diálogo, transparência e pela busca incansável de melhorias reais para a população.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'about_text_1', array(
        'label'   => __( 'Parágrafo 1', 'gavioli-campanha' ),
        'section' => 'gavioli_about',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'about_text_2', array(
        'default'           => 'Com raízes profundas na comunidade, ela acredita que a transformação começa pela educação de qualidade, pela saúde acessível e pelo respeito às pessoas. Sua candidatura representa a renovação com experiência.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'about_text_2', array(
        'label'   => __( 'Parágrafo 2', 'gavioli-campanha' ),
        'section' => 'gavioli_about',
        'type'    => 'textarea',
    ) );

    /* ======================
       CONTACT SECTION
       ====================== */
    $wp_customize->add_section( 'gavioli_contact', array(
        'title'    => __( 'Seção Contato', 'gavioli-campanha' ),
        'priority' => 35,
    ) );

    $wp_customize->add_setting( 'contact_phone', array(
        'default'           => '(11) 99999-0000',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'contact_phone', array(
        'label'   => __( 'Telefone / WhatsApp', 'gavioli-campanha' ),
        'section' => 'gavioli_contact',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'contact_email', array(
        'default'           => 'contato@fatimagavioli.com.br',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'contact_email', array(
        'label'   => __( 'E-mail de Contato', 'gavioli-campanha' ),
        'section' => 'gavioli_contact',
        'type'    => 'email',
    ) );

    $wp_customize->add_setting( 'social_instagram', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'social_instagram', array(
        'label'   => __( 'URL Instagram', 'gavioli-campanha' ),
        'section' => 'gavioli_contact',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'social_facebook', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'social_facebook', array(
        'label'   => __( 'URL Facebook', 'gavioli-campanha' ),
        'section' => 'gavioli_contact',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'social_youtube', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'social_youtube', array(
        'label'   => __( 'URL YouTube', 'gavioli-campanha' ),
        'section' => 'gavioli_contact',
        'type'    => 'url',
    ) );

    /* ======================
       FOOTER
       ====================== */
    $wp_customize->add_section( 'gavioli_footer', array(
        'title'    => __( 'Rodapé', 'gavioli-campanha' ),
        'priority' => 36,
    ) );

    $wp_customize->add_setting( 'footer_tagline', array(
        'default'           => 'Educação, Renovação e Compromisso.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'footer_tagline', array(
        'label'   => __( 'Slogan do Rodapé', 'gavioli-campanha' ),
        'section' => 'gavioli_footer',
        'type'    => 'text',
    ) );
}
add_action( 'customize_register', 'gavioli_customize_register' );
