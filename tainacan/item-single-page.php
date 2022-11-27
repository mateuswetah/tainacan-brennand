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

<ul class="flex flex-wrap mt-0.5 mb-0.5 2xl:mb-0 mx-8">
    <li class="flex items-center">
        <a href="<?php get_home_url(); ?>" class="breadcrumbs-size text-[var(--section-color)] lowercase">
            <?php _e('Home', 'tainacan-brennand'); ?>            
        </a>
		<svg xmlns="http://www.w3.org/2000/svg" width="19.11" height="33.031" viewBox="0 0 19.11 33.031" class="injected-svg fill-icon inject-me ml-2 mr-3 w-[7px] lg:w-[9px] 2xl:w-[11px]">
			<g id="Grupo_92" data-name="Grupo 92" transform="translate(19.11 33.031) rotate(180)">
				<g id="Grupo_89" data-name="Grupo 89" transform="translate(0 0)">
				<path id="Caminho_91" data-name="Caminho 91" d="M16.1,0,0,16.6,16.147,33.031,19.1,30.015,5.961,16.6,19.11,3.014Z" transform="translate(0)" fill="#dddad3"></path>
				</g>
			</g>
		</svg>
    </li>
    <?php 
    $acervo_page = tainacan_brennand_get_acervo_page();
    if ($acervo_page): ?>
        <li class="flex items-center">
            <a href="<?php echo get_permalink($acervo_page) ?>" class="breadcrumbs-size text-[var(--section-color)] lowercase">
                <?php _e('Acervo', 'tainacan-brennand'); ?>        
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="19.11" height="33.031" viewBox="0 0 19.11 33.031" class="injected-svg fill-icon inject-me ml-2 mr-3 w-[7px] lg:w-[9px] 2xl:w-[11px]">
                <g id="Grupo_92" data-name="Grupo 92" transform="translate(19.11 33.031) rotate(180)">
                    <g id="Grupo_89" data-name="Grupo 89" transform="translate(0 0)">
                    <path id="Caminho_91" data-name="Caminho 91" d="M16.1,0,0,16.6,16.147,33.031,19.1,30.015,5.961,16.6,19.11,3.014Z" transform="translate(0)" fill="#dddad3"></path>
                    </g>
                </g>
            </svg>
        </li>
    <?php endif; ?>
    <li class="flex items-center">
        <a href="<?php tainacan_the_collection_url(); ?>" class="breadcrumbs-size text-[var(--section-color)] lowercase">
        <?php _e('Busca no Acervo', 'tainacan-brennand'); ?>        
        </a>
		<svg xmlns="http://www.w3.org/2000/svg" width="19.11" height="33.031" viewBox="0 0 19.11 33.031" class="injected-svg fill-icon inject-me ml-2 mr-3 w-[7px] lg:w-[9px] 2xl:w-[11px]">
			<g id="Grupo_92" data-name="Grupo 92" transform="translate(19.11 33.031) rotate(180)">
				<g id="Grupo_89" data-name="Grupo 89" transform="translate(0 0)">
				<path id="Caminho_91" data-name="Caminho 91" d="M16.1,0,0,16.6,16.147,33.031,19.1,30.015,5.961,16.6,19.11,3.014Z" transform="translate(0)" fill="#dddad3"></path>
				</g>
			</g>
		</svg>
    </li>
	<li class="flex items-center font-bold ">
        <a href="<?php the_permalink() ?>" class="breadcrumbs-size text-[var(--section-color)] lowercase">
			<?php the_title(); ?> 
        </a>
	</li>
</ul>

<div class="mt-[50px] flex flex-col lg:flex-row lg:justify-between gap-9">

    <h1 itemprop="name" class="block lg:hidden border-b-3 lg:border-b-5 border-b-[var(--section-color)] text-[55px] leading-[1.05] uppercase pb-5"><?php echo single_post_title(); ?></h1>

    <div class="w-full lg:w-50%">
        <div class="w-auto lg:sticky top-[50px]">
            <?php include(TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-attachments.php' ); ?>
        </div>
    </div>

    <div class="relative w-full lg:w-50% text-[var(--section-color)]">

        <div class="overflow-y-auto lg:max-h-[68vh] h-full mb-7 pb-12 border-b-3 lg:border-b-5 border-b-[var(--section-color)]">

            <h1 itemprop="name" class="hidden lg:block border-b-3 lg:border-b-5 border-b-[var(--section-color)] text-[55px] leading-[1.05] uppercase pb-5"><?php echo single_post_title(); ?></h1>

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

            <div class="absolute flex justify-between w-full h-12 bottom-0 text-xl font-bold items-center gap-3 leading-[1.05] lowercase bg-[var(--background-color)]">
                <?php tainacan_brennand_item_navigation(); ?>
            </div>
        </div>    
        
    </div>

</div>

<?php include(TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-related-items.php' ); ?>