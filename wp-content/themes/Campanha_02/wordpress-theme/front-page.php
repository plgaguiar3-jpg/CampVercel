<?php
/**
 * Template Name: Página Inicial da Campanha
 * Front page template — assembles all campaign sections.
 */

get_header();
?>

<div class="min-h-screen">
    <?php
    get_template_part( 'template-parts/hero' );
    get_template_part( 'template-parts/about' );
    get_template_part( 'template-parts/proposals' );
    get_template_part( 'template-parts/news' );
    get_template_part( 'template-parts/gallery' );
    get_template_part( 'template-parts/testimonials' );
    get_template_part( 'template-parts/contact' );
    ?>
</div>

<?php
get_footer();
