<?php
require_once "back/get_staff.php";
require_once "back/get_projects.php";

$projects = ft_fill_projects($_SESSION['logged']);
$options = ft_fill_options('SMM');
if ($_POST['submit'] === 'ok') {
	$date = ($_POST['select_date'] !== 'All') ? $_POST['select_date'] : null;
	$price = ($_POST['select_price'] !== 'All') ? $_POST['select_price'] : null;
	$views = ($_POST['select_views'] !== 'All') ? $_POST['select_views'] : null;
	$staff = ($_POST['select_staff'] !== 'All') ? $_POST['select_staff'] : null;
	$projects = ft_sorted_smm_projects($date, $price, $views, $staff);
}
?>

<section class="project align_footer">
	<div class="container">
		<h2 class="project-title">Проекты отдела SMM</h2>
		<form method="POST">
			<select id="sort_name" name="select_date">
				<option value="All">Дата</option>
				<option value="ASC">От нового к старому</option>
				<option value="DESC">От старого к новому</option>
			</select>
			<select id="sort_name" name="select_price">
				<option value="All">Стоимость проекта</option>
				<option value="ASC">По возрастанию</option>
				<option value="DESC">По убыванию</option>
			</select>
			<select id="sort_name" name="select_views">
				<option value="All">Просмотры</option>
				<option value="ASC">По возрастанию</option>
				<option value="DESC">По убыванию</option>
			</select>
			<select id="sort_name" name="select_staff">
				<option value="All">Сотрудники</option>
				<?= $options ?>
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