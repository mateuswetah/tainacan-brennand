

<div class="">
	<div class="">
		<div class="">
			<div class="">
				<div class="">
					<?php if ( has_post_thumbnail( tainacan_get_collection_id() ) ) : 
						$thumbnail_id = get_post_thumbnail_id( tainacan_get_collection_id() );
						$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>
						<img src="<?php echo get_the_post_thumbnail_url( tainacan_get_collection_id() ); ?>" alt="<?php echo esc_attr($alt); ?>">
					<?php endif; ?>
					<div class="">
						<h6 class="">
							<a href="<?php echo get_post_type_archive_link('tainacan-collection'); ?>">
								<?php _e('Collections', 'tainacan-brennand'); ?>
							</a>
						</h6>
						<h1 style="margin-top: 0;"><?php tainacan_the_collection_name(); ?></h1>
					</div>
				</div>
				<br>
				<div class="">
					<div class="">
						<?php tainacan_the_collection_description(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="tainacan-items-list--container text-ob-red">
			<?php 
				tainacan_the_faceted_search([
					'default_view_mode' => 'masonry',
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
	</div>
</div>

