<!-- Setting panel button -->
<div>
    <button @click="isSettingsPanelOpen = true"
        class="fixed !rounded-full right-2 p-2 btn-gradient top-1/2 shadow-xl dark:shadow-none">
        <?php if ($WHERE_AM_I == 'page' && !$page->isStatic() && !$url->notFound()): ?>
            <svg class="icon !fill-pth" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M4.727 2.712c.306-.299.734-.494 1.544-.6C7.105 2.002 8.209 2 9.793 2h4.414c1.584 0 2.688.002 3.522.112c.81.106 1.238.301 1.544.6c.305.3.504.72.613 1.513c.112.817.114 1.899.114 3.45v7.839H7.346c-.903 0-1.519-.001-2.047.138c-.472.124-.91.326-1.299.592V7.676c0-1.552.002-2.634.114-3.451c.109-.793.308-1.213.613-1.513m2.86 3.072a.82.82 0 0 0-.828.81c0 .448.37.811.827.811h8.828a.82.82 0 0 0 .827-.81a.82.82 0 0 0-.827-.811zm-.828 4.594c0-.447.37-.81.827-.81h5.517a.82.82 0 0 1 .828.81a.82.82 0 0 1-.828.811H7.586a.82.82 0 0 1-.827-.81" clip-rule="evenodd"/><path d="M7.473 17.135c-1.079 0-1.456.007-1.746.083a2.464 2.464 0 0 0-1.697 1.538c.016.382.043.719.084 1.019c.109.793.308 1.213.613 1.513c.306.299.734.494 1.544.6c.834.11 1.938.112 3.522.112h4.414c1.584 0 2.688-.002 3.522-.111c.81-.107 1.238-.302 1.544-.601c.216-.213.38-.486.495-.91H7.586a.82.82 0 0 1-.827-.81c0-.448.37-.811.827-.811H19.97c.02-.466.027-1 .03-1.622z"/></svg>
        <?php else: ?>
            <svg class="icon !fill-pth" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M2.084 2.751a.75.75 0 0 1 .956-.459l.302.106c.616.217 1.14.401 1.552.603c.44.217.819.483 1.103.899c.282.412.398.865.452 1.362c.024.222.037.468.043.738h10.639c1.685 0 3.201 0 3.645.577c.444.577.27 1.447-.076 3.186l-.5 2.425c-.315 1.528-.473 2.293-1.025 2.742c-.551.45-1.332.45-2.893.45H10.98c-2.789 0-4.183 0-5.05-.914S5 12.582 5 9.64V7.038c0-.74 0-1.235-.041-1.615c-.04-.363-.11-.545-.2-.677c-.088-.129-.221-.25-.525-.398c-.322-.158-.761-.314-1.429-.549l-.261-.091a.75.75 0 0 1-.459-.957M7.5 18a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m9 0a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3"/></svg>
        <?php endif ?>
    </button>
</div>

<!-- Settings panel -->
<div x-show="isSettingsPanelOpen" @click.away="isSettingsPanelOpen = false"
    x-transition:enter="transition transform duration-300"
    x-transition:enter-start="translate-x-full opacity-30  ease-in"
    x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300"
    x-transition:leave-start="translate-x-0 opacity-100 ease-out"
    x-transition:leave-end="translate-x-full opacity-0 ease-in"
    class="fixed inset-y-0 right-0 z-50 flex flex-col bg-pth dark:bg-htm w-80">
    <div class="flex items-center justify-between flex-shrink-0 p-2">
        <h6 class="p-2 text-lg">
            <?php if ($WHERE_AM_I == 'page' && !$page->isStatic() && !$url->notFound()): ?>
                Table of Contents
            <?php else: ?>
                Settings
            <?php endif ?>
        </h6>
        <button @click="isSettingsPanelOpen = false" class="p-2 rounded-md focus:outline-none focus:ring">
            <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div class="flex-1 max-h-full p-4 overflow-hidden hover:overflow-y-scroll">
        
        <!-- Settings Panel Content ... -->
        <?php if ($WHERE_AM_I == 'page' && !$page->isStatic() && !$url->notFound()): ?>
            <?php include(THEME_DIR_PHP . 'components/navigations/toc.php'); ?>
        <?php else: ?>
            <?php echo "<span>Settings Content</span>"; ?>
        <?php endif ?>
        
    </div>
</div>