<?php

namespace App\Controller;

//use W1020\HTML\Pagination;
use W1020\Table as ORMTable;


use App\View\View;

class Table
{
    protected $model;
    protected $view;

    public function __construct()
    {
        $config = include __DIR__ . "/../../config.php";
        $this->model = new ORMTable($config);
        $this->view = new View();
    }

    public function actionShow()
    {
//        print_r($this->model->columnComments());

        $headers['id'] = "№";
        foreach ($this->model->columnComments() as $key => $comment) {
            $headers[$key] = $comment;
        }
        $headers['del'] = "DELETE";
        $headers['edit'] = "EDIT";

        $this->view->setData(['table' => $this->model->get(), 'comments' => $headers])->setTemplate("Table/show")->view();
    }

    public function actionDel()
    {
        $this->model->del($_GET['id']);
        header("Location: ?type=Table&action=show");
    }

    public function actionShowAdd()
    {
        $this->view->setData($this->model->columnComments())->setTemplate("Table/add")->view();
    }

    public function actionAdd()
    {
        $this->model->ins($_POST);
        header("Location: ?type=Table&action=show");

    }

    public function actionShowEdit()
    {
        $row = $this->model->getRow($_GET['id']);
        unset($row['id']);
        $this->view->setData(["row" => $row])->setTemplate("Table/edit")->view();
    }

    public function actionUpd()
    {
        $this->model->upd($_GET['id'], $_POST);
        header("Location: ?type=Table&action=show");

    }

}