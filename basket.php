<?php
if (!isset($_SESSION))
    session_start();
include_once "back/get_items.php";
include_once "back/print_status.php";
include_once "back/make_order.php";
require('dhead.php');
$article = "";
$status = "";
$names_prices = ft_get_items_names_prices();
foreach ($names_prices as $key => $val) {
    if (isset($_SESSION[$key]) && $_SESSION[$key] > 0) {
        $file = file_get_contents("components/article_basket.php");
        $file = str_replace("{name}", $key, $file);
        $file = str_replace("{quantity}", $_SESSION[$key], $file);
        $file = str_replace("{price}", $val, $file);
        $file = str_replace("{total}", $val * $_SESSION[$key], $file);
        $article .= $file;
    }
}
if (@$_POST['pay']) {
    if (isset($_SESSION['logged'])) {
        $login = $_SESSION["logged"];
        $names_prices = ft_get_items_names_prices();
        $order_positions = array();
        foreach ($names_prices as $key => $val) {
            if (isset($_SESSION[$key]) && $_SESSION[$key] > 0) {
                $tmp = array();
                $tmp['name'] = $key;
                $tmp['quantity'] = $key;
                $order_positions[] = $tmp;
            }
        }
        ft_order($login, $order_positions);
        $status = ft_print_status("Спасибо за покупку  $login");
    } else
        $status = ft_print_status("Авторизуйтесь или зарегистрируйтесь для оплаты");
}
if (@$_POST['archive']) {
    if (isset($_SESSION['logged'])) {
        $login = $_SESSION["logged"];
        $names_prices = ft_get_items_names_prices();
        $order_positions = array();
        foreach ($names_prices as $key => $val) {
            if (isset($_SESSION[$key]) && $_SESSION[$key] > 0) {
                $tmp = array();
                $tmp['name'] = $key;
                $tmp['quantity'] = $key;
                $order_positions[] = $tmp;
            }
        }
        ft_order($login, $order_positions, 'Архив');
        $status = ft_print_status("Корзина сохранена  $login");
    } else
        $status = ft_print_status("Авторизуйтесь или зарегистрируйтесь для сохранения корзины");
}
?>

<div class="container align_footer basket">
    <h2>Корзина</h2>
    <h2><?= $status ?></h2>
    <form method="post">
        <table>
            <tr>
                <th>Название товара</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            <?= $article ?>
        </table>
        <input class="basket_btn" type="submit" name="archive" value="Архивировать">
        <input class="basket_btn" type="submit" name="watch_archive" value="Скачать из архива">
        <input class="basket_btn" type="submit" name="pay" value="Оплатить">
    </form>

</div>

<?php
require('components/footer.php');
?>