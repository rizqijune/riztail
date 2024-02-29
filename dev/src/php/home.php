<?php if (empty($content)): ?>
	<div class="mt-4">
	<?php include(THEME_DIR_PHP . 'components/404.php'); ?>
	</div>
	<?php elseif($WHERE_AM_I=='home'):?>
<div class=""><h2 class="max-w-lg mt-6 mb-6 font-sans text-3xl font-bold tracking-tight sm:mt-0 sm:text-4xl sm:leading-none"><?php echo $L->get('featured-post') ?></h2></div>
<?php echo $themePlugin->showFeatured();?>
<?php if ($themePlugin->showCategories() == 'true'): ?>
	<?php include(THEME_DIR_PHP . 'components/navigations/categories.php'); ?>
<?php endif ?>
<?php include(THEME_DIR_PHP . 'components/product-home-list.php'); ?>
<div class=""><h2 class="max-w-lg mt-6 mb-6 font-sans text-3xl font-bold tracking-tight sm:mt-0 sm:text-4xl sm:leading-none"><?php echo $L->get('latest-post') ?></h2></div>
<?php Theme::plugins('pageBegin'); ?>
<?php include(THEME_DIR_PHP . 'components/post.php'); ?>
<?php elseif($WHERE_AM_I=='category'):?>
	<?php include(THEME_DIR_PHP . 'components/cat-post.php'); ?>
	<?php else:?>
		Please check your code
<!-- Load Bludit Plugins: Page End -->
<?php Theme::plugins('pageEnd'); ?>
<?php endif ?>
