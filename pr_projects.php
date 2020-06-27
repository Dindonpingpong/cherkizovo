<?php
if (isset($_POST['select_date']))
	$projects = ft_fill_projects($_SESSION['logged']);
?>

<section class="catalog align_footer">
	<div class="container">
		<h2 class="catalog-title">Каталог товаров</h2>
		<form method="POST">
			<select name="select_date">
				<option value="All">Дата</option>
				<option value="ASC">От нового к старому</option>
				<option value="DESC">От старого к новому</option>
			</select>
			<select name="select_price">
				<option value="All">Стоимость проекта</option>
				<option value="ASC">По возрастанию</option>
				<option value="DESC">По убыванию</option>
			</select>
			<select name="select_comments">
				<option value="All">Положительные отзывы</option>
				<option value="ASC">По возрастанию</option>
				<option value="DESC">По убыванию</option>
			</select>
			<select name="select_staff">
				<option value="All">Сотрудники</option>
				<?= $options ?>
			</select>
			<input type="submit" name="submit" value="ok">
		</form>
		<table>
			<?= $projects ?>
		</table>
	</div>
</section>