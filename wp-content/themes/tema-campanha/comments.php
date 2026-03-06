<?php
/**
 * The template for displaying comments
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    if ( have_comments() ) {
        ?>
        <h3 class="comments-title">
            <?php
            printf(
                esc_html( _nx( '%1$s Comentário', '%1$s Comentários', get_comments_number(), 'comments title', 'campanha-eleitoral' ) ),
                number_format_i18n( get_comments_number() )
            );
            ?>
        </h3>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 48,
            ) );
            ?>
        </ol>

        <?php
        the_comments_pagination( array(
            'prev_text' => __( '&larr; Comentários Anteriores', 'campanha-eleitoral' ),
            'next_text' => __( 'Próximos Comentários &rarr;', 'campanha-eleitoral' ),
        ) );
    }

    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
        ?>
        <p class="no-comments"><?php _e( 'Os comentários estão fechados.', 'campanha-eleitoral' ); ?></p>
        <?php
    }

    if ( comments_open() ) {
        comment_form( array(
            'title_reply'          => __( 'Faça um Comentário', 'campanha-eleitoral' ),
            'title_reply_to'       => __( 'Deixe uma resposta para %s', 'campanha-eleitoral' ),
            'cancel_reply_link'    => __( 'Cancelar resposta', 'campanha-eleitoral' ),
            'label_submit'         => __( 'Enviar Comentário', 'campanha-eleitoral' ),
            'comment_notes_before' => '',
            'class_form'           => 'comment-form',
            'class_submit'         => 'button',
        ) );
    }
    ?>
</div>
