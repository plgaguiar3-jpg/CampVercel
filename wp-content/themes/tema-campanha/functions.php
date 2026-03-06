<?php
/**
 * Campanha Eleitoral Theme Functions
 */

// Define theme constants
define( 'CAMPANHA_VERSION', '1.0.0' );
define( 'CAMPANHA_DIR', get_template_directory() );
define( 'CAMPANHA_URI', get_template_directory_uri() );

/**
 * Set up theme defaults and register support for various WordPress features
 */
function campanha_setup() {
    // Suporta tradução
    load_theme_textdomain( 'campanha-eleitoral', CAMPANHA_DIR . '/languages' );

    // Adiciona suporte para título dinâmico
    add_theme_support( 'title-tag' );

    // Adiciona suporte para thumbnails
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 600, true );
    add_image_size( 'campanha-card', 400, 300, true );
    add_image_size( 'campanha-hero', 1920, 600, true );

    // Registra menu
    register_nav_menus( array(
        'primary'   => __( 'Principal', 'campanha-eleitoral' ),
        'secondary' => __( 'Secundário', 'campanha-eleitoral' ),
        'footer'    => __( 'Rodapé', 'campanha-eleitoral' ),
    ) );

    // HTML5
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    // Suporta logo customizado
    add_theme_support( 'custom-logo' );

    // Suporta modo escuro
    add_theme_support( 'dark-mode' );

    // Suporte para blocos
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'campanha_setup' );

/**
 * Register widget areas
 */
function campanha_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Barra Lateral Principal', 'campanha-eleitoral' ),
        'id'            => 'primary-sidebar',
        'description'   => __( 'Barra lateral principal', 'campanha-eleitoral' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Rodapé', 'campanha-eleitoral' ),
        'id'            => 'footer-sidebar',
        'description'   => __( 'Widget de rodapé', 'campanha-eleitoral' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'campanha_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function campanha_enqueue_scripts() {
    // CSS
    wp_enqueue_style( 'campanha-style', CAMPANHA_URI . '/style.css', array(), CAMPANHA_VERSION );

    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;500;600;700;800&display=swap' );

    // JavaScript
    wp_enqueue_script( 'campanha-main', CAMPANHA_URI . '/assets/js/main.js', array(), CAMPANHA_VERSION, true );

    // Comment reply
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'campanha_enqueue_scripts' );

/**
 * Registrar Custom Post Type: Candidato
 */
function campanha_register_post_types() {
    // Candidato
    register_post_type( 'candidato', array(
        'labels' => array(
            'name'               => __( 'Candidatos', 'campanha-eleitoral' ),
            'singular_name'      => __( 'Candidato', 'campanha-eleitoral' ),
            'menu_name'          => __( 'Candidatos', 'campanha-eleitoral' ),
            'all_items'          => __( 'Todos os Candidatos', 'campanha-eleitoral' ),
            'view_item'          => __( 'Ver Candidato', 'campanha-eleitoral' ),
            'add_new_item'       => __( 'Adicionar Novo Candidato', 'campanha-eleitoral' ),
            'edit_item'          => __( 'Editar Candidato', 'campanha-eleitoral' ),
        ),
        'description'        => 'Post type para candidatos',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'candidatos' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-id-alt',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    ) );

    // Evento
    register_post_type( 'evento', array(
        'labels' => array(
            'name'               => __( 'Eventos', 'campanha-eleitoral' ),
            'singular_name'      => __( 'Evento', 'campanha-eleitoral' ),
            'menu_name'          => __( 'Eventos', 'campanha-eleitoral' ),
        ),
        'description'        => 'Post type para eventos de campanha',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'            => array( 'slug' => 'eventos' ),
        'has_archive'        => true,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    ) );

    // Proposta
    register_post_type( 'proposta', array(
        'labels' => array(
            'name'               => __( 'Propostas', 'campanha-eleitoral' ),
            'singular_name'      => __( 'Proposta', 'campanha-eleitoral' ),
            'menu_name'          => __( 'Propostas', 'campanha-eleitoral' ),
        ),
        'description'        => 'Post type para propostas do candidato',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'            => array( 'slug' => 'propostas' ),
        'has_archive'        => true,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-lightbulb',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'show_in_rest'       => true,
    ) );

    // Doação
    register_post_type( 'doacao', array(
        'labels' => array(
            'name'               => __( 'Doações', 'campanha-eleitoral' ),
            'singular_name'      => __( 'Doação', 'campanha-eleitoral' ),
            'menu_name'          => __( 'Doações', 'campanha-eleitoral' ),
        ),
        'description'        => 'Post type para gerenciar doações',
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'capability_type'    => 'post',
        'supports'           => array( 'title', 'custom-fields' ),
        'menu_position'      => 8,
        'menu_icon'          => 'dashicons-money-alt',
    ) );
}
add_action( 'init', 'campanha_register_post_types' );

/**
 * Registrar Taxonomias
 */
function campanha_register_taxonomies() {
    // Categoria de Propostas
    register_taxonomy( 'categoria_proposta', 'proposta', array(
        'label'             => __( 'Categorias', 'campanha-eleitoral' ),
        'rewrite'           => array( 'slug' => 'categoria-proposta' ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
    ) );

    // Tipo de Evento
    register_taxonomy( 'tipo_evento', 'evento', array(
        'label'             => __( 'Tipo de Evento', 'campanha-eleitoral' ),
        'rewrite'           => array( 'slug' => 'tipo-evento' ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
    ) );
}
add_action( 'init', 'campanha_register_taxonomies' );

/**
 * Meta Boxes personalizadas
 */
function campanha_add_meta_boxes() {
    // Meta box para Candidato
    add_meta_box(
        'candidato_info',
        __( 'Informações do Candidato', 'campanha-eleitoral' ),
        'campanha_candidato_callback',
        'candidato',
        'normal',
        'high'
    );

    // Meta box para Evento
    add_meta_box(
        'evento_info',
        __( 'Detalhes do Evento', 'campanha-eleitoral' ),
        'campanha_evento_callback',
        'evento',
        'normal',
        'high'
    );

    // Meta box para Proposta
    add_meta_box(
        'proposta_info',
        __( 'Detalhes da Proposta', 'campanha-eleitoral' ),
        'campanha_proposta_callback',
        'proposta',
        'normal',
        'high'
    );

    // Meta box para Doação
    add_meta_box(
        'doacao_info',
        __( 'Informações da Doação', 'campanha-eleitoral' ),
        'campanha_doacao_callback',
        'doacao',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'campanha_add_meta_boxes' );

// Callbacks para Meta Boxes
function campanha_candidato_callback( $post ) {
    wp_nonce_field( 'campanha_candidato_nonce', 'campanha_candidato_nonce' );
    $cargo = get_post_meta( $post->ID, '_candidato_cargo', true );
    $partido = get_post_meta( $post->ID, '_candidato_partido', true );
    $numero = get_post_meta( $post->ID, '_candidato_numero', true );
    $email = get_post_meta( $post->ID, '_candidato_email', true );
    $telefone = get_post_meta( $post->ID, '_candidato_telefone', true );
    ?>
    <p>
        <label for="candidato_cargo"><?php _e( 'Cargo:', 'campanha-eleitoral' ); ?></label>
        <input type="text" name="candidato_cargo" id="candidato_cargo" value="<?php echo esc_attr( $cargo ); ?>" placeholder="Ex: Prefeito, Vereador" />
    </p>
    <p>
        <label for="candidato_partido"><?php _e( 'Partido:', 'campanha-eleitoral' ); ?></label>
        <input type="text" name="candidato_partido" id="candidato_partido" value="<?php echo esc_attr( $partido ); ?>" />
    </p>
    <p>
        <label for="candidato_numero"><?php _e( 'Número:', 'campanha-eleitoral' ); ?></label>
        <input type="text" name="candidato_numero" id="candidato_numero" value="<?php echo esc_attr( $numero ); ?>" />
    </p>
    <p>
        <label for="candidato_email"><?php _e( 'E-mail:', 'campanha-eleitoral' ); ?></label>
        <input type="email" name="candidato_email" id="candidato_email" value="<?php echo esc_attr( $email ); ?>" />
    </p>
    <p>
        <label for="candidato_telefone"><?php _e( 'Telefone:', 'campanha-eleitoral' ); ?></label>
        <input type="tel" name="candidato_telefone" id="candidato_telefone" value="<?php echo esc_attr( $telefone ); ?>" />
    </p>
    <?php
}

function campanha_evento_callback( $post ) {
    wp_nonce_field( 'campanha_evento_nonce', 'campanha_evento_nonce' );
    $data = get_post_meta( $post->ID, '_evento_data', true );
    $hora = get_post_meta( $post->ID, '_evento_hora', true );
    $local = get_post_meta( $post->ID, '_evento_local', true );
    $endereco = get_post_meta( $post->ID, '_evento_endereco', true );
    ?>
    <p>
        <label for="evento_data"><?php _e( 'Data:', 'campanha-eleitoral' ); ?></label>
        <input type="date" name="evento_data" id="evento_data" value="<?php echo esc_attr( $data ); ?>" />
    </p>
    <p>
        <label for="evento_hora"><?php _e( 'Hora:', 'campanha-eleitoral' ); ?></label>
        <input type="time" name="evento_hora" id="evento_hora" value="<?php echo esc_attr( $hora ); ?>" />
    </p>
    <p>
        <label for="evento_local"><?php _e( 'Local:', 'campanha-eleitoral' ); ?></label>
        <input type="text" name="evento_local" id="evento_local" value="<?php echo esc_attr( $local ); ?>" placeholder="Nome do local" />
    </p>
    <p>
        <label for="evento_endereco"><?php _e( 'Endereço:', 'campanha-eleitoral' ); ?></label>
        <textarea name="evento_endereco" id="evento_endereco" rows="3"><?php echo esc_textarea( $endereco ); ?></textarea>
    </p>
    <?php
}

function campanha_proposta_callback( $post ) {
    wp_nonce_field( 'campanha_proposta_nonce', 'campanha_proposta_nonce' );
    $area = get_post_meta( $post->ID, '_proposta_area', true );
    $prioridade = get_post_meta( $post->ID, '_proposta_prioridade', true );
    ?>
    <p>
        <label for="proposta_area"><?php _e( 'Área:', 'campanha-eleitoral' ); ?></label>
        <input type="text" name="proposta_area" id="proposta_area" value="<?php echo esc_attr( $area ); ?>" placeholder="Ex: Saúde, Educação, Segurança" />
    </p>
    <p>
        <label for="proposta_prioridade"><?php _e( 'Prioridade:', 'campanha-eleitoral' ); ?></label>
        <select name="proposta_prioridade" id="proposta_prioridade">
            <option value=""><?php _e( 'Selecione', 'campanha-eleitoral' ); ?></option>
            <option value="alta" <?php selected( $prioridade, 'alta' ); ?>><?php _e( 'Alta', 'campanha-eleitoral' ); ?></option>
            <option value="media" <?php selected( $prioridade, 'media' ); ?>><?php _e( 'Média', 'campanha-eleitoral' ); ?></option>
            <option value="baixa" <?php selected( $prioridade, 'baixa' ); ?>><?php _e( 'Baixa', 'campanha-eleitoral' ); ?></option>
        </select>
    </p>
    <?php
}

function campanha_doacao_callback( $post ) {
    wp_nonce_field( 'campanha_doacao_nonce', 'campanha_doacao_nonce' );
    $valor = get_post_meta( $post->ID, '_doacao_valor', true );
    $doador = get_post_meta( $post->ID, '_doacao_doador', true );
    $data_doacao = get_post_meta( $post->ID, '_doacao_data', true );
    $status = get_post_meta( $post->ID, '_doacao_status', true );
    ?>
    <p>
        <label for="doacao_valor"><?php _e( 'Valor:', 'campanha-eleitoral' ); ?></label>
        <input type="number" name="doacao_valor" id="doacao_valor" value="<?php echo esc_attr( $valor ); ?>" step="0.01" />
    </p>
    <p>
        <label for="doacao_doador"><?php _e( 'Doador:', 'campanha-eleitoral' ); ?></label>
        <input type="text" name="doacao_doador" id="doacao_doador" value="<?php echo esc_attr( $doador ); ?>" />
    </p>
    <p>
        <label for="doacao_data"><?php _e( 'Data da Doação:', 'campanha-eleitoral' ); ?></label>
        <input type="date" name="doacao_data" id="doacao_data" value="<?php echo esc_attr( $data_doacao ); ?>" />
    </p>
    <p>
        <label for="doacao_status"><?php _e( 'Status:', 'campanha-eleitoral' ); ?></label>
        <select name="doacao_status" id="doacao_status">
            <option value="pendente" <?php selected( $status, 'pendente' ); ?>><?php _e( 'Pendente', 'campanha-eleitoral' ); ?></option>
            <option value="confirmada" <?php selected( $status, 'confirmada' ); ?>><?php _e( 'Confirmada', 'campanha-eleitoral' ); ?></option>
            <option value="cancelada" <?php selected( $status, 'cancelada' ); ?>><?php _e( 'Cancelada', 'campanha-eleitoral' ); ?></option>
        </select>
    </p>
    <?php
}

/**
 * Salvar Meta Boxes
 */
function campanha_save_meta_boxes( $post_id ) {
    // Candidato
    if ( isset( $_POST['campanha_candidato_nonce'] ) && wp_verify_nonce( $_POST['campanha_candidato_nonce'], 'campanha_candidato_nonce' ) ) {
        if ( isset( $_POST['candidato_cargo'] ) ) {
            update_post_meta( $post_id, '_candidato_cargo', sanitize_text_field( $_POST['candidato_cargo'] ) );
        }
        if ( isset( $_POST['candidato_partido'] ) ) {
            update_post_meta( $post_id, '_candidato_partido', sanitize_text_field( $_POST['candidato_partido'] ) );
        }
        if ( isset( $_POST['candidato_numero'] ) ) {
            update_post_meta( $post_id, '_candidato_numero', sanitize_text_field( $_POST['candidato_numero'] ) );
        }
        if ( isset( $_POST['candidato_email'] ) ) {
            update_post_meta( $post_id, '_candidato_email', sanitize_email( $_POST['candidato_email'] ) );
        }
        if ( isset( $_POST['candidato_telefone'] ) ) {
            update_post_meta( $post_id, '_candidato_telefone', sanitize_text_field( $_POST['candidato_telefone'] ) );
        }
    }

    // Evento
    if ( isset( $_POST['campanha_evento_nonce'] ) && wp_verify_nonce( $_POST['campanha_evento_nonce'], 'campanha_evento_nonce' ) ) {
        if ( isset( $_POST['evento_data'] ) ) {
            update_post_meta( $post_id, '_evento_data', sanitize_text_field( $_POST['evento_data'] ) );
        }
        if ( isset( $_POST['evento_hora'] ) ) {
            update_post_meta( $post_id, '_evento_hora', sanitize_text_field( $_POST['evento_hora'] ) );
        }
        if ( isset( $_POST['evento_local'] ) ) {
            update_post_meta( $post_id, '_evento_local', sanitize_text_field( $_POST['evento_local'] ) );
        }
        if ( isset( $_POST['evento_endereco'] ) ) {
            update_post_meta( $post_id, '_evento_endereco', sanitize_textarea_field( $_POST['evento_endereco'] ) );
        }
    }

    // Proposta
    if ( isset( $_POST['campanha_proposta_nonce'] ) && wp_verify_nonce( $_POST['campanha_proposta_nonce'], 'campanha_proposta_nonce' ) ) {
        if ( isset( $_POST['proposta_area'] ) ) {
            update_post_meta( $post_id, '_proposta_area', sanitize_text_field( $_POST['proposta_area'] ) );
        }
        if ( isset( $_POST['proposta_prioridade'] ) ) {
            update_post_meta( $post_id, '_proposta_prioridade', sanitize_text_field( $_POST['proposta_prioridade'] ) );
        }
    }

    // Doação
    if ( isset( $_POST['campanha_doacao_nonce'] ) && wp_verify_nonce( $_POST['campanha_doacao_nonce'], 'campanha_doacao_nonce' ) ) {
        if ( isset( $_POST['doacao_valor'] ) ) {
            update_post_meta( $post_id, '_doacao_valor', floatval( $_POST['doacao_valor'] ) );
        }
        if ( isset( $_POST['doacao_doador'] ) ) {
            update_post_meta( $post_id, '_doacao_doador', sanitize_text_field( $_POST['doacao_doador'] ) );
        }
        if ( isset( $_POST['doacao_data'] ) ) {
            update_post_meta( $post_id, '_doacao_data', sanitize_text_field( $_POST['doacao_data'] ) );
        }
        if ( isset( $_POST['doacao_status'] ) ) {
            update_post_meta( $post_id, '_doacao_status', sanitize_text_field( $_POST['doacao_status'] ) );
        }
    }
}
add_action( 'save_post', 'campanha_save_meta_boxes' );

/**
 * Adicionar colunas personalizadas a listagem no admin
 */
function campanha_custom_columns( $columns ) {
    return $columns;
}

/**
 * Adicionar suporte ao admin
 */
function campanha_admin_scripts() {
    wp_enqueue_style( 'campanha-admin', CAMPANHA_URI . '/assets/css/admin.css', array(), CAMPANHA_VERSION );
}
add_action( 'admin_enqueue_scripts', 'campanha_admin_scripts' );

/**
 * Template Filters
 */
function campanha_template_hierarchy() {
    // Permite uso de templates customizados
}

/**
 * Função helper para pegar informações do candidato
 */
function campanha_get_candidato_info( $post_id ) {
    $info = array(
        'cargo' => get_post_meta( $post_id, '_candidato_cargo', true ),
        'partido' => get_post_meta( $post_id, '_candidato_partido', true ),
        'numero' => get_post_meta( $post_id, '_candidato_numero', true ),
        'email' => get_post_meta( $post_id, '_candidato_email', true ),
        'telefone' => get_post_meta( $post_id, '_candidato_telefone', true ),
    );
    return $info;
}

/**
 * Função helper para pegar informações do evento
 */
function campanha_get_evento_info( $post_id ) {
    $info = array(
        'data' => get_post_meta( $post_id, '_evento_data', true ),
        'hora' => get_post_meta( $post_id, '_evento_hora', true ),
        'local' => get_post_meta( $post_id, '_evento_local', true ),
        'endereco' => get_post_meta( $post_id, '_evento_endereco', true ),
    );
    return $info;
}

/**
 * Registrar Theme Customizer Settings
 */
function campanha_customize_register( $wp_customize ) {
    // Seção de Contato
    $wp_customize->add_section(
        'campanha_contact',
        array(
            'title'       => __( 'Informações de Contato', 'campanha-eleitoral' ),
            'description' => __( 'Configure as informações de contato da campanha', 'campanha-eleitoral' ),
            'priority'    => 30,
        )
    );

    // Telefone
    $wp_customize->add_setting( 'campanha_telefone', array(
        'type'              => 'option',
        'capability'        => 'manage_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'campanha_telefone', array(
        'label'       => __( 'Telefone', 'campanha-eleitoral' ),
        'section'     => 'campanha_contact',
        'settings'    => 'campanha_telefone',
        'type'        => 'text',
    ) );

    // WhatsApp
    $wp_customize->add_setting( 'campanha_whatsapp', array(
        'type'              => 'option',
        'capability'        => 'manage_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'campanha_whatsapp', array(
        'label'       => __( 'WhatsApp', 'campanha-eleitoral' ),
        'section'     => 'campanha_contact',
        'settings'    => 'campanha_whatsapp',
        'type'        => 'text',
    ) );

    // Endereço
    $wp_customize->add_setting( 'campanha_endereco', array(
        'type'              => 'option',
        'capability'        => 'manage_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'campanha_endereco', array(
        'label'       => __( 'Endereço', 'campanha-eleitoral' ),
        'section'     => 'campanha_contact',
        'settings'    => 'campanha_endereco',
        'type'        => 'text',
    ) );

    // Horário de Atendimento
    $wp_customize->add_setting( 'campanha_horario', array(
        'type'              => 'option',
        'capability'        => 'manage_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'campanha_horario', array(
        'label'       => __( 'Horário de Atendimento', 'campanha-eleitoral' ),
        'section'     => 'campanha_contact',
        'settings'    => 'campanha_horario',
        'type'        => 'text',
    ) );
}
add_action( 'customize_register', 'campanha_customize_register' );
