<?php

class Database{

    private $dsn;
    private $user;
    private $password;

    private $pdo;

    public function __construct()
    {
        $this->dsn="mysql:host=localhost;dbname=product_db;port=3306;charset=utf8";
        $this->user="root";
        $this->password="";
    }

    public function connection()
    {
        if ($this->pdo === null) {
            $pdoCon = new PDO($this->dsn, $this->user, $this->password);
            $pdoCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdoCon;
        }
        return $this->pdo;
    }

    public function prepareReq($statement, $attributes=null)
    {
        $pdo= $this->connection();
        $req= $pdo->prepare($statement);

        if ($attributes === null) {
            $req->execute();
        }else{
            $req->execute($attributes);
        }

        return $req;
    }

    public function recover($req, $one=false)
    {
        $datas = null;
        $req->setFetchMode(PDO::FETCH_OBJ);

        if ($one == true) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

}






?>