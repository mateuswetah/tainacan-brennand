<?php 
    $section_label                = __( 'Items related to this', 'tainacan-brennand' );
    $items_related_to_this_layout = 'list';
    $max_columns_count            = 2;
    $max_items_per_screen         = 4;

if ( function_exists('tainacan_the_related_items_carousel') && tainacan_has_related_items() ) : ?>
    <hr>
    <section class="tainacan-item-section tainacan-item-section--items-related-to-this">
        
        <?php if ($section_label != '') : ?>
            <h2 class="tainacan-single-item-section" id="tainacan-item-items-related-to-this-label">
                <?php echo esc_html( $section_label ); ?>
            </h2>
        <?php endif; ?>
        <div class="tainacan-item-section__items-related-to-this">
            <?php 
                tainacan_the_related_items_carousel([
                    'items_list_layout' => $items_related_to_this_layout,
                    'collection_heading_tag' => 'h3',
                    'dynamic_items_args' => [
                        'max_columns_count' => $max_columns_count
                    ],
                    'carousel_args' => [
                        'max_items_per_screen' => $max_items_per_screen
                    ]
                ]);
            ?>
        <div>

    </section>
<?php endif; ?>