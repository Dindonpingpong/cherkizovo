<?php
require_once "back/get_staff.php";
require_once "back/get_projects.php";

$projects = ft_fill_projects($_SESSION['logged']);
$options = ft_fill_options('PR');
if ($_POST['submit'] === 'ok') {
	$date = ($_POST['select_date'] !== 'All') ? $_POST['select_date'] : null;
	$price = ($_POST['select_price'] !== 'All') ? $_POST['select_price'] : null;
	$comments = ($_POST['select_comments'] !== 'All') ? $_POST['select_comments'] : null;
	$staff = ($_POST['select_staff'] !== 'All') ? $_POST['select_staff'] : null;
	$projects = ft_sorted_pr_projects($date, $price, $comments, $staff);
}
?>

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
				<?= $options ?>
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
			<?= $projects ?>
		</table>
	</div>
</section>