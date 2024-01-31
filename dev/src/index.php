<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="generator" content="Bludit" />
		<!-- Generate <title>...</title> -->
		<?php echo Theme::metaTagTitle(); ?>
		<!-- Generate <meta name="description" content="..."> -->
		<?php echo Theme::metaTagDescription(); ?>
		<!-- Generate <link rel="icon" href="..."> -->
		<?php echo Theme::favicon('img/favicon.png'); ?>
		<!-- Include CSS Styles -->
		<?php echo Theme::css( array( 'css/style.css', ) ); ?>
		<!-- Load Bludit Plugins: Site head -->
		<?php Theme::plugins('siteHead'); ?>
	</head>

	<body class="antialiased text-htm bg-pth dark:text-pth dark:bg-htm">
		<!-- Load Bludit Plugins: Site Body Begin -->
		<?php Theme::plugins('siteBodyBegin'); ?>
		<div class="flex h-screen overflow-y-hidden" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
			<?php include(THEME_DIR_PHP . 'components/loading.php'); ?> <?php include(THEME_DIR_PHP . 'components/navigations/sidebar-backdrop.php'); ?> <?php include(THEME_DIR_PHP . 'components/navigations/sidebar.php'); ?>
			<div class="flex flex-col flex-1 h-full overflow-hidden">
				<?php include(THEME_DIR_PHP . 'components/navigations/navbar.php'); ?>
				<main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
					<!-- Content -->
					<?php // $WHERE_AM_I variable detect where the user is browsing // If the user is watching a particular page the variable takes the value "page" // If the user is watching the frontpage the variable takes the value "home"
          if ($WHERE_AM_I == 'page') { include(THEME_DIR_PHP . 'page.php'); } else { include(THEME_DIR_PHP . 'home.php'); } ?>
				</main>
				<!-- Footer -->
				<?php include(THEME_DIR_PHP . 'components/navigations/footer.php'); ?>
			</div>
			<?php include(THEME_DIR_PHP . 'components/setting.php'); ?>
		</div>
		<!-- Load Bludit Plugins: Site Body End -->
		<?php Theme::plugins('siteBodyEnd'); ?>
		<!-- Load js -->
		<?php echo Theme::js('js/scripts.js'); ?>
		<!-- Set to false if its an external js -->
	</body>
</html>
