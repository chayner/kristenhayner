<?php

vc_map( array(
	'name' => __( 'Milo - Separator / Divider', 'js_composer' ),
	'base' => 'milo_separator',
	'icon' => 'icon-wpb-toggle-small-expand',
	'category' => __( 'Content', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style', 'js_composer' ),
			'param_name' => 'type',
			'value' => array(
				'Single' => '',
				'Double' => 'double',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_position',
			'value' => array(
				__( 'None'  , 'js_composer' ) => '',
				__( 'Left'  , 'js_composer' ) => 'text-left',
				__( 'Center', 'js_composer' ) => 'text-center',
				__( 'Right' , 'js_composer' ) => 'text-right',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'ff_milo_icon',
			'description' => __( 'Icon.', 'js_composer' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	)
) );


add_shortcode('milo_separator', 'milo_separator_func');
function milo_separator_func( $atts ) {
	extract( shortcode_atts( array(
		'type'    => '',
		'icon_position' => '',
		'ff_milo_icon' => '',
		'icon'    => '',
		'el_class' => '',
	), $atts) );

	$output = '';

	$output .= '<div class="separator';
	$output .= ' '.esc_attr($icon_position);
	$output .= ' '.esc_attr($type);
	$output .= ' '.esc_attr($el_class);
	$output .= '">';

	if( !empty( $icon_position ) ){
		$output .= '<span>';
		$output .= '<i class="'.esc_attr( apply_filters( 'ff_filter_query_get_icon', $ff_milo_icon ) ).'"></i>';
		$output .= '</span>';
	}

	$output .= '</div>';

	return $output;
}





