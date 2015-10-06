<?php

if( function_exists('vc_map') ){

	// Used in "Button", "Call __( 'Blue', 'js_composer' )to Action", "Pie chart" blocks
	$colors_arr[ 'White'   ] = ''        ;

	// if( class_exists('ffThemeOptions') ){
	// 	$colorsQuery = ffThemeOptions::getQuery('colors');
	// 	foreach ($colorsQuery->get('colors') as $color) {
	// 		$key = 'Custom ' . $color->get('title');
	// 		$val = 'custom-color-class-' . sanitize_title( $color->get('title') );
	// 		$colors_arr[ $key ] = $val;
	// 	}
	// }

	$colors_arr[ 'Black'   ] = 'black'   ;
	$colors_arr[ 'Blue'    ] = 'blue'    ;
	$colors_arr[ 'Green'   ] = 'green'   ;
	$colors_arr[ 'Orange'  ] = 'orange'  ;
	$colors_arr[ 'Purple'  ] = 'purple'  ;
	$colors_arr[ 'Red'     ] = 'red'     ;
	$colors_arr[ 'Yellow'  ] = 'yellow'  ;
	$colors_arr[ 'Blue #1' ] = 'primary' ;

	// Used in "Button" and "Call to Action" blocks
	$size_arr = array(
		__( 'Default',      'js_composer' ) => '',
		__( 'Regular size', 'js_composer' ) => 'large',
		__( 'Large',        'js_composer' ) => 'medium',
		__( 'Mini',         'js_composer' ) => 'small'
	);

	$target_arr = array(
		__( 'Same window', 'js_composer' ) => '_self',
		__( 'New window',  'js_composer' ) => "_blank"
	);

	require dirname( __FILE__ ) . '/milo-separator-divider.php';
	require dirname( __FILE__ ) . '/milo-headline.php';
	require dirname( __FILE__ ) . '/milo-progressbar.php';

	function ff_milo__visual_composer_icons__admin_footer(){
		?><script type="text/javascript">
			(function($){
				if( 0 < $('#wpb_visual_composer, #vc-inline-frame-wrapper').size() ){

					function append_icon_picker( $field ){
						var _val_  = $field.val();
						_val_ = _val_.replace(/[<>\"\']/g,'');

						var icon_picker_html = '';
						icon_picker_html +='<div class="ff-open-library-button-wrapper ff-open-icon-library-button-wrapper" style="display:block">';
							icon_picker_html +='<a class="ff-open-library-button ff-open-library-icon-button">';
								icon_picker_html +='<span class="ff-open-library-button-preview">';
									icon_picker_html +='<i class="'+_val_+'"></i>';
								icon_picker_html +='</span>';
								icon_picker_html +='<span class="ff-open-library-button-title">Select Icon</span>';
								icon_picker_html +='<input type="hidden" class="ff-icon ff_milo_icon ff_milo_icon_input" value="'+_val_+'" >';
							icon_picker_html +='</a>';
							icon_picker_html += '<a class="ff-open-library-remove"></a>';
						icon_picker_html +='</div>';
						$field.parent().prepend( icon_picker_html );
					}

					$( document ).ajaxComplete(function() {
						$( '.textfield.ff_milo_icon' ).each(function(){
							if( $(this).hasClass('ff-icon-initialized') ){
								return;
							}
							$(this).addClass('ff-icon-initialized')
							append_icon_picker( $(this) );
							$(this).hide();
						});

						$('.vc_panel-btn-save').click( function(){
							$( '.ff_milo_icon_input' ).each( function(){
								var $parent = $(this).parents('.edit_form_line');
								var $input  = $parent.find( '.textfield.ff_milo_icon' )
								$input.val( $(this).val() );
							});
						});
					});

					$('body').on('click', '.ff-open-icon-library-button-wrapper .ff-open-library-remove', function(){
						var $wrapper = $(this).parents('.ff-open-icon-library-button-wrapper');
						$wrapper.find('i').removeAttr('class');
						var $parent = $(this).parents('.edit_form_line');
						$parent.find('input').val( '' );
					});
				}
			})(jQuery);
		</script>
		<?php
	}

	add_action( 'admin_footer', 'ff_milo__visual_composer_icons__admin_footer', 99 );

}
