<aside x-cloak x-transition:enter="transition transform duration-300"
  x-transition:enter-start="-translate-x-full opacity-30  ease-in"
  x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300"
  x-transition:leave-start="translate-x-0 opacity-100 ease-out"
  x-transition:leave-end="-translate-x-full opacity-0 ease-in"
  class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform shadow-lg bg-pth dark:bg-htm lg:z-auto lg:static lg:shadow-none"
  :class="{' -translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}">
  <!-- sidebar header -->
  <div class="flex items-center justify-between flex-shrink-0 p-2 mx-2 mt-2" :class="{'lg:justify-center': !isSidebarOpen}">
    <a class="flex-none h-12 p-2 mx-auto my-auto" href="<?php echo Theme::siteUrl() ?>">
      <?php if ($site->logo()): ?>
        <img src="<?php echo $site->logo() ?>" class="max-h-6" :class="{'lg:hidden hidden': isSidebarOpen}" />
        <img src="<?php echo $site->logo() ?>" class="max-h-6" :class="{'lg:hidden': !isSidebarOpen}" />
      <?php elseif ($site->title()): ?>
        <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">P
          <span :class="{'lg:hidden': !isSidebarOpen}">NYA</span>
        </span>
      <?php endif ?>
    </a>
 
  </div>
  <!-- Sidebar links -->
  <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
    <menu id="main-menu" class="p-2 overflow-hidden">
    <li class="px-5" :class="{'hidden': !isSidebarOpen}">
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
              </div>
            </li>
      <li><a href="<?php echo $site->url(); ?>" class="flex items-center group p-2 space-x-2 !no-underline !text-htm dark:!text-pth rounded-full hover:bg-accent-1/60 dark:hover:bg-accent-2/40" :class="{'justify-center': !isSidebarOpen}">
            <span>
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M2.52 7.823C2 8.77 2 9.915 2 12.203v1.522c0 3.9 0 5.851 1.172 7.063C4.343 22 6.229 22 10 22h4c3.771 0 5.657 0 6.828-1.212C22 19.576 22 17.626 22 13.725v-1.521c0-2.289 0-3.433-.52-4.381c-.518-.949-1.467-1.537-3.364-2.715l-2-1.241C14.111 2.622 13.108 2 12 2c-1.108 0-2.11.622-4.116 1.867l-2 1.241C3.987 6.286 3.038 6.874 2.519 7.823m6.927 7.575a.75.75 0 1 0-.894 1.204A5.766 5.766 0 0 0 12 17.75a5.766 5.766 0 0 0 3.447-1.148a.75.75 0 1 0-.894-1.204A4.267 4.267 0 0 1 12 16.25a4.267 4.267 0 0 1-2.553-.852" clip-rule="evenodd"/></svg>
            </span>
            <span class="group-text-menu" :class="{ 'lg:hidden': !isSidebarOpen }">Home</span>
            </a>
            </li>
      <?php foreach ($staticContent as $staticPage): ?>
        <li>
          <a href="<?php echo $staticPage->permalink(); ?>"
            class="flex items-center group p-2 space-x-2 !no-underline !text-htm dark:!text-pth rounded-full hover:bg-accent-1/60 dark:hover:bg-accent-2/40"
            :class="{'justify-center': !isSidebarOpen}">
            <span>
                <?php if (strpos($staticPage->title(), 'About') !== false): ?>
                <!-- svg here -->
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2s10 4.477 10 10m-10 5.75a.75.75 0 0 0 .75-.75v-6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75M12 7a1 1 0 1 1 0 2a1 1 0 0 1 0-2" clip-rule="evenodd"/></svg>
                <?php elseif (strpos($staticPage->title(), 'Contact') !== false): ?>
                <!-- svg here -->
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M3.172 5.172C2 6.343 2 8.229 2 12c0 3.771 0 5.657 1.172 6.828C4.343 20 6.229 20 10 20h4c3.771 0 5.657 0 6.828-1.172C22 17.657 22 15.771 22 12c0-3.771 0-5.657-1.172-6.828C19.657 4 17.771 4 14 4h-4C6.229 4 4.343 4 3.172 5.172M18.576 7.52a.75.75 0 0 1-.096 1.056l-2.196 1.83c-.887.74-1.605 1.338-2.24 1.746c-.66.425-1.303.693-2.044.693c-.741 0-1.384-.269-2.045-.693c-.634-.408-1.352-1.007-2.239-1.745L5.52 8.577a.75.75 0 0 1 .96-1.153l2.16 1.799c.933.777 1.58 1.315 2.128 1.667c.529.34.888.455 1.233.455c.345 0 .704-.114 1.233-.455c.547-.352 1.195-.89 2.128-1.667l2.159-1.8a.75.75 0 0 1 1.056.097" clip-rule="evenodd"/></svg>
                <?php elseif (strpos($staticPage->title(), 'Shop') !== false): ?>
                <!-- svg here -->
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3.778 3.655c-.181.36-.27.806-.448 1.696l-.598 2.99a3.06 3.06 0 1 0 6.043.904l.07-.69a3.167 3.167 0 1 0 6.307-.038l.073.728a3.06 3.06 0 1 0 6.043-.904l-.598-2.99c-.178-.89-.267-1.335-.448-1.696a3 3 0 0 0-1.888-1.548C17.944 2 17.49 2 16.582 2H7.418c-.908 0-1.362 0-1.752.107a3 3 0 0 0-1.888 1.548M18.269 13.5a4.53 4.53 0 0 0 2.231-.581V14c0 3.771 0 5.657-1.172 6.828c-.943.944-2.348 1.127-4.828 1.163V18.5c0-.935 0-1.402-.201-1.75a1.5 1.5 0 0 0-.549-.549C13.402 16 12.935 16 12 16s-1.402 0-1.75.201a1.5 1.5 0 0 0-.549.549c-.201.348-.201.815-.201 1.75v3.491c-2.48-.036-3.885-.22-4.828-1.163C3.5 19.657 3.5 17.771 3.5 14v-1.081a4.53 4.53 0 0 0 2.232.581a4.549 4.549 0 0 0 3.112-1.228A4.643 4.643 0 0 0 12 13.5a4.644 4.644 0 0 0 3.156-1.228a4.549 4.549 0 0 0 3.112 1.228"/></svg>
                <?php else: ?>
                <!-- svg here -->
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M4.172 3.172C3 4.343 3 6.229 3 10v4c0 3.771 0 5.657 1.172 6.828C5.343 22 7.229 22 11 22h2c3.771 0 5.657 0 6.828-1.172C21 19.657 21 17.771 21 14v-4c0-3.771 0-5.657-1.172-6.828C18.657 2 16.771 2 13 2h-2C7.229 2 5.343 2 4.172 3.172M7.25 8A.75.75 0 0 1 8 7.25h8a.75.75 0 0 1 0 1.5H8A.75.75 0 0 1 7.25 8m0 4a.75.75 0 0 1 .75-.75h8a.75.75 0 0 1 0 1.5H8a.75.75 0 0 1-.75-.75M8 15.25a.75.75 0 0 0 0 1.5h5a.75.75 0 0 0 0-1.5z" clip-rule="evenodd"/></svg>
              <?php endif; ?>
            </span>
            <span class="group-text-menu" :class="{ 'lg:hidden': !isSidebarOpen }"><?php echo $staticPage->title(); ?></span>
          </a>
        </li>
      <?php endforeach ?>
      <li class="px-5" :class="{'hidden': !isSidebarOpen}">
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Ads</div>
              </div>
            </li>
            <li>
              thsi is slider
            </li>
      <!-- Sidebar Links... -->
    </menu>
    
  </nav>
  <!-- Sidebar footer -->
  <div class="flex-shrink-0 p-2 border-t max-h-14">
    <button
      class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase border rounded-md bg-secondary dark:bg-neutral-700 border-htm dark:border-accent-1 focus:outline-none focus:ring">
      <span>
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
      </span>
      <span :class="{'lg:hidden': !isSidebarOpen}"> Promo or Ads</span>
    </button>
  </div>
</aside>