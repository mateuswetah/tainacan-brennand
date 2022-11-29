<?php 

$item = tainacan_get_item();
$terms_item_metadata = $item->get_metadata(array(
    'id' => 127 // 442 - ID of the terms metadata
));
$terms = [];

if ( $terms_item_metadata && is_array($terms_item_metadata) ) {
    foreach ( $terms_item_metadata as $item_metadatum ) {
        $terms = $item_metadatum->get_value();
    }
}

$related_items_query = false;

if ( $terms && is_array($terms) )
    $related_items_query = tainacan_brennand_get_related_items($terms, $item);

if ( $related_items_query && $related_items_query->have_posts() ): ?>
<div class="w-full text-[var(--section-color)]">
    <section class="tainacan-item-section tainacan-item-section--items-related-to-this">
        <h2 class="mt-2 font-bold uppercase ob-text-5" id="tainacan-item-items-related-to-this-label">
            <?php echo _e('Veja também', 'tainacan-brennand') ?>
        </h2>
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-9 list-none mx-0 my-5">
        <?php while ( $related_items_query->have_posts() ): $related_items_query->the_post(); ?>
            <li class="flex items-center justify-center justify-self-stretch self-stretch tainacan-brennand-grid-item aspect-square group border-3 lg:border-5 border-ob-red p-3.5 text-center">
                <a class="w-full aspect-square" href="<?php echo get_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="tainacan-brennand-grid-item-thumbnail">
                            <?php the_post_thumbnail( 'tainacan-medium-full', ['class' => 'mx-auto attachment-tainacan-medium-full size-tainacan-medium-full'] ); ?>
                            <div class="skeleton"></div> 
                        </div>
                    <?php else : ?>
                        <div class="tainacan-brennand-grid-item-thumbnail">
                            <?php echo '<img class="mx-auto" alt="', esc_attr_e('Item sem imagem', 'tainacan-brennand'), '" src="', esc_url(get_stylesheet_directory_uri()), '/images/thumbnail_placeholder.png">'?>
                            <div class="skeleton"></div> 
                        </div>
                    <?php endif; ?>

                    <div class="metadata-title text-3xl font-bold">
                        <h3 class="truncate"><?php the_title(); ?></h3>
                    </div>
                    <div class="metadata-description text-xl">
                            
                    </div>
                </a>
            </li>	
        <?php endwhile; ?>
        </ul>
    </section>
</div>
<?php endif; ?>