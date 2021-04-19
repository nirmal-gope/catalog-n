<?php
class Database
{
    public function db_connect(){
        try{
            $string = "mysql:host=localhost; dbname=catalog_n;";
            return $db = new PDO($string, 'root', '');


        }catch(PDOException $e)
        {
            die($e->getMessage());
        }

    }
    public function read($query, $data = [])
    {
        $DB = $this->db_connect();
        $stmt = $DB->prepare($query);

        if(count($data) > 0){
            $check = $stmt->execute($data);
        }else{
            $stmt = $DB->query($query);
            $check = 0;
            if($stmt){
                $check = 1;
            }
        }
        if($check){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }else{
            return false;
        }

    }
    public function write($query, $data = [])
    {
        $DB = $this->db_connect();
        $stmt = $DB->prepare($query);

        if(count($data) > 0){
            $check = $stmt->execute($data);
        }else{
            $stmt = $DB->query($query);
            $check = 0;
            if($stmt){
                $check = 1;
            }
        }
        if($check)
		{
			return true;
		}

		return false;

    }

}