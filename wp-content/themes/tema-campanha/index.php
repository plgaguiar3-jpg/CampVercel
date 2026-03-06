<?php
/**
 * The main template file
 */
get_header();
?>

<div class="container">
    <!-- HERO SECTION -->
    <div class="hero" style="background-image: linear-gradient(rgba(30, 60, 114, 0.7), rgba(42, 82, 152, 0.7)), url('https://images.unsplash.com/photo-1552664730-d307ca884978?w=1920&h=600&fit=crop');  background-size: cover; background-position: center;">
        <h1><?php bloginfo( 'name' ); ?></h1>
        <p><?php bloginfo( 'description' ); ?></p>
        <a href="#propostas" class="button"><?php _e( 'Saiba Mais', 'campanha-eleitoral' ); ?></a>
    </div>
</div>

<div id="content" class="site-content">
    <!-- PROPOSTAS SECTION -->
    <section class="propostas-section" id="propostas">
        <div class="container">
            <h2><?php _e( 'Propostas Impactantes', 'campanha-eleitoral' ); ?></h2>
            <p class="subtitle"><?php _e( 'Um futuro melhor para todos nós.', 'campanha-eleitoral' ); ?></p>
            
            <div class="propostas-grid">
                <?php
                $propostas = new WP_Query( array(
                    'post_type' => 'post',
                    'category_name' => 'propostas',
                    'posts_per_page' => 5,
                ) );

                if ( $propostas->have_posts() ) {
                    $imagens_propostas = array(
                        'https://images.unsplash.com/photo-1576091160550-112fad34e55d?w=400&h=300&fit=crop', // Saúde
                        'https://images.unsplash.com/photo-1427504494785-cdreaca3a112?w=400&h=300&fit=crop', // Educação
                        'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400&h=300&fit=crop', // Segurança
                        'https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=400&h=300&fit=crop', // Economia
                        'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=400&h=300&fit=crop', // Meio ambiente
                    );
                    $count = 0;
                    while ( $propostas->have_posts() ) {
                        $propostas->the_post();
                        $imagem_url = isset( $imagens_propostas[$count] ) ? $imagens_propostas[$count] : $imagens_propostas[0];
                        ?>
                        <div class="proposta-card">
                            <img src="<?php echo esc_url( $imagem_url ); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px 8px 0 0; margin: -2rem -2rem 1rem;">
                            <h4><?php the_title(); ?></h4>
                            <p><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn-saiba-mais"><?php _e( 'Saiba Mais', 'campanha-eleitoral' ); ?></a>
                        </div>
                        <?php
                        $count++;
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->

<?php get_footer();
