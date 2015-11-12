<?php

class BasketController {
    function addToBasket() {
        $item = Item::findByTitle($_GET['item_title']); // (1) Не объявлен класс Item

        $basket = $_GLOBALS['basket']; // (2) Массив $_GLOBALS не определен или неверное написание $GLOBALS

        $basket->addItem($item);

        if($basket->countItems() > 10) {
            $basket->errorMessages->add("Слишком много товаров в корзине.") // (3) Нет окончания инструкций точкой с запятой
        }
 
        $total = 0;
        foreach($basket->items as $item) { // (4) $item перекроет верхний $item
            $total += $item // (5) $item является объектом, а не числом и (6) нет окончания инструкций точкой с запятой
        }

            $_SESSION['basket_total'] = $total; // (7) В $total будет неизвестные данные, в зависимости от $item

            mysql_query("INZERT INTO basket_items (basket_id, item_title, basket_type) VALUES ("
. $this->basket->basket_id . ", " . $_GET[item_title] . ", 3)"); // (8) Не верный синтаксис SQl оператора INSERT INTO и (9) объект $this->basket->basket_id не определен

        Basket::addFreeDelivery($basket); // (10) Не объявлен класс Basket
            
        print "<h1>Добавлен товар в корзину: {$item->title}</h1>" // (11) $item из foreach, а не из верхнего $item и (12) нет окончания инструкций точкой с запятой
    }
}
