<?php
require_once "back/get_staff.php";
require_once "back/modif.php";

if (!isset($_SESSION))
	session_start();
require('dhead.php');
$staff_smm = ft_fill_options('SMM');
$staff_pr = ft_fill_options('PR');
if ($_POST['add_task_smm'] === "Добавить" && $_POST['staff_name']) {
	if (ft_add_task($_POST['staff_name'], 'SMM', $_POST['smm_price'], $_POST['smm_desc']))
		echo "<script language='javascript'>alert('Проект добавлен')</script>";
}
if ($_POST['add_task_pr'] === "Добавить" && $_POST['staff_name']) {
	if (ft_add_task($_POST['staff_name'], 'PR', $_POST['pr_price'], $_POST['pr_desc']))
		echo "<script language='javascript'>alert('Проект добавлен')</script>";
}
?>

<section class="task-panel">
	<div class="container">
		<h2 class="task-panel-title">Управление задачами</h2>

		<h3>SMM</h3>
		<form class="task-panel_form" method="post">
			<table>
				<tr>
					<td>
						<select name="staff_name">
							<option value="All">Выбрать ответственного</option>
							<?= $staff_smm ?>
						</select>
					</td>
					<td>
						<input type="text" class="new_task" name="smm_price" placeholder="Цена">
					</td>
					<td>
						<input type="text" class="new_task" name="smm_desc" placeholder="Описание">
					</td>
					<td>
						<input type="submit" name="add_task_smm" value="Добавить">
					</td>
				</tr>
			</table>
		</form>

		<h3>PR</h3>
		<form class="task-panel_form" method="post">
			<table>
				<tr>
					<td>
						<select name="staff_name">
							<option value="All">Выбрать ответственного</option>
							<?= $staff_pr ?>
						</select>
					</td>
					<td>
						<input type="text" class="new_task" name="pr_price" placeholder="Цена">
					</td>
					<td>
						<input type="text" class="new_task" name="pr_desc" placeholder="Описание">
					</td>
					<td>
						<input type="submit" name="add_task_pr" value="Добавить">
					</td>
				</tr>
			</table>
		</form>

	</div>
</section>

<?php
require('components/footer.php');
