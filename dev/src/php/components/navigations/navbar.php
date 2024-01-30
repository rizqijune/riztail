<header class="flex-shrink-0 border rounded-b-lg border-neutral-200 dark:border-neutral-700">
	<nav class="flex items-center justify-between p-2">
		<!-- Navbar left -->
		<div class="flex items-center space-x-3">
			<?php if ($site->logo()): ?>
				<a href="<?php echo Theme::siteUrl() ?>"
					class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden">
					<img alt="<?php echo $site->title() ?>" class="max-h-6"
						src="<?php echo HTML_PATH_THEME_IMG . 'Full.webp' ?>" /></a>
			<?php endif ?>
			<!-- Toggle sidebar button -->
			<button @click="toggleSidbarMenu()" class="btn-primary-circle group">
			<svg class="icon" :class="{'transform transition-transform -rotate-180': isSidebarOpen}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M10.512 4.43a.75.75 0 0 0-.081 1.058L16.012 12l-5.581 6.512a.75.75 0 1 0 1.138.976l6-7a.75.75 0 0 0 0-.976l-6-7a.75.75 0 0 0-1.057-.081" clip-rule="evenodd"/><path fill="currentColor" d="M6.25 5a.75.75 0 0 1 1.32-.488l6 7a.75.75 0 0 1 0 .976l-6 7A.75.75 0 0 1 6.25 19z"/></svg>
			</button>
		</div>

		<!-- Mobile search box -->
		<?php if (pluginActivated('pluginSearch')): ?>
			<div x-show.transition="isSearchBoxOpen" class="fixed inset-0 z-10 bg-htm bg-opacity-20"
				style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
				<div @click.away="isSearchBoxOpen = false" class="absolute inset-x-0 flex items-center justify-between p-2">
					<div class="flex items-center flex-1 px-2 space-x-2">
						<!-- search icon -->
						<span><svg class="w-6 h-6 text-htm dark:text-pth" xmlns="http://www.w3.org/2000/svg" fill="none"
								viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
							</svg>
						</span>
						<input id="searchMobile" type="text" aria-label="Search" placeholder="Search"
							class="w-full px-4 py-3 rounded-md text-htm dark:text-pth focus:bg-gray-100 focus:outline-none" />
					</div>
					<!-- close button -->
					<button @click="searchNowMobile(); return false;" class="flex-shrink-0 p-4 rounded-md">
						<svg class="w-4 h-4 text-htm dark:text-pth" xmlns="http://www.w3.org/2000/svg" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
				</div>
			</div>
			<script>
				function searchNowMobile() {
					var searchURL = "<?php echo Theme::siteUrl(); ?>search/";
					window.open(searchURL + document.getElementById("searchMobile").value, "_self");
				}
				document.getElementById("searchMobile").onkeypress = function (e) {
					if (!e) e = window.event;
					var keyCode = e.keyCode || e.which;
					if (keyCode == '13') {
						searchNowMobile();
						return false;
					}
				}
			</script>
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
				function searchNow() {
					var searchURL = "<?php echo Theme::siteUrl(); ?>search/";
					window.open(searchURL + document.getElementById("search-input").value, "_self");
				}
				document.getElementById("search-input").onkeypress = function (e) {
					if (!e) e = window.event;
					var keyCode = e.keyCode || e.which;
					if (keyCode == '13') {
						searchNow();
						return false;
					}
				}
			</script>
		<?php endif ?>

		<!-- Navbar right -->
		<div class="relative flex items-center space-x-3">
			<!-- Search button -->
			<button @click="isSearchBoxOpen = true"
				class="p-2 rounded-full focus:ring-violet-500 md:hidden focus:outline-none focus:ring hover:bg-neutral-200 dark:hover:bg-neutral-700">
				<svg class="w-6 h-6 text-htm dark:text-pth" xmlns="http://www.w3.org/2000/svg" fill="none"
					viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
				</svg>
			</button>

			<div class="items-center hidden space-x-3 md:flex">
				<!-- Notification Menu -->
				<div class="relative" x-data="{ isOpen: false }">
					<!-- red dot -->
					<div class="absolute right-0 p-1 rounded-full bg-rose-400 animate-ping"></div>
					<div class="absolute right-0 p-1 border rounded-full bg-rose-400"></div>
					<button @click="isOpen = !isOpen"
						class="btn-primary-circle group">
						<svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8.352 20.242A4.63 4.63 0 0 0 12 22a4.63 4.63 0 0 0 3.648-1.758a27.158 27.158 0 0 1-7.296 0M18.75 9v.704c0 .845.24 1.671.692 2.374l1.108 1.723c1.011 1.574.239 3.713-1.52 4.21a25.794 25.794 0 0 1-14.06 0c-1.759-.497-2.531-2.636-1.52-4.21l1.108-1.723a4.393 4.393 0 0 0 .693-2.374V9c0-3.866 3.022-7 6.749-7s6.75 3.134 6.75 7"/></svg>
					</button>

					<div @click.away="isOpen = false" x-show.transition.opacity="isOpen"
						class="absolute z-50 w-48 max-w-md mt-3 transform rounded-md shadow-lg bg-pth dark:bg-htm -translate-x-3/4 min-w-max">
						<div class="p-4 font-medium border-b">
							<span>Notification</span>
						</div>
						<ul class="flex flex-col p-2 my-2 space-y-1">
							<li>
								<a href="#"
									class="block px-2 py-1 transition rounded-md hover:bg-neutral-200 dark:hover:bg-neutral-700">Link</a>
							</li>
							<li>
								<a href="#"
									class="block px-2 py-1 transition rounded-md hover:bg-neutral-200 dark:hover:bg-neutral-700">Another
									Link</a>
							</li>
						</ul>
						<div class="flex items-center justify-center p-4 underline border-t text-accent-2">
							<a href="#">See All</a>
						</div>
					</div>
				</div>

				<!-- Services Menu -->
				<div class="relative" x-data="{ isOpen: false }">
					<button @click="isOpen = !isOpen"
						class="btn-primary-circle group">
						<svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
						</svg>
					</button>

					<div @click.away="isOpen = false" x-show.transition.opacity="isOpen"
						class="absolute z-50 w-48 max-w-md mt-3 transform rounded-md shadow-lg bg-pth dark:bg-htm -translate-x-3/4 min-w-max">
						<div class="p-4 text-lg font-medium border-b">Web apps & services</div>
						<ul class="flex flex-col p-2 my-3 space-y-3">
							<li>
								<a href="#"
									class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-neutral-200 dark:hover:bg-neutral-700">
									<span class="block mt-1">
										<svg class="w-6 h-6 text-htm dark:text-pth" xmlns="http://www.w3.org/2000/svg"
											fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
											<path fill="#fff"
												d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
												d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
										</svg>
									</span>
									<span class="flex flex-col">
										<span class="text-lg">Atlassian</span>
										<span class="text-sm text-neutral-400">Lorem ipsum dolor sit.</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#"
									class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-neutral-200 dark:hover:bg-neutral-700">
									<span class="block mt-1">
										<svg class="w-6 h-6 text-htm dark:text-pth" xmlns="http://www.w3.org/2000/svg"
											fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
												d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
										</svg>
									</span>
									<span class="flex flex-col">
										<span class="text-lg">Slack</span>
										<span class="text-sm text-neutral-400">Lorem ipsum, dolor sit amet consectetur
											adipisicing elit.</span>
									</span>
								</a>
							</li>
						</ul>
						<div class="flex items-center justify-center p-4 underline border-t text-accent-2">
							<a href="#">Show all apps</a>
						</div>
					</div>
				</div>

				<!-- Options Menu -->
				<div class="relative" x-data="{ darkMode: localStorage.getItem('dark-mode') === 'true' || (!('dark-mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)}">
					<!-- Mode Button -->
					<button id="light-switch" @click="darkMode = !darkMode; toggleDarkMode();" class="btn-primary-circle">						
						<svg id="sun-icon" x-show="!darkMode" x-transition class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-dasharray="2" stroke-dashoffset="2" stroke-linecap="round" stroke-width="2"><path d="M0 0"><animate fill="freeze" attributeName="d" begin="0.6s" dur="0.2s" values="M12 19v1M19 12h1M12 5v-1M5 12h-1;M12 21v1M21 12h1M12 3v-1M3 12h-1"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="2;0"/></path><path d="M0 0"><animate fill="freeze" attributeName="d" begin="0.9s" dur="0.2s" values="M17 17l0.5 0.5M17 7l0.5 -0.5M7 7l-0.5 -0.5M7 17l-0.5 0.5;M18.5 18.5l0.5 0.5M18.5 5.5l0.5 -0.5M5.5 5.5l-0.5 -0.5M5.5 18.5l-0.5 0.5"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.9s" dur="1.2s" values="2;0"/></path><animateTransform attributeName="transform" dur="30s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></g><mask id="lineMdMoonFilledAltToSunnyFilledLoopTransition0"><circle cx="12" cy="12" r="12" fill="#fff"/><circle cx="18" cy="6" r="12" fill="#fff"><animate fill="freeze" attributeName="cx" dur="0.4s" values="18;22"/><animate fill="freeze" attributeName="cy" dur="0.4s" values="6;2"/><animate fill="freeze" attributeName="r" dur="0.4s" values="12;3"/></circle><circle cx="18" cy="6" r="10"><animate fill="freeze" attributeName="cx" dur="0.4s" values="18;22"/><animate fill="freeze" attributeName="cy" dur="0.4s" values="6;2"/><animate fill="freeze" attributeName="r" dur="0.4s" values="10;1"/></circle></mask><circle cx="12" cy="12" r="10" fill="currentColor" mask="url(#lineMdMoonFilledAltToSunnyFilledLoopTransition0)"><animate fill="freeze" attributeName="r" dur="0.4s" values="10;6"/></circle></svg>
						<svg id="moon-icon" x-show="darkMode" x-transition class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><g stroke-dasharray="2"><path d="M12 21v1M21 12h1M12 3v-1M3 12h-1"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="4;2"/></path><path d="M18.5 18.5l0.5 0.5M18.5 5.5l0.5 -0.5M5.5 5.5l-0.5 -0.5M5.5 18.5l-0.5 0.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.2s" values="4;2"/></path></g><path fill="currentColor" d="M7 6 C7 12.08 11.92 17 18 17 C18.53 17 19.05 16.96 19.56 16.89 C17.95 19.36 15.17 21 12 21 C7.03 21 3 16.97 3 12 C3 8.83 4.64 6.05 7.11 4.44 C7.04 4.95 7 5.47 7 6 Z" opacity="0"><set attributeName="opacity" begin="0.5s" to="1"/></path></g><g fill="none" stroke="currentColor" stroke-dasharray="4" stroke-dashoffset="4" stroke-linecap="round" stroke-linejoin="round"><path d="M13 4h1.5M13 4h-1.5M13 4v1.5M13 4v-1.5"><animate id="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0" fill="freeze" attributeName="stroke-dashoffset" begin="0.6s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+6s" dur="0.4s" values="4;0"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+4s" dur="0.4s" values="4;0"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+1.2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+3.2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+5.2s" dur="0.4s" values="0;4"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+1.8s" to="M12 5h1.5M12 5h-1.5M12 5v1.5M12 5v-1.5"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+3.8s" to="M12 4h1.5M12 4h-1.5M12 4v1.5M12 4v-1.5"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition0.begin+5.8s" to="M13 4h1.5M13 4h-1.5M13 4v1.5M13 4v-1.5"/></path><path d="M19 11h1.5M19 11h-1.5M19 11v1.5M19 11v-1.5"><animate id="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1" fill="freeze" attributeName="stroke-dashoffset" begin="1s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+6s" dur="0.4s" values="4;0"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+4s" dur="0.4s" values="4;0"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+1.2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+3.2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+5.2s" dur="0.4s" values="0;4"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+1.8s" to="M17 11h1.5M17 11h-1.5M17 11v1.5M17 11v-1.5"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+3.8s" to="M18 12h1.5M18 12h-1.5M18 12v1.5M18 12v-1.5"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition1.begin+5.8s" to="M19 11h1.5M19 11h-1.5M19 11v1.5M19 11v-1.5"/></path><path d="M19 4h1.5M19 4h-1.5M19 4v1.5M19 4v-1.5"><animate id="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2" fill="freeze" attributeName="stroke-dashoffset" begin="2.8s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2.begin+6s" dur="0.4s" values="4;0"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2.begin+2s" dur="0.4s" values="4;0"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2.begin+1.2s;lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2.begin+3.2s" dur="0.4s" values="0;4"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2.begin+1.8s" to="M20 5h1.5M20 5h-1.5M20 5v1.5M20 5v-1.5"/><set attributeName="d" begin="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition2.begin+5.8s" to="M19 4h1.5M19 4h-1.5M19 4v1.5M19 4v-1.5"/></path></g><mask id="lineMdSunnyFilledLoopToMoonAltFilledLoopTransition3"><circle cx="12" cy="12" r="12" fill="#fff"/><circle cx="22" cy="2" r="3" fill="#fff"><animate fill="freeze" attributeName="cx" begin="0.1s" dur="0.4s" values="22;18"/><animate fill="freeze" attributeName="cy" begin="0.1s" dur="0.4s" values="2;6"/><animate fill="freeze" attributeName="r" begin="0.1s" dur="0.4s" values="3;12"/></circle><circle cx="22" cy="2" r="1"><animate fill="freeze" attributeName="cx" begin="0.1s" dur="0.4s" values="22;18"/><animate fill="freeze" attributeName="cy" begin="0.1s" dur="0.4s" values="2;6"/><animate fill="freeze" attributeName="r" begin="0.1s" dur="0.4s" values="1;10"/></circle></mask><circle cx="12" cy="12" r="6" fill="currentColor" mask="url(#lineMdSunnyFilledLoopToMoonAltFilledLoopTransition3)"><set attributeName="opacity" begin="0.5s" to="0"/><animate fill="freeze" attributeName="r" begin="0.1s" dur="0.4s" values="6;10"/></circle></svg>
					</button>
					<!-- End Mode Button -->
				</div>
			</div>

			<!-- User Menu -->
			<div class="relative" x-data="{ isOpen: false }">
				<button @click="isOpen = !isOpen"
					class="p-1 m-2 rounded-full bg-gradient-to-r from-primary via-fuchsia-500 to-accent-1 focus:outline-none focus:ring">
					<img class="object-cover w-8 h-8 rounded-full"
						src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZAAAAGQCAYAAACAvzbMAAAAAXNSR0IArs4c6QAAIABJREFUeF7t3Xn8TdX+x/GPjCkRkiFTKjJEKkOolNIopQwpQ1HmKUOEJIpIxq8xRZOkrqgrt+FqcjWZmlSGcJuUSjI2+D0+p9+3K76+373W2Wedfdb3tR+P+7h/tD577fVci7dzzt5r51j0/J4DwoEAAggggIChQA4CxFCM5ggggAACMQEChIWAAAIIIGAlQIBYsVGEAAIIIECAsAYQQAABBKwECBArNooQQAABBAgQ1gACCCCAgJUAAWLFRhECCCCAAAHCGkAAAQQQsBIgQKzYKEIAAQQQIEBYAwgggAACVgIEiBUbRQgggAACBAhrAAEEEEDASoAAsWKjCAEEEECAAGENIIAAAghYCRAgVmwUIYAAAggQIKwBBBBAAAErAQLEio0iBBBAAAEChDWAAAIIIGAlQIBYsVGEAAIIIECAsAYQQAABBKwECBArNooQQAABBAgQ1gACCCCAgJUAAWLFRhECCCCAAAHCGkAAAQQQsBIgQKzYKEIAAQQQIEBYAwgggAACVgIEiBUbRQgggAACBAhrAAEEEEDASoAAsWKjCAEEEECAAGENIIAAAghYCRAgVmwUIYAAAggQIKwBBBBAAAErAQLEio0iBBBAAAEChDWAAAIIIGAlQIBYsVGEAAIIIECAsAYQQAABBKwECBArNooQQAABBAgQ1gACCCCAgJUAAWLFRhECCCCAAAHCGkAAAQQQsBIgQKzYKEIAAQQQIEBYAwgggAACVgIEiBUbRQgggAACBAhrAAEEEEDASoAAsWKjCAEEEECAAGENIIAAAghYCRAgVmwUIYAAAggQIKwBBBBAAAErAQLEio0iBBBAAAEChDWAAAIIIGAlQIBYsVGEAAIIIECAsAYQQAABBKwECBArNooQQAABBAgQ1gACCCCAgJUAAWLFRhECCCCAAAHCGkAAAQQQsBIgQKzYKEIAAQQQIEBYAwgggAACVgIEiBUbRQgggAACBAhrAAEEEEDASoAAsWKjCAEEEECAAGENIIAAAghYCRAgVmwUIYAAAggQIKwBBBBAAAErAQLEio0iBBBAAAEChDWAAAIIIGAlQIBYsVGEAAIIIECAsAYQQAABBKwECBArNooQQAABBAgQ1gACCCCAgJUAAWLFRhECCCCAAAHCGkAAAQQQsBIgQKzYKEIAAQQQIEBYAwgggAACVgIEiBUbRQgggAACBAhrAAEEEEDASoAAsWKjCAEEEECAAGENIIAAAghYCRAgVmwUIYAAAggQIKwBBBBAAAErAQLEio0iBBBAAAEChDWAAAIIIGAlQIBYsVGEAAIIIECAsAYQQAABBKwECBArNooQQAABBAgQ1gACCCCAgJUAAWLFRhECCCCAAAHCGkAAAQQQsBIgQKzYKEIAAQQQIEBYAwgggAACVgIEiBUbRQgggAACBAhrAAEEEEDASoAAsWKjCAEEEECAAGENIIAAAghYCRAgVmwUIYAAAggQIKwBBBBAAAErAQLEio0iBBBAAAEChDWAAAIIIGAlQIBYsVGEAAIIIECAsAYQQAABBKwECBArNooQQAABBAgQ1gACCCCAgJUAAWLFRhECCCCAAAHCGkAAAQQQsBIgQKzYKEIAAQQQIEBYAwgggAACVgIEiBUbRQgggAACBAhrAAEEEEDASoAAsWKjCAEEEECAAGENIIAAAghYCRAgVmwUIYAAAggQIKwBBBBAAAErAQLEio0iBBBAAAEChDWAAAIIIGAlQIBYsVGEAAIIIECAsAYQQAABBKwECBArNooQQAABBAgQ1gACCCCAgJUAAWLFRhECCCCAAAHCGkAAAQQQsBIgQKzYKEIAAQQQIEBYAwgggAACVgIEiBUbRQgggAACBAhrAAEEEEDASoAAsWKjCAEEEECAAGENIIAAAghYCRAgVmwUIYAAAggQIKwBBBBAAAErAQLEio0iBBBAAAEChDWAAAIIIGAlQIBYsVGEAAIIIECAsAYQQAABBKwECBArNooQQAABBAgQ1gACCCCAgJUAAWLFRhECCCCAAAHCGkAAAQQQsBKITICMG9teli2bZzWIMItmPbROip1YNsxTxs61efNH0r3r2cbnLV/+DJkw6W3julQraHNjWfnpp23Gl73o+T3GNUELfvzxW3lxycygzTNsd/El7aVo0VJxnSOqxU8+McLo0k45paacU+tyoxrTxouemyz79+81Lcv27WvXuVJKl65k7ECAHEJGgBivoVAKohggGzeulV49asc1vtp1rpI7B8+P6xxRLW5y5dFGl3bpZR2kS9dJRjWmjVu2KC67d+0wLcv27fv1nysNzrve2IEAIUCMF00iCnwNELUaeOdTUrdu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"
						alt="Ahmed Kamel" />
				</button>
				<!-- green dot -->
				<div class="absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping"></div>
				<div class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div>

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