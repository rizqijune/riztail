<?php if (empty($content)): ?>
	<div class="mt-4">
		<?php $language->p('No pages found') ?>
	</div>
<?php endif ?>
<div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-2 lg:grid-cols-3 md:gap-8 md:mt-16">
	<?php foreach ($content as $page): ?>
		<!-- Post -->
		<div class="relative flex flex-col border w-80 rounded-xl bg-pth bg-clip-border hover:shadow-md hover:shadow-accent-1 dark:border-neutral-700 dark:bg-htm dark:shadow-md dark:hover:shadow-accent-2/60">
			<!-- Load Bludit Plugins: Page Begin -->
			<?php Theme::plugins('pageBegin'); ?>	
			<!-- Cover image -->
			<?php if ($page->coverImage()): ?>
				<a href="<?php echo $page->permalink(); ?>">
				<div class="relative h-56 mx-4 -mt-6 overflow-hidden shadow-lg rounded-xl bg-accent-1 bg-clip-border hover:shadow-accent-1 dark:hover:shadow-accent-2">
					<img class="object-cover w-full h-56" alt="<?php echo $page->title(); ?>"
						src="<?php echo $page->coverImage(); ?>" layout="fill" />
				</div>
				</a>
			<?php endif ?>
			
			<div class="p-6">
			<a class="no-underline !text-htm dark:!text-pth" href="<?php echo $page->permalink(); ?>">
				<h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal">
					<?php echo $page->title(); ?>
				</h5>
			</a>
			<div class="pointer-events-none">
				<!-- Creation date -->
				<?php if ($themePlugin->dateFormat() == 'relative') : ?>
				<span class="text-sm text-neutral-400 dark:text-neutral-200">
					<?php echo $page->relativeTime(); ?>
					</i><?php echo $L->get(' Read time') . ': ' . $page->readingTime(); ?>
				</span>
				<?php elseif ($themePlugin->dateFormat() == 'absolute') : ?>
					<span class="text-sm text-neutral-400 dark:text-neutral-200">
					<?php echo $page->date(); ?>
					</i><?php echo $L->get(' Read time') . ': ' . $page->readingTime(); ?>
				</span>
				<?php endif ?>
				<p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
					<!-- Breaked content -->
					<?php echo $page->contentBreak(); ?>
				</p>
				</div>
				<?php if ($page->readMore()): ?>
					<div class="pt-0 ml-0">
						<a class="btn-primary !text-pth !no-underline"
							type="button" href="<?php echo $page->permalink(); ?>">
							<?php echo $L->get('Read more'); ?>
				</a>
					</div>
				<?php endif ?>
			</div>


			<!-- Load Bludit Plugins: Page End -->
			<?php Theme::plugins('pageEnd'); ?>
		</div>
	<?php endforeach ?>
</div>