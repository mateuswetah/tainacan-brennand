<?php

/* The following was the strategy for using tailwind classes directly into the metadata sections, but
this is less performant and way more complex to keep than simply using css hierarchy according to each
section class... */

// add_filter('tainacan-get-metadata-section-as-html-before', function($before, $metadata_section) {
//     if ( 'secao-de-classificacao-do-acervo-online' === $metadata_section->get_slug() ) {
//         $before = str_replace('class="', 'class="text-2xl font-bold  ', $before);
//     }

//     if ( 'creditos' === $metadata_section->get_slug() ) {
//         $before = str_replace('class="', 'class="text-2xl ', $before);
//     }

//     return $before;
// }, 2, 10);

?>

<div class="mt-[12px] flex flex-col lg:flex-row lg:justify-between gap-9">

    <h1 itemprop="name" class="block lg:hidden border-b-3 lg:border-b-5 border-b-[var(--section-color)] text-[55px] leading-[1.05] uppercase pb-5"><?php echo single_post_title(); ?></h1>

    <div class="w-full lg:w-50%">
        <div class="w-auto lg:sticky top-[50px] lg:max-h-[68vh]">
            <?php include(TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-attachments.php' ); ?>
        </div>
    </div>

    <div class="relative w-full lg:w-50% text-[var(--section-color)]">

        <div class="overflow-y-auto lg:max-h-[68vh] h-full">

            <h1 itemprop="name" class="bg-[var(--background-color)] sticky top-0 hidden lg:block border-b-3 lg:border-b-5 border-b-[var(--section-color)] text-[55px] leading-[1.05] uppercase pb-5"><?php echo single_post_title(); ?></h1>

            <?php tainacan_the_metadata_sections(array(
                'hide_name' => true,
                'metadata_list_args' => array(
                    'display_slug_as_class' => true,
                    'before' 				=> '<div class="tainacan-item-section__metadatum metadata-type-$type" id="$id">',
                    'after' 				=> '</div>',
                    'before_title' => '<h3 class="tainacan-metadata-label">',
                    'after_title' => '</h3>',
                    'before_value' => '<p class="tainacan-metadata-value">',
                    'after_value' => '</p>',
                    'exclude_title' => true
                )
            )); ?>

            <div class="absolute bottom-0 flex justify-between w-full h-12 border-t-3 lg:border-t-5 border-t-[var(--section-color)] text-xl font-bold items-end gap-3 leading-[1.05] lowercase bg-[var(--background-color)]">
                <?php tainacan_brennand_item_navigation(); ?>
            </div>
        </div>    
        
    </div>

</div>

<?php include(TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-related-items.php' ); ?>