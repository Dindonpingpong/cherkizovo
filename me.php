<?php
if (!isset($_SESSION))
	session_start();
require('dhead.php');
?>

<section class="personal-info">
	<div class="container">
		<h2 class="personal-info-title">Личный кабинет</h2>
		<table class="personal-info_table">
			<tr>
				<td>Имя:</td>
				<td colspan="2">{name} {surname} {middlename}</td>
			</tr>
			<tr>
				<td>Должность:</td>
				<td colspan="2">{job}</td>
			</tr>
			<tr>
				<td>Отдел:</td>
				<td colspan="2">{department}</td>
			</tr>
			<tr>
				<td>День рождения:</td>
				<td colspan="2">{datebirth}</td>
			</tr>
			<tr>
				<td>Адрес проживания:</td>
				<td colspan="2">{address}</td>
			</tr>
			<tr>
				<td>Семейный статус:</td>
				<td colspan="2">{familystatus}</td>
			</tr>
			<tr>
				<td>Образование:</td>
				<td colspan="2">{education}</td>
			</tr>
			<tr>
				<td>Почта:</td>
				<td>{email}</td>
				<td>
					<form method="post">
						<input type="text" class="personal-info_item" name="email" placeholder="Новый эл. адрес">
						<input type="submit" name="personal-info_modif-email" value="Изменить">
					</form>
				</td>
			</tr>
			<tr>
				<td>Моб. телефон:</td>
				<td>{phone}</td>
				<td>
					<form method="post">
						<input type="text" class="personal-info_item" name="phone" placeholder="Новый телефон">
						<input type="submit" name="personal-info_modif-phone" value="Изменить">
					</form>
				</td>
			</tr>

			<tr>
				<td>Изменить пароль</td>
				<td colspan="2">
					<form method="post">
						<input type="password" name="oldpasswd" placeholder="Старый пароль">
						<input type="password" name="newpasswd" placeholder="Новый пароль">
						<input type="submit" name="personal-info_modif-passwd" value="Изменить">
					</form>
				</td>
			</tr>
		</table>

	</div>
</section>

<?php
require('components/footer.php');
