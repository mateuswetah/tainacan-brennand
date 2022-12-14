<?php
    $attachments = tainacan_get_the_attachments();

    // Galley mode is a shortname for when documents and attachments are displayed merged in the same list
    $is_gallery_mode            = true;
    $hide_file_caption_main     = true;
    $hide_file_description_main = true;
    $disable_gallery_lightbox   = false;

    global $post;

    if ( (!empty( $attachments ) || ( $is_gallery_mode && tainacan_has_document() ) ) ) {
    ?>
        <section class="h-full border-2 lg:border-3 border-[var(--section-color)] p-3.5 text-center tainacan-item-section tainacan-item-section--<?php echo ((!$is_gallery_mode ? 'attachments' : 'gallery')) ?>">

            <?php 
            
            $media_items_thumbs = array();
            $media_items_main = array();

            if ($is_gallery_mode) {
            
                $class_slide_metadata = 'noLightbox hide-name hide-description hide-caption';

                if ( tainacan_has_document() ) {
                    $is_document_type_attachment = tainacan_get_the_document_type() === 'attachment';
                    if (tainacan_get_item() && tainacan_get_item()->get_document_mimetype()) {
                        $disable_gallery_lightbox = tainacan_get_item()->get_document_mimetype() === 'application/pdf'; 
                    }
                    $media_items_main[] =
                        tainacan_get_the_media_component_slide(array(
                            'media_content' => tainacan_get_the_document(),
                            'media_content_full' => $is_document_type_attachment ? tainacan_get_the_document(0, 'full') : ('<div class="attachment-without-image">' . tainacan_get_the_document(0, 'full') . '</div>'),
                            'media_type' => tainacan_get_the_document_type(),
                            'class_slide_content' => 'noLightbox',
                            'class_slide_metadata' => $class_slide_metadata
                        ));
                }
                
                foreach ( $attachments as $attachment ) {
                    $media_items_main[] =
                        tainacan_get_the_media_component_slide(array(
                            'media_content' => tainacan_get_attachment_as_html($attachment->ID, 0),
                            'media_content_full' => wp_attachment_is('image', $attachment->ID) ? wp_get_attachment_image( $attachment->ID, 'full', false) : ('<div class="attachment-without-image tainacan-embed-container"><iframe id="tainacan-attachment-iframe" src="' . tainacan_get_attachment_html_url($attachment->ID) . '"></iframe></div>'),
                            'media_type' => $attachment->post_mime_type,
                            'class_slide_content' => 'noLightbox',
                            'class_slide_metadata' => $class_slide_metadata
                        ));
                }
            }
            
            tainacan_the_media_component(
                'tainacan-item-attachments_id-' . $post->ID,
                null,
                $is_gallery_mode ? $media_items_main : null,
                array(
                    'class_main_li' => 'noLightbox h-full',
                    'class_thumbs_li' => 'tainacan-item-section__attachments-file noLightbox',
                    'swiper_thumbs_options' => $is_gallery_mode ? '' : array(
                        'navigation' => array(
                            'nextEl' => '.swiper-navigation-next_' . 'tainacan-item-attachments_id-' . $post->ID . '-thumbs',
                            'prevEl' => '.swiper-navigation-prev_' . 'tainacan-item-attachments_id-' . $post->ID . '-thumbs',
                        )
                    ),
                    'swiper_main_options' => $is_gallery_mode ? array(
                        'navigation' => array(
                            'nextEl' => '.swiper-navigation-next_' . 'tainacan-item-attachments_id-' . $post->ID . '-main',
                            'prevEl' => '.swiper-navigation-prev_' . 'tainacan-item-attachments_id-' . $post->ID . '-main',
                        ) 
                    ) : '',
                    'disable_lightbox' => $is_gallery_mode ? $disable_gallery_lightbox : false,
                )
            );
    ?>
        </section>
<?php } ?>