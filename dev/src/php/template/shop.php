<?php
        $categoryKey = 'shop';
        $category = getCategory($categoryKey);       
?>
<?php if ($category !== 'shop'):?>
    <p>Please make a Shop category at admin panel!</p>
<?php else:?>
<div class=""><h2 class="max-w-lg mt-6 mb-6 font-sans text-3xl font-bold tracking-tight sm:mt-0 sm:text-4xl sm:leading-none"><?php echo $category->name(); ?></h2></div>
<?php foreach ($category->pages() as $pageKey):?>
<?php $shop = new Page($pageKey);?>
<div><?php echo $shop->title();?></div>
<?php endforeach?>
<?php endif?>