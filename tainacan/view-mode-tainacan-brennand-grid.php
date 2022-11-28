<?php if ( have_posts() ) : ?>
	<ul class="tainacan-brennand-grid-container grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-9 mb-9 ml-0 mt-0">
		<?php $item_index = 0; while ( have_posts() ) : the_post(); $item = tainacan_get_item(); ?>
			
			<li class="flex items-center justify-center justify-self-stretch self-stretch tainacan-brennand-grid-item aspect-square group border-4 border-ob-red p-3.5 text-center">
				<a href="<?php echo tainacan_brennand_get_item_link_for_navigation(get_permalink(), $item_index); ?>">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="tainacan-brennand-grid-item-thumbnail">
							<?php the_post_thumbnail( 'tainacan-medium-full', ['class' => 'text-lg truncate mx-auto attachment-tainacan-medium-full size-tainacan-medium-full'] ); ?>
							<div class="skeleton"></div> 
						</div>
					<?php else : ?>
						<div class="tainacan-brennand-grid-item-thumbnail">
							<?php echo '<img class="mx-auto truncate text-lg" alt="', esc_attr_e('Minatura da imagem do item', 'tainacan-brennand'), '" src="', esc_url(get_stylesheet_directory_uri()), '/images/thumbnail_placeholder.png">'?>
							<div class="skeleton"></div> 
						</div>
					<?php endif; ?>

					<div class="grid metadata-title text-3xl font-bold">
						<h3 class="truncate">
							<?php 
								the_title();

								$data_item_metadata = $item->get_metadata(array(
									'id' => 238629 // 67 - ID of the year metadata
								));
								$data = false;
								
								if ( $data_item_metadata && is_array($data_item_metadata) ) {
									foreach ( $data_item_metadata as $item_metadatum ) {
										$data = $item_metadatum->get_value_as_string();
									}
								}
								if ($data)
									echo ', ' . $data;
							?>
						</h3>
					</div>
					<?php
						$category_item_metadata = $item->get_metadata(array(
							'id' => 304439 //442 - ID of the category metadata
						));
						$category = false;
						
						if ( $category_item_metadata && is_array($category_item_metadata) ) {
							foreach ( $category_item_metadata as $item_metadatum ) {
								$category = $item_metadatum->get_value_as_string();
							}
						}
						if ($category)
							echo '<div class="grid metadata-description text-xl">' . $category . '</div>';
					?>
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
