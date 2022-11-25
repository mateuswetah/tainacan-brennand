
<div class="mkdf-full-width">
	<div class="mkdf-full-width-inner">
		<div class="mkdf-grid-row">
			<div class="mkdf-page-content-holder mkdf-grid-col-12">
				<div class="mkdf-row-grid-section-wrapper ">
					<div class="mkdf-row-grid-section tainacan-items-list--header">
						<div class="vc_row wpb_row vc_row-fluid">
							<div class="wpb_column vc_column_container vc_col-sm-12">
								<div class="vc_column-inner ">
									<div class="wpb_wrapper">
										<div class="wpb_text_column wpb_content_element ">
											<div class="wpb_wrapper">
												<h1><?php _e('Items', 'tainacan-brennand'); ?></h1>
												<div class="vc_separator"></div>
											</div>
										</div>
										<br>
									</div>
									<br>
									<hr>
								</div>
							</div>
						</div>
					</div>
						<div class="tainacan-items-list--container">
						<?php 
							tainacan_the_faceted_search([
								'default_view_mode' => 'masonry',
								'default_items_per_page' => 12,
								'hide_filters' => false,
								'hide_hide_filters_button' => false,
								'hide_search' => false,
								'hide_advanced_search' => false,
								'hide_sort_by_button' => false,
								'hide_exposers_button' => false,
								'hide_items_per_page_button' => false,
								'hide_go_to_page_button' => false,
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
		</div>
	</div>
</div>
