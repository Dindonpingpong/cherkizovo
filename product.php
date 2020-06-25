<?php
if (!isset($_SESSION))
    session_start();
include_once "back/get_items.php";
$item_name = $_GET['item'];
$item = ft_fill_item($item_name);
if (@$_POST['add_to_cart']) {
    if (isset($_SESSION[$item_name]))
        $_SESSION[$item_name]++;
    else
        $_SESSION[$item_name] = 1;
}
require('dhead.php');
echo $item;
?>
<form method="post">
    <input class="cash" type="submit" name="add_to_cart" value="Добавить">
</form>
</div>
</article>
</div>

<?php
require('components/footer.php');
?>