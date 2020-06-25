<?php
include_once "back/get_tags.php";
include_once "back/get_items.php";
if (!isset($_SESSION))
    session_start();
require("dhead.php");
$genre = (isset($_POST['select_genre'])) ? $_POST['select_genre'] : "All";
$type = (isset($_POST['select_price'])) ? $_POST['select_price'] : "ASC";
$products = ft_fill_items($genre, $type);
$options = ft_fill_tags();
?>

<section class="catalog align_footer">
    <div class="container">
        <h2 class="catalog-title">Каталог товаров</h2>
        <form method="POST">
            <select id="sort_name" name="select_price">
                <option value="ASC">Цена по возрастанию</option>
                <option value="DESC">Цена по убыванию</option>
            </select>
            <select id="sort_name" name="select_genre">
                <option value="All">Без сортировки</option>
                <?= $options ?>
            </select>
            <input type="submit" name="submit" value="ok">
        </form>
        <ul class="product-list">
            <?= $products ?>
        </ul>
    </div>
</section>

<?php
require("components/footer.php");
?>