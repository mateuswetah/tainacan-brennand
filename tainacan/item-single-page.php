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

// add_filter('tainacan-get-item-metadatum-as-html-before-title', function($metadatum_title_before, $item_metadatum) {
    
//     $special_sections_ids['secao-de-classificacao-do-acervo-online'] = 'default_section';
//     $special_sections_ids['creditos'] = '312375';

//     if ( $item_metadatum->get_metadatum()->get_metadata_section_id() == $special_sections_ids['secao-de-classificacao-do-acervo-online'] ) {
//         $metadatum_title_before = str_replace('class="', 'class="invisible  ', $metadatum_title_before);
//     }

//     if ( $item_metadatum->get_metadatum()->get_metadata_section_id() == $special_sections_ids['creditos'] ) {
//         $metadatum_title_before = str_replace('class="', 'class="lowercase inline', $metadatum_title_before);
//     }

//     return $metadatum_title_before;
// }, 2, 10);

?>

<div class="mt-[50px] flex flex-col xl:flex-row xl:justify-between gap-9">

    <div class="w-full xl:w-50% mb-10 xl:mb-0">
        <div class="w-auto sticky top-[50px]">
            <?php
                include(TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-attachments.php' );
                do_action( 'tainacan-brennand-single-item-after-attachments' );
            ?>
        </div>
    </div>

    <div class="w-full xl:w-50% text-[var(--section-color)]">

        <div class="relative h-full mb-7 pb-12 border-b-5 border-b-[var(--section-color)]">

            <h1 itemprop="name" class="border-b-5 border-b-[var(--section-color)] text-[55px] leading-[1.05] uppercase pb-5"><?php echo single_post_title(); ?></h1>

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

            <div class="absolute flex justify-between w-full h-12 bottom-0 text-xl font-bold items-center gap-2 leading-[1.05] lowercase bg-[var(--background-color)]">
                <?php tainacan_brennand_item_navigation(); ?>
            </div>
        </div>    

        <div class="w-full xl:w-50% text-[var(--section-color)]">

            <?php include(TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-items-related-to-this.php' ); ?>

        </div>
        
    </div>

</div>