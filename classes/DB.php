<?php
class DB
{
    private static $instance;
	public function __construct(){
		mysql_connect('localhost','root','');
		mysql_select_db('temp');
		mysql_query("SET NAMES UTF8");
	}
	
	public function queryAll($sql,$class='stdClass'){ //вывод всех дынных из базы
		$res=mysql_query($sql);
		if(false==$res){
			return false;
		}
		$ret=[];
		while($row=mysql_fetch_object($res,$class)){
			$ret[]=$row;
		}
		return $ret;
	}
	public static function Instance() //получение одного экземпляра обьекта
	
	{
		if (self::$instance == null)
			self::$instance = new DB();
		
		return self::$instance;
	}
		
		public function Select($query) //выбор по базе
	{
		$result = mysql_query($query);
		
		if (!$result)
			die(mysql_error());
		
		$n = mysql_num_rows($result);
		$arr = array();
	
		for($i = 0; $i < $n; $i++)
		{
			$row = mysql_fetch_assoc($result);		
			$arr[] = $row;
		}

		return $arr;				
	}
	
		public function Insert($table, $object) //вставка нового итема
	{			
		$columns = array();
		$values = array();
	
		foreach ($object as $key => $value)
		{
			$key = mysql_real_escape_string($key . '');
			$columns[] = $key;
			
			if ($value === null)
			{
				$values[] = 'NULL';
			}
			else
			{
				$value = mysql_real_escape_string($value . '');							
				$values[] = "'$value'";
			}
		}
		
		$columns_s = implode(',', $columns);
		$values_s = implode(',', $values);
			
		$query = "INSERT INTO $table ($columns_s) VALUES ($values_s)";
		$result = mysql_query($query);
								
		if (!$result)
			die(mysql_error());
			
		return mysql_insert_id();
	}
		
		public function Update($table, $object, $where) //редактирование 
	{
		$sets = array();
	
		foreach ($object as $key => $value)
		{
			$key = mysql_real_escape_string($key . '');
			
			if ($value === null)
			{
				$sets[] = "$key=NULL";			
			}
			else
			{
				$value = mysql_real_escape_string($value . '');					
				$sets[] = "$key='$value'";			
			}			
		}
		
		$sets_s = implode(',', $sets);			
		$query = "UPDATE $table SET $sets_s WHERE $where";
		$result = mysql_query($query);
		
		if (!$result)
			die(mysql_error());

		return mysql_affected_rows();	
	}
		
		public function Delete($table, $where) //удаление
	{
		$query = "DELETE FROM $table WHERE $where";		
		$result = mysql_query($query);
						
		if (!$result)
			die(mysql_error());

		return mysql_affected_rows();	
	}
	
}
