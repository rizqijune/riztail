
<?php
$categoryKey = 'shop';
$category = getCategory($categoryKey);

if ($WHERE_AM_I == 'home' && $category == 'shop'):
    ?>
	<div class="flex flex-row justify-start my-2 overflow-x-auto flex-nowrap justify-items-center">
    <p>Please make a Shop category at admin panel!</p>
</div>
<?php else:?>
	<div class=""><h2 class="max-w-lg mt-6 mb-6 font-sans text-3xl font-bold tracking-tight sm:mt-0 sm:text-4xl sm:leading-none"><?php echo $category->name(); ?></h2></div>
	<div class="flex flex-row justify-start my-2 overflow-x-auto flex-nowrap justify-items-center">
<?php foreach ($category->pages() as $pageKey):?>
<?php $shop = new Page($pageKey);?>


<div class="max-w-sm mx-2 my-5 rounded-lg shadow-md basis-16">
		<a href="#">
        <?php if ($shop->coverImage()): ?>
			<img class="p-8 rounded-t-lg" src="<?php echo $shop->coverImage();?>" alt="<?php echo $shop->title();?> product image">
            <?php else: ?>
                <img class="p-8 rounded-t-lg" src="https://placehold.co/600x400.webp?text=No+Image&font=pt-sans" alt="<?php echo $shop->title();?> product image">
                <?php endif?>
        </a>
			<div class="px-5 pb-5">
				<a href="#">
					<h3 class="text-xl font-semibold tracking-tight "><?php echo $shop->title();?></h3>
				</a>
				
				<div class="flex items-center justify-between">
					<span class="text-xs font-bold text-gray-900 dark:text-white"><?php echo $shop->custom('price') . " IDR";?></span>
					<a href="#"
						class="btn-primary">Buy</a>
				</div>
			</div>
	</div>
<?php endforeach?>
</div>
<?php endif?>
