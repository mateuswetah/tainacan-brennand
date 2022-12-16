<div class="h-8 mb-0.5">
    <ul class="flex flex-wrap py-0.5 2xl:mb-0 mx-4 lg:!mx-8 lg:top-0 w-full  z-[2] bg-[var(--background-color)]">
        <li class="flex items-center">
            <a href="<?php get_home_url(); ?>" class="tiny-text-size text-[var(--section-color)] lowercase">
                <?php _e('Home', 'tainacan-brennand'); ?>            
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="19.11" height="33.031" viewBox="0 0 19.11 33.031" class="fill-icon inject-me ml-2 mr-2 w-[4px] lg:w-[6px] 2xl:w-[8px]">
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
                <a href="<?php echo get_permalink($acervo_page) ?>" class="tiny-text-size text-[var(--section-color)] lowercase">
                    <?php _e('Acervo', 'tainacan-brennand'); ?>        
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="19.11" height="33.031" viewBox="0 0 19.11 33.031" class="fill-icon inject-me ml-2 mr-2 w-[4px] lg:w-[6px] 2xl:w-[8px]">
                    <g id="Grupo_92" data-name="Grupo 92" transform="translate(19.11 33.031) rotate(180)">
                        <g id="Grupo_89" data-name="Grupo 89" transform="translate(0 0)">
                        <path id="Caminho_91" data-name="Caminho 91" d="M16.1,0,0,16.6,16.147,33.031,19.1,30.015,5.961,16.6,19.11,3.014Z" transform="translate(0)" fill="#dddad3"></path>
                        </g>
                    </g>
                </svg>
            </li>
        <?php endif; ?>
        <li class="flex items-center">
            <a href="<?php tainacan_the_collection_url(); ?>" class="tiny-text-size text-[var(--section-color)] lowercase">
            <?php _e('Busca no Acervo', 'tainacan-brennand'); ?>        
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="19.11" height="33.031" viewBox="0 0 19.11 33.031" class="fill-icon inject-me ml-2 mr-2 w-[4px] lg:w-[6px] 2xl:w-[8px]">
                <g id="Grupo_92" data-name="Grupo 92" transform="translate(19.11 33.031) rotate(180)">
                    <g id="Grupo_89" data-name="Grupo 89" transform="translate(0 0)">
                    <path id="Caminho_91" data-name="Caminho 91" d="M16.1,0,0,16.6,16.147,33.031,19.1,30.015,5.961,16.6,19.11,3.014Z" transform="translate(0)" fill="#dddad3"></path>
                    </g>
                </g>
            </svg>
        </li>
        <li class="flex items-center font-bold ">
            <a href="<?php the_permalink() ?>" class="tiny-text-size text-[var(--section-color)] lowercase">
                <?php the_title(); ?> 
            </a>
        </li>
    </ul>
</div>