<?php if ( have_posts() ) : ?>

	<ul class="tainacan-brennand-grid-container">

		<?php $item_index = 0; while ( have_posts() ) : the_post(); $item = tainacan_get_item(); ?>
			
			<li class="py-8 pl-0 pr-4 md:px-0 flex flex-col md:flex-row border-t-[3px] border-ob--ob-red text-[var(--section-color)] w-full">
				<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php echo tainacan_brennand_get_item_link_for_navigation(get_permalink(), $item_index); ?>" class="md:w-1/3 max-w-[218px] md:shrink-0 md:mr-14 lg:mr-16 2xl:mr-20 md:mb-0">
						<?php the_post_thumbnail( 'tainacan-medium-full', ['class' => 'w-full h-auto wp-post-image'] ); ?>
						<a class="skeleton"></a> 
					</a>
				<?php else : ?>
					<a href="<?php echo tainacan_brennand_get_item_link_for_navigation(get_permalink(), $item_index); ?>" class="md:w-1/3 max-w-[218px] md:shrink-0 md:mr-14 lg:mr-16 2xl:mr-20 md:mb-0">
						<?php echo '<img class="w-full h-auto wp-post-image" alt="', esc_attr_e('Minatura da imagem do item', 'tainacan-brennand'), '" src="', esc_url(get_stylesheet_directory_uri()), '/images/thumbnail_placeholder.png">'?>
						<a class="skeleton"></a> 
					</a>
				<?php endif; ?>

				<div class="md:grow flex flex-col justify-between">
					<div class="mb-8 font-kobel font-bold text-4xl">
						<h3> 
							<a href="<?php echo tainacan_brennand_get_item_link_for_navigation(get_permalink(), $item_index); ?>">
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
							</a>
						</h3>
						<span class="item-title-size"></span>
					</div>
					<div class="flex justify-between items-end flex-col md:flex-row mt-auto">
						<div class="max-w-[798px] font-kobel font-bold text-size">
							<?php
								$category_item_metadata = $item->get_metadata(array(
									'id' => 304439 // 442 - ID of the category metadata
								));
								$category = false;
								
								if ( $category_item_metadata && is_array($category_item_metadata) ) {
									foreach ( $category_item_metadata as $item_metadatum ) {
										$category = $item_metadatum->get_value_as_string();
									}
								}
								if ($category)
									echo '<div class="metadata-description text-xl">' . $category . '</div>';
							?>
						</div>

						<a href="<?php echo tainacan_brennand_get_item_link_for_navigation(get_permalink(), $item_index); ?>" class="-mb-1.5 text-3xl font-kobel font-bold self-start md:self-auto mt-4 md:mt-0">ver mais →</a>
					</div>
				</div>
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
