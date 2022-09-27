<?php

get_header(); 

$current_wpterm = tainacan_get_term();

$current_taxonomy = get_taxonomy( $current_wpterm->taxonomy );
$current_term = \Tainacan\Repositories\Terms::get_instance()->fetch($current_wpterm->term_id, $current_wpterm->taxonomy);

$image = $current_term->get_header_image_id();
$src = wp_get_attachment_image_src($image, 'full');

?>

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
											<?php if ( $src ) : ?>
												<img class="page-header-image" src="<?php echo $src[0]; ?>" alt="<?php tainacan_the_term_name(); ?>">
											<?php endif; ?>
											<div class="wpb_wrapper">
												<h6 class="mkdf-st-tagline" style="margin-bottom: 0;">
													<?php echo $current_taxonomy->labels->name; ?>
												</h6>
												<h1 style="margin-top: 0;"><?php tainacan_the_term_name(); ?></h1>
												<div class="vc_separator"></div>
											</div>
										</div>
										<br>
										<div class="wpb_text_column wpb_content_element ">
											<div class="wpb_wrapper">
												<?php tainacan_the_term_description(); ?>
											</div>
										</div>
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
<?php get_footer(); ?>
