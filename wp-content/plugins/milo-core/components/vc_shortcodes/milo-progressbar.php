<?php

vc_map( array(
	'name' => __( 'Milo - Progress Bar', 'js_composer' ),
	'base' => 'milo_progress_bar',
	'icon' => 'icon-wpb-graph',
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Progress bar', 'js_composer' ),
	'params' => array(

		array(
			"type" => "textfield",
			"heading" => __ ( "Title", "js_composer" ),
			"param_name" => "title",
			'value' => 'Programming',
		),

		array(
			"type" => "textfield",
			"heading" => __ ( "Percent", "js_composer" ),
			"param_name" => "percent",
			'value' => '100',
		),
	)
) );

add_shortcode('milo_progress_bar', 'milo_progress_bar_func');
function milo_progress_bar_func( $atts ) {
	extract( shortcode_atts( array(
		'title'     => 'Programming',
		'percent'   => '100',
	), $atts) );

	$percent = absint( $percent );

	$output  = '';

	$output .= '<div class="progress">';
	$output .= '<div class="progress-bar" data-width="'.  $percent.'"></div>';
	$output .= '</div>';

	$output .= '<div class="progress-bar-title">';
	$output .= '<h5>'.esc_attr( $title ).' <span style="left:'.  $percent.'%">'.  $percent.'%</span></h5>';
	$output .= '</div>';

	return $output;
}





