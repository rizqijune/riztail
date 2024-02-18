<header class="flex-shrink-0 border rounded-b-lg border-neutral-200 dark:border-neutral-700">
	<nav class="flex items-center justify-between p-2">
		<!-- Navbar left -->
		<div class="flex items-center space-x-3">
		<?php if ($themePlugin->mobileLogo() === true): ?>
			<?php if ($site->logo()): ?>
				<a href="<?php echo Theme::siteUrl() ?>"
					class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden">
					<img alt="<?php echo $site->title() ?>" class="max-h-6"
						src="<?php echo HTML_PATH_THEME_IMG . 'Full.webp' ?>" /></a>
			<?php endif ?>
			<?php endif ?>
			<!-- Toggle sidebar button -->
			<button @click="toggleSidbarMenu()" class="btn-primary-circle group">
			<svg class="icon line dark:!stroke-pth !stroke-htm" :class="{'transform transition-transform -rotate-90': isSidebarOpen}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-width="1.5" d="M20 7H4m16 5H4m16 5H4"/></svg>
			</button>
		</div>
<!-- Search button Mobile-->
<div class="relative w-fit md:hidden">
<input @click="isSearchBoxOpen = true"
				class="rounded-md dark:bg-htm text-htm dark:text-pth focus:outline-none" type="text" aria-label="Search" placeholder="Search"/>
</div>

		<!-- Mobile search box -->
		<?php if (pluginActivated('pluginSearch')): ?>
			<div x-show.transition="isSearchBoxOpen" class="fixed inset-0 z-10 bg-htm bg-opacity-20"
				style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
				<div @click.away="isSearchBoxOpen = false">
				<div  class="absolute inset-x-0 flex items-center justify-between p-2">
					<div class="flex items-center flex-1 px-2 space-x-2">
						<input id="search-mobile" type="text" aria-label="Search" placeholder="Search"
							class="w-full px-4 py-3 rounded-md dark:bg-htm text-htm dark:text-pth focus:outline-none" />
					</div>
					<!-- close button -->
					<button @click="searchNow(); return false;" class="flex-shrink-0 p-4 rounded-md">
					<svg class="w-6 h-6 text-htm dark:text-pth" xmlns="http://www.w3.org/2000/svg" fill="none"
								viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
							</svg>
					</button>
				</div>
				<div class="relative flex justify-center top-20">
				<?php if ($themePlugin->showCategories() == 'true'): ?>
								<?php include(THEME_DIR_PHP . 'components/navigations/categories.php'); ?>
							<?php endif ?>
						</div>
					</div>
				</div>
		<?php endif ?>

		<!-- Desktop search box -->
		<?php if (pluginActivated('pluginSearch')): ?>
			<form class="items-center hidden px-2 space-x-2 md:flex-1 md:flex md:mr-auto md:ml-5">
				<div class="relative w-full">
					<!-- search icon -->
					<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
						<svg class="w-5 h-5 text-htm dark:text-pth" xmlns="http://www.w3.org/2000/svg" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
						</svg>
					</div>
					<input id="search-input" type="search" aria-label="Search" placeholder="Search"
						class="block min-w-full px-4 py-3 pl-10 text-sm rounded-md bg-pth hover:bg-neutral-200 focus:outline-none dark:bg-htm dark:hover:bg-neutral-700 md:flex-1 md:py-2 md:focus:border md:focus:bg-neutral-200 md:focus:shadow dark:md:focus:bg-neutral-700 lg:max-w-sm"
						required />

					<button type="submit"
						class="absolute right-2.5 top-1/2 transform -translate-y-1/2 !rounded-full btn-primary p-3 text-sm font-medium focus:outline-none focus:ring-4 focus:ring-violet-300"
						id="cari" onclick="searchNow(); return false;">
						<svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
							stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
						</svg>
					</button>
				</div>
			</form>
			<script>
var searchNowPC = document.getElementById("search-input");
var searchNowHp = document.getElementById("search-mobile");
var searchURL = "<?php echo Theme::siteUrl(); ?>search/";

					function searchNow() {
						var value;
						if (searchNowPC && searchNowPC.value) {
							value = searchNowPC.value;
						} else {
							value = searchNowHp.value;
						}
						if (value) {
							window.open(searchURL + value, "_self");
						}
					}

					if (searchNowPC) {
						searchNowPC.addEventListener("keypress", function (e) {
							if (e.key === "Enter") {
								searchNow();
								e.preventDefault();
							}
						});
					}

					if (searchNowHp) {
						searchNowHp.addEventListener("keypress", function (e) {
							if (e.key === "Enter") {
								searchNow();
								e.preventDefault();
							}
						});
					}
				</script>
		<?php endif ?>

		<!-- Navbar right -->
		<div class="relative flex items-center space-x-3">
<!-- Options Menu -->
<div class="relative" x-data="{ darkMode: localStorage.getItem('dark-mode') === 'true' || (!('dark-mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)}">
					<!-- Mode Button -->
					<button id="light-switch" @click="darkMode = !darkMode; toggleDarkMode();" class="btn-primary-circle">						
						<svg id="sun-icon" x-show="!darkMode" x-transition class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-dasharray="2" stroke-dashoffset="2" stroke-linecap="round" stroke-width="2"><path d="M0 0"><animate fill="freeze" attributeName="d" begin="0.6s" dur="0.2s" values="M12 19v1M19 12h1M12 5v-1M5 12h-1;M12 21v1M21 12h1M12 3v-1M3 12h-1"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="2;0"/></path><path d="M0 0"><animate fill="freeze" attributeName="d" begin="0.9s" dur="0.2s" values="M17 17l0.5 0.5M17 7l0.5 -0.5M7 7l-0.5 -0.5M7 17l-0.5 0.5;M18.5 18.5l0.5 0.5M18.5 5.5l0.5 -0.5M5.5 5.5l-0.5 -0.5M5.5 18.5l-0.5 0.5"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.9s" dur="1.2s" values="2;0"/></path><animateTransform attributeName="transform" dur="30s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></g><mask id="lineMdMoonFilledAltToSunnyFilledLoopTransition0"><circle cx="12" cy="12" r="12" fill="#fff"/><circle cx="18" cy="6" r="12" fill="#fff"><animate fill="freeze" attributeName="cx" dur="0.4s" values="18;22"/><animate fill="freeze" attributeName="cy" dur="0.4s" values="6;2"/><animate fill="freeze" attributeName="r" dur="0.4s" values="12;3"/></circle><circle cx="18" cy="6" r="10"><animate fill="freeze" attributeName="cx" dur="0.4s" values="18;22"/><animate fill="freeze" attributeName="cy" dur="0.4s" values="6;2"/><animate fill="freeze" attributeName="r" dur="0.4s" values="10;1"/></circle></mask><circle cx="12" cy="12" r="10" fill="currentColor" mask="url(#lineMdMoonFilledAltToSunnyFilledLoopTransition0)"><animate fill="freeze" attributeName="r" dur="0.4s" values="10;6"/></circle></svg>
						<svg id="moon-icon" x-show="darkMode" x-transition class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><g stroke-dasharray="2"><path d="M12 21v1M21 12h1M12 3v-1M3 12h-1"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="4;2"/></path><path d="M18.5 18.5l0.5 0.5M18.5 5.5l0.5 -0.5M5.5 5.5l-0.5 -0.5M5.5 18.5l-0.5 0.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.2s" values="4;2"/></path></g><path fill="currentColor" d="M7 6 C7 12.08 11.92 17 18 17 C18.53 17 19.05 16.96 19.56 16.89 C17.95 19.36 15.17 21 12 21 C7.03 21 3 16.97 3 12 C3 8.83 4.64 6.05 7.11 4.44 C7.04 4.95 7 5.47 7 6 Z" opacity="0"><set attributeName="opacity" begin="0.5s" to="1"/></path></g><g fill="none" stroke="currentColor" stroke-dasharray="4" stroke-dashoffset="4" stroke-linecap="round" stroke-linejoin="round"><path d="M13 4h1.5M13 4h-1.5M13 4v1.5M13 4v-1.5"><animate id="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0" fill="freeze" attributeName="stroke-dashoffset" begin="0.6s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+6s" dur="0.4s" values="4;0"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+4s" dur="0.4s" values="4;0"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+1.2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+3.2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+5.2s" dur="0.4s" values="0;4"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+1.8s" to="M12 5h1.5M12 5h-1.5M12 5v1.5M12 5v-1.5"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+3.8s" to="M12 4h1.5M12 4h-1.5M12 4v1.5M12 4v-1.5"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+5.8s" to="M13 4h1.5M13 4h-1.5M13 4v1.5M13 4v-1.5"/></path><path d="M19 11h1.5M19 11h-1.5M19 11v1.5M19 11v-1.5"><animate id="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1" fill="freeze" attributeName="stroke-dashoffset" begin="1s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+6s" dur="0.4s" values="4;0"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+4s" dur="0.4s" values="4;0"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+1.2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+3.2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+5.2s" dur="0.4s" values="0;4"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+1.8s" to="M17 11h1.5M17 11h-1.5M17 11v1.5M17 11v-1.5"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+3.8s" to="M18 12h1.5M18 12h-1.5M18 12v1.5M18 12v-1.5"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+5.8s" to="M19 11h1.5M19 11h-1.5M19 11v1.5M19 11v-1.5"/></path><path d="M19 4h1.5M19 4h-1.5M19 4v1.5M19 4v-1.5"><animate id="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2" fill="freeze" attributeName="stroke-dashoffset" begin="2.8s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2.begin+6s" dur="0.4s" values="4;0"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2.begin+2s" dur="0.4s" values="4;0"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2.begin+1.2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2.begin+3.2s" dur="0.4s" values="0;4"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2.begin+1.8s" to="M20 5h1.5M20 5h-1.5M20 5v1.5M20 5v-1.5"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2.begin+5.8s" to="M19 4h1.5M19 4h-1.5M19 4v1.5M19 4v-1.5"/></path></g><mask id="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition3"><circle cx="12" cy="12" r="12" fill="#fff"/><circle cx="22" cy="2" r="3" fill="#fff"><animate fill="freeze" attributeName="cx" begin="0.1s" dur="0.4s" values="22;18"/><animate fill="freeze" attributeName="cy" begin="0.1s" dur="0.4s" values="2;6"/><animate fill="freeze" attributeName="r" begin="0.1s" dur="0.4s" values="3;12"/></circle><circle cx="22" cy="2" r="1"><animate fill="freeze" attributeName="cx" begin="0.1s" dur="0.4s" values="22;18"/><animate fill="freeze" attributeName="cy" begin="0.1s" dur="0.4s" values="2;6"/><animate fill="freeze" attributeName="r" begin="0.1s" dur="0.4s" values="1;10"/></circle></mask><circle cx="12" cy="12" r="6" fill="currentColor" mask="url(#lineMdSunnyFilledLoopToMoonAltFilledLoopTransition3)"><set attributeName="opacity" begin="0.5s" to="0"/><animate fill="freeze" attributeName="r" begin="0.1s" dur="0.4s" values="6;10"/></circle></svg>
					</button>
					<!-- End Mode Button -->
				</div>
			<!-- User Menu -->
			<div class="flex-1 shrink-0" x-data="{ isOpen: false }">
				<button @click="isOpen = !isOpen"
					class="rotate-90 btn-primary-circle">
						<svg class="transform icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 12a2 2 0 1 1-4 0a2 2 0 0 1 4 0m7 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0m7 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0"/></svg>
				</button>
				<div @click.away="isOpen = false" x-show.transition.opacity="isOpen"
					class="absolute z-50 w-48 max-w-md mt-3 transform rounded-md shadow-lg -translate-x-3/4 min-w-max bg-pth dark:bg-htm">
					<div class="flex flex-col p-4 space-y-1 font-medium border-b">
						<span>Ahmed Kamel</span>
						<span class="text-sm text-neutral-400">ahmed.kamel@example.com</span>
					</div>
					<ul class="flex flex-col p-2 my-2 space-y-1">
						<li>
							<a href="#" class="block px-2 py-1 transition rounded-md hover:bg-neutral-200">Link</a>
						</li>
						<li>
							<a href="#" class="block px-2 py-1 transition rounded-md hover:bg-neutral-200">Another
								Link</a>
						</li>
					</ul>
					<div class="flex items-center justify-center p-4 underline border-t text-accent-2">
						<a href="#">Logout</a>
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>