<?php
include_once "back/get_staff.php";
if (!isset($_SESSION))
	session_start();
require('dhead.php');
$staff = ft_fill_staff();
?>

<section class="catalog align_footer">
	<div class="container">
		<h2 class="catalog-title">Список сотрудников</h2>
		</form>
		<table>
			<?= $staff ?>
		</table>
	</div>
</section>

<?php
require('components/footer.php');