<?php
require_once __DIR__ .'/../models/Client.php';
require_once __DIR__ .'/../classes/View.php';
class prostoControler{

	
	public function actionAll()
	{
		$items=Client::getAll();
		$view=new View();
		
		$view->items=$items;
		$view->display('client/all.php');
	}

}