<?php
require_once __DIR__ .'/../classes/DB.php';

class Client {
	public $ClientID;
	public $LastName;
	public $Name;
	public $FastName;
	public $DataHappy;
	public $DataReg;
	public $Contact;
	public $Pol;

	public static function getAll()
	{
		$db=new DB;
		return $db->queryAll('SELECT *FROM client', 'Client');
	}
	    public function __construct()
    {
        $this->action = DB::Instance();

    }

}