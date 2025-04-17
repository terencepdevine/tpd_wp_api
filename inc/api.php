<?php

function modify_excerpt_in_rest($response, $post, $request) {
	if (isset($response->data['excerpt']['rendered'])) {
		$response->data['excerpt']['rendered'] = wp_strip_all_tags($response->data['excerpt']['rendered']);
	}
	return $response;
}
add_filter('rest_prepare_projects', 'modify_excerpt_in_rest', 10, 3);

add_action('rest_api_init', function () {
	register_rest_field('projects', 'tool_data', [
		'get_callback'    => 'get_tool_terms',
		'update_callback' => null,
		'schema'          => null,
	]);
});

function get_tool_terms($object) {
	$terms = get_the_terms($object['id'], 'tool');

	if (empty($terms) || is_wp_error($terms)) {
		return [];
	}

	$formatted_terms = [];

	foreach ($terms as $term) {
		$formatted_terms[] = [
			'id'          => $term->term_id,
			'name'        => $term->name,
			'slug'        => $term->slug,
			'description' => $term->description,
		];
	}

	return $formatted_terms;
}
