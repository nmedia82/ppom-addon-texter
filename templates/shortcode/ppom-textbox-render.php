<?php 
/**
 * ppom design frontent template
**/

/* 
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }
// ppom_pa($texter_meta);
	/* 
	**========== Get texter fields meta =========== 
	*/
   	$post_id 			= isset($texter_meta['post_id']) ? $texter_meta['post_id'] : '';
   	$label 				= isset($texter_meta['texter_label']) ? $texter_meta['texter_label'] : '';
   	$data_name 			= isset($texter_meta['data_name']) ? $texter_meta['data_name'] : '';
   	$model_title 		= isset($texter_meta['button_title']) ? $texter_meta['button_title'] : '';
   	$enable_f_family 	= isset($texter_meta['font_family']) ? $texter_meta['font_family'] : '';
   	$enable_f_color 	= isset($texter_meta['font_color']) ? $texter_meta['font_color'] : '';
   	$enable_f_size 		= isset($texter_meta['font_size']) ? $texter_meta['font_size'] : '';
   	$enable_alignment 	= isset($texter_meta['alignment']) ? $texter_meta['alignment'] : '';
   	$model_color 		= isset($texter_meta['btn_color']) ? $texter_meta['btn_color'] : '';
   	$model_bg_color 	= isset($texter_meta['btn_bg_color']) ? $texter_meta['btn_bg_color'] : '';
	$textbox_meta = get_post_meta($post_id, 'ppom_design_meta', true );
   	// ppom_pa($textbox_meta);

	if ( $textbox_meta == null ) {
		$textbox_meta = array();
	}
	$image_id 	      = get_post_meta($post_id, 'ppom_image_upload', true );
	$image_size = 'full';

	$the_post = get_post($post_id);
	
	$image_attributes = wp_get_attachment_image_src( $image_id, $image_size );
	$image = '';
	if( $image_attributes ) {
		$image = '<img src="' . $image_attributes[0] . '" style="display:block;margin:unset;" />';
	}else{
		$image = '<h4 style="text-align: center;">Product are not found</h4>';
	}
?>

<div class="<?php echo esc_attr($texter_class); ?>" data-texter-dataname="<?php echo esc_attr($data_name); ?>">

	<div class="form-group">
	<?php if ($label): ?>
		<label class="form-control-label" for="<?php esc_attr($data_name); ?>"><?php echo $label; ?></label>
	<?php endif ?>
		<a href="#ppom_textbox_model_<?php echo $post_id; ?>" class="btn btn-info" style="color: <?php echo $model_color; ?>;background-color: <?php echo $model_bg_color; ?>"><?php echo $model_title; ?></a>
	</div>

  <!-- Modal -->
	<div class="remodal texter-remodel-closer" data-remodal-id="ppom_textbox_model_<?php echo esc_attr($post_id); ?>">
  		<div class="texter-setting-row texter-row-handle">
      		<div class="texter-col-md-12">
      			<h4 class="texter-title-hide"><?php _e('Select Textbox' , 'ppom-texter'); ?></h4>
      			<?php 

				foreach ($textbox_meta as $id => $meta) {
					$text_id = 'texter-'.$data_name.'-id-'.$id;
					$max = isset( $meta['max_char'] ) ?  $meta['max_char']: '';
					$min = isset( $meta['min_char'] ) ?  $meta['min_char']: '';
					$title = isset( $meta['textbox_title'] ) ?  $meta['textbox_title']: '';
				?>
				<div class="ppom-all-textbox-setting" id="ppom-setting-<?php echo esc_attr($text_id); ?>">
					<input type="hidden" id="ppom-textbox-title" value="<?php echo esc_attr($title); ?>">
					<input type="hidden" class="texter-dataname-js" value="<?php echo esc_attr($data_name); ?>">
					<h4 class="ppom-texter-title-render"><?php echo $title.' box setting'; ?></h4>
					<div class="texter-row-handle">
						<div class="texter-col-md-12">
						<span class="ppom-texter-char-limit"></span>
							<input 
								type="text" 
								maxlength="<?php echo esc_attr($max); ?>" minlength="<?php echo esc_attr($min); ?>" 
								id="ppom-img-text-show" data-input-id='<?php echo esc_attr($text_id); ?>' placeholder="<?php _e('Enter Text', 'ppom-texter'); ?>" 
								class="form-control"
							>
						</div>
					</div>
					<div class="texter-row-handle" style="margin-top: 6px;">
						<?php if ($enable_f_color == 'on'): ?>
						<div class="texter-col-md-6 texter-col-sm-6">
							<input class="color-iris form-control" placeholder="Select Color" id="ppom-iris-color">
						</div>
						<?php endif ?>
						<?php if ($enable_f_family == 'on'): ?>
						<div class="texter-col-md-6 texter-col-sm-6">
							<input class="texter-font-family-<?php echo esc_attr($text_id); ?>" type="text" id="ppom-get-font-family">
						</div>
						<?php endif ?>
						
					</div>	
					<div class="texter-row-handle ppom-texter-fonts-tip">
						<?php if ($enable_f_size == 'on'): ?>
						<div class="texter-col-md-6  texter-col-sm-6">
							<label><?php _e('Font Size', 'ppom-texter'); ?></label>

							<input type="button" class="button btn-sm ppom-inc-font-size" value=" + ">
							<input type="button" class="button btn-sm ppom-dec-font-size" value=" - "/>
							<button class="button btn-sm ppom-reset-font"><i class="fa fa-repeat" aria-hidden="true"></i></button>
						</div>
						<?php endif ?>
						<?php if ($enable_alignment == 'on'): ?>
						<div class="texter-col-md-6  texter-col-sm-6">
							<label><?php _e('Alignments', 'ppom-texter'); ?></label>
							<button class="button btn-sm ppom-text-left"><i class="fa fa-align-left" aria-hidden="true"></i></button>
							<button class="button btn-sm ppom-text-center"><i class="fa fa-align-center" aria-hidden="true"></i></button>
							<button class="button btn-sm ppom-text-right"><i class="fa fa-align-right" aria-hidden="true"></i></button>
							<button class="button btn-sm ppom-text-justify"><i class="fa fa-align-justify" aria-hidden="true"></i></button>
						</div>
						<?php endif ?>
					</div>	
				</div>
			<?php } ?>
      		</div>	
      	</div>

      	<div class="ppom-main-inner-wrapper">
			<div class="ppom-image-section" style="position: relative;" id="texter_image_<?php echo esc_attr($data_name); ?>_data">
				<?php
				// ppom_pa($image);
					echo $image;
					foreach ($textbox_meta as $id => $meta) {
						$text_id = 'texter-'.$data_name.'-id-'.$id;
						$y_pos  = isset( $meta['y_pos'] ) ?  $meta['y_pos']: '';
						$x_pos  = isset( $meta['x_pos'] ) ?  $meta['x_pos']: '';
						$width  = isset( $meta['width'] ) ?  $meta['width']: 137;
						$height = isset( $meta['height'] ) ?  $meta['height']: 50;

						if (isset($meta['font_size']) && $meta['font_size'] != '' ) {
							$font_size = $meta['font_size'];
						}else{
							$font_size = '16px';
						}

						if (isset($meta['font_family']) && $meta['font_family'] != '' ) {
							$font_family = $meta['font_family'];
						}else{
							$font_family = '"Times New Roman"';
						}

						if (isset($meta['font_color']) && $meta['font_color'] != '' ) {
							$color = $meta['font_color'];
						}else{
							$color = 'black';
						}

						if (isset($meta['font_bg_color']) && $meta['font_bg_color'] != '' ) {
							$bg_color = $meta['font_bg_color'];
							$border   = '';
						}else{
							$bg_color = 'transparent';
							$border   = '1px solid black';
						}


						$box   = 'top:'.$y_pos.'px;left:'.$x_pos.'px;';
						$box  .= 'width:'.$width.'px;height:'.$height.'px;';
						$box  .= 'font-size:'.$font_size.';font-family:'.$font_family.';color:'.$color.';';
						$box  .= 'position:absolute;background-color:'.$bg_color.';border:'.$border.';';
				?>
					<div class="ppom-text-over-image" style="<?php echo esc_attr($box); ?>" data-textbox-id='<?php echo esc_attr($text_id); ?>' data-field-id="<?php echo esc_attr($data_name); ?>">
					</div>
				<?php
					}
				?>
			</div>
			<div class="previewImage"></div>
		</div> 

		<div class="texter-model-footer" style="text-align: right;">	
			<a class="remodal-cancel ppom-close-model" href="#"><?php _e('Close', 'ppom-texter'); ?></a>
			<a class="remodal-confirm texter-save-meta-<?php echo esc_attr($data_name); ?>" href="#"  data-dataname="<?php echo esc_attr($data_name); ?>"><?php _e('Save And Close', 'ppom-texter'); ?></a>
		</div>
	</div>
<!-- end model -->
</div>