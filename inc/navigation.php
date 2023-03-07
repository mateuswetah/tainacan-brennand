<?php 

/**
 * Retrieves an item adjacent link, either using WP strategy or Tainacan plugin tainacan_get_adjacent_items()
 */
if ( !function_exists('tainacan_brennand_get_adjacent_item_links') ) {
	function tainacan_brennand_get_adjacent_item_links() {
		
		// We use Tainacan own method for obtaining previous and next item objects
		if ( function_exists('tainacan_get_adjacent_items') && isset($_GET['pos']) ) {
			$adjacent_items = tainacan_get_adjacent_items();

			if ( isset($adjacent_items['next']) )
				$next_link_url = $adjacent_items['next']['url'];
			else
				$next_link_url = false;
			
			if ( isset($adjacent_items['previous']) )
				$previous_link_url = $adjacent_items['previous']['url'];
			else
				$previous_link_url = false;

		} else {
			//Get the links to the Previous and Next Post
			$previous_link_url = get_permalink( get_previous_post() );
			$next_link_url = get_permalink( get_next_post() );
		}

		$previous = '';
		$next = '';

		// Creates the links
		$previous = $previous_link_url === false ? '' : (
			'<a 
						class="inline-flex items-center gap-1"
						itemprop="url"		
						href="'. $previous_link_url . '">
					<svg xmlns="http://www.w3.org/2000/svg" width="10" height="33.031" viewBox="0 0 19.11 33.031" class="mr-[4px] mt-[2px] rotate-180	inline-block injected-svg w-[10px] h-auto fill-[var(--section-color)]">
						<g id="Grupo_92" data-name="Grupo 92" transform="translate(19.11 33.031) rotate(180)">
							<g id="Grupo_89" data-name="Grupo 89" transform="translate(0 0)">
								<path id="Caminho_91" data-name="Caminho 91" d="M16.1,0,0,16.6,16.147,33.031,19.1,30.015,5.961,16.6,19.11,3.014Z" transform="translate(0)"></path>
							</g>
						</g>
					</svg>
					<span>' . __('Resultado anterior', 'tainacan-brennand') . '</span>
				</a>');

		$next = $next_link_url === false ? '' : (
			'<a 
					class="inline-flex items-center gap-1"	
					itemprop="url"		
					href="'. $next_link_url . '">
				<span>' . __('Próximo resultado', 'tainacan-brennand') . '</span>
				<svg xmlns="http://www.w3.org/2000/svg" width="10" height="33.031" viewBox="0 0 19.11 33.031" class="mr-[4px] mt-[2px] inline-block injected-svg w-[10px] h-auto fill-[var(--section-color)]">
					<g id="Grupo_92" data-name="Grupo 92" transform="translate(19.11 33.031) rotate(180)">
						<g id="Grupo_89" data-name="Grupo 89" transform="translate(0 0)">
							<path id="Caminho_91" data-name="Caminho 91" d="M16.1,0,0,16.6,16.147,33.031,19.1,30.015,5.961,16.6,19.11,3.014Z" transform="translate(0)"></path>
						</g>
					</g>
				</svg>
			</a>');

		return ['next' => $next, 'previous' => $previous];
	}
}

/**
 * Outputs Tainacan custom logic for items navigation
 */
if ( !function_exists('tainacan_brennand_item_navigation') ) {
	function tainacan_brennand_item_navigation() {
		$next = '';
		$previous = '';
			
		$adjacent_links = [
			'next' => '',
			'previous' => ''
		];
		
		$adjacent_links = tainacan_brennand_get_adjacent_item_links();
	
		$previous = $adjacent_links['previous'];
		$next = $adjacent_links['next'];
		
		?>
			<a 
					class="inline-flex items-center gap-1 mr-auto"	
					itemprop="url"		
					href="<?php echo tainacan_get_source_item_list_url_brennand(); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="10" height="33.031" viewBox="0 0 19.11 33.031" class="mr-[4px] mt-[2px] rotate-180 inline-block injected-svg w-[10px] h-auto fill-[var(--section-color)]">
					<g id="Grupo_92" data-name="Grupo 92" transform="translate(19.11 33.031) rotate(180)">
						<g id="Grupo_89" data-name="Grupo 89" transform="translate(0 0)">
							<path id="Caminho_91" data-name="Caminho 91" d="M16.1,0,0,16.6,16.147,33.031,19.1,30.015,5.961,16.6,19.11,3.014Z" transform="translate(0)"></path>
						</g>
					</g>
				</svg>
				<span><?php _e( 'Voltar para a lista', 'tainacan-brennand' ); ?></span>
			</a>
			<?php if ($previous !== '' || $next !== '') : ?>
				<?php
					if ( $previous !== '' ) {
						echo $previous;
					}

					if ( $next !== '' ) {
						echo $next;
					}
				?>
			<?php endif; ?>
		<?php
	}
}


/**
 * Retrieves the current items list source link
 */
function tainacan_get_source_item_list_url_brennand() {
	$args = $_GET;
	if (isset($args['ref'])) {
		$ref = $_GET['ref'];
		unset($args['pos']);
		unset($args['ref']);
		unset($args['source_list']);
		return $ref . '?' . http_build_query(array_merge($args));
	} else {
		unset($args['pos']);
		unset($args['ref']);
		unset($args['source_list']);
		return tainacan_the_collection_url() . '?' . http_build_query(array_merge($args));
	}
}

/**
 * Outputs Tainacan realted items for the single item page.
 */
if ( !function_exists('tainacan_brennand_get_related_items') ) {
	function tainacan_brennand_get_related_items($terms, $item) {
		if ($terms[0] && $terms[0] instanceof \Tainacan\Entities\Term)
			$taxonomy = $terms[0]->get_taxonomy();
		else
			return false;

		$args = array(
			'post_type' => 'tnc_col_' . $item->get_collection_id() . '_item',
			'post__not_in' => [ $item->get_id() ],
			'posts_per_page' => 5,
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'term_id',
					'terms'    => array_map(function($term) { return $term->get_id(); }, $terms),
				),
			),
		);
		return new WP_Query( $args );
	}
}


/**
 * Retrieves the "Acervo" page to be used on the breadcrumbs
 */
function tainacan_brennand_get_acervo_page() {
	$pages = get_page_by_title('Acervo Digital');
	
	$acervo_page = false;
	if (is_array($pages) && count($pages) > 0 && !empty($pages[0]) ) {
		$acervo_page = $pages[0];
	}
	else if (!empty($pages)) {
		$acervo_page = $pages;
	}

	return $acervo_page;
}