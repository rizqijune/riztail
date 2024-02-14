<div class="relative flex flex-wrap items-center justify-center mt-3 mb-10 overflow-x-hidden">
  <?php foreach ($categories->keys() as $key) : ?>
    <?php
    // Create Category-Object
      // echo 'Category name: '          . $category->name();
        // echo 'Category key: '           . $category->key();
        // echo 'Category description: '       . $category->description();
        // echo 'Category template: '      . $category->template();
        // echo 'Category link: '          . $category->permalink();
        // echo 'Category amount of pages: '   . count($category->pages());
    $category = new Category($key);
    ?>
    <div class="relative flex flex-col justify-center w-10 h-10 mt-3 mr-4 md:w-20 md:h-20">
      <div class="absolute inset-0 bg-center border rounded-xl bg-violet-500 dark:bg-pink-500"></div>
      <a class="relative flex w-10 h-10 m-0 shadow-sm group rounded-xl md:w-20 md:h-20 " href="<?php echo $category->permalink(); ?>">
        <div class="w-10 h-10 overflow-hidden transition duration-300 ease-in-out border border-gray-200 md:w-20 md:h-20 rounded-xl opacity-70 group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
          <img src="https://placehold.co/600x400.webp?text=<?php echo $category->name(); ?>&font=pt-sans" class="block object-cover object-center w-full h-full transition duration-300 transform scale-100 animate-fade-in group-hover:scale-110" alt="<?php echo 'Category ' . $category->name();?>" />
        </div>
        <!-- <div class="absolute bottom-0 z-auto transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110"> -->
          <!-- <span class="flex justify-center p-2 group-hover:p-0"> -->
          <!-- <h2 class="font-serif text-sm font-bold shadow-xl text-pth"><?php //echo $category->name(); ?></h2> -->
          <!-- <h3 class="text-sm font-light shadow-xl text-pth"><?php //echo $category->description(); ?></h3> -->
          <!-- </span> -->
        <!-- </div> -->
      </a>
    </div>
  <?php endforeach; ?>
</div>