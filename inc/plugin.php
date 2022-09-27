<?php

/**
 * Uses Template redirect for setting the proper template to items
 * archives on Tainacan pages
 */
if ( !function_exists('tainacan_brennand_archive_templates_redirects') ) {
    function tainacan_brennand_archive_templates_redirects() {
        global $wp_query;
        
        if (is_post_type_archive()) {
            
            $collections_post_types = \Tainacan\Repositories\Repository::get_collections_db_identifiers();
            $current_post_type = get_post_type();

            if (in_array($current_post_type, $collections_post_types)) {			
                include( TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'tainacan/archive-items.php' );
                exit; 
            } 
            // else if ($current_post_type === 'tainacan-collection') {
            //     include( TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'tainacan/archive-collections.php' );
            //     exit;
            // }
        } else if ( is_tax() ) {
            $term = get_queried_object();
                
            if ( isset($term->taxonomy) && \Tainacan\Theme_Helper::get_instance()->is_taxonomy_a_tainacan_tax($term->taxonomy)) {
                $tax_id = \Tainacan\Repositories\Taxonomies::get_instance()->get_id_by_db_identifier($term->taxonomy);
                $tax = \Tainacan\Repositories\Taxonomies::get_instance()->fetch($tax_id);
                
                include( TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'tainacan/archive-taxonomy.php' );
                exit;
            }
        } else if ( $wp_query->get( 'tainacan_repository_archive' ) == 1 ) {
            
            include( TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'tainacan/archive-repository.php' );
            exit;
        } else if ( is_single() && is_singular() && is_main_query() ) {
            $collections_post_types = \Tainacan\Repositories\Repository::get_collections_db_identifiers();
			$post_type = get_post_type();

			// Check if we're inside the main loop in a single Post.
			if ( in_array($post_type, $collections_post_types)  ) {
                include(TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'tainacan/item-single-page.php' );
                exit;
			}
        }
        
    }
}
add_action('template_redirect', 'tainacan_brennand_archive_templates_redirects');


/**
 * Adds extra class to help styling tainacan archive templates.
 */
if ( !function_exists('tainacan_brennand_post_class') ) {
    function tainacan_brennand_post_class($classes) {

        if ( is_archive() ) {
            $collections_post_types = \Tainacan\Repositories\Repository::get_collections_db_identifiers();
            $current_post_type = get_post_type();
                
            if ( in_array($current_post_type, array_merge($collections_post_types, array('tainacan-items'))) ) {
                $classes[] = 'tainacan-items-archive-page';
            }
        } else if ( is_single() && is_singular() && is_main_query() ) {
            $collections_post_types = \Tainacan\Repositories\Repository::get_collections_db_identifiers();
			$post_type = get_post_type();

			// Check if we're inside the main loop in a single Post.
			if ( in_array($post_type, $collections_post_types)  ) {
               $classes[] = 'tainacan-items-single-page';
			}
        }

        return $classes;
    }
}
add_filter('body_class', 'tainacan_brennand_post_class');
