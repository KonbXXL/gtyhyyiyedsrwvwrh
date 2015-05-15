<?php
require_once __DIR__ .'/../classes/DB.php';

class statistic {
    public $Id;
    public $DataV;
    public $Servises;
    public $Card;
    public $Sotrudnik;
    public static function getAll()
    {
        $db=new DB;
        return $db->queryAll('SELECT *FROM magazinevisit', 'statistic');
    }


}