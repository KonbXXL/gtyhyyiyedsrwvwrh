<?php
require_once __DIR__ .'/../classes/DB.php';
class Usluga {
    public $ServisesID;
    public $Nazvanies;
    public $Paty;
    public $Mesto;
    public $Price1;
    public $Price_month;

    public static function getAll()
    {
        $db=new DB;
        return $db->queryAll('SELECT *FROM servises', 'Usluga');
    }
    public function __construct()
    {
        $this->action = DB::Instance();

    }

}