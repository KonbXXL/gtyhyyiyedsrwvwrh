<?php
require_once __DIR__ .'/../models/statistic.php';
require_once __DIR__ .'/../classes/View.php';
class statisticControler {
    public function actionAll()
    {
        $items=statistic::getAll();
        $view=new View();

        $view->items=$items;
        $view->display('static/index.php');
    }

}