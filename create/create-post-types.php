<?php
// Create Custom Post Type name_cpt
function create_post_type_name_cpt() {
	// https://developer.wordpress.org/reference/functions/register_post_type/
	$labels = array(
		'name'                => _x( 'Name CPT', 'Post Type General Name', 'text-domain' ),
		'singular_name'       => _x( 'Name CPT', 'Post Type Singular Name', 'text-domain' ),
		'menu_name'           => __( 'Name CPT', 'text-domain' ),
		'name_admin_bar'      => __( 'Name CPT', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text-domain' ),
		'all_items'           => __( 'All', 'text-domain' ),
		'add_new_item'        => __( 'Add New', 'text-domain' ),
		'add_new'             => __( 'Add New', 'text-domain' ),
		'new_item'            => __( 'New', 'text-domain' ),
		'edit_item'           => __( 'Edit', 'text-domain' ),
		'update_item'         => __( 'Update', 'text-domain' ),
		'view_item'           => __( 'View', 'text-domain' ),
		'search_items'        => __( 'Search', 'text-domain' ),
		'not_found'           => __( 'Not Found', 'text-domain' ),
		'not_found_in_trash'  => __( 'Not Found in Trash', 'text-domain' ),
	);
	$rewrite = array(
		'slug'                => 'name_cpt',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'Name CPT', 'text-domain' ),
		'description'         => __( 'Post Type Name CPT', 'text-domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'author', 'editor' ), //  'title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', and 'post-formats'
		'menu_icon' => 		 'dashicons-id', // https://developer.wordpress.org/resource/dashicons/#heart
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
	register_post_type( 'name_cpt', $args );

}

add_action( 'init', 'create_post_type_name_cpt', 10 );

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
		
		case 'status':
			echo $plano_status = get_field( 'status', $post->ID ); //get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'coy-thumbnail' ) );
			break;			
			
    }
}

add_action( 'manage_fin-plano_posts_custom_column' , 'custom_fin_plano_column', 10, 2 );

// Register Custom Taxonomy
function taxonomy_name_tax() {

	$labels = array(
		'name'                       => _x( 'Name tax', 'custom taxonomy', 'text-domain' ),
		'singular_name'              => _x( 'Name tax', 'custom taxonomy', 'text-domain' ),
		'menu_name'                  => __( 'Name tax', 'text-domain' ),
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
	register_taxonomy( 'name_tax', array( 'name_cpt' ), $args );

}

add_action( 'init', 'taxonomy_name_tax', 30 );

