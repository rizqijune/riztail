<div class="bg-white border rounded-xl border-neutral-200 dark:border-neutral-700 dark:bg-htm">
<header class="relative flex flex-col items-center justify-center not-prose md:justify-normal rounded-xl bg-gradient-color bg-clip-border text-pth md:flex-row">
    <?php if ($page->coverImage()): ?>
        <div class="relative h-56 mx-4 -mt-6 overflow-hidden shadow-lg w-80 md:ml-0 rounded-xl bg-accent-1 dark:bg-violet-950 bg-clip-border text-pth dark:text-htm hover:shadow-accent-2/40">
            <img class="object-cover w-full h-56" alt="Cover Image of <?php echo $page->title(); ?>" src="<?php echo $page->coverImage(); ?>" layout="fill" />
        </div>
    <?php endif ?>
    <div class="p-6 text-center md:text-left">
        <h1 class="block mb-2 font-sans text-xl antialiased font-semibold leading-tight tracking-normal md:text-3xl">
            <?php echo $page->title(); ?>
        </h1>
        <!-- Creation date -->
        <?php if (!$page->isStatic() && !$url->notFound()): ?>
        <span class="text-sm text-neutral-200">
            <?php echo $page->date(); ?>
            <?php echo $L->get('| Read time') . ': ' . $page->readingTime(); ?>
        </span>
        <?php endif ?>
    </div>
    </header>
    <div class="min-w-full p-3 prose md:prose-lg dark:prose-invert prose-p:mx-auto prose-a:underline-offset-4 prose-a:decoration-wavy">
        