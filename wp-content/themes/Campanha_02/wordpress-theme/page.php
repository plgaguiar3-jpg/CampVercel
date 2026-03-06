<?php
/**
 * Generic page template
 */

get_header();
?>

<main class="section-padding" style="padding-top: 6rem;">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
        ?>
            <article>
                <h1 class="section-title"><?php the_title(); ?></h1>
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();
