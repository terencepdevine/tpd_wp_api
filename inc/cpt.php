<?php

function register_projects_and_tool_taxonomy() {

// Register Custom Post Type: Projects
$project_labels = [
	"name" => esc_html__( "Projects", "terence_devine" ),
	"singular_name" => esc_html__( "Project", "terence_devine" ),
];

$project_args = [
	"label" => esc_html__( "Projects", "terence_devine" ),
	"labels" => $project_labels,
	"description" => "",
	"public" => true,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_rest" => true,
	"rest_base" => "projects",
	"rest_controller_class" => "WP_REST_Posts_Controller",
	"rest_namespace" => "wp/v2",
	"has_archive" => false,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"delete_with_user" => false,
	"exclude_from_search" => false,
	"capability_type" => "post",
	"map_meta_cap" => true,
	"hierarchical" => false,
	"can_export" => false,
	"rewrite" => [ "slug" => "projects", "with_front" => true ],
	"query_var" => true,
	"supports" => [ "title", "editor", "thumbnail", "excerpt", "author" ],
	"show_in_graphql" => false,
];

register_post_type( "projects", $project_args );

$tool_labels = [
	"name" => esc_html__( "Tools", "terence_devine" ),
	"singular_name" => esc_html__( "Tool", "terence_devine" ),
];

$tool_args = [
	"label" => esc_html__( "Tools", "terence_devine" ),
	"labels" => $tool_labels,
	"public" => true,
	"publicly_queryable" => true,
	"hierarchical" => false,
	"show_ui" => true,
	"show_in_menu" => true,
	"show_in_rest" => true,
	"show_in_nav_menus" => true,
	"query_var" => true,
	"rewrite" => [ 'slug' => 'tool', 'with_front' => true ],
	"show_admin_column" => false,
	"show_tagcloud" => false,
	"rest_base" => "tool",
	"rest_controller_class" => "WP_REST_Terms_Controller",
	"rest_namespace" => "wp/v2",
	"show_in_quick_edit" => false,
	"sort" => false,
	"show_in_graphql" => false,
];

register_taxonomy( "tool", [ "projects" ], $tool_args );
}

add_action( 'init', 'register_projects_and_tool_taxonomy', 5 );
