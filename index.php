<?php

$db = new PDO('sqlite:' . __DIR__ . '/kinostranica.db');

$film_list = $db->query('SELECT * FROM film')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Document</title>

	<!-- подключаю библиотеки и плагины -->
	<!-- тк скрипты в теге head (а не в body), нужно указать, чтоб скрипты загружались ПОСЛЕ всего контента; для этого использую атрибут defer-->
	<script src="libs/gsap/gsap.min.js" defer></script> 
	<script src="libs/gsap/ScrollTrigger.min.js" defer></script>
	<script src="libs/gsap/ScrollSmoother.min.js" defer></script>

	<!-- подключаю css и js файлы -->
	<link rel="stylesheet" href="css/main.css">
	<script src="js/app.js" defer></script>
</head>

<body>
<div class="wpapper">
	<div class="content">
		<!-- шапка страницы-->
		<header class="hero-section">
			<img data-speed=".6" class="hero" src="img/kamera.png" alt="alt"> 
			<div class="container">
				<div data-speed=".6" class="main-header">
					<h1 class="main-title">СЕМЕЙНЫЙ ПРОСМОТР подборка</h1>
				</div>
			</div>
		</header>

		<div class="portfolio">
		    <div class="container">
		        <main class="gallery">
		            <div class="gallery__left" style="opacity: 1;">
		                <!-- Афиши слева -->
		                <?php foreach ($film_list as $index => $film) : ?>
		                    <?php if ($index % 2 == 0) : ?>
		                        <div class="text-block gallery__item" style="opacity: 1;">
		                            <img class="gallery__item" src="img/<?= htmlspecialchars($film['alias']) ?>.jpg" alt="" style="opacity: 1;">
		                            <h2 class="text-block__h"><?= htmlspecialchars($film['name']) ?></h2>
		                            <p class="text-block__p"><?= htmlspecialchars($film['description']) ?></p>
		                        </div>
		                    <?php endif; ?>
		                <?php endforeach; ?>
		            </div>
		            <div class="gallery__right">
		                <!-- Афиши справа -->
		                <?php foreach ($film_list as $index => $film) : ?>
		                    <?php if ($index % 2 != 0) : ?>
		                        <div class="text-block gallery__item" style="opacity: 1;">
		                            <img class="gallery__item" src="img/<?= htmlspecialchars($film['alias']) ?>.jpg" alt="" style="opacity: 1;">
		                            <h2 class="text-block__h"><?= htmlspecialchars($film['name']) ?></h2>
		                            <p class="text-block__p"><?= htmlspecialchars($film['description']) ?></p>
		                        </div>
		                    <?php endif; ?>
		                <?php endforeach; ?>
		            </div>
		        </main>
		    </div>
		</div>
    </div>
</div>

</body>
</html>