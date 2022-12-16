<?php
/**
 * The following would render the collection name and description, but while
 * we only have one collection, we simply name this "Busca no acervo"
<div class="">
	<h1 style="margin-top: 0;"><?php tainacan_the_collection_name(); ?></h1>
</div>
<div class="">
	<?php tainacan_the_collection_description(); ?>
</div>
?*/
	$page_title = '<h1 class="m0 pt-2 pb-4 text-[2.5rem] leading-[2.68rem] uppercase">' . __('Busca no Acervo', 'tainacan-brennand') . '</h1>';
	echo '<script type="text/javascript">
		wp.hooks.addFilter("tainacan_faceted_search_search_control_before", "tainacan-hooks", function() { return `' . $page_title . '`; });
	</script>';
?>



<div class="tainacan-items-list--container text-ob-red">
	<?php 
		tainacan_the_faceted_search([
			'default_view_mode' => 'masonry',
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

