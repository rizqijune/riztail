<div class="grid grid-cols-1 gap-10 mt-8 md:grid-cols-2 lg:grid-cols-3 md:gap-8 md:mt-16">
<?php
    $pageNumber = 1;
    $numberOfItems = 5;
    $onlyPublished = true;
    $items = $pages->getList($pageNumber, $numberOfItems, $onlyPublished);
    foreach ($items as $key):
        $page = buildPage($key);

        // Skip posts with category containing "shop"
        if (strpos(strtolower($page->category()), 'shop') !== false) {
            continue;
        }
        ?>
		<!-- Post -->
		<div
			class="relative flex flex-col border w-80 max-h-[450px] rounded-xl bg-pth bg-clip-border hover:shadow-md hover:shadow-accent-1 dark:border-neutral-700 dark:bg-htm dark:shadow-md dark:hover:shadow-accent-2/60">
			<!-- Load Bludit Plugins: Page Begin -->
			
			<!-- Cover image -->
			<?php if ($page->coverImage()): ?>
				<a href="<?php echo $page->permalink(); ?>">
					<div
						class="relative h-56 mx-4 -mt-6 overflow-hidden shadow-lg rounded-xl bg-accent-1 bg-clip-border hover:shadow-accent-1 dark:hover:shadow-accent-2">
						<img class="object-cover w-full h-56" alt="<?php echo $page->title(); ?>"
							src="<?php echo $page->coverImage(); ?>" layout="fill" />
					</div>
				</a>
			<?php else: ?>
				<a href="<?php echo $page->permalink(); ?>">
					<div
						class="relative h-56 mx-4 -mt-6 overflow-hidden shadow-lg rounded-xl bg-accent-1 bg-clip-border hover:shadow-accent-1 dark:hover:shadow-accent-2">
						<img class="object-cover w-full h-56" alt="<?php echo $page->title(); ?>"
							src="https://placehold.co/600x400.webp?text=No+Image&font=pt-sans" layout="fill" />
					</div>
				</a>
			<?php endif ?>

			<div class="h-auto p-6">
				<a class="no-underline !text-htm dark:!text-pth" href="<?php echo $page->permalink(); ?>">
					<h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal">
						<?php echo $page->title(); ?>
					</h5>
				</a>
				<div class="pointer-events-none">
					<!-- Creation date -->
					<span class="text-sm text-neutral-400 dark:text-neutral-200">
						<svg class="icon inline !w-5 !h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
							<path
								d="M7.75 2.5a.75.75 0 0 0-1.5 0v1.58c-1.44.115-2.384.397-3.078 1.092c-.695.694-.977 1.639-1.093 3.078h19.842c-.116-1.44-.398-2.384-1.093-3.078c-.694-.695-1.639-.977-3.078-1.093V2.5a.75.75 0 0 0-1.5 0v1.513C15.585 4 14.839 4 14 4h-4c-.839 0-1.585 0-2.25.013z" />
							<path fill="currentColor" fill-rule="evenodd"
								d="M2 12c0-.839 0-1.585.013-2.25h19.974C22 10.415 22 11.161 22 12v2c0 3.771 0 5.657-1.172 6.828C19.657 22 17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172C2 19.657 2 17.771 2 14zm15 2a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2m-4-5a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-6-3a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2"
								clip-rule="evenodd" />
						</svg>
						<?php if ($themePlugin->dateFormat() == 'relative'): ?>
							<?php echo $page->relativeTime(); ?>
						<?php elseif ($themePlugin->dateFormat() == 'absolute'): ?>
							<?php echo $page->date(); ?>
						<?php endif ?>

						<svg class="icon inline !w-5 !h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
							<path fill-rule="evenodd"
								d="M5.198 3.3C5.8 2 7.867 2 12 2c4.133 0 6.2 0 6.802 1.3c.052.11.095.227.13.346c.41 1.387-1.052 2.995-3.974 6.21L13 12l1.958 2.143c2.922 3.216 4.383 4.824 3.974 6.21a2.51 2.51 0 0 1-.13.348C18.2 22 16.133 22 12 22c-4.133 0-6.2 0-6.802-1.3a2.524 2.524 0 0 1-.13-.346c-.41-1.387 1.052-2.995 3.974-6.21L11 12L9.042 9.857C6.12 6.64 4.66 5.033 5.068 3.647a2.46 2.46 0 0 1 .13-.348M10 17.75a.75.75 0 0 0 0 1.5h4a.75.75 0 0 0 0-1.5zM9.25 5.5a.75.75 0 0 1 .75-.75h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75"
								clip-rule="evenodd" />
						</svg>
						<?php echo $page->readingTime() . " " . "read"; ?>

					</span>
					<span
						class="overflow-hidden font-sans text-base antialiased font-light leading-relaxed content text-inherit">
						<!-- Breaked content -->
						<?php echo $page->contentBreak(); ?>
					</span>
				</div>
				<?php if ($page->readMore()): ?>
					<div class="absolute bottom-0 left-0 w-full h-12 blur-sm bg-pth/90 dark:bg-htm/90 "></div>
					<div class="absolute pt-0 ml-0 text-center bottom-4">
						<a class="btn-primary !text-pth !no-underline" type="button" href="<?php echo $page->permalink(); ?>">
							<?php echo $L->get('Read more'); ?>
						</a>
					</div>
				<?php endif ?>
			</div>


			
		</div>
	<?php endforeach ?>

</div>