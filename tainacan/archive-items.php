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
    <li class="flex items-center">
        <a href="<?php get_page_by_template('acervo'); ?>" class="breadcrumbs-size text-[var(--section-color)] lowercase">
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
	<li class="flex items-center font-bold ">
        <a href="<?php tainacan_the_collection_url(); ?>" class="breadcrumbs-size text-[var(--section-color)] lowercase">
			<?php _e('Busca no Acervo', 'tainacan-brennand'); ?> 
        </a>
	</li>
</ul>

<?php 

/**
 * The following would render the collection name and description, but while
 * we only have one collection, we simply name this "Busca no acervo"
<div class="">
	<h1 style="margin-top: 0;"><?php tainacan_the_collection_name(); ?></h1>
</div>
<div class="">
	<?php tainacan_the_collection_description(); ?>
</div>
?*/
	$page_title = '<h1 class="m0 pt-2 pb-4 font-bold ob-text-5 uppercase">' . __('Busca no Acervo', 'tainacan-brennand') . '</h1>';
	echo '<script type="text/javascript">
		wp.hooks.addFilter("tainacan_faceted_search_search_control_before", "tainacan-hooks", function() { return `' . $page_title . '`; });
	</script>';
?>



<div class="tainacan-items-list--container text-ob-red">
	<?php 
		tainacan_the_faceted_search([
			'default_view_mode' => 'masonry',
			'default_items_per_page' => 12,
			'hide_filters' => false,
			'hide_hide_filters_button' => true,
			'hide_search' => false,
			'hide_advanced_search' => true,
			'hide_sort_by_button' => false,
			'hide_exposers_button' => true,
			'hide_items_per_page_button' => true,
			'hide_go_to_page_button' => true,
			'show_filters_button_inside_search_control' => false,
			'start_with_filters_hidden' => false,
			'filters_as_modal' => false,
			'show_inline_view_mode_options' => false,
			'show_fullscreen_with_view_modes' => false
		]); 
	?>
</div>

