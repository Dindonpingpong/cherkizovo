<?php
include_once "back/get_staff.php";
if (!isset($_SESSION))
	session_start();
require('dhead.php');
$staff = ft_fill_staff();
?>

<section class="project align_footer">
	<div class="container">
		<h2 class="project-title">Список сотрудников</h2>
		</form>
		<table class="project-table">
			<tr>
				<td colspan="3">Ф.И.О</td>
				<td>Отдел</td>
				<td>Должность</td>
				<td>Телефон</td>
				<td>Почта</td>
				<td>День рождения</td>
			</tr>
			<?= $staff ?>
		</table>
	</div>
</section>

<?php
require('components/footer.php');
