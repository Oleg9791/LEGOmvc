<?php

use W1020\HTML\Table;
use W1020\HTML\Pagination;
use W1020\Table as Tab;

$config = include "../config.php";
$tab = new Tab($config);
$tab->setPageSize(3);
$page = (int)($_GET['page'] ?? 1);
$arrSQL = $tab->getPage($page);

echo (new Table())
    ->setData($arrSQL)
    ->setHeaders($this->data['comments'])
    ->addColumn(fn($val) => "<a href='?type=Table&action=del&id=$val[id]'>УДАЛИТЬ</a>")
    ->addColumn(fn($val) => "<a href='?type=Table&action=showEdit&id=$val[id]'>РЕДАКТИРОВАТЬ</a>")
    ->setClass("table table-dark table-striped")->html();
echo (new Pagination())
    ->setPageCount($tab->pageCount())
    ->setActivePage($page)
    ->html();

?>
<a href="?type=Table&action=showAdd">Добавить</a>
