<?php

use W1020\HTML\Table;

echo (new Table())
    ->setData($this->data['table'])
    ->setHeaders($this->data['comments'])
    ->addColumn(fn($val) => "<a href='?type=Table&action=del&id=$val[id]'>УДАЛИТЬ</a>")
    ->addColumn(fn($val) => "<a href='?type=Table&action=showEdit&id=$val[id]'>РЕДАКТИРОВАТЬ</a>")
    ->setClass("table table-dark table-striped")->html();
?>
<a href="?type=Table&action=showAdd">Добавить</a>