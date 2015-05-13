<?php
require_once __DIR__ .'/../models/card.php';
require_once __DIR__ .'/../classes/View.php';
class cardControler {

    public function actionAll()
    {
        $items=card::getAll();
        $view=new View();

        $view->items=$items;
        $view->display('card/index.php');
    }


}