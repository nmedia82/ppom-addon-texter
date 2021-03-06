<?php 
/**
 * ppom design frontent template
**/

/* 
**========== Direct access not allowed =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

	// ppom_pa($order_meta);

?>

<div class="table-responsive">
  
  <?php

    foreach ($order_meta as $product_id => $texter_meta){
      
      foreach($texter_meta as $dataname => $texts) {
        
        $fields_meta = ppom_get_field_meta_by_dataname($product_id, $dataname);
        // ppom_pa($fields_meta);
        
        $file_name = "{$dataname}.png";
        $file_name = ppom_file_get_name($file_name, $product_id);
				$meta_image = ppom_create_thumb_for_meta($file_name, $product_id);
				// var_dump($meta_image);

      ?>
  <table class="tabel texter-table table-bordered">
      <h3 align="center"><?php echo $fields_meta['title'];?></h3>
      <thead>
      <tr>
        <td colspan="8"><?php echo $meta_image;?></td>
      </tr>
      <tr>
        <th><?php _e('Box Title', 'ppom-texter'); ?></th>
        <th><?php _e('Text', 'ppom-texter'); ?></th>
        <th><?php _e('Color', 'ppom-texter'); ?></th>
        <th><?php _e('Font Family', 'ppom-texter'); ?></th>
        <th><?php _e('Font Size', 'ppom-texter'); ?></th>
        <th><?php _e('Text Align', 'ppom-texter'); ?></th>
        <th><?php _e('Box Background Color', 'ppom-texter'); ?></th>
        <th><?php _e('Positions', 'ppom-texter'); ?></th>
      </tr>   
    </thead>
      <?php
      foreach ($texts as $key => $value) {
        $text = isset($value['text']) ? $value['text'] : '';
        $color = isset($value['color']) ? $value['color'] : '';
        $font_family = isset($value['font_family']) ? $value['font_family'] : '';
        $font_size = isset($value['font_size']) ? $value['font_size'] : '';
        $text_align = isset($value['text_align']) ? $value['text_align'] : '';
        $textbox_bg_color = isset($value['textbox_bg_color']) ? $value['textbox_bg_color'] : '';
        $box_title = isset($value['box_title']) ? $value['box_title'] : '';
        $pos_top = isset($value['pos_top']) ? $value['pos_top'] : '';
        $pos_left = isset($value['pos_left']) ? $value['pos_left'] : '';
        $positions = 'Top: '.$pos_top.'<br> Left: '.$pos_left;
      // ppom_pa($value['text']);
    ?>
    <tr>
      <th><?php echo $box_title; ?></th>
      <td><?php echo $text; ?></td>
      <td><?php echo $color; ?></td>
      <td><?php echo $font_family; ?></td>
      <td><?php echo $font_size; ?></td>
      <td><?php echo $text_align; ?></td>
      <td><?php echo $textbox_bg_color; ?></td>
      <td><?php echo $positions; ?></td>
    </tr>
    <?php } 
    }?>
  </table>
  <?php } ?>
</div>