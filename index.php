<?php
if (!isset($_SESSION))
	session_start();
require('dhead.php');
?>

<div class="index_page">
	<div class="container">
		<h2 class="product-title">Черкизовский мясокомбинат</h2>
		<div class='about'>
			<p>
				Группа Черкизово является крупным производителем и переработчиком мяса птицы, свинины и комбикормов.
				Полное название — Публичное акционерное общество «Группа Черкизово». Главный офис — в Москве.
			</p>
		</div>
		<div class="container_slider_css">
			<img class="photo_slider_css" src="/img/slider1.jpg" alt="">
			<img class="photo_slider_css" src="/img/slider2.jpg" alt="">
			<img class="photo_slider_css" src="/img/slider3.jpg" alt="">
			<img class="photo_slider_css" src="/img/slider4.jpg" alt="">
		</div>
	</div>
</div>

<?php
require('components/footer.php');
