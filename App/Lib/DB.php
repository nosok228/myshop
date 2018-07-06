<?php

namespace App\Lib;

class DB 
{
    public $params = [];
    public $pdo;

    public function __construct()
    {
        $this->params = include "D:\OSPanel\domains\mvc.loc\App\Config\db.php";

        //'mysql:host=localhost;dbname=test', $user, $pass

        $this->pdo = new \PDO('mysql:host=localhost;dbname=eshop', 'root', '');
    }

    public function query($query, $params = []) {
		$stmt = $this->pdo->prepare($query);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				if (is_int($val)) {
					$type = \PDO::PARAM_INT;
				} else {
					$type = \PDO::PARAM_STR;
				}
				$stmt->bindValue(':'.$key, $val, $type);
			}
		}
		$stmt->execute();
		return $stmt;
	}

    public function row($query, $params = [])
    {
        $result = $this->query($query, $params);

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function column($query, $params = [])
    {
        $result = $this->query($query, $params);

        return $result->fetchColumn(\PDO::FETCH_ASSOC);
    }
    

    
}