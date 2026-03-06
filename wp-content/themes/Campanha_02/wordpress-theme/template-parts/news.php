<?php
/**
 * News Section — pulls latest 3 posts
 */

$news_query = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
) );

// Default posts if no real posts exist yet
$default_news = array(
    array(
        'date'    => '28 Fev 2026',
        'title'   => 'Fátima Gavioli lança oficialmente sua campanha',
        'excerpt' => 'Em evento emocionante, a candidata apresentou suas propostas para educação e saúde diante de mais de 2 mil apoiadores.',
        'tag'     => 'Campanha',
    ),
    array(
        'date'    => '15 Fev 2026',
        'title'   => 'Encontro com educadores na Câmara Municipal',
        'excerpt' => 'Reunião produtiva com professores e gestores escolares para discutir melhorias na rede de ensino.',
        'tag'     => 'Educação',
    ),
    array(
        'date'    => '02 Fev 2026',
        'title'   => 'Mutirão de saúde no bairro Jardim Esperança',
        'excerpt' => 'Ação comunitária organizada com médicos voluntários atendeu mais de 300 famílias.',
        'tag'     => 'Saúde',
    ),
);
?>

<section id="noticias" class="section-padding">
    <div class="container">
        <div class="section-header reveal animate-fade-up">
            <p class="section-tag"><?php esc_html_e( 'Fique por Dentro', 'gavioli-campanha' ); ?></p>
            <h2 class="section-title"><?php esc_html_e( 'Notícias e Agenda', 'gavioli-campanha' ); ?></h2>
            <p class="desc"><?php esc_html_e( 'Acompanhe as últimas novidades da campanha e os próximos eventos.', 'gavioli-campanha' ); ?></p>
        </div>

        <div class="news-grid">
            <?php if ( $news_query->have_posts() ) : ?>
                <?php
                $i = 0;
                while ( $news_query->have_posts() ) :
                    $news_query->the_post();
                    $i++;
                    $categories = get_the_category();
                    $cat_name   = ! empty( $categories ) ? $categories[0]->name : 'Campanha';
                ?>
                    <article class="news-card reveal animate-fade-up delay-<?php echo esc_attr( $i ); ?>">
                        <div class="news-card-bar"></div>
                        <div class="news-card-body">
                            <div class="news-meta">
                                <?php echo gavioli_svg_icon( 'calendar' ); ?>
                                <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>">
                                    <?php echo esc_html( get_the_date( 'd M Y' ) ); ?>
                                </time>
                                <span class="news-tag"><?php echo esc_html( $cat_name ); ?></span>
                            </div>
                            <h3><?php the_title(); ?></h3>
                            <p class="excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="news-read-more">
                                <?php esc_html_e( 'Ler mais', 'gavioli-campanha' ); ?>
                                <?php echo gavioli_svg_icon( 'arrow-right' ); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <!-- Default / placeholder news -->
                <?php foreach ( $default_news as $i => $item ) : ?>
                    <article class="news-card reveal animate-fade-up delay-<?php echo esc_attr( $i + 1 ); ?>">
                        <div class="news-card-bar"></div>
                        <div class="news-card-body">
                            <div class="news-meta">
                                <?php echo gavioli_svg_icon( 'calendar' ); ?>
                                <?php echo esc_html( $item['date'] ); ?>
                                <span class="news-tag"><?php echo esc_html( $item['tag'] ); ?></span>
                            </div>
                            <h3><?php echo esc_html( $item['title'] ); ?></h3>
                            <p class="excerpt"><?php echo esc_html( $item['excerpt'] ); ?></p>
                            <span class="news-read-more">
                                <?php esc_html_e( 'Ler mais', 'gavioli-campanha' ); ?>
                                <?php echo gavioli_svg_icon( 'arrow-right' ); ?>
                            </span>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
