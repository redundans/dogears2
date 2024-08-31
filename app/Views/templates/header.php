<!doctype html>
<html>
<head>
	<title>CodeIgniter Tutorial</title>
	<?php echo link_tag('assets/css/styles.css'); ?>
</head>
<body>
	<div class="container mx-auto my-9 flex flex-col gap-12 px-6 font-sans">
		<header class="flex flex-row justify-between items-center">
			<a href="<?php echo site_url('/') ?>">
				<h1 class="text-lg font-extrabold uppercase">dogear</h1>
			</a>
			<ul class="flex flex-row gap-6">
				<li><a href="<?php echo site_url('/') ?>">Home</a></li>
				<li><a href="<?php echo site_url('/news') ?>">News</a></li>
				<?php if (auth()->loggedIn()): ?>
					<li><a href="<?php echo site_url('logout') ?>">Logout</a></li>
				<?php else: ?>
					<li><a href="<?php echo site_url('login') ?>">Login</a></li>
				<?php endif; ?>
				
			</ul>
		</header>
		<?php
		
		$news->addUser(1);
		?>