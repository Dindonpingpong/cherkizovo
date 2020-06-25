<?php
include_once "admin/adm_get_items.php";
include_once "admin/adm_add_prod.php";
include_once "admin/adm_add_user.php";
include_once "back/print_status.php";
include_once "back/get_users.php";

if (!isset($_SESSION))
    session_start();
require('dhead.php');
$status = ft_print_status('OK');
if ($_SESSION['User_status'] !== 'admin')
    header("Location: catalog.php");
$options = ft_fill_product_names();

if ($_POST['select_item'])
    $item = ft_adm_fill_item($_POST['select_item']);
else
    $item = file_get_contents("admin/adm_product_item.php");
if ($_POST['add_prod']) {
    $res = ft_add_prod($_POST);
    $status = ft_print_status($res);
    header("Location: admin.php");
}

$pseudo = ft_fill_users();
if ($_POST['select_user'])
    $user_info = ft_adm_fill_user($_POST['select_user']);
else
    $user_info = file_get_contents("admin/adm_users_info.php");
if ($_POST['add_user']) {
    $new_user = ft_add_user($_POST);
    $status = ft_print_status($new_user);
    header("Location: admin.php");
}
?>

<div class="container align_footer admin">
    <h2>Сервер</h2>
    <?= $status ?>
    <h3>Товары</h3>

    <form method="post">
        <select id="sort_name" name="select_item">
            <?= $options ?>
        </select>
        <input type="submit" class="admin_changes" name="modif" value="Редактировать">

        <table>
            <tr>
                <th>Название товара</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Фото</th>
                <th>Тег</th>
                <th>Операции</th>
            </tr>
            <?= $item ?>
        </table>
    </form>

    <h3>Добавить новый товар</h3>
    <form method="post">
        <input type="text" class="new_product" name="name" placeholder="Название">
        <input type="text" class="new_product" name="desc" placeholder="Описание">
        <input type="text" class="new_product" name="price" placeholder="Цена">
        <input type="text" class="new_product" name="quan" placeholder="Количество">
        <input type="text" class="new_product" name="path" placeholder="Путь к фото">
        <input type="text" class="new_product" name="tag" placeholder="Тег">
        <input type="submit" name="add_prod" value="Добавить">
    </form>

    <h3>Пользователи</h3>

    <form method="post">
        <select id="sort_name" name="select_user">
            <?= $pseudo ?>
        </select>
        <input type="submit" class="admin_changes" name="modif" value="Редактировать">

        <table>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Псевдоним</th>
                <th>Эл. почта</th>
                <th>Операции</th>
            </tr>
            <?= $user_info ?>
        </table>

    </form>

    <h3>Добавить нового пользователя</h3>
    <form method="post">
        <input type="text" class="new_product" name="firstname" placeholder="Имя">
        <input type="text" class="new_product" name="lastname" placeholder="Фамилия">
        <input type="text" class="new_product" name="nickname" placeholder="Псевдоним">
        <input type="text" class="new_product" name="password" placeholder="Пароль">
        <input type="text" class="new_product" name="email" placeholder="Эл. почта">
        <input type="submit" name="add_user" value="Добавить">
    </form>

    <h3>Выдать админ-права пользователю</h3>

    <form action="" method="POST">
        <select id="sort_name" name="select_genre">
            <option value="Выбрать пользователя">Выбрать пользователя</option>
            <!-- заполнение -->
            <option value="{nickname}">{nickname}</option>

        </select>
        <input type="submit" name="submit" value="Сохранить">
    </form>
</div>

<?php
require('components/footer.php');
?>