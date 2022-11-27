<?php 

/* Builds navigation link for custom view modes */
function tainacan_brennand_get_item_link_for_navigation($item_url, $index) {
		
	if ( $_GET && isset($_GET['paged']) && isset($_GET['perpage']) ) {
		$query = '';
		$perpage = (int)$_GET['perpage'];
		$paged = (int)$_GET['paged'];
		$index = (int)$index;
		$query .= '&pos=' . ( ($paged - 1) * $perpage + $index );
		$query .= '&source_list=' . (is_tax() ? 'term' : 'collection');
		return $item_url . '?' .  $_SERVER['QUERY_STRING'] . $query;
	}
	return $item_url;
}

/* Registers Tainacan Custom View Modes */
function tainacan_brennand_register_tainacan_view_modes() {
	if ( function_exists( 'tainacan_register_view_mode' ) ) {

		// Grid
		tainacan_register_view_mode('brennandgrid', array(
			'label' => __( 'Cartões', 'tainacan-brennand' ),
			'description' => __( 'Uma grade de itens feita para o Acervo Brennand', 'tainacan-brennand' ),
			// 'icon' => '<span class="icon"><i class="tainacan-icon tainacan-icon-viewcards tainacan-icon-1-25em"></i></span>',
			'dynamic_metadata' => false,
			'template' => TAINACAN_BRENNAND_PLUGIN_DIR_PATH . '/tainacan/view-mode-tainacan-brennand-grid.php'
		));

		// List
		tainacan_register_view_mode('brennandlist', array(
			'label' => __( 'Lista', 'tainacan-brennand' ),
			'description' => __( 'Uma lista de itens feita para o Acervo Brennand', 'tainacan-brennand' ),
			// 'icon' => '<span class="icon"><i class="tainacan-icon tainacan-icon-viewlist tainacan-icon-1-25em"></i></span>',
			'dynamic_metadata' => true,
			'template' => TAINACAN_BRENNAND_PLUGIN_DIR_PATH . '/tainacan/view-mode-tainacan-brennand-list.php'
		));

	}
}
add_action( 'after_setup_theme', 'tainacan_brennand_register_tainacan_view_modes' );