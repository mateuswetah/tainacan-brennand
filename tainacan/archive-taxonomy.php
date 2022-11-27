<?php

$current_wpterm = tainacan_get_term();

$current_taxonomy = get_taxonomy( $current_wpterm->taxonomy );
$current_term = \Tainacan\Repositories\Terms::get_instance()->fetch($current_wpterm->term_id, $current_wpterm->taxonomy);

$image = $current_term->get_header_image_id();
$src = wp_get_attachment_image_src($image, 'full');

?>


<div class="">
	<h6 class="" style="margin-bottom: 0;">
		<?php echo $current_taxonomy->labels->name; ?>
	</h6>
	<h1><?php tainacan_the_term_name(); ?></h1>
</div>
<div class="">
	<?php tainacan_the_term_description(); ?>
</div>
			
<div class="tainacan-items-list--container text-ob-red">
	<?php 
		tainacan_the_faceted_search([
			'enabled_view_modes' => [ 'brennandgrid', 'brennandlist' ],
			'default_view_mode' => 'brennandgrid',
			'default_items_per_page' => 12,
			'hide_filters' => false,
			'hide_hide_filters_button' => true,
			'hide_search' => false,
			'hide_advanced_search' => true,
			'hide_sort_by_button' => false,
			'hide_exposers_button' => true,
			'hide_items_per_page_button' => true,
			'hide_go_to_page_button' => true,
			'show_filters_button_inside_search_control' => false,
			'start_with_filters_hidden' => false,
			'filters_as_modal' => false,
			'show_inline_view_mode_options' => false,
			'show_fullscreen_with_view_modes' => false
		]); 
	?>
</div>