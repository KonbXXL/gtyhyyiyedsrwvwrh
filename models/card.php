<?php
require_once __DIR__ .'/../classes/DB.php';
class card {
    public $CardID;
    public $Nomer;
    public $Client_ID;
    public $Servises;
    public $VisitScore;
    public $DataEnd;

    public static function getAll()
    {
        $db=new DB;
        return $db->queryAll('SELECT *FROM card', 'card');
    }

}