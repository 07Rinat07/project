<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title><?=$pageTitle?></title>
	<meta name="keywords" />
	<meta name="description" />
	<link rel="stylesheet" href="<?=HOST?>static/css/main.css" />
	<!-- <link rel="stylesheet" href="<?=HOST?>static/css/fixed-admin-panel.css" />	 -->
	<link rel="stylesheet" href="<?=HOST?>static/css/custom.css" />
	<link rel="stylesheet" href="<?=HOST?>static/css/shop.css" />
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Playfair+Display:wght@400;700&display=swap');
	</style>
</head>
<?php if ( isset($pageClass) && $pageClass === 'authorization-page' ): ?>
<body class="authorization-page">
<?php else: ?>
<body class="sticky-footer body-with-panel <?php echo isset($pageClass) ? $pageClass : ''; ?>"> 
<?php endif ?>