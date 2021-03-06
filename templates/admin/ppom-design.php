<?php 
/**
 * Texter Design Template
**/

/* 
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

	global $post;

	// getting all saved textbox meta data
	$textbox_meta = get_post_meta($post->ID, 'ppom_design_meta', true );
	$image_id 	  = get_post_meta($post->ID, 'ppom_image_upload', true );

	// if texbox meta is not saved getting defualt meta
	if( empty($textbox_meta) ) {
	    $textbox_meta = array();
	    $textbox_meta[] = array('width'=>137, 'height'=>60, 'x_pos'=>1, 'y_pos'=>1);
	}

	// some image display settings
   	$image_size = 'full';
	$display 	= 'none';
	$image 		= 'Upload image';
	$image_attributes = wp_get_attachment_image_src( $image_id, $image_size );

	$the_image_width = $image_attributes[1];
	
	if( $image_attributes ) {
		$image = '<img src="' . $image_attributes[0] . '" style="display:block;" class="ppom-saved-img" />';
		$display = 'inline-block';
	}
?>
<div class="ppom-design-wrapper">
	<div class="ppom-texbox-add" style="display: none;">
		<button class="button button-primary"><i class="fa fa-text-width" aria-hidden="true"><?php _e('Add Textbox', 'ppom-texter'); ?></i></button>
		<span class="texter-textbox-notice texter-textbox-notice-js" style="display: none;"><?php _e('Textbox add on top of image', 'ppom-texter'); ?></span>
	</div>
	<div class="ppom-img-uploader-area" id="ppom-textbox-cover">

		<div href="#" class="ppom-img-selector ppom_upload_image_btn button"><?php echo $image; ?></div>
		<input type="hidden" name="ppom_image_upload" id="ppom_image_upload" value="<?php echo esc_attr($image_id); ?>" />
		<a href="#" class="button ppom-remove-image-btn" style="display:inline-block;display:<?php echo $display; ?>;"><?php _e('Remove image', 'ppom-texter'); ?></a>
		<input type="hidden" id="ppom-last-box-id" value="<?php echo esc_attr(Texter()->get_last_box_id($textbox_meta));?>">

		<?php 
		foreach ($textbox_meta as $id => $meta) {

			$y_pos  = isset( $meta['y_pos'] ) ?  $meta['y_pos']: '';
			$x_pos  = isset( $meta['x_pos'] ) ?  $meta['x_pos']: '';
			$width  = isset( $meta['width'] ) ?  $meta['width']: '';
			$height = isset( $meta['height'] ) ?  $meta['height']: '';
			$font_family = isset( $meta['font_family'] ) ?  $meta['font_family']: '';
			$font_size   = isset( $meta['font_size'] ) ?  $meta['font_size']: '';
			$color       = isset( $meta['font_color'] ) ?  $meta['font_color']: '';
			$bg_color    = isset( $meta['font_bg_color'] ) ?  $meta['font_bg_color']: '';

			$box   = 'top:'.$y_pos.'px;left:'.$x_pos.'px;background-color:'.$bg_color.';';
			$box  .= 'width:'.$width.'px;height:'.$height.'px;';
			$style = 'font-size:'.$font_size.';font-family:'.$font_family.';color:'.$color.';';
		?>

			<div class="ppom-textbox-area" data-textbox-id='<?php echo esc_attr($id); ?>' style="display: none;">
				<span class="ppom-textbox-remove">
					<i class="fa fa-times" aria-hidden="true"></i>
				</span>
				<div 
					class="ppom-textbox-tool" 
					data-draggable-id='<?php echo esc_attr($id); ?>' 
					style="<?php echo esc_attr($box); ?>"
				>
					<p class="ppom-textbox-show" style="<?php echo esc_attr($style); ?>"><?php _e('Your Text', 'ppom-texter'); ?></p>
				</div>
			</div>
		<?php
		}
 		?>
	</div>
</div>