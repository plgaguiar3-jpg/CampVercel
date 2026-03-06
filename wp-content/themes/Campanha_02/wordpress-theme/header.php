<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Navbar -->
<nav class="site-navbar" role="navigation" aria-label="<?php esc_attr_e( 'Menu principal', 'gavioli-campanha' ); ?>">
    <?php
    $is_anchor_context = is_front_page() || is_home();
    $anchor_base       = $is_anchor_context ? '' : trailingslashit( home_url() );
    ?>
    <div class="container navbar-inner">
        <a href="<?php echo esc_url( $anchor_base . '#inicio' ); ?>" class="navbar-brand">
            Fátima <span class="accent">Gavioli</span>
        </a>

        <!-- Desktop menu -->
        <ul class="navbar-menu">
            <li><a href="<?php echo esc_url( $anchor_base . '#inicio' ); ?>"><?php esc_html_e( 'Início', 'gavioli-campanha' ); ?></a></li>
            <li><a href="<?php echo esc_url( $anchor_base . '#sobre' ); ?>"><?php esc_html_e( 'Sobre', 'gavioli-campanha' ); ?></a></li>
            <li><a href="<?php echo esc_url( $anchor_base . '#propostas' ); ?>"><?php esc_html_e( 'Propostas', 'gavioli-campanha' ); ?></a></li>
            <li><a href="<?php echo esc_url( $anchor_base . '#noticias' ); ?>"><?php esc_html_e( 'Notícias', 'gavioli-campanha' ); ?></a></li>
            <li><a href="<?php echo esc_url( $anchor_base . '#galeria' ); ?>"><?php esc_html_e( 'Galeria', 'gavioli-campanha' ); ?></a></li>
            <li><a href="<?php echo esc_url( $anchor_base . '#depoimentos' ); ?>"><?php esc_html_e( 'Depoimentos', 'gavioli-campanha' ); ?></a></li>
            <li><a href="<?php echo esc_url( $anchor_base . '#contato' ); ?>"><?php esc_html_e( 'Contato', 'gavioli-campanha' ); ?></a></li>
        </ul>

        <!-- Mobile toggle -->
        <button class="navbar-toggle" id="navbar-toggle" aria-label="<?php esc_attr_e( 'Abrir menu', 'gavioli-campanha' ); ?>" aria-expanded="false">
            <span class="icon-menu"><?php echo gavioli_svg_icon( 'menu' ); ?></span>
            <span class="icon-close" style="display:none;"><?php echo gavioli_svg_icon( 'x' ); ?></span>
        </button>
    </div>

    <!-- Mobile menu -->
    <div class="navbar-mobile" id="navbar-mobile">
        <a href="<?php echo esc_url( $anchor_base . '#inicio' ); ?>"><?php esc_html_e( 'Início', 'gavioli-campanha' ); ?></a>
        <a href="<?php echo esc_url( $anchor_base . '#sobre' ); ?>"><?php esc_html_e( 'Sobre', 'gavioli-campanha' ); ?></a>
        <a href="<?php echo esc_url( $anchor_base . '#propostas' ); ?>"><?php esc_html_e( 'Propostas', 'gavioli-campanha' ); ?></a>
        <a href="<?php echo esc_url( $anchor_base . '#noticias' ); ?>"><?php esc_html_e( 'Notícias', 'gavioli-campanha' ); ?></a>
        <a href="<?php echo esc_url( $anchor_base . '#galeria' ); ?>"><?php esc_html_e( 'Galeria', 'gavioli-campanha' ); ?></a>
        <a href="<?php echo esc_url( $anchor_base . '#depoimentos' ); ?>"><?php esc_html_e( 'Depoimentos', 'gavioli-campanha' ); ?></a>
        <a href="<?php echo esc_url( $anchor_base . '#contato' ); ?>"><?php esc_html_e( 'Contato', 'gavioli-campanha' ); ?></a>
    </div>
</nav>
