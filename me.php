<?php
require_once "back/get_staff.php";
require_once "back/modif.php";

if (!isset($_SESSION))
	session_start();
require('dhead.php');
if ($_SESSION['login']) {
	$me = ft_get_personal($_SESSION['login']);
	if (@$_POST['modif-email'] === 'Изменить')
		ft_change(@$_POST['email'], $_SESSION['login'], 'email');
	else if (@$_POST['modif-phone'] === 'Изменить')
		ft_change(@$_POST['phone'], $_SESSION['login'], 'phone');
	else if (@$_POST['modif-passwd'] === 'Изменить') {
		$check = ft_check_old_pass(hash('sha512', @$_POST['oldpasswd']), $_SESSION['login']);
		if ($check) {
			ft_change(hash('sha512', @$_POST['newpasswd']), $_SESSION['login'], 'passwd');
			echo "<script language='javascript'>alert('Пароль изменен')</script>";
		}
	}
}
?>

<section class="personal-info">
	<div class="container">
		<h2 class="personal-info-title">Личный кабинет</h2>
		<table class="personal-info_table">
			<tr>
				<td>ФИО:</td>
				<td colspan="2"><?= $me[0] . ' ' . $me[1] . ' ' . $me[2] ?></td>
			</tr>
			<tr>
				<td>Должность:</td>
				<td colspan="2"><?= $me[3] ?></td>
			</tr>
			<tr>
				<td>Отдел:</td>
				<td colspan="2"><?= $me[4] ?></td>
			</tr>
			<tr>
				<td>День рождения:</td>
				<td colspan="2"><?= $me[5] ?></td>
			</tr>
			<tr>
				<td>Адрес проживания:</td>
				<td colspan="2"><?= $me[6] ?></td>
			</tr>
			<tr>
				<td>Семейный статус:</td>
				<td colspan="2"><?= $me[7] ?></td>
			</tr>
			<tr>
				<td>Образование:</td>
				<td colspan="2"><?= $me[8] ?></td>
			</tr>
			<tr>
				<td>Почта:</td>
				<td><?= $me[9] ?></td>
				<td>
					<form method="post">
						<input type="email" class="personal-info_item" name="email" placeholder="Новый эл. адрес">
						<input type="submit" name="modif-email" value="Изменить">
					</form>
				</td>
			</tr>
			<tr>
				<td>Моб. телефон:</td>
				<td><?= $me[10] ?></td>
				<td>
					<form method="post">
						<input type="text" class="personal-info_item" name="phone" placeholder="Новый телефон">
						<input type="submit" name="modif-phone" value="Изменить">
					</form>
				</td>
			</tr>

			<tr>
				<td>Изменить пароль</td>
				<td colspan="2">
					<form method="post">
						<input type="password" name="oldpasswd" placeholder="Старый пароль">
						<input type="password" name="newpasswd" placeholder="Новый пароль">
						<input type="submit" name="modif-passwd" value="Изменить">
					</form>
				</td>
			</tr>
		</table>
	</div>
</section>

<?php
require('components/footer.php');
