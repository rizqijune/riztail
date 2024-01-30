<aside x-transition:enter="transition transform duration-300"
  x-transition:enter-start="-translate-x-full opacity-30  ease-in"
  x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300"
  x-transition:leave-start="translate-x-0 opacity-100 ease-out"
  x-transition:leave-end="-translate-x-full opacity-0 ease-in"
  class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform shadow-lg bg-pth dark:bg-htm lg:z-auto lg:static lg:shadow-none"
  :class="{' -translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}">
  <!-- sidebar header -->
  <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
    <a class="flex-none h-12 p-2" href="<?php echo Theme::siteUrl() ?>">
      <?php if ($site->logo()): ?>
        <img src="<?php echo $site->logo() ?>" class="max-h-6" :class="{'lg:hidden': isSidebarOpen}" />
        <img src="<?php echo $site->logo() ?>" class="max-h-6" :class="{'lg:hidden': !isSidebarOpen}" />
      <?php elseif ($site->title()): ?>
        <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">P
          <span :class="{'lg:hidden': !isSidebarOpen}">NYA</span>
        </span>
      <?php endif ?>
    </a>
    <button name="close-sidebar-menu" @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
      <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>
  <!-- Sidebar links -->
  <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
    <menu class="p-2 overflow-hidden">
      <?php foreach ($staticContent as $staticPage): ?>
        <li>
          <a href="<?php echo $staticPage->permalink(); ?>"
            class="flex items-center group p-2 space-x-2 !no-underline !text-htm dark:!text-pth rounded-full hover:bg-accent-1/60 dark:hover:bg-accent-2/40"
            :class="{'justify-center': !isSidebarOpen}">
            <span>
            <?php if (strpos($staticPage->title(), 'Home') !== false): ?>
                <svg class="icon" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M303.5 5.7c-9-7.6-22.1-7.6-31.1 0l-264 224c-10.1 8.6-11.3 23.7-2.8 33.8s23.7 11.3 33.8 2.8L64 245.5V432c0 44.2 35.8 80 80 80H432c44.2 0 80-35.8 80-80V245.5l24.5 20.8c10.1 8.6 25.3 7.3 33.8-2.8s7.3-25.3-2.8-33.8l-264-224zM112 432V204.8L288 55.5 464 204.8V432c0 17.7-14.3 32-32 32H384V312c0-22.1-17.9-40-40-40H232c-22.1 0-40 17.9-40 40V464H144c-17.7 0-32-14.3-32-32zm128 32V320h96V464H240z" />
                </svg>
                <?php elseif (strpos($staticPage->title(), 'About') !== false): ?>
                <!-- svg here -->
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2s10 4.477 10 10m-10 5.75a.75.75 0 0 0 .75-.75v-6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75M12 7a1 1 0 1 1 0 2a1 1 0 0 1 0-2" clip-rule="evenodd"/></svg>
                <?php elseif (strpos($staticPage->title(), 'Contact') !== false): ?>
                <!-- svg here -->
                <svg class="w-6 h-6 fill-htm" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 17q.425 0 .713-.288T13 16v-4q0-.425-.288-.712T12 11q-.425 0-.712.288T11 12v4q0 .425.288.713T12 17m0-8q.425 0 .713-.288T13 8q0-.425-.288-.712T12 7q-.425 0-.712.288T11 8q0 .425.288.713T12 9m0 13q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m0-8"/></svg>
                <?php else: ?>
                <!-- svg here -->
                <svg class="w-6 h-6 text-htm" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="m464 256a208 208 0 1 0-416 0 208 208 0 1 0 416 0zm-464 0a256 256 0 1 1 512 0 256 256 0 1 1-512 0zm256-96a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                </svg>
              <?php endif; ?>
            </span>
            <span :class="{ 'lg:hidden': !isSidebarOpen }"><?php echo $staticPage->title(); ?></span>
          </a>
        </li>
      <?php endforeach ?>
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
      <span :class="{'lg:hidden': !isSidebarOpen}"> Logout </span>
    </button>
  </div>
</aside>