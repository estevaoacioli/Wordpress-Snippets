<?php
/*function change_default_title_grupo( $title ){
     $screen = get_current_screen();
     if  ( 'fin-grupo' == $screen->post_type ) {
          $title = 'Digite o Nome da Empresa';
     }
     return $title;
}
add_filter( 'enter_title_here', 'change_default_title_grupo' );
*/

/*function fin_post_type_nota() {

	$labels = array(
		'name'                => _x( 'Notas Pessoais', 'Post Type General Name', 'text-domain' ),
		'singular_name'       => _x( 'Notas Pessoais', 'Post Type Singular Name', 'text-domain' ),
		'menu_name'           => __( 'Notas Pessoais', 'text-domain' ),
		'name_admin_bar'      => __( 'Notas Pessoais', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text-domain' ),
		'all_items'           => __( 'Todas Notas', 'text-domain' ),
		'add_new_item'        => __( 'Adicionar Novo', 'text-domain' ),
		'add_new'             => __( 'Adicionar Novo', 'text-domain' ),
		'new_item'            => __( 'Novo Item', 'text-domain' ),
		'edit_item'           => __( 'Editar plano', 'text-domain' ),
		'update_item'         => __( 'Update plano', 'text-domain' ),
		'view_item'           => __( 'Ver plano', 'text-domain' ),
		'search_items'        => __( 'Procurar plano', 'text-domain' ),
		'not_found'           => __( 'Nada Encontrado', 'text-domain' ),
		'not_found_in_trash'  => __( 'Nada na Lixeira', 'text-domain' ),
	);
	$rewrite = array(
		'slug'                => 'fin-nota',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'Notas Pessoais', 'text-domain' ),
		'description'         => __( 'Post Type Description', 'text-domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'author' ),
		//'menu_icon' => get_stylesheet_directory_uri() . '/images/member-icon.png',
		'taxonomies'          => array( '' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'fin-nota', $args );

}*/

//add_action( 'init', 'fin_post_type_nota', 10 );


// Register Custom Taxonomy
function taxonomy_marcadores() {

	$labels = array(
		'name'                       => _x( 'Marcadores', 'Marcadores privados para os favoritos', 'text-domain' ),
		'singular_name'              => _x( 'Marcador', 'Marcador privado para os favoritos', 'text-domain' ),
		'menu_name'                  => __( 'Marcadores', 'text-domain' ),
		'all_items'                  => __( 'All Items', 'text-domain' ),
		'parent_item'                => __( 'Parent Item', 'text-domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text-domain' ),
		'new_item_name'              => __( 'New Item Name', 'text-domain' ),
		'add_new_item'               => __( 'Add New Item', 'text-domain' ),
		'edit_item'                  => __( 'Edit Item', 'text-domain' ),
		'update_item'                => __( 'Update Item', 'text-domain' ),
		'view_item'                  => __( 'View Item', 'text-domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text-domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text-domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text-domain' ),
		'popular_items'              => __( 'Popular Items', 'text-domain' ),
		'search_items'               => __( 'Search Items', 'text-domain' ),
		'not_found'                  => __( 'Not Found', 'text-domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_admin_column' => true,
        'query_var' => true,
		'show_in_rest' => true,
		'capabilities' => array(
				'manage_terms' => 'edit_users', // Using 'edit_users' cap to keep this simple.
				'edit_terms'   => 'edit_users',
				'delete_terms' => 'edit_users',
				'assign_terms' => 'read',
			),	
	);
	register_taxonomy( 'marcadores', array( 'post' ), $args );

}

add_action( 'init', 'taxonomy_marcadores', 30 );

// Custom post type Planos
function fin_post_type_plano() {

	$labels = array(
		'name'                => _x( 'Planos', 'Post Type General Name', 'text-domain' ),
		'singular_name'       => _x( 'Plano', 'Post Type Singular Name', 'text-domain' ),
		'menu_name'           => __( 'Planos', 'text-domain' ),
		'name_admin_bar'      => __( 'Planos', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text-domain' ),
		'all_items'           => __( 'Todos Planos', 'text-domain' ),
		'add_new_item'        => __( 'Adicionar Novo', 'text-domain' ),
		'add_new'             => __( 'Adicionar Novo', 'text-domain' ),
		'new_item'            => __( 'Novo Item', 'text-domain' ),
		'edit_item'           => __( 'Editar plano', 'text-domain' ),
		'update_item'         => __( 'Update plano', 'text-domain' ),
		'view_item'           => __( 'Ver plano', 'text-domain' ),
		'search_items'        => __( 'Procurar plano', 'text-domain' ),
		'not_found'           => __( 'Nada Encontrado', 'text-domain' ),
		'not_found_in_trash'  => __( 'Nada na Lixeira', 'text-domain' ),
	);
	$rewrite = array(
		'slug'                => 'fin-plano',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'Planos', 'text-domain' ),
		'description'         => __( 'Post Type for plano', 'text-domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'author' ),
		'menu_icon' => 		 'dashicons-id',
		'taxonomies'          => array( '' ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'fin-plano', $args );

}

add_action( 'init', 'fin_post_type_plano', 10 );

// Register Columns
function add_fin_plano_column($columns) {
    return array_merge( $columns, 
              array( 'data_inicio' => 'Data Início', 'data_expiracao' => 'Data Expiração', 'numero_de_acessos' => 'Nº Acessos', 'status' => 'Status' ) );
}
add_filter('manage_fin-plano_posts_columns' , 'add_fin_plano_column');

// Content New Columns
function custom_fin_plano_column($column) {
    global $post;
    switch ( $column ) {

		case 'data_inicio':
			$data_inicio = get_field( 'data_inicio', $post->ID ); //get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'coy-thumbnail' ) );
			echo date('d/m/Y', strtotime($data_inicio));
			break;
		case 'data_expiracao':
			$data_expiracao = get_field( 'data_expiracao', $post->ID ); //get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'coy-thumbnail' ) );
			echo date('d/m/Y', strtotime($data_expiracao));
			break;
		case 'numero_de_acessos':
			echo $numero_de_acessos = get_field( 'numero_de_acessos', $post->ID ); //get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'coy-thumbnail' ) );
			break;
		case 'status':
			echo $plano_status = get_field( 'status', $post->ID ); //get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'coy-thumbnail' ) );
			break;			
			
    }
}

add_action( 'manage_fin-plano_posts_custom_column' , 'custom_fin_plano_column', 10, 2 );

// Custom post type Grupos
function fin_post_type_grupo() {

	$labels = array(
		'name'                => _x( 'Grupos', 'Post Type General Name', 'text-domain' ),
		'singular_name'       => _x( 'Grupo', 'Post Type Singular Name', 'text-domain' ),
		'menu_name'           => __( 'Grupos', 'text-domain' ),
		'name_admin_bar'      => __( 'Grupos', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text-domain' ),
		'all_items'           => __( 'Todos Grupos', 'text-domain' ),
		'add_new_item'        => __( 'Adicionar Novo', 'text-domain' ),
		'add_new'             => __( 'Adicionar Novo', 'text-domain' ),
		'new_item'            => __( 'Novo Item', 'text-domain' ),
		'edit_item'           => __( 'Editar Grupo', 'text-domain' ),
		'update_item'         => __( 'Update Grupo', 'text-domain' ),
		'view_item'           => __( 'Ver Grupo', 'text-domain' ),
		'search_items'        => __( 'Procurar Grupo', 'text-domain' ),
		'not_found'           => __( 'Nada Encontrado', 'text-domain' ),
		'not_found_in_trash'  => __( 'Nada na Lixeira', 'text-domain' ),
	);
	$rewrite = array(
		'slug'                => 'fin-grupo',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'Grupos', 'text-domain' ),
		'description'         => __( 'Post Type for Grupos', 'text-domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'author' ),
		'menu_icon' => 		 'dashicons-groups',
		'taxonomies'          => array( '' ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'fin-grupo', $args );

}

add_action( 'init', 'fin_post_type_grupo', 10 );

// Register Custom Taxonomy
/*function taxonomy_grupos() {

	$labels = array(
		'name'                       => _x( 'Grupos', 'Grupos para Planos', 'text-domain' ),
		'singular_name'              => _x( 'Grupos', 'Grupos para Planos', 'text-domain' ),
		'menu_name'                  => __( 'Grupos', 'text-domain' ),
		'all_items'                  => __( 'All Items', 'text-domain' ),
		'parent_item'                => __( 'Parent Item', 'text-domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text-domain' ),
		'new_item_name'              => __( 'New Item Name', 'text-domain' ),
		'add_new_item'               => __( 'Add New Item', 'text-domain' ),
		'edit_item'                  => __( 'Edit Item', 'text-domain' ),
		'update_item'                => __( 'Update Item', 'text-domain' ),
		'view_item'                  => __( 'View Item', 'text-domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text-domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text-domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text-domain' ),
		'popular_items'              => __( 'Popular Items', 'text-domain' ),
		'search_items'               => __( 'Search Items', 'text-domain' ),
		'not_found'                  => __( 'Not Found', 'text-domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => false,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_admin_column' => true,
        'query_var' => true,
		'show_in_rest' => true,
		'capabilities' => array(
				'manage_terms' => 'edit_users', // Using 'edit_users' cap to keep this simple.
				'edit_terms'   => 'edit_users',
				'delete_terms' => 'edit_users',
				'assign_terms' => 'read',
			),	
	);
	register_taxonomy( 'grupos', array( 'fin-plano' ), $args );

}

add_action( 'init', 'taxonomy_grupos', 30 );
*/
// custom post type faturas
function fin_post_type_fatura() {

	$labels = array(
		'name'                => _x( 'Faturas', 'Post Type General Name', 'text-domain' ),
		'singular_name'       => _x( 'Fatura', 'Post Type Singular Name', 'text-domain' ),
		'menu_name'           => __( 'Faturas', 'text-domain' ),
		'name_admin_bar'      => __( 'Faturas', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text-domain' ),
		'all_items'           => __( 'Todos Faturas', 'text-domain' ),
		'add_new_item'        => __( 'Adicionar Novo', 'text-domain' ),
		'add_new'             => __( 'Adicionar Novo', 'text-domain' ),
		'new_item'            => __( 'Novo Item', 'text-domain' ),
		'edit_item'           => __( 'Editar Fatura', 'text-domain' ),
		'update_item'         => __( 'Update Fatura', 'text-domain' ),
		'view_item'           => __( 'Ver Faturas', 'text-domain' ),
		'search_items'        => __( 'Procurar Faturas', 'text-domain' ),
		'not_found'           => __( 'Nada Encontrado', 'text-domain' ),
		'not_found_in_trash'  => __( 'Nada na Lixeira', 'text-domain' ),
	);
	$rewrite = array(
		'slug'                => 'fin-fatura',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'Faturas', 'text-domain' ),
		'description'         => __( 'Post Type for Plano', 'text-domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'author' ),
		'menu_icon' => 		 'dashicons-cart',
		'taxonomies'          => array( '' ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'fin-fatura', $args );

}

add_action( 'init', 'fin_post_type_fatura', 10 );


function fin_post_type_notificacoes() {

	$labels = array(
		'name'                => _x( 'Notificações de usuários', 'Post Type General Name', 'text-domain' ),
		'singular_name'       => _x( 'Notificações de usuários', 'Post Type Singular Name', 'text-domain' ),
		'menu_name'           => __( 'Notificações de usuários', 'text-domain' ),
		'name_admin_bar'      => __( 'Notificações de usuários', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text-domain' ),
		'all_items'           => __( 'Todas Notificações de usuários', 'text-domain' ),
		'add_new_item'        => __( 'Adicionar Novo', 'text-domain' ),
		'add_new'             => __( 'Adicionar Novo', 'text-domain' ),
		'new_item'            => __( 'Novo Item', 'text-domain' ),
		'edit_item'           => __( 'Editar Notificação de usuário', 'text-domain' ),
		'update_item'         => __( 'Update Notificação de usuário', 'text-domain' ),
		'view_item'           => __( 'Ver Notificação de usuário', 'text-domain' ),
		'search_items'        => __( 'Procurar Notificação de usuário', 'text-domain' ),
		'not_found'           => __( 'Nada Encontrado', 'text-domain' ),
		'not_found_in_trash'  => __( 'Nada na Lixeira', 'text-domain' ),
	);
	$rewrite = array(
		'slug'                => 'notificacao',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'Notificações de usuários', 'text-domain' ),
		'description'         => __( 'Post Type Description', 'text-domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'author' ),
		//'menu_icon' => get_stylesheet_directory_uri() . '/images/member-icon.png',
		'taxonomies'          => array( '' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'fin-notificacao', $args );

}

add_action( 'init', 'fin_post_type_notificacoes', 10 );

// Register Custom Buscador
function taxonomy_buscador() {

	$labels = array(
		'name'                       => _x( 'Buscador', 'Buscador para os posts e pesquisa', 'text-domain' ),
		'singular_name'              => _x( 'Buscador', 'Buscador para os posts e pesquisa', 'text-domain' ),
		'menu_name'                  => __( 'Buscador', 'text-domain' ),
		'all_items'                  => __( 'All Items', 'text-domain' ),
		'parent_item'                => __( 'Parent Item', 'text-domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text-domain' ),
		'new_item_name'              => __( 'New Item Name', 'text-domain' ),
		'add_new_item'               => __( 'Add New Item', 'text-domain' ),
		'edit_item'                  => __( 'Edit Item', 'text-domain' ),
		'update_item'                => __( 'Update Item', 'text-domain' ),
		'view_item'                  => __( 'View Item', 'text-domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text-domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text-domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text-domain' ),
		'popular_items'              => __( 'Popular Items', 'text-domain' ),
		'search_items'               => __( 'Search Items', 'text-domain' ),
		'not_found'                  => __( 'Not Found', 'text-domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_admin_column' => true,
        'query_var' => true,
		'show_in_rest' => true,
		'capabilities' => array(
				'manage_terms' => 'edit_users', // Using 'edit_users' cap to keep this simple.
				'edit_terms'   => 'edit_users',
				'delete_terms' => 'edit_users',
				'assign_terms' => 'read',
			),	
	);
	register_taxonomy( 'buscador', array( 'post' ), $args );

}

add_action( 'init', 'taxonomy_buscador', 30 );

// Custom post type tarefas
function fin_post_type_tarefa() {

	$labels = array(
		'name'                => _x( 'Tarefas', 'Post Type General Name', 'text-domain' ),
		'singular_name'       => _x( 'Tarefas', 'Post Type Singular Name', 'text-domain' ),
		'menu_name'           => __( 'Tarefas', 'text-domain' ),
		'name_admin_bar'      => __( 'Tarefas', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text-domain' ),
		'all_items'           => __( 'Todos Tarefas', 'text-domain' ),
		'add_new_item'        => __( 'Adicionar Novo', 'text-domain' ),
		'add_new'             => __( 'Adicionar Novo', 'text-domain' ),
		'new_item'            => __( 'Novo Item', 'text-domain' ),
		'edit_item'           => __( 'Editar Tarefa', 'text-domain' ),
		'update_item'         => __( 'Update Tarefa', 'text-domain' ),
		'view_item'           => __( 'Ver Tarefa', 'text-domain' ),
		'search_items'        => __( 'Procurar Tarefa', 'text-domain' ),
		'not_found'           => __( 'Nada Encontrado', 'text-domain' ),
		'not_found_in_trash'  => __( 'Nada na Lixeira', 'text-domain' ),
	);
	$rewrite = array(
		'slug'                => 'fin-tarefa',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'Tarefas', 'text-domain' ),
		'description'         => __( 'Post Type for tarefa', 'text-domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'author' ),
		'menu_icon' => 		 'dashicons-yes-alt',
		'taxonomies'          => array( '' ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'fin-tarefa', $args );

}

add_action( 'init', 'fin_post_type_tarefa', 10 );


// Register Custom Taxonomy
function taxonomy_projetos() {

	$labels = array(
		'name'                       => _x( 'Projeto', 'Projetos privados para as tarefas', 'text-domain' ),
		'singular_name'              => _x( 'Projeto', 'Projetos privados para as tarefas', 'text-domain' ),
		'menu_name'                  => __( 'Projetos', 'text-domain' ),
		'all_items'                  => __( 'All Items', 'text-domain' ),
		'parent_item'                => __( 'Parent Item', 'text-domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text-domain' ),
		'new_item_name'              => __( 'New Item Name', 'text-domain' ),
		'add_new_item'               => __( 'Add New Item', 'text-domain' ),
		'edit_item'                  => __( 'Edit Item', 'text-domain' ),
		'update_item'                => __( 'Update Item', 'text-domain' ),
		'view_item'                  => __( 'View Item', 'text-domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text-domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text-domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text-domain' ),
		'popular_items'              => __( 'Popular Items', 'text-domain' ),
		'search_items'               => __( 'Search Items', 'text-domain' ),
		'not_found'                  => __( 'Not Found', 'text-domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_admin_column' => true,
        'query_var' => true,
		'show_in_rest' => true,
		'capabilities' => array(
				'manage_terms' => 'edit_users', // Using 'edit_users' cap to keep this simple.
				'edit_terms'   => 'edit_users',
				'delete_terms' => 'edit_users',
				'assign_terms' => 'read',
			),	
	);
	register_taxonomy( 'projetos', array( 'fin-tarefa' ), $args );

}

add_action( 'init', 'taxonomy_projetos', 30 );