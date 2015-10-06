<?php

vc_map( array(
	'name' => __( 'Milo - Heading', 'js_composer' ),
	'base' => 'milo_headline',
	'icon' => 'icon-wpb-ui-custom_heading',
	'category' => __( 'Content', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style', 'js_composer' ),
			'param_name' => 'heading_style',
			'value' => array(
				'Default' => '',
				'Style #1' => 'style-1',
				'Style #2' => 'style-2',
				'Style #3' => 'style-3',
				'Style #4' => 'style-4',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Line #1', 'js_composer' ),
			'param_name' => 'line_1',
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Line #2', 'js_composer' ),
			'param_name' => 'line_2',
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Line #3', 'js_composer' ),
			'param_name' => 'line_3',
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	)
) );


add_shortcode('milo_headline', 'milo_headline_func');
function milo_headline_func( $atts ) {
	extract( shortcode_atts( array(
		'heading_style' => '',
		'line_1' => '',
		'line_2' => '',
		'line_3' => '',
		'el_class' => '',
	), $atts) );

	if( empty( $line_1 ) and empty( $line_2 ) and empty( $line_3 ) ){
		return '';
	}

	$output = '';

	$output .= '<div class="headline ';
	$output .= esc_attr( $heading_style );
	$output .= '">';

	if( ! empty( $line_1 ) ){
		$output .= '<h4>';
		$output .= $line_1;
		$output .= '</h4>';
	}

	if( ! empty( $line_2 ) ){
		$output .= '<h2>';
		$output .= $line_2;
		$output .= '</h2>';
	}

	if( ! empty( $line_3 ) ){
		$output .= '<p>';
		$output .= $line_3;
		$output .= '</p>';
	}

	$output .= '</div>';

	return $output;
}





