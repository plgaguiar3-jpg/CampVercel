<?php
/**
 * Contact Section
 */

$phone = get_theme_mod( 'contact_phone', '(11) 99999-0000' );
$email = get_theme_mod( 'contact_email', 'contato@fatimagavioli.com.br' );
$ig    = get_theme_mod( 'social_instagram', '#' );
$fb    = get_theme_mod( 'social_facebook', '#' );
$yt    = get_theme_mod( 'social_youtube', '#' );
?>

<section id="contato" class="section-padding section-alt">
    <div class="container">
        <div class="contact-grid">
            <!-- Info -->
            <div class="reveal animate-fade-left">
                <p class="section-tag"><?php esc_html_e( 'Fale Conosco', 'gavioli-campanha' ); ?></p>
                <h2 class="section-title"><?php esc_html_e( 'Participe da Campanha', 'gavioli-campanha' ); ?></h2>
                <p class="about-text" style="margin-bottom: 2rem;">
                    <?php esc_html_e( 'Quer se voluntariar, fazer uma pergunta ou enviar uma sugestão? Entre em contato com nossa equipe. Sua voz é importante para construirmos juntos uma cidade melhor.', 'gavioli-campanha' ); ?>
                </p>

                <div>
                    <div class="contact-info-item">
                        <?php echo gavioli_svg_icon( 'message-circle' ); ?>
                        <span><?php echo esc_html( $phone ); ?></span>
                    </div>
                    <div class="contact-info-item">
                        <?php echo gavioli_svg_icon( 'send' ); ?>
                        <span><?php echo esc_html( $email ); ?></span>
                    </div>
                </div>

                <div class="social-links">
                    <?php if ( $ig && '#' !== $ig ) : ?>
                        <a href="<?php echo esc_url( $ig ); ?>" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <?php echo gavioli_svg_icon( 'instagram' ); ?>
                        </a>
                    <?php else : ?>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <?php echo gavioli_svg_icon( 'instagram' ); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ( $fb && '#' !== $fb ) : ?>
                        <a href="<?php echo esc_url( $fb ); ?>" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <?php echo gavioli_svg_icon( 'facebook' ); ?>
                        </a>
                    <?php else : ?>
                        <a href="#" class="social-link" aria-label="Facebook">
                            <?php echo gavioli_svg_icon( 'facebook' ); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ( $yt && '#' !== $yt ) : ?>
                        <a href="<?php echo esc_url( $yt ); ?>" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                            <?php echo gavioli_svg_icon( 'youtube' ); ?>
                        </a>
                    <?php else : ?>
                        <a href="#" class="social-link" aria-label="YouTube">
                            <?php echo gavioli_svg_icon( 'youtube' ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Form -->
            <div class="reveal animate-fade-right delay-2">
                <form class="contact-form" id="gavioli-contact-form">
                    <div id="form-message"></div>

                    <div class="form-group">
                        <label for="contact-name"><?php esc_html_e( 'Nome', 'gavioli-campanha' ); ?></label>
                        <input
                            type="text"
                            id="contact-name"
                            name="name"
                            required
                            placeholder="<?php esc_attr_e( 'Seu nome completo', 'gavioli-campanha' ); ?>"
                        >
                    </div>

                    <div class="form-group">
                        <label for="contact-email"><?php esc_html_e( 'E-mail', 'gavioli-campanha' ); ?></label>
                        <input
                            type="email"
                            id="contact-email"
                            name="email"
                            required
                            placeholder="<?php esc_attr_e( 'seu@email.com', 'gavioli-campanha' ); ?>"
                        >
                    </div>

                    <div class="form-group">
                        <label for="contact-message"><?php esc_html_e( 'Mensagem', 'gavioli-campanha' ); ?></label>
                        <textarea
                            id="contact-message"
                            name="message"
                            rows="4"
                            required
                            placeholder="<?php esc_attr_e( 'Sua mensagem, sugestão ou pergunta...', 'gavioli-campanha' ); ?>"
                        ></textarea>
                    </div>

                    <button type="submit" class="form-submit">
                        <?php esc_html_e( 'Enviar Mensagem', 'gavioli-campanha' ); ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
