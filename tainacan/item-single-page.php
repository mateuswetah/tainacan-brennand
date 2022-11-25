
<div id="app">
    <main id="main" class="main">         
        <div class="mkdf-container-inner clearfix">
            <div class="mkdf-grid-row  mkdf-grid-large-gutter">
                <div class="mkdf-page-content-holder mkdf-grid-col-12">
                    <div class="mkdf-blog-holder mkdf-blog-single mkdf-blog-single-standard">
                        <article id="post-<?php echo get_the_ID()?>" class="post-<?php echo get_the_ID() ?> tnc_col_11527_item type-tnc_col_11527_item status-publish format-standard has-post-thumbnail hentry">
                            <div class="mkdf-post-content">
                                <div class="mkdf-post-text">
                                    <div class="mkdf-post-text-inner tainacan-single-item--columns">
                                        <div class="tainacan-single-item--column-1">
                                            <div class="wpb_wrapper">
                                                <h6 class="mkdf-st-tagline" style="margin-bottom: 0;">
                                                    <a href="<?php echo get_post_type_archive_link('tainacan-collection'); ?>">
                                                        <?php _e('Collections', 'tainacan-brennand'); ?>
                                                    </a>,
                                                    <a href="<?php echo tainacan_get_source_item_list_url_brennand(); ?>">
                                                        <?php tainacan_the_collection_name(); ?>
                                                    </a>
                                                </h6>
                                                <h1 itemprop="name" class="entry-title mkdf-post-title"><?php echo single_post_title(); ?></h1>
                                                <div class="vc_separator"></div>
                                            </div>
                                            <?php
                                                include(TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-metadata.php' );
                                                do_action( 'tainacan-brennand-single-item-after-metadata' );
                                            ?>
                                        </div>
                                        <div class="tainacan-single-item--column-2">
                                            <?php
                                                include(TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-attachments.php' );
                                                do_action( 'tainacan-brennand-single-item-after-attachments' );
                                            ?>
                                            <?php
                                                include(TAINACAN_BRENNAND_PLUGIN_DIR_PATH . 'template-parts/tainacan-item-single-items-related-to-this.php' );
                                                do_action( 'tainacan-brennand-single-item-after-items-related-to-this' );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php tainacan_brennand_item_navigation(); ?>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
