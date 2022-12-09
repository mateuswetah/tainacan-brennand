<?php
	$page_title = '<h1 class="m0 pt-2 pb-[1.25rem] font-bold text-[2.5rem] leading-[2.68rem] uppercase">' . __('Busca no Acervo', 'tainacan-brennand') . '</h1>';
	$term_list_title = '<h1 class="m0 pt-2 pb-[1.25rem] text-[2.5rem] leading-[2.68rem] uppercase border-b-3 lg:border-b-4 border-b-[var(--section-color)]">' . $current_taxonomy->labels->name . ': ' . $current_term->get_name(); '</h1>';
	echo '<script type="text/javascript">
		wp.hooks.addFilter("tainacan_faceted_search_search_control_before", "tainacan-hooks", function() { return `' . $page_title . '`; });
		wp.hooks.addFilter("tainacan_faceted_search_items_list_area_before", "tainacan-hooks", function() { return `' . $term_list_title . '`; });
	</script>';
?>
			
<div class="tainacan-items-list--container text-ob-red">
	<?php 
		tainacan_the_faceted_search([
			'enabled_view_modes' => [ 'brennandgrid', 'brennandlist' ],
			'default_view_mode' => 'brennandgrid',
			'default_items_per_page' => 12,
			'hide_filters' => false,
			'hide_hide_filters_button' => false,
			'hide_search' => false,
			'hide_advanced_search' => true,
			'hide_sort_by_button' => false,
			'hide_exposers_button' => true,
			'hide_items_per_page_button' => true,
			'hide_go_to_page_button' => true,
			'show_filters_button_inside_search_control' => true,
			'start_with_filters_hidden' => false,
			'filters_as_modal' => false,
			'show_inline_view_mode_options' => false,
			'show_fullscreen_with_view_modes' => false
		]); 
	?>
</div>