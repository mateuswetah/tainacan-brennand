<?php

	$collection_id_works = get_theme_mod('tainacan_brennand_single_item_template_works', '');
	$collection_id_participants = get_theme_mod('tainacan_brennand_single_item_template_participants', '');
	$collection_id_events = get_theme_mod('tainacan_brennand_single_item_template_events', '');
	$collection_id_activities = get_theme_mod('tainacan_brennand_single_item_template_activities', '');
	$collection_id_publications = get_theme_mod('tainacan_brennand_single_item_template_publications', '');
	$collection_id_places = get_theme_mod('tainacan_brennand_single_item_template_places', '');

	// In this variation of the view mode, we have to fetch the second metadata
	$metadata_repository = \Tainacan\Repositories\Metadata::get_instance();
	$metadata_objects = [];
	$is_repository_level = !isset($request['collection_id']);
	
	if ( !$is_repository_level ) {
		$collection = tainacan_get_collection([ 'collection_id' => $request['collection_id'] ]);
		$metadata_objects = $metadata_repository->fetch_by_collection(
			$collection,
			[
				'posts_per_page' => 50,
				// 'post_status' => 'publish'
			],
			'OBJECT'
		);
	} else {
		$metadata_objects = $metadata_repository->fetch(
			[ 
				'meta_query' => [
					[
						'key'     => 'collection_id',
						'value'   => 'default',
						'compare' => '='
					]
				],
				// 'post_status' => 'publish',
				'posts_per_page' => 50,
				'include_control_metadata_types' => true
			],
			'OBJECT'
		);
	}
?>

<?php if ( have_posts() ) : ?>
	<ul class="tainacan-brennand-grid-container grid grid-cols-3 gap-6 place-items-stretch m-6">

		<?php $item_index = 0; while ( have_posts() ) : the_post(); ?>
			
			<li class="tainacan-brennand-grid-item border-4 border-ob-red p-3.5 text-center">
				<a href="<?php echo tainacan_brennand_get_item_link_for_navigation(get_permalink(), $item_index); ?>">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="tainacan-brennand-grid-item-thumbnail">
							<?php the_post_thumbnail( 'tainacan-medium-full', ['class' => 'mx-auto attachment-tainacan-medium-full size-tainacan-medium-full'] ); ?>
							<!-- <?php tainacan_the_document(); ?> -->
							<div class="skeleton"></div> 
						</div>
					<?php else : ?>
						<div class="tainacan-brennand-grid-item-thumbnail">
							<?php echo '<img class="mx-auto" alt="', esc_attr_e('Minatura da imagem do item', 'tainacan-brennand'), '" src="', esc_url(get_stylesheet_directory_uri()), '/images/thumbnail_placeholder.png">'?>
							<div class="skeleton"></div> 
						</div>
					<?php endif; ?>

					<div class="metadata-title text-3xl font-bold">
						<h3 class="truncate"><?php the_title(); ?></h3>
					</div>
					<div class="metadata-description text-xl">
							<?php
								foreach($metadata_objects as $metadata_object) {
									if ( $metadata_object->get_metadata_type() !== 'Tainacan\Metadata_Types\Core_Title' ) {
										$second_metadata_value = tainacan_get_the_metadata([ 'metadata' => $metadata_object ]);
										if ( !empty($second_metadata_value) ) {
											echo $second_metadata_value;
											break;
										}
									}
								}
							?>
					</div>
				</a>
			</li>	
		
		<?php $item_index++; endwhile; ?>
	
	</ul>

<?php else : ?>
	<div class="tainacan-brennand-grid-container">
		<section class="section">
			<div class="content has-text-gray-4 has-text-centered">
				<p>
					<span class="icon is-large">
						<i class="tainacan-icon tainacan-icon-48px tainacan-icon-items"></i>
					</span>
				</p>
				<p><?php echo __( 'Nenhum item encontrado.','tainacan-brennand' ); ?></p>
			</div>
		</section>
	</div>
<?php endif; ?>
