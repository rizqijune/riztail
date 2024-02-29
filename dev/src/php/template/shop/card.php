<div class="relative flex-shrink-0 m-2 overflow-hidden rounded-lg shadow-lg w-30 bg-violet-500">
    <svg class="absolute bottom-0 left-0 w-20 mb-8" viewBox="0 0 375 283" style="transform: scale(1.5); opacity: 0.1;">
        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white" />
        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white" />
    </svg>
    <div class="relative flex items-center justify-center px-10 pt-10 h-28 max-h-28">
        <!-- Skeleton Loader -->
        <div class="w-20 h-20 bg-gray-400 rounded-full skeleton-loader animate-pulse"></div>
        <!-- Real Image (hidden until loaded) -->
        <img class="relative hidden w-24 cursor-pointer real-image" loading="auto"
             src="<?php echo DOMAIN_UPLOADS_PAGES . $shop->uuid() . '/' . $shop->getValue('coverImage'); ?>"
             data-src="<?php echo DOMAIN_UPLOADS_PAGES . $shop->uuid() . '/' . $shop->getValue('coverImage'); ?>"
             alt="<?php echo $shop->title(); ?> product image"
             onclick="openModal('<?php echo $shop->title(); ?>', '<?php echo implode(', ', $tags); ?>', '<?php echo DOMAIN_UPLOADS_PAGES . $shop->uuid() . '/' . $shop->getValue('coverImage'); ?>','<?php echo $shop->title(); ?> product image')"
             onload="onImageLoad()">
    </div>
    <div class="relative px-2 pb-2 mt-2 text-white">
        <?php if(!empty($shop->custom('subcat'))){ ?>
            <span class="block -mb-1 opacity-75"><?php echo $shop->custom('subcat'); ?></span>
        <?php } else { ?>
            <span class="block -mb-1 opacity-75">Product</span>
        <?php } ?>
        <div class="flex justify-between">
            <span class="block max-w-sm overflow-x-auto text-xs font-semibold text-nowrap"><?php echo $shop->title(); ?></span>
        </div>
        <div class="inline-flex items-baseline justify-center">
            <span
                class="px-2 py-1 mx-1 text-xs font-bold leading-none text-orange-500 bg-white rounded-full"><?php echo 'IDR ' . $shop->custom('price'); ?></span>
        </div>
        <div class="inline-flex items-baseline">
            <div class="mt-2" id="tagContainer">
                <?php
                $visibleTags = array_slice($tags, 0, 2);
                foreach ($visibleTags as $tagKey => $tagName): ?>
                    <span
                        class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-200 rounded-full"><?php echo $tagName; ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php if (count($tags) > 2): ?>
        <button class="absolute px-2 py-1 mt-2 ml-2 text-xs text-gray-500 rounded-full right-2 top-1 hover:text-gray-800 bg-slate-50"
        onclick="openModal('<?php echo $shop->title(); ?>', '<?php echo implode(', ', $tags); ?>', '<?php echo DOMAIN_UPLOADS_PAGES . $shop->uuid() . '/' . $shop->getValue('coverImage'); ?>','<?php echo $shop->title(); ?> product image')"><?php echo $L->get('view'); ?></button>
    <?php endif; ?>
    
</div>
