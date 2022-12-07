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
        <h2 class="mt-2 font-bold uppercase text-[2.5rem] leading-[2.68rem]" id="tainacan-item-items-related-to-this-label">
            <?php echo _e('Veja também', 'tainacan-brennand') ?>
        </h2>
        <ul class="modular-grid list-none mx-0 my-5">
            <li class="modular-grid-sizer hidden md:block"></li>
            <?php while ( $related_items_query->have_posts() ): $related_items_query->the_post(); $related_item = tainacan_get_item(); ?>
                <li class="modular-grid-item flex items-center justify-center justify-self-stretch self-stretch tainacan-brennand-grid-item aspect-square group border-3 lg:border-5 border-ob-red px-3.5 pt-4 pb-3 text-center">
                    <a class="h-full flex flex-col aspect-square" href="<?php echo get_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="tainacan-brennand-grid-item-thumbnail mt-auto mb-2 overflow-hidden">
                                <?php the_post_thumbnail( 'tainacan-medium-full', ['class' => 'w-auto max-h-full text-lg truncate mx-auto attachment-tainacan-medium-full size-tainacan-medium-full'] ); ?>
                                <div class="skeleton"></div> 
                            </div>
                        <?php else : ?>
                            <div class="tainacan-brennand-grid-item-thumbnail mt-auto mb-2 overflow-hidden">
                                <?php echo '<img class="w-auto max-h-full mx-auto truncate text-lg" alt="', esc_attr_e('Item sem imagem', 'tainacan-brennand'), '" src="', esc_url(get_stylesheet_directory_uri()), '/images/thumbnail_placeholder.png">'?>
                                <div class="skeleton"></div> 
                            </div>
                        <?php endif; ?>

                        <div class="grid metadata-title text-3xl font-bold mt-auto">
                            <h3 class="truncate">
                                <?php 
                                    the_title();

                                    $data_item_metadata = $related_item->get_metadata(array(
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
                            $category_item_metadata = $related_item->get_metadata(array(
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
            <?php endwhile; ?>
        </ul>
    </section>
</div>
<?php endif; ?>