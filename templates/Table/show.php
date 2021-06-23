<?php

use W1020\HTML\Table;
use W1020\HTML\Pagination;
use W1020\Table as PaginTab;


echo (new Table())
    ->setData($this->data['table'])
    ->setHeaders($this->data['comments'])
    ->addColumn(fn($val) => "<a href='?type=Table&action=del&id=$val[id]'>УДАЛИТЬ</a>")
    ->addColumn(fn($val) => "<a href='?type=Table&action=showEdit&id=$val[id]'>РЕДАКТИРОВАТЬ</a>")
    ->setClass("table table-dark table-striped")->html();
$page = (int)($_GET['page'] ?? 1);
$config = include "../config.php";
$paginTable = new PaginTab($config);
$paginTable->setPageSize(3);
echo (new Pagination())->setPageCount($paginTable->pageCount())->setActivePage($page)->html();

//(new Pagination())
//    ->setPageCount($table->pageCount())
//    ->setActivePage($page)
//    ->html()


?>
<a href="?type=Table&action=showAdd">Добавить</a>