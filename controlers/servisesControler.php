<?php
require_once __DIR__ .'/../models/usluga.php';
require_once __DIR__ .'/../classes/View.php';

class servisesControler {

    public function actionAll()
    {
        $items=Usluga::getAll();
        $view=new View();

        $view->items=$items;
        $view->display('servises/index.php');
    }

}