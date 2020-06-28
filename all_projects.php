<?php
require_once "back/get_staff.php";
$projects = ft_fill_projects($_SESSION['logged']);
$projects_pr = ft_fill_projects($_SESSION['logged']);
$options_smm = ft_fill_options('SMM');
$options_pr = ft_fill_options('PR');
?>

<section class="project align_footer">
	<div class="container">
		<h2 class="project-title">Проекты отдела SMM</h2>
		<form method="POST">
			<select id="sort_name" name="select_price">
				<option value="All">Дата</option>
				<option value="ASC">От нового к старому</option>
				<option value="DESC">От старого к новому</option>
			</select>
			<select id="sort_name" name="select_price">
				<option value="All">Стоимость проекта</option>
				<option value="ASC">По возрастанию</option>
				<option value="DESC">По убыванию</option>
			</select>
			<select id="sort_name" name="select_price">
				<option value="All">Лайки</option>
				<option value="ASC">По возрастанию</option>
				<option value="DESC">По убыванию</option>
			</select>
			<select id="sort_name" name="select_genre">
				<option value="All">Сотрудники</option>
				<?= $options_smm ?>
			</select>
			<input type="submit" name="submit" value="ok">
		</form>
		<table class="project-table table-smm">
			<tr>
				<td>Дата</td>
				<td>Описание</td>
				<td>Цена</td>
				<td>Лайк</td>
				<td>Дизлайк</td>
				<td>Просмотры</td>
				<td>Репост</td>
				<td>Комменты</td>
				<td>Ответ-ый</td>
				<td>Статус</td>
			</tr>
			<?= $projects ?>
		</table>
	</div>
</section>

<section class="project align_footer">
	<div class="container">
		<h2 class="project-title">Проекты отдела PR</h2>
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
				<?= $options_pr ?>
			</select>
			<input type="submit" name="submit" value="ok">
		</form>
		<table class="project-table table-pr">
			<tr>
				<td>Дата</td>
				<td>Описание</td>
				<td>Цена</td>
				<td>ТВ</td>
				<td>Масс-медиа</td>
				<td>Галлерея</td>
				<td>Кол-во поз. отзывов</td>
				<td>Кол-во отр. отзывов</td>
				<td>Ответ-ый</td>
				<td>Статус</td>
			</tr>
			<?= $projects_pr ?>
		</table>
	</div>
</section>