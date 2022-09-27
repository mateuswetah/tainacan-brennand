<?php 

/**
 * Retrieves an item adjacent link, either using WP strategy or Tainacan plugin tainacan_get_adjacent_items()
 */
if ( !function_exists('tainacan_brennand_get_adjacent_item_links') ) {
	function tainacan_brennand_get_adjacent_item_links() {
		
		// We use Tainacan own method for obtaining previous and next item objects
		if (function_exists('tainacan_get_adjacent_items') && isset($_GET['pos'])) {
			$adjacent_items = tainacan_get_adjacent_items();

			if (isset($adjacent_items['next'])) {
				$next_link_url = $adjacent_items['next']['url'];
				$next_title = $adjacent_items['next']['title'];
			} else {
				$next_link_url = false;
			}
			if (isset($adjacent_items['previous'])) {
				$previous_link_url = $adjacent_items['previous']['url'];
				$previous_title = $adjacent_items['previous']['title'];
			} else {
				$previous_link_url = false;
			}

		} else {
			//Get the links to the Previous and Next Post
			$previous_link_url = get_permalink( get_previous_post() );
			$next_link_url = get_permalink( get_next_post() );

			//Get the title of the previous post and next post
			$previous_title = get_the_title( get_previous_post() );
			$next_title = get_the_title( get_next_post() );
		}

		$previous = '';
		$next = '';

		if (function_exists('tainacan_get_adjacent_items') && isset($_GET['pos'])) {
			if ($adjacent_items['next']) {
				$next_thumb = $adjacent_items['next']['thumbnail']['tainacan-medium'][0];
			}
			if ($adjacent_items['previous']) {
				$previous_thumb = $adjacent_items['previous']['thumbnail']['tainacan-medium'][0];
			}
		} else {
			//Get the thumnail url of the previous and next post
			$previous_thumb = get_the_post_thumbnail_url( get_previous_post(), 'tainacan-medium' );
			$next_thumb = get_the_post_thumbnail_url( get_next_post(), 'tainacan-medium' );
		}

		$previous_post_image_output = isset($previous_thumb) ? $previous_thumb : '';
		$next_post_image_output = isset($next_thumb) ? $next_thumb : '';

		// Creates the links
		$previous = $previous_link_url === false ? '' : (
			'<div class="mkdf-blog-single-prev-holder clearfix">'
				. ( !empty($previous_post_image_output) ? '<div class="mkdf-blog-single-thumb-wrapper">
						<a 
								itemprop="url"		
								class="mkdf-blog-single-nav-thumb"
								href="'. $previous_link_url . '">
							<img width="200" height="200" class="attachment-medium size-medium wp-post-image" src=" ' . $previous_post_image_output  . '">
						</a>
					</div>' : '') . 	
				'<div class="mkdf-blog-single-nav-wrapper">
					<a 
							itemprop="url"		
							class="mkdf-blog-single-nav-thumb"
							href="'. $previous_link_url . '">
						' . ( !empty( $previous_title ) ? $previous_title : '' ) . '
						<span class="mkdf-blog-single-nav-date">' . __('Previous', 'tainacan-brennand') . '</span>
					</a>
				</div>
			</div>');

		$next = $next_link_url === false ? '' : (
			'<div class="mkdf-blog-single-next-holder clearfix">
				<div class="mkdf-blog-single-nav-wrapper">
					<a 
							itemprop="url"		
							class="mkdf-blog-single-nav-thumb"
							href="'. $next_link_url . '">
						' . ( !empty( $next_title ) ? $next_title : '' ) . '
						<span class="mkdf-blog-single-nav-date">' . __('Next', 'tainacan-brennand') . '</span>
					</a>
				</div>'
				. ( !empty($next_post_image_output) ? '<div class="mkdf-blog-single-thumb-wrapper">
						<a 
								itemprop="url"		
								class="mkdf-blog-single-nav-thumb"
								href="'. $next_link_url . '">
							<img width="200" height="200" class="attachment-medium size-medium wp-post-image" src =" ' . $next_post_image_output  . '">
						</a>
					</div>' : '') . '	
			</div>');

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
			<?php if ($previous !== '' || $next !== '') : ?>
			<section class="mkdf-blog-single-navigation">
				<div class="mkdf-blog-single-navigation-inner clearfix">
				<?php
					if ( $previous !== '' ) {
						echo $previous;
					}

					if ( $next !== '' ) {
						echo $next;
					}
				?>
				</div>
			</section>
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
