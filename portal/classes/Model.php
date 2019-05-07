<?php

class Model
{
	private $pdo;
	private $stmt;
	private $my_query;



	public function __construct()
	{
		$this->connect();
	}

	public function __destruct()
	{
		$this->disconect();
	}

	protected function connect()
	{
		$this->pdo = new PDO('mysql:host='.$GLOBALS['host'].';dbname='.$GLOBALS['dbname'], $GLOBALS['user'], $GLOBALS['password']);
	}

	protected function disconect() {}

	public function query($sql)
	{
		$this->stmt = $this->pdo->prepare($sql);
		$this->stmt->execute();
	}

	public function row($sql)
	{
		$this->stmt = $this->pdo->prepare($sql);
		$this->stmt->execute();

		return $this->stmt->fetchObject();
	}

	

	public function result($sql)
	{
		$this->stmt = $this->pdo->prepare($sql);
		$this->stmt->execute();

		$registers = array();
		while($register = $this->stmt->fetchObject())
		{
			$registers[] = $register;
		}

		switch(count($registers))
		{
			case 0 : return null; break;
			default : return $registers; break;
		}
	}

	public function last_insert_id()
	{
		return $this->pdo->lastInsertId();
	}

	public function row_count()
	{
		return $this->stmt->rowCount();
	}



	public function insert($table, $object)
	{
        $vars = get_object_vars($object);

        $values = array();
        $fields = array();
        foreach($vars as $i => $value)
        {
        	$fields[] = $i;
        	$values[] = '"'.$value.'"';
        }

		$sql = 'INSERT INTO '.$table.' ('.implode(',', array_values($fields)).') VALUES ('.implode(',', array_values($values)).')';
		$this->query($sql);
	}

	public function update($table, $object, $where)
	{
        $vars = get_object_vars($object);

        $set = array();
        foreach($vars as $i => $value)
        {
        	$set[] = $i.' = "'.$value.'"';
        }

		$sql = 'UPDATE '.$table.' SET '.implode(', ', $set).' '.($where != '' ? 'WHERE '.$where : '');
		$this->query($sql);
	}

	/**
	 * Deleta um registro de uma tabela.
	 *
	 * @param string $table
	 * @param string $where
	 */
	public function delete($table, $where)
	{
		$sql = 'DELETE FROM '.$table.' WHERE '.$where;
		$this->query($sql);
	}


}
