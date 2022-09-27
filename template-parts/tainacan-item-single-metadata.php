<section class="tainacan-item-section tainacan-item-section--metadata">
    <div class="tainacan-item-section__metadata">
        <?php do_action( 'tainacan-brennand-single-item-metadata-begin' ); ?>
        <?php
            $args = array(
                'display_slug_as_class' => true,
                'before_title' => '<h3 class="tainacan-metadata-label">',
                'after_title' => '</h3>',
                'before_value' => '<p class="tainacan-metadata-value">',
                'after_value' => '</p>',
                'exclude_title' => true
            );
            tainacan_the_metadata( $args );
        ?>
        <?php do_action( 'tainacan-brennand-single-item-metadata-end' ); ?>
    </div>
</section>
